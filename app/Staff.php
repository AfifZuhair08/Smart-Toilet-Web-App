<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

// class Staff extends Model
// {
//     // Table name
//     protected $table = 'staffs';

//     // Primary Key
//     public $primaryKey = 'id';

//     // Timestamps
//     public $timestamps = true;

//     // Name, Phone, Image, Password
//     public $string = ['name', 'phone', 'username', 'password', 'email'];

//     public function tasks(){
//         return $this->hasMany('App\Task');
//     }
// }

class Staff extends Authenticatable{
    
    use Notifiable;

    // Table name
    protected $table = 'staffs';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
