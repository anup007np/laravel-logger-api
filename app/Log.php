<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['owner', 'device_id', 'title', 'resolved'];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
