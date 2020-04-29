<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SensorTissue extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'tsID' => $this->tsID,
            'entryDate' => $this->entryDate->format("Y-m-d H:i:s"),
            // $accountData['utp']->format("Y-m-d H:i:s")
            'sensorValue' => $this->sensorValue,
            // 'labels' => $this->labels->format("Y-m-d H:i:s"),
        ];
    }

    public function with($request){
        return[
            'version' => '1.0',
            'author' => 'Mohamad Afif Zuhair'
        ];
    }
}
