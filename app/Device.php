<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = ['type'];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function logs()
    {
        return $this->hasMany(Log::class);
    }
}
