<?php

namespace App\Http\Requests;

use App\Models\Task;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTaskRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('task_create'),
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
            'name' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'status_id' => [
                'integer',
                'exists:task_statuses,id',
                'required',
            ],
            'tag' => [
                'array',
            ],
            'tag.*.id' => [
                'integer',
                'exists:task_tags,id',
            ],
            'due_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'assigned_to_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
        ];
    }
}
