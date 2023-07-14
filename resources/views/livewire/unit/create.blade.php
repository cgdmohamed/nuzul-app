<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('unit.unit_name') ? 'invalid' : '' }}">
        <label class="form-label required" for="unit_name">{{ trans('cruds.unit.fields.unit_name') }}</label>
        <input class="form-control" type="text" name="unit_name" id="unit_name" required wire:model.defer="unit.unit_name">
        <div class="validation-message">
            {{ $errors->first('unit.unit_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.unit.fields.unit_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('unit.unit_code') ? 'invalid' : '' }}">
        <label class="form-label required" for="unit_code">{{ trans('cruds.unit.fields.unit_code') }}</label>
        <input class="form-control" type="text" name="unit_code" id="unit_code" required wire:model.defer="unit.unit_code">
        <div class="validation-message">
            {{ $errors->first('unit.unit_code') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.unit.fields.unit_code_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('unit.unit_city') ? 'invalid' : '' }}">
        <label class="form-label required">{{ trans('cruds.unit.fields.unit_city') }}</label>
        <select class="form-control" wire:model="unit.unit_city">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['unit_city'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('unit.unit_city') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.unit.fields.unit_city_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('unit.unit_district_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="unit_district">{{ trans('cruds.unit.fields.unit_district') }}</label>
        <x-select-list class="form-control" required id="unit_district" name="unit_district" :options="$this->listsForFields['unit_district']" wire:model="unit.unit_district_id" />
        <div class="validation-message">
            {{ $errors->first('unit.unit_district_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.unit.fields.unit_district_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('unit.building_no') ? 'invalid' : '' }}">
        <label class="form-label required" for="building_no">{{ trans('cruds.unit.fields.building_no') }}</label>
        <input class="form-control" type="text" name="building_no" id="building_no" required wire:model.defer="unit.building_no">
        <div class="validation-message">
            {{ $errors->first('unit.building_no') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.unit.fields.building_no_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('unit.unit_latitude') ? 'invalid' : '' }}">
        <label class="form-label required" for="unit_latitude">{{ trans('cruds.unit.fields.unit_latitude') }}</label>
        <input class="form-control" type="number" name="unit_latitude" id="unit_latitude" required wire:model.defer="unit.unit_latitude" step="0.0000001">
        <div class="validation-message">
            {{ $errors->first('unit.unit_latitude') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.unit.fields.unit_latitude_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('unit.unit_longitude') ? 'invalid' : '' }}">
        <label class="form-label required" for="unit_longitude">{{ trans('cruds.unit.fields.unit_longitude') }}</label>
        <input class="form-control" type="number" name="unit_longitude" id="unit_longitude" required wire:model.defer="unit.unit_longitude" step="0.0000001">
        <div class="validation-message">
            {{ $errors->first('unit.unit_longitude') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.unit.fields.unit_longitude_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('unit.unit_checkin') ? 'invalid' : '' }}">
        <label class="form-label required" for="unit_checkin">{{ trans('cruds.unit.fields.unit_checkin') }}</label>
        <x-date-picker class="form-control" required wire:model="unit.unit_checkin" id="unit_checkin" name="unit_checkin" picker="date" />
        <div class="validation-message">
            {{ $errors->first('unit.unit_checkin') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.unit.fields.unit_checkin_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('unit.unit_checkout') ? 'invalid' : '' }}">
        <label class="form-label required" for="unit_checkout">{{ trans('cruds.unit.fields.unit_checkout') }}</label>
        <x-date-picker class="form-control" required wire:model="unit.unit_checkout" id="unit_checkout" name="unit_checkout" picker="date" />
        <div class="validation-message">
            {{ $errors->first('unit.unit_checkout') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.unit.fields.unit_checkout_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('unit.unit_lock') ? 'invalid' : '' }}">
        <label class="form-label required" for="unit_lock">{{ trans('cruds.unit.fields.unit_lock') }}</label>
        <input class="form-control" type="text" name="unit_lock" id="unit_lock" required wire:model.defer="unit.unit_lock">
        <div class="validation-message">
            {{ $errors->first('unit.unit_lock') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.unit.fields.unit_lock_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('unit.unit_status') ? 'invalid' : '' }}">
        <label class="form-label required">{{ trans('cruds.unit.fields.unit_status') }}</label>
        @foreach($this->listsForFields['unit_status'] as $key => $value)
            <label class="radio-label"><input type="radio" name="unit_status" wire:model="unit.unit_status" value="{{ $key }}">{{ $value }}</label>
        @endforeach
        <div class="validation-message">
            {{ $errors->first('unit.unit_status') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.unit.fields.unit_status_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.unit_unit_images') ? 'invalid' : '' }}">
        <label class="form-label" for="unit_images">{{ trans('cruds.unit.fields.unit_images') }}</label>
        <x-dropzone id="unit_images" name="unit_images" action="{{ route('admin.units.storeMedia') }}" collection-name="unit_unit_images" max-file-size="2" max-width="4096" max-height="4096" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.unit_unit_images') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.unit.fields.unit_images_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('unit.booked_by_id') ? 'invalid' : '' }}">
        <label class="form-label" for="booked_by">{{ trans('cruds.unit.fields.booked_by') }}</label>
        <x-select-list class="form-control" id="booked_by" name="booked_by" :options="$this->listsForFields['booked_by']" wire:model="unit.booked_by_id" />
        <div class="validation-message">
            {{ $errors->first('unit.booked_by_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.unit.fields.booked_by_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('unit.unit_connectivity') ? 'invalid' : '' }}">
        <label class="form-label" for="unit_connectivity">{{ trans('cruds.unit.fields.unit_connectivity') }}</label>
        <textarea class="form-control" name="unit_connectivity" id="unit_connectivity" wire:model.defer="unit.unit_connectivity" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('unit.unit_connectivity') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.unit.fields.unit_connectivity_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('unit.unit_parking') ? 'invalid' : '' }}">
        <label class="form-label" for="unit_parking">{{ trans('cruds.unit.fields.unit_parking') }}</label>
        <input class="form-control" type="text" name="unit_parking" id="unit_parking" wire:model.defer="unit.unit_parking">
        <div class="validation-message">
            {{ $errors->first('unit.unit_parking') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.unit.fields.unit_parking_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('unit.oven') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="oven" id="oven" wire:model.defer="unit.oven">
        <label class="form-label inline ml-1" for="oven">{{ trans('cruds.unit.fields.oven') }}</label>
        <div class="validation-message">
            {{ $errors->first('unit.oven') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.unit.fields.oven_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('unit.laundry') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="laundry" id="laundry" wire:model.defer="unit.laundry">
        <label class="form-label inline ml-1" for="laundry">{{ trans('cruds.unit.fields.laundry') }}</label>
        <div class="validation-message">
            {{ $errors->first('unit.laundry') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.unit.fields.laundry_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('unit.dishwasher') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="dishwasher" id="dishwasher" wire:model.defer="unit.dishwasher">
        <label class="form-label inline ml-1" for="dishwasher">{{ trans('cruds.unit.fields.dishwasher') }}</label>
        <div class="validation-message">
            {{ $errors->first('unit.dishwasher') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.unit.fields.dishwasher_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('unit.coffee_machine') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="coffee_machine" id="coffee_machine" wire:model.defer="unit.coffee_machine">
        <label class="form-label inline ml-1" for="coffee_machine">{{ trans('cruds.unit.fields.coffee_machine') }}</label>
        <div class="validation-message">
            {{ $errors->first('unit.coffee_machine') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.unit.fields.coffee_machine_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('unit.fireplace') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="fireplace" id="fireplace" wire:model.defer="unit.fireplace">
        <label class="form-label inline ml-1" for="fireplace">{{ trans('cruds.unit.fields.fireplace') }}</label>
        <div class="validation-message">
            {{ $errors->first('unit.fireplace') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.unit.fields.fireplace_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('unit.tv') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="tv" id="tv" wire:model.defer="unit.tv">
        <label class="form-label inline ml-1" for="tv">{{ trans('cruds.unit.fields.tv') }}</label>
        <div class="validation-message">
            {{ $errors->first('unit.tv') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.unit.fields.tv_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('unit.iron') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="iron" id="iron" wire:model.defer="unit.iron">
        <label class="form-label inline ml-1" for="iron">{{ trans('cruds.unit.fields.iron') }}</label>
        <div class="validation-message">
            {{ $errors->first('unit.iron') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.unit.fields.iron_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('unit.private_entrance') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="private_entrance" id="private_entrance" wire:model.defer="unit.private_entrance">
        <label class="form-label inline ml-1" for="private_entrance">{{ trans('cruds.unit.fields.private_entrance') }}</label>
        <div class="validation-message">
            {{ $errors->first('unit.private_entrance') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.unit.fields.private_entrance_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('unit.outdoor_sitting_area') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="outdoor_sitting_area" id="outdoor_sitting_area" wire:model.defer="unit.outdoor_sitting_area">
        <label class="form-label inline ml-1" for="outdoor_sitting_area">{{ trans('cruds.unit.fields.outdoor_sitting_area') }}</label>
        <div class="validation-message">
            {{ $errors->first('unit.outdoor_sitting_area') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.unit.fields.outdoor_sitting_area_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('unit.office_desk') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="office_desk" id="office_desk" wire:model.defer="unit.office_desk">
        <label class="form-label inline ml-1" for="office_desk">{{ trans('cruds.unit.fields.office_desk') }}</label>
        <div class="validation-message">
            {{ $errors->first('unit.office_desk') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.unit.fields.office_desk_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('unit.balcony') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="balcony" id="balcony" wire:model.defer="unit.balcony">
        <label class="form-label inline ml-1" for="balcony">{{ trans('cruds.unit.fields.balcony') }}</label>
        <div class="validation-message">
            {{ $errors->first('unit.balcony') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.unit.fields.balcony_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.units.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>