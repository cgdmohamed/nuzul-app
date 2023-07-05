@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.unit.title_singular') }}:
                    {{ trans('cruds.unit.fields.id') }}
                    {{ $unit->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.unit.fields.unit_name') }}
                            </th>
                            <td>
                                {{ $unit->unit_name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.unit.fields.unit_code') }}
                            </th>
                            <td>
                                {{ $unit->unit_code }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.unit.fields.unit_location') }}
                            </th>
                            <td>
                                @if($unit->unitLocation)
                                    <span class="badge badge-relationship">{{ $unit->unitLocation->location_name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.unit.fields.unit_checkin') }}
                            </th>
                            <td>
                                {{ $unit->unit_checkin }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.unit.fields.unit_checkout') }}
                            </th>
                            <td>
                                {{ $unit->unit_checkout }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.unit.fields.unit_lock') }}
                            </th>
                            <td>
                                {{ $unit->unit_lock }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.unit.fields.unit_status') }}
                            </th>
                            <td>
                                {{ $unit->unit_status_label }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.unit.fields.unit_images') }}
                            </th>
                            <td>
                                @foreach($unit->unit_images as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.unit.fields.booked_by') }}
                            </th>
                            <td>
                                @if($unit->bookedBy)
                                    <span class="badge badge-relationship">{{ $unit->bookedBy->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.unit.fields.unit_connectivity') }}
                            </th>
                            <td>
                                {{ $unit->unit_connectivity }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.unit.fields.unit_parking') }}
                            </th>
                            <td>
                                {{ $unit->unit_parking }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.unit.fields.oven') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $unit->oven ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.unit.fields.laundry') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $unit->laundry ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.unit.fields.dishwasher') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $unit->dishwasher ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.unit.fields.coffee_machine') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $unit->coffee_machine ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.unit.fields.fireplace') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $unit->fireplace ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.unit.fields.tv') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $unit->tv ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.unit.fields.iron') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $unit->iron ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.unit.fields.private_entrance') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $unit->private_entrance ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.unit.fields.outdoor_sitting_area') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $unit->outdoor_sitting_area ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.unit.fields.office_desk') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $unit->office_desk ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.unit.fields.balcony') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $unit->balcony ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('unit_edit')
                    <a href="{{ route('admin.units.edit', $unit) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.units.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection