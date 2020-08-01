<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Petugas extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $guard ='petugas';
     
     protected $table = 'petugas';
     protected $primaryKey = 'id';
     protected $fillable = [
         'id',
         'username',
         'nama',
         'password',
         'api_token'
     ];
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
        return $this->belongsTo('App\Data', 'kd_petugas', 'id');
    }
}