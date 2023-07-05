<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadTrait;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\Admin\TaskResource;
use App\Models\Task;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskApiController extends Controller
{
    use MediaUploadTrait;

    public function index()
    {
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TaskResource(Task::with(['status', 'tag', 'assignedTo'])->get());
    }

    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());
        $task->tag()->sync($request->input('tag', []));
        if ($request->input('task_attachment', false)) {
            $task->addMedia(storage_path('tmp/uploads/' . basename($request->input('task_attachment'))))->toMediaCollection('task_attachment');
        }

        return (new TaskResource($task))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Task $task)
    {
        abort_if(Gate::denies('task_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TaskResource($task->load(['status', 'tag', 'assignedTo']));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        $task->tag()->sync($request->input('tag', []));
        if ($request->input('task_attachment', false)) {
            if (! $task->task_attachment || $request->input('task_attachment') !== $task->task_attachment->file_name) {
                if ($task->task_attachment) {
                    $task->task_attachment->delete();
                }
                $task->addMedia(storage_path('tmp/uploads/' . basename($request->input('task_attachment'))))->toMediaCollection('task_attachment');
            }
        } elseif ($task->task_attachment) {
            $task->task_attachment->delete();
        }

        return (new TaskResource($task))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Task $task)
    {
        abort_if(Gate::denies('task_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $task->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
