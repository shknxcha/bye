@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard Monitoring Tanaman</h1>

    {{-- Info Rata-rata --}}
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm border-start border-primary border-5 bg-primary bg-opacity-10">
                <div class="card-body">
                    <strong class="text-primary">🌡️ Rata-rata Suhu Udara</strong>
                    <div class="fs-5 text-dark">{{ number_format($avgSuhuUdara, 2) }} °C</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-start border-info border-5 bg-info bg-opacity-10">
                <div class="card-body">
                    <strong class="text-info">💧 Rata-rata Kelembapan Udara</strong>
                    <div class="fs-5 text-dark">{{ number_format($avgKelembapanUdara, 2) }} %</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-start border-warning border-5 bg-warning bg-opacity-10">
                <div class="card-body">
                    <strong class="text-warning">🌱 Rata-rata Suhu Tanah</strong>
                    <div class="fs-5 text-dark">{{ number_format($avgSuhuTanah, 2) }} °C</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-start border-success border-5 bg-success bg-opacity-10">
                <div class="card-body">
                    <strong class="text-success">🪴 Rata-rata Kelembapan Tanah</strong>
                    <div class="fs-5 text-dark">{{ number_format($avgKelembapanTanah, 2) }} %</div>
                </div>
            </div>
        </div>
    </div>


    {{-- Data per jenis --}}
    @foreach ($jenisList as $jenis)
    <div class="mb-5">
        <h3>{{ $jenis->nama }}</h3>

        {{-- Chart --}}
        <div class="mb-3">
            @if (isset($charts[$jenis->id]))
            {!! $charts[$jenis->id]->container() !!}
            @else
            <p class="text-muted">Data chart belum tersedia.</p>
            @endif
        </div>

        {{-- Tabel history --}}
        <div class="table-responsive">
            @if ($dataHistory[$jenis->id]->count())
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Waktu</th>
                        <th>Suhu Udara</th>
                        <th>Kelembapan Udara</th>
                        <th>Suhu Tanah</th>
                        <th>Kelembapan Tanah</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataHistory[$jenis->id] as $item)
                    <tr>
                        <td class="text-dark">{{ $item->created_at->format('d-m-Y H:i') }}</td>
                        <td class="text-dark">{{ $item->suhu_udara }} °C</td>
                        <td class="text-dark">{{ $item->kelembapan_udara }} %</td>
                        <td class="text-dark">{{ $item->suhu_tanah }} °C</td>
                        <td class="text-dark">{{ $item->kelembapan_tanah }} %</td>
                        <td style="max-width: 200px;">
                            @php
                            $status = [];
                            if ($item->suhu_udara < $jenis->suhu_udara_min)
                                $status[] = '<span class="badge bg-warning text-dark mb-1">Suhu Udara Rendah</span>';
                                elseif ($item->suhu_udara > $jenis->suhu_udara_max)
                                $status[] = '<span class="badge bg-danger mb-1">Suhu Udara Tinggi</span>';

                                if ($item->kelembapan_udara < $jenis->kelembapan_udara_min)
                                    $status[] = '<span class="badge bg-warning text-dark mb-1">Kelembapan Udara
                                        Rendah</span>';
                                    elseif ($item->kelembapan_udara > $jenis->kelembapan_udara_max)
                                    $status[] = '<span class="badge bg-danger mb-1">Kelembapan Udara Tinggi</span>';

                                    if ($item->suhu_tanah < $jenis->suhu_tanah_min)
                                        $status[] = '<span class="badge bg-warning text-dark mb-1">Suhu Tanah
                                            Rendah</span>';
                                        elseif ($item->suhu_tanah > $jenis->suhu_tanah_max)
                                        $status[] = '<span class="badge bg-danger mb-1">Suhu Tanah Tinggi</span>';

                                        if ($item->kelembapan_tanah < $jenis->kelembapan_tanah_min)
                                            $status[] = '<span class="badge bg-warning text-dark mb-1">Kelembapan Tanah
                                                Rendah</span>';
                                            elseif ($item->kelembapan_tanah > $jenis->kelembapan_tanah_max)
                                            $status[] = '<span class="badge bg-danger mb-1">Kelembapan Tanah
                                                Tinggi</span>';
                                            @endphp
                                            {!! empty($status) ? '<span class="badge bg-success">Aman</span>' :
                                            implode('<br>', $status) !!}
                        </td>
                        <td class="text-center">
                            <form action="{{ route('tanaman.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Pagination --}}
            <div>
                {{ $dataHistory[$jenis->id]->links() }}
            </div>
            @else
            <p class="text-muted">Belum ada data sensor untuk jenis tanaman ini.</p>
            @endif
        </div>

        {{-- Export PDF --}}
        <a href="{{ route('pdf', $jenis->id) }}" class="btn btn-danger mt-3">Export PDF</a>
    </div>
    @endforeach
</div>
@endsection

@push('scripts')
@foreach ($charts as $chart)
{!! $chart->script() !!}
@endforeach
@endpush