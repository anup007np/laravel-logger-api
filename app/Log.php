<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['owner', 'device_id', 'description','loggable_id', 'loggable_type', 'resolved'];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function loggable()
    {
        return $this->morphTo();
    }
}
