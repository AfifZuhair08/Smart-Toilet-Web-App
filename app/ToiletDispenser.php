<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToiletDispenser extends Model
{
    // Table name
    protected $table = 'toilet_dispenser';

    // Primary Key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    public $string = ['dispenserID', 'dispenserType', 'location','unitImage'];

    public $fillable = [
        'description',
    ];
    
}
