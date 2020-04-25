<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public $casts = [
        'is_complete' => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'task_title',
        'task_description',
        'is_complete',
    ];

    // public $string = ['task_title', 'task_description', 'is_complete'];

    /**
     * The relationship to the owning user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function staff(){
        return $this->belongsTo('App\Staff');
    }
}
