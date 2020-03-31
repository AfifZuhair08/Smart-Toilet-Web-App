<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SensorSoap extends Model
{
    // Table name
    protected $table = 'sensor_soap';

    // Primary Key
    public $primaryKey = 'ssID';

    // Timestamps
    public $timestamp = true;

    const CREATED_AT = 'entryDate';
    const UPDATED_AT = 'entryDate'; 

    // Value
    public $float = 'sensorValue';
}
