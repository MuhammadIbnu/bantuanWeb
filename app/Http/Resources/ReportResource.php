<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'kd_berkas' => $this->kd_berkas,
            'waris_nik' => $this->waris->nik,
            'waris_nama' => $this->waris->nama,
            'ktp_meninggal' => $this->ktp_meninggal,
            'kk_meninggal' => $this->kk_meninggal,
            'jamkesmas' => $this->jamkesmas,
            'ktp_waris' => $this->ktp_waris,
            'kk_waris' => $this->kk_waris,
            'akta_kematian' => $this->akta_kematian,
            'pakta_waris' => $this->pakta_waris,
            'pernyataan_waris'=>$this->pernyataan_ahli_waris,
            'keterangan' => $this->keterangan,
            'keterangan_II' => $this->keterangan_II,
            'keterangan_III' => $this->keterangan_III,
            'confirmed_I'=> $this->confirmed_I,
            'confirmed_II'=> $this->confirmed_II,
            'confirmed_III'=>$this->confirmed_III,
        ];
    }
}
