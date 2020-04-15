<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;
use Spatie\Activitylog\Traits\LogsActivity;

class Record extends Model
{
    use LogsActivity;

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

    public function documents()
    {
        return $this->belongsToMany('App\Model\Document');
    }
}
