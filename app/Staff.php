<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    // Table name
    protected $table = 'staffs';

    // Primary Key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    // Name, Phone, Image, Password
    public $string = ['name', 'phone', 'username', 'password', 'email'];

}
