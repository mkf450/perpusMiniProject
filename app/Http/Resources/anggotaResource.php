<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class anggotaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
      return [
          'nim' => $this->nim,
          'nama' => $this->nama,
          'password' => $this->password,
          'alamat' => $request->alamat,
          'kota' => $request->kota,
          'email' => $request->email,
          'no_telp' => $request->no_telp,
      ];
    }
}
