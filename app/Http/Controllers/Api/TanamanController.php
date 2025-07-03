<?php

namespace App\Http\Controllers\Api;

use App\Models\Tanaman;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TanamanResource;
use Illuminate\Support\Facades\Validator;

class TanamanController extends Controller
{
    public function index()
{
    $data = Tanaman::with('jenis')->latest()->paginate(10);

    // Opsional: manipulasi item kalau perlu
    $modified = $data->getCollection()->map(function ($item) {
        return [
            'id' => $item->id,
            'jenis_tanaman' => optional($item->jenis_tanaman)->nama,
            'suhu_udara' => $item->suhu_udara,
            'kelembapan_udara' => $item->kelembapan_udara,
            'suhu_tanah' => $item->suhu_tanah,
            'kelembapan_tanah' => $item->kelembapan_tanah,
            'waktu' => $item->created_at->format('d-m-Y H:i:s')
        ];
    });

    // Gabungkan kembali ke paginator
    $data->setCollection($modified);

    return response()->json([
        'success' => true,
        'message' => 'List Data Tanaman',
        'data' => $data
    ]);
}



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis_tanaman_id' => 'required|exists:jenis_tanaman,id',
            'suhu_udara' => 'required|numeric',
            'kelembapan_udara' => 'required|numeric',
            'suhu_tanah' => 'required|numeric',
            'kelembapan_tanah' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // $tanaman = Tanaman::create($request->all());
        $tanaman = new Tanaman([
    'jenis_tanaman_id' => $request->jenis_tanaman_id,
    'suhu_udara' => $request->suhu_udara,
    'kelembapan_udara' => $request->kelembapan_udara,
    'suhu_tanah' => $request->suhu_tanah,
    'kelembapan_tanah' => $request->kelembapan_tanah,
]);

$tanaman->save(); // ini akan mengembalikan true/false
if (!$tanaman->id) {
    return response()->json(['message' => 'Gagal menyimpan data tanaman.'], 500);
}



        return new TanamanResource(true, 'Data berhasil ditambahkan!', $tanaman);
    }

    public function show($id)
    {
        $tanaman = Tanaman::with('jenis_tanaman')->find($id);
        if (!$tanaman) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return new TanamanResource(true, 'Detail Data Tanaman', $tanaman);
    }

    public function update(Request $request, $id)
    {
        $tanaman = Tanaman::find($id);
        if (!$tanaman) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'jenis_tanaman_id' => 'required|exists:jenis_tanaman,id',
            'suhu_udara' => 'required|numeric',
            'kelembapan_udara' => 'required|numeric',
            'suhu_tanah' => 'required|numeric',
            'kelembapan_tanah' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $tanaman->update($request->all());

        return new TanamanResource(true, 'Data berhasil diubah!', $tanaman);
    }

    public function destroy($id)
    {
        $tanaman = Tanaman::find($id);
        if (!$tanaman) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $tanaman->delete();

        return new TanamanResource(true, 'Data berhasil dihapus!', null);
    }
}