<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $filable = [
        'user_id', 'record_id', 'attachment',
    ];

    public function record()
    {
        return $this->belongsToMany('App\Model\Record');
    }
}
