<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attorney extends Model
{
    use Notifiable, SoftDeletes, LogsActivity;

    protected static $logName = 'Attorney';

    protected $fillable = [
        'record_id', 'attorney_id', 'due_date',
    ];

    public function record()
    {
        return $this->belongsTo('App\Model\Record');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
