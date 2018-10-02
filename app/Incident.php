<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $fillable = ['title'];

    /**
     * Get all of the incidents logs.
    */

    public function logs()
    {
        return $this->morphMany('App\Log', 'loggable');
    }
}
