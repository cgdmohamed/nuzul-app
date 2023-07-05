<?php

namespace App\Http\Requests;

use App\Models\Amentite;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAmentiteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('amentite_create'),
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
            'unit_id' => [
                'integer',
                'exists:units,id',
                'required',
            ],
            'unit_network' => [
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
            'outdoor_sitting' => [
                'boolean',
            ],
            'office_desk' => [
                'boolean',
            ],
            'balcony' => [
                'boolean',
            ],
            'amenities_id' => [
                'integer',
                'exists:units,id',
                'required',
            ],
        ];
    }
}
