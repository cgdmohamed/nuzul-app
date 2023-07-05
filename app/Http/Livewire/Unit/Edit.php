<?php

namespace App\Http\Livewire\Unit;

use App\Models\Location;
use App\Models\Unit;
use App\Models\User;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Unit $unit;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

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
                ->update(['model_id' => $this->unit->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(Unit $unit)
    {
        $this->unit = $unit;
        $this->initListsForFields();
        $this->mediaCollections = [

            'unit_unit_images' => $unit->unit_images,

        ];
    }

    public function render()
    {
        return view('livewire.unit.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->unit->save();
        $this->syncMedia();

        return redirect()->route('admin.units.index');
    }

    protected function rules(): array
    {
        return [
            'unit.unit_name' => [
                'string',
                'required',
            ],
            'unit.unit_code' => [
                'string',
                'required',
            ],
            'unit.unit_location_id' => [
                'integer',
                'exists:locations,id',
                'required',
            ],
            'unit.unit_checkin' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'unit.unit_checkout' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'unit.unit_lock' => [
                'string',
                'required',
            ],
            'unit.unit_status' => [
                'required',
                'in:' . implode(',', array_keys($this->listsForFields['unit_status'])),
            ],
            'mediaCollections.unit_unit_images' => [
                'array',
                'nullable',
            ],
            'mediaCollections.unit_unit_images.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'unit.booked_by_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'unit.unit_connectivity' => [
                'string',
                'nullable',
            ],
            'unit.unit_parking' => [
                'string',
                'nullable',
            ],
            'unit.oven' => [
                'boolean',
            ],
            'unit.laundry' => [
                'boolean',
            ],
            'unit.dishwasher' => [
                'boolean',
            ],
            'unit.coffee_machine' => [
                'boolean',
            ],
            'unit.fireplace' => [
                'boolean',
            ],
            'unit.tv' => [
                'boolean',
            ],
            'unit.iron' => [
                'boolean',
            ],
            'unit.private_entrance' => [
                'boolean',
            ],
            'unit.outdoor_sitting_area' => [
                'boolean',
            ],
            'unit.office_desk' => [
                'boolean',
            ],
            'unit.balcony' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['unit_location'] = Location::pluck('location_name', 'id')->toArray();
        $this->listsForFields['unit_status']   = $this->unit::UNIT_STATUS_RADIO;
        $this->listsForFields['booked_by']     = User::pluck('name', 'id')->toArray();
    }
}
