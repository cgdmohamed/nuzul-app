<?php

namespace App\Http\Livewire\News;

use App\Models\News;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public News $news;

    public array $mediaToRemove = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
                ->update(['model_id' => $this->news->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(News $news)
    {
        $this->news             = $news;
        $this->mediaCollections = [

            'news_post_image' => $news->post_image,
        ];
    }

    public function render()
    {
        return view('livewire.news.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->news->save();
        $this->syncMedia();

        return redirect()->route('admin.newss.index');
    }

    protected function rules(): array
    {
        return [
            'news.post_name' => [
                'string',
                'required',
            ],
            'news.post_content' => [
                'string',
                'required',
            ],
            'mediaCollections.news_post_image' => [
                'array',
                'required',
            ],
            'mediaCollections.news_post_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }
}
