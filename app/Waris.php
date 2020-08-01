<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Waris extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $guard ='waris';
     protected $table = 'waris';
     protected $primaryKey = 'id';
     protected $guarded = [];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function data()
    {
        return $this->belongsTo('App\Data', 'kd_waris', 'id');
    }

    public function survey()
    {
        return $this->belongsTo('App\Survey', 'kd_waris', 'id');
    }
}