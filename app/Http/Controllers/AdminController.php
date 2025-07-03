<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisTanaman;
use App\Models\Tanaman;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;



class AdminController extends Controller
{

public function index()
{
    $jenisList = JenisTanaman::all();
    $jenisTanaman = $jenisList->first();
    $dataHistory = [];
    $charts = [];
    //$tanaman = $dataHistory[$jenisTanaman->id];

    $avgSuhuUdara = Tanaman::avg('suhu_udara');
    $avgKelembapanUdara = Tanaman::avg('kelembapan_udara');
    $avgSuhuTanah = Tanaman::avg('suhu_tanah');
    $avgKelembapanTanah = Tanaman::avg('kelembapan_tanah');

    foreach ($jenisList as $jenis) {
        $data = Tanaman::where('jenis_tanaman_id', $jenis->id)
            ->latest()->take(10)->get()->reverse();

        $labels = $data->pluck('created_at')->map(fn($d) => $d->format('H:i'))->toArray();

        $chart = LarapexChart::lineChart()
    ->setTitle('Monitoring ' . $jenis->nama)
    ->setSubtitle('Data 10 terbaru')
    ->setXAxis($labels)
    ->setColors(['#FF5733', '#3498DB', '#27AE60', '#9B59B6']) // Tambahkan warna
    ->setDataset([
        ['name' => 'Suhu Udara', 'data' => $data->pluck('suhu_udara')->toArray()],
        ['name' => 'Kelembapan Udara', 'data' => $data->pluck('kelembapan_udara')->toArray()],
        ['name' => 'Suhu Tanah', 'data' => $data->pluck('suhu_tanah')->toArray()],
        ['name' => 'Kelembapan Tanah', 'data' => $data->pluck('kelembapan_tanah')->toArray()]
    ]);


        $charts[$jenis->id] = $chart;
        $dataHistory[$jenis->id] = Tanaman::where('jenis_tanaman_id', $jenis->id)->latest()->paginate(5);
    }
$tanaman = $dataHistory[$jenisTanaman->id];
    return view('dashboard', compact(
        'jenisList',
        'dataHistory',
        'charts',
        'avgSuhuUdara',
        'avgKelembapanUdara',
        'avgSuhuTanah',
        'avgKelembapanTanah',
        'jenisTanaman',
        'tanaman'
    ));
}




    public function fetch($id)
    {
        $jenis = JenisTanaman::with(['tanaman' => function($q) {
            $q->latest()->take(20); // ambil data terbaru (20 data terakhir)
        }])->findOrFail($id);

        $labels = $jenis->tanaman->pluck('created_at')->map(function($item) {
            return Carbon::parse($item)->format('H:i:s');
        });

        return response()->json([
            'labels' => $labels,
            'suhu_udara' => $jenis->tanaman->pluck('suhu_udara'),
            'kelembapan_udara' => $jenis->tanaman->pluck('kelembapan_udara'),
            'suhu_tanah' => $jenis->tanaman->pluck('suhu_tanah'),
            'kelembapan_tanah' => $jenis->tanaman->pluck('kelembapan_tanah'),
        ]);
    }
    public function exportPDF($id)
{
    $jenis = JenisTanaman::findOrFail($id);
    $data = Tanaman::where('jenis_tanaman_id', $id)->latest()->get();

    $pdf = Pdf::loadView('pdf', compact('data', 'jenis'));
    return $pdf->download('data_sensor_' . $jenis->nama . '.pdf');
}
public function destroy($id)
{
    $data = Tanaman::findOrFail($id);
    $data->delete();

    return back()->with('success', 'Data berhasil dihapus.');
}

}