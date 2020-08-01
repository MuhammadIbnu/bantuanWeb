<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    //
    protected $guarded=[];
    

    public function waris()
    {
        return $this->belongsTo('App\Waris', 'kd_waris', 'id');
    }
}

