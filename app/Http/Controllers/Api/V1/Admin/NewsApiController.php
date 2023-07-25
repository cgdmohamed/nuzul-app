<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Http\Resources\Admin\NewsResource;
use App\Models\News;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('news_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NewsResource(News::all());
    }

    public function store(StoreNewsRequest $request)
    {
        $news = News::create($request->validated());

        if ($request->input('news_post_image', false)) {
            $news->addMedia(storage_path('tmp/uploads/' . basename($request->input('news_post_image'))))->toMediaCollection('news_post_image');
        }

        return (new NewsResource($news))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(News $news)
    {
        abort_if(Gate::denies('news_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NewsResource($news);
    }

    public function update(UpdateNewsRequest $request, News $news)
    {
        $news->update($request->validated());

        if ($request->input('news_post_image', false)) {
            if (! $news->news_post_image || $request->input('news_post_image') !== $news->news_post_image->file_name) {
                if ($news->news_post_image) {
                    $news->news_post_image->delete();
                }
                $news->addMedia(storage_path('tmp/uploads/' . basename($request->input('news_post_image'))))->toMediaCollection('news_post_image');
            }
        } elseif ($news->news_post_image) {
            $news->news_post_image->delete();
        }

        return (new NewsResource($news))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(News $news)
    {
        abort_if(Gate::denies('news_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $news->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
