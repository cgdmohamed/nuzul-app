@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.news.title_singular') }}:
                    {{ trans('cruds.news.fields.id') }}
                    {{ $news->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.news.fields.id') }}
                            </th>
                            <td>
                                {{ $news->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.news.fields.post_name') }}
                            </th>
                            <td>
                                {{ $news->post_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.news.fields.post_content') }}
                            </th>
                            <td>
                                {{ $news->post_content }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.news.fields.post_image') }}
                            </th>
                            <td>
                                @foreach($news->post_image as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('news_edit')
                    <a href="{{ route('admin.newss.edit', $news) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.newss.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection