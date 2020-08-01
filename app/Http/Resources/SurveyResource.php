<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SurveyResource extends JsonResource
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
            // 'responder' =>[
            //     'nik' => $this->waris->nik,
            //     'kk' => $this->waris->kk,
            //     'nama' => $this->waris->nama
            // ],
            'nilai'=> $this->nilai
        ];
    }
}
