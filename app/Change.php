<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Change extends Model
{
    /**
     * Get all of the changes's logs.
    */

    public function logs()
    {
        return $this->morphMany('App\Log', 'loggable');
    }
}
