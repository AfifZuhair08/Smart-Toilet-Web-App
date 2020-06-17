<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SensorTissue extends Model
{
    // Table name
    protected $table = 'sensor_tissue';

    // Primary Key
    public $primaryKey = 'tsID';

    // Timestamps
    public $timestamp = true;

    public $fillable = [
        'dispenserID','location','sensorStatus',
    ];

    const CREATED_AT = 'entryDate';
    const UPDATED_AT = 'entryDate'; 

    // // Value
    public $float = 'sensorValue';
}
