<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    /**
     * Get all of the incidents's logs.
    */

    public function logs()
    {
        return $this->morphMany('App\Log', 'loggable');
    }
}
