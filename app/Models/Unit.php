<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use App\Traits\Tenantable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Unit extends Model implements HasMedia
{
    use HasFactory, HasAdvancedFilter, SoftDeletes, Tenantable, InteractsWithMedia, Auditable;

    public $table = 'units';

    protected $appends = [
        'unit_images',
    ];

    public static $search = [
        'unit_name',
        'unit_code',
    ];

    public const UNIT_STATUS_RADIO = [
        'free'   => 'Free',
        'booked' => 'Booked',
    ];

    protected $dates = [
        'unit_checkin',
        'unit_checkout',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $orderable = [
        'unit_name',
        'unit_code',
        'unit_location.location_name',
        'unit_checkin',
        'unit_checkout',
        'unit_lock',
        'unit_status',
        'booked_by.name',
        'booked_by.email',
    ];

    public $filterable = [
        'unit_name',
        'unit_code',
        'unit_location.location_name',
        'unit_checkin',
        'unit_checkout',
        'unit_lock',
        'unit_status',
        'booked_by.name',
        'booked_by.email',
    ];

    protected $casts = [
        'oven'                 => 'boolean',
        'laundry'              => 'boolean',
        'dishwasher'           => 'boolean',
        'coffee_machine'       => 'boolean',
        'fireplace'            => 'boolean',
        'tv'                   => 'boolean',
        'iron'                 => 'boolean',
        'private_entrance'     => 'boolean',
        'outdoor_sitting_area' => 'boolean',
        'office_desk'          => 'boolean',
        'balcony'              => 'boolean',
    ];

    protected $fillable = [
        'unit_name',
        'unit_code',
        'unit_location_id',
        'unit_checkin',
        'unit_checkout',
        'unit_lock',
        'unit_status',
        'booked_by_id',
        'unit_connectivity',
        'unit_parking',
        'oven',
        'laundry',
        'dishwasher',
        'coffee_machine',
        'fireplace',
        'tv',
        'iron',
        'private_entrance',
        'outdoor_sitting_area',
        'office_desk',
        'balcony',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $thumbnailWidth  = 50;
        $thumbnailHeight = 50;

        $thumbnailPreviewWidth  = 120;
        $thumbnailPreviewHeight = 120;

        $this->addMediaConversion('thumbnail')
            ->width($thumbnailWidth)
            ->height($thumbnailHeight)
            ->fit('crop', $thumbnailWidth, $thumbnailHeight);
        $this->addMediaConversion('preview_thumbnail')
            ->width($thumbnailPreviewWidth)
            ->height($thumbnailPreviewHeight)
            ->fit('crop', $thumbnailPreviewWidth, $thumbnailPreviewHeight);
    }

    public function unitLocation()
    {
        return $this->belongsTo(Location::class);
    }

    public function getUnitCheckinAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setUnitCheckinAttribute($value)
    {
        $this->attributes['unit_checkin'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getUnitCheckoutAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setUnitCheckoutAttribute($value)
    {
        $this->attributes['unit_checkout'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getUnitStatusLabelAttribute($value)
    {
        return static::UNIT_STATUS_RADIO[$this->unit_status] ?? null;
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getUnitImagesAttribute()
    {
        return $this->getMedia('unit_unit_images')->map(function ($item) {
            $media                      = $item->toArray();
            $media['url']               = $item->getUrl();
            $media['thumbnail']         = $item->getUrl('thumbnail');
            $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');

            return $media;
        });
    }

    public function bookedBy()
    {
        return $this->belongsTo(User::class);
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
