<?php

namespace App\Observers;

use App\Models\User;
use App\Notifications\DataChangeEmailNotification;
use Notification;

class UserObserver
{
    public function created(User $user): void
    {
        $payload = [
            'action' => 'created',
            'model'  => sprintf('%s#%s', get_class($user), $user->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function updated(User $user): void
    {
        $payload = [
            'action' => 'updated',
            'model'  => sprintf('%s#%s', get_class($user), $user->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function deleted(User $user): void
    {
        $payload = [
            'action' => 'deleted',
            'model'  => sprintf('%s#%s', get_class($user), $user->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }
}
