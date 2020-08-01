<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Dinkes extends Authenticatable
{
    //
    use Notifiable;
  

    protected $table= 'dinkes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'username',
        'nama',
        'password',
        'api_token'
    ];
    public function data()
    {
        return $this->belongsTo('App\Data', 'kd_dinkes', 'id');
    }
 
}
