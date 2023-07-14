<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('location.location_name') ? 'invalid' : '' }}">
        <label class="form-label required" for="location_name">{{ trans('cruds.location.fields.location_name') }}</label>
        <input class="form-control" type="text" name="location_name" id="location_name" required wire:model.defer="location.location_name">
        <div class="validation-message">
            {{ $errors->first('location.location_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.location.fields.location_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('location.district') ? 'invalid' : '' }}">
        <label class="form-label required" for="district">{{ trans('cruds.location.fields.district') }}</label>
        <input class="form-control" type="text" name="district" id="district" required wire:model.defer="location.district">
        <div class="validation-message">
            {{ $errors->first('location.district') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.location.fields.district_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.locations.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>