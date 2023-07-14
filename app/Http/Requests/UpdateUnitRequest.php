<?php

namespace App\Http\Requests;

use App\Models\Unit;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUnitRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('unit_edit'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'unit_name' => [
                'string',
                'required',
            ],
            'unit_code' => [
                'string',
                'required',
                'unique:units,unit_code,' . request()->route('unit')->id,
            ],
            'unit_city' => [
                'required',
                'in:' . implode(',', array_keys(Unit::UNIT_CITY_SELECT)),
            ],
            'unit_district_id' => [
                'integer',
                'exists:locations,id',
                'required',
            ],
            'building_no' => [
                'string',
                'required',
            ],
            'unit_latitude' => [
                'numeric',
                'required',
            ],
            'unit_longitude' => [
                'numeric',
                'required',
            ],
            'unit_checkin' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'unit_checkout' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'unit_lock' => [
                'string',
                'required',
            ],
            'unit_status' => [
                'required',
                'in:' . implode(',', array_keys(Unit::UNIT_STATUS_RADIO)),
            ],
            'booked_by_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'unit_connectivity' => [
                'string',
                'nullable',
            ],
            'unit_parking' => [
                'string',
                'nullable',
            ],
            'oven' => [
                'boolean',
            ],
            'laundry' => [
                'boolean',
            ],
            'dishwasher' => [
                'boolean',
            ],
            'coffee_machine' => [
                'boolean',
            ],
            'fireplace' => [
                'boolean',
            ],
            'tv' => [
                'boolean',
            ],
            'iron' => [
                'boolean',
            ],
            'private_entrance' => [
                'boolean',
            ],
            'outdoor_sitting_area' => [
                'boolean',
            ],
            'office_desk' => [
                'boolean',
            ],
            'balcony' => [
                'boolean',
            ],
        ];
    }
}