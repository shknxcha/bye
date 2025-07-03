<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisTanaman extends Model
{
    use HasFactory;

    protected $table = 'jenis_tanaman';

    protected $fillable = [
        'nama',
        'suhu_tanah_max',
        'suhu_tanah_min',
        'kelembapan_tanah_max',
        'kelembapan_tanah_min',
        'suhu_udara_max',
        'suhu_udara_min',
        'kelembapan_udara_max',
        'kelembapan_udara_min',
    ];
    public function tanaman()
{
    return $this->hasMany(Tanaman::class);
}
}