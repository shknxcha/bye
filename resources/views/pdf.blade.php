<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Sensor - {{ $jenis->nama }}</title>
    <style>
    body {
        font-family: sans-serif;
        font-size: 12px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 6px;
        text-align: center;
    }

    th {
        background-color: #eee;
    }

    h2 {
        text-align: center;
    }
    </style>
</head>

<body>

    <h2>Laporan Data Sensor - {{ $jenis->nama }}</h2>
    <p><strong>Waktu Cetak:</strong> {{ \Carbon\Carbon::now()->format('d M Y H:i') }}</p>

    @php
    $total = count($data);
    $avgSuhuUdara = $data->avg('suhu_udara');
    $avgKelembapanUdara = $data->avg('kelembapan_udara');
    $avgSuhuTanah = $data->avg('suhu_tanah');
    $avgKelembapanTanah = $data->avg('kelembapan_tanah');

    // Status Umum: Aman jika semua rata-rata dalam rentang batas
    $statusUmum = 'Aman';
    if (
    $avgSuhuUdara < $jenis->suhu_udara_min || $avgSuhuUdara > $jenis->suhu_udara_max ||
        $avgKelembapanUdara < $jenis->kelembapan_udara_min || $avgKelembapanUdara > $jenis->kelembapan_udara_max ||
            $avgSuhuTanah < $jenis->suhu_tanah_min || $avgSuhuTanah > $jenis->suhu_tanah_max ||
                $avgKelembapanTanah < $jenis->kelembapan_tanah_min || $avgKelembapanTanah > $jenis->kelembapan_tanah_max
                    ) {
                    $statusUmum = 'Perlu Perhatian';
                    }
                    @endphp

                    <h4>Ringkasan Monitoring</h4>
                    <table>
                        <tr>
                            <th>Rata-rata Suhu Udara (°C)</th>
                            <th>Rata-rata Kelembapan Udara (%)</th>
                            <th>Rata-rata Suhu Tanah (°C)</th>
                            <th>Rata-rata Kelembapan Tanah (%)</th>
                            <th>Status Keseluruhan</th>
                        </tr>
                        <tr>
                            <td>{{ number_format($avgSuhuUdara, 2) }}</td>
                            <td>{{ number_format($avgKelembapanUdara, 2) }}</td>
                            <td>{{ number_format($avgSuhuTanah, 2) }}</td>
                            <td>{{ number_format($avgKelembapanTanah, 2) }}</td>
                            <td><strong>{{ $statusUmum }}</strong></td>
                        </tr>
                    </table>

                    <br><br>

                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Waktu</th>
                                <th>Suhu Udara (°C)</th>
                                <th>Kelembapan Udara (%)</th>
                                <th>Suhu Tanah (°C)</th>
                                <th>Kelembapan Tanah (%)</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y H:i:s') }}</td>
                                <td>{{ $item->suhu_udara }}</td>
                                <td>{{ $item->kelembapan_udara }}</td>
                                <td>{{ $item->suhu_tanah }}</td>
                                <td>{{ $item->kelembapan_tanah }}</td>
                                <td>
                                    @php
                                    $status = [];
                                    if ($item->suhu_udara < $jenis->suhu_udara_min) $status[] = 'Suhu Udara Rendah';
                                        elseif ($item->suhu_udara > $jenis->suhu_udara_max) $status[] = 'Suhu Udara
                                        Tinggi';

                                        if ($item->kelembapan_udara < $jenis->kelembapan_udara_min) $status[] =
                                            'Kelembapan Udara Rendah';
                                            elseif ($item->kelembapan_udara > $jenis->kelembapan_udara_max) $status[] =
                                            'Kelembapan Udara Tinggi';

                                            if ($item->suhu_tanah < $jenis->suhu_tanah_min) $status[] = 'Suhu Tanah
                                                Rendah';
                                                elseif ($item->suhu_tanah > $jenis->suhu_tanah_max) $status[] = 'Suhu
                                                Tanah Tinggi';

                                                if ($item->kelembapan_tanah < $jenis->kelembapan_tanah_min) $status[] =
                                                    'Kelembapan Tanah Rendah';
                                                    elseif ($item->kelembapan_tanah > $jenis->kelembapan_tanah_max)
                                                    $status[] = 'Kelembapan Tanah Tinggi';

                                                    echo empty($status) ? 'Aman' : implode(', ', $status);
                                                    @endphp
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

</body>

</html>