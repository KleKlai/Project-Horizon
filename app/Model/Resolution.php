<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resolution extends Model
{
    use Notifiable, SoftDeletes, LogsActivity;

    protected static $logName = 'Attorney';

    protected $fillable = [
        'record_id', 'user_id', 'attachment', 'remarks',
    ];

    public function record()
    {
        return $this->belongsTo('App\Model\Record');
    }
}
