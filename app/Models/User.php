<?php

namespace App\Models;

use App\Models\UserAlert;
use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use App\Traits\HasTeam;
use Carbon\Carbon;
use DateTimeInterface;
use Hash;
use Illuminate\Contracts\Translation\HasLocalePreference;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements HasLocalePreference
{
    use HasApiTokens, HasFactory, HasAdvancedFilter, Notifiable, HasTeam, SoftDeletes, Auditable;

    public $table = 'users';

    protected $hidden = [
        'remember_token',
        'password',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'locale',
        'team_id',
    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $orderable = [
        'id',
        'name',
        'email',
        'email_verified_at',
        'locale',
        'team.name',
    ];

    public $filterable = [
        'id',
        'name',
        'email',
        'email_verified_at',
        'roles.title',
        'locale',
        'team.name',
    ];

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('title', 'Admin')->exists();
    }

    public function scopeAdmins()
    {
        return $this->whereHas('roles', fn ($q) => $q->where('title', 'Admin'));
    }

    public function alerts()
    {
        return $this->belongsToMany(UserAlert::class)->withPivot('seen_at');
    }

    public function preferredLocale()
    {
        return $this->locale;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = Hash::needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getUpdatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getDeletedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
