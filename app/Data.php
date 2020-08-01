<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    //
    protected $guarded=[];
    protected $primaryKey='kd_berkas';
    protected $fillable=[
        
    ];

    public function waris()
    {
        return $this->belongsTo('App\Waris', 'kd_waris', 'id');
    }

    public function petugas()
    {
        return $this->belongsTo('App\Petugas', 'kd_petugas', 'id');
    }
    
    public function dinkes()
    {
        return $this->belongsTo('App\Dinkes', 'kd_dinkes', 'id');
    }

    public function bakuda()
    {
        return $this->belongsTo('App\Bakuda', 'kd_bakuda', 'id');
    }
    
}
