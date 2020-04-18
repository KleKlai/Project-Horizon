<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Record extends Model implements HasMedia
{
    use Notifiable, SoftDeletes, LogsActivity, HasMediaTrait;

    protected $guarded = [
        'id', 'created_at', 'updated_at',
    ];

    protected static $logName = 'Record';

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::generate(4);
        });
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function attorney()
    {
        return $this->hasOne(Attorney::class);
    }

    public function resolution()
    {
        return $this->hasOne(Resolution::class);
    }

}
