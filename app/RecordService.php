<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class RecordService extends Model
{
    // Table name
    public $table = 'record_services';

    // Primary Key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public $casts = [
        'is_checked' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'additional_notes',
    ];

    // public $string = ['additional_notes'];

    public function staff(){
        return $this->belongsTo('App\Staff');
    }

    public function tasks(){
        return $this->hasOne('App\Task');
    }
}
