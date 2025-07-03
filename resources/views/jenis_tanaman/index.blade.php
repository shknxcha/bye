@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h2 class="mb-2">Indikator Tanaman</h2>
    <p class="text-dark mb-4" style="color: #212529; font-size: 16px;">
        Tabel berikut digunakan untuk menyesuaikan jenis tanaman dengan batas minimal dan maksimal dari suhu serta
        kelembapan yang dibutuhkan.
        Tujuannya agar sistem dapat menentukan apakah kondisi tanaman dalam keadaan sehat atau tidak berdasarkan
        parameter yang Anda tentukan.
    </p>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>Suhu Tanah (Min - Max)</th>
                <th>Kelembapan Tanah (%)</th>
                <th>Suhu Udara (Min - Max)</th>
                <th>Kelembapan Udara (%)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jenisTanaman as $jenis)
            <tr>
                <td class="text-dark">{{ $jenis->nama }}</td>
                <td class="text-dark">{{ $jenis->suhu_tanah_min }} - {{ $jenis->suhu_tanah_max }}</td>
                <td class="text-dark">{{ $jenis->kelembapan_tanah_min }} - {{ $jenis->kelembapan_tanah_max }}</td>
                <td class="text-dark">{{ $jenis->suhu_udara_min }} - {{ $jenis->suhu_udara_max }}</td>
                <td class="text-dark">{{ $jenis->kelembapan_udara_min }} - {{ $jenis->kelembapan_udara_max }}</td>
                <td>
                    <a href="{{ route('jenis_tanaman.edit', $jenis->id) }}" class="btn btn-sm btn-warning">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection