<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JenisTanamanResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'suhu_tanah_max' => $this->suhu_tanah_max,
            'suhu_tanah_min' => $this->suhu_tanah_min,
            'kelembapan_tanah_max' => $this->kelembapan_tanah_max,
            'kelembapan_tanah_min' => $this->kelembapan_tanah_min,
            'suhu_udara_max' => $this->suhu_udara_max,
            'suhu_udara_min' => $this->suhu_udara_min,
            'kelembapan_udara_max' => $this->kelembapan_udara_max,
            'kelembapan_udara_min' => $this->kelembapan_udara_min,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}


