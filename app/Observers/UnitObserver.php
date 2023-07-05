<?php

namespace App\Observers;

use App\Models\Unit;
use App\Models\User;
use App\Notifications\DataChangeEmailNotification;
use Notification;

class UnitObserver
{
    public function created(Unit $unit): void
    {
        $payload = [
            'action' => 'created',
            'model'  => sprintf('%s#%s', get_class($unit), $unit->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function updated(Unit $unit): void
    {
        $payload = [
            'action' => 'updated',
            'model'  => sprintf('%s#%s', get_class($unit), $unit->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }

    public function deleted(Unit $unit): void
    {
        $payload = [
            'action' => 'deleted',
            'model'  => sprintf('%s#%s', get_class($unit), $unit->id),
            'reason' => auth()->user(),
        ];

        $admins = User::admins()->get();

        Notification::send($admins, new DataChangeEmailNotification($payload));
    }
}
