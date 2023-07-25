<?php

namespace App\Http\Requests;

use App\Models\News;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNewsRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('news_edit'),
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
            'post_name' => [
                'string',
                'required',
            ],
            'post_content' => [
                'string',
                'required',
            ],
        ];
    }
}
