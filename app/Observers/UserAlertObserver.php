<?php

namespace App\Observers;

use App\Models\User;
use App\Models\UserAlert;
use App\Notifications\DataChangeEmailNotification;
use Notification;

class UserAlertObserver
{
    public function created(UserAlert $userAlert): void
    {
        $payload = [
            'action' => 'created',
            'model'  => sprintf('%s#%s', get_class($userAlert), $userAlert->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function updated(UserAlert $userAlert): void
    {
        $payload = [
            'action' => 'updated',
            'model'  => sprintf('%s#%s', get_class($userAlert), $userAlert->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function deleted(UserAlert $userAlert): void
    {
        $payload = [
            'action' => 'deleted',
            'model'  => sprintf('%s#%s', get_class($userAlert), $userAlert->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }
}
