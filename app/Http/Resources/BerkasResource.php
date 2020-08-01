<?php

namespace App\Http\Resources;
use App\Http\Resources\WarisResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BerkasResource extends JsonResource
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
            'petugas'=>  $this->petugas ? ['username'=> $this->petugas->username,'nama'=> $this->petugas->nama] : (object)[],
            'dinkes'=> $this->dinkes ? ['username'=>$this->dinkes->username,'nama'=> $this->dinkes->nama] : (object) [],
            'waris' => [
                    'nik' => $this->waris->nik,
                    'kk' => $this->waris->kk,
                    'nama' => $this->waris->nama,
                    'jenis_kelamin' => $this->waris->jk,
                    'alamat' => $this->waris->alamat,
                    'rt' => $this->waris->rt,
                    'rw' => $this->waris->rw,
                    'kelurahan' => $this->waris->kel,
                    'kecamatan' => $this->waris->kec,
                    'kota' => $this->waris->kota
            ],
            'ktp_meninggal' => $this->ktp_meninggal,
            'kk_meninggal' => $this->kk_meninggal,
            'jamkesmas' => $this->jamkesmas,
            'ktp_waris' => $this->ktp_waris,
            'kk_waris' => $this->kk_waris,
            'akta_kematian' => $this->akta_kematian,
            'pakta_waris' => $this->pakta_waris,
            'pernyataan_waris'=>$this->pernyataan_ahli_waris,
            'buku_tabungan'=>$this->buku_tabungan,
            'keterangan' => $this->keterangan,
            'keterangan_II' => $this->keterangan_II,
            'keterangan_III' => $this->keterangan_III,
            'keterangan_IV' => $this->keterangan_IV,
            'confirmed_I'=> $this->confirmed_I,
            'confirmed_II'=> $this->confirmed_II,
            'confirmed_III'=>$this->confirmed_III,
            'confirmed_IV'=>$this->confirmed_IV,
        ];
        //'confirmed_III'=>($this->confirmed_III == 1) ? true : false
    }
}
