<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('news.post_name') ? 'invalid' : '' }}">
        <label class="form-label required" for="post_name">{{ trans('cruds.news.fields.post_name') }}</label>
        <input class="form-control" type="text" name="post_name" id="post_name" required wire:model.defer="news.post_name">
        <div class="validation-message">
            {{ $errors->first('news.post_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.news.fields.post_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('news.post_content') ? 'invalid' : '' }}">
        <label class="form-label required" for="post_content">{{ trans('cruds.news.fields.post_content') }}</label>
        <textarea class="form-control" name="post_content" id="post_content" required wire:model.defer="news.post_content" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('news.post_content') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.news.fields.post_content_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.news_post_image') ? 'invalid' : '' }}">
        <label class="form-label required" for="post_image">{{ trans('cruds.news.fields.post_image') }}</label>
        <x-dropzone id="post_image" name="post_image" action="{{ route('admin.newss.storeMedia') }}" collection-name="news_post_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.news_post_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.news.fields.post_image_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.newss.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>