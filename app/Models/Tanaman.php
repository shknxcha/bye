<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanaman extends Model
{
    use HasFactory;

    // 👇 ini penting agar Laravel tahu nama tabel yang benar
    protected $table = 'tanaman';

    protected $fillable = [
        'jenis_tanaman_id',
        'suhu_udara',
        'kelembapan_udara',
        'suhu_tanah',
        'kelembapan_tanah',
    ];

    public function jenis()
    {
        return $this->belongsTo(JenisTanaman::class, 'jenis_tanaman_id');
    }
}