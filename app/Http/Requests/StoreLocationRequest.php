<?php

namespace App\Http\Requests;

use App\Models\Location;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLocationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('location_create'),
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
            'location_name' => [
                'string',
                'required',
                'unique:locations,location_name',
            ],
            'district' => [
                'string',
                'required',
                'unique:locations,district',
            ],
        ];
    }
}