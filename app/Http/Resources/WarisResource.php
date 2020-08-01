<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Waris;

class WarisResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'nik'=>$this->nik,
            'kk'=>$this->kk,
            'nama'=>$this->nama,
            'jk'=>$this->jk,
            'joined'=>$this->created_at->diffForHumans(),
            'api_token'=> $this->api_token,
        ];
    }
}
