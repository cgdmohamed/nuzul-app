<?php

namespace App\Observers;

use App\Models\Task;
use App\Models\User;
use App\Notifications\DataChangeEmailNotification;
use Notification;

class TaskObserver
{
    public function created(Task $task): void
    {
        $payload = [
            'action' => 'created',
            'model'  => sprintf('%s#%s', get_class($task), $task->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function updated(Task $task): void
    {
        $payload = [
            'action' => 'updated',
            'model'  => sprintf('%s#%s', get_class($task), $task->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function deleted(Task $task): void
    {
        $payload = [
            'action' => 'deleted',
            'model'  => sprintf('%s#%s', get_class($task), $task->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }
}
