<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Incident;
use App\Change;

class LogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'owner' => $this->owner,
            //'logs' => $this->loggable->logs,
            'description' => $this->description,
            'device_id' => $this->device_id,
            'resolved' => $this->resolved,
            'log_type' => $this->loggable_type,
            'log_type_info' => $this->loggable,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
        ];
    }
}
