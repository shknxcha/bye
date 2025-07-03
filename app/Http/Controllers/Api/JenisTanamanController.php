<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\JenisTanaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JenisTanamanController extends Controller
{
    public function index()
    {
        $jenisTanaman = JenisTanaman::all();
        return view('jenis_tanaman.index', compact('jenisTanaman'));
    }

    public function create()
    {
        return view('jenis_tanaman.create');
    }

    public function show($id)
{
    $jenis = JenisTanaman::find($id);

    if (!$jenis) {
        return response()->json(['message' => 'Tidak ditemukan'], 404);
    }

    return response()->json([
        'id' => $jenis->id,
        'nama' => $jenis->nama,
        'suhu_udara_min' => $jenis->suhu_udara_min,
        'suhu_udara_max' => $jenis->suhu_udara_max,
        'suhu_tanah_min' => $jenis->suhu_tanah_min,
        'suhu_tanah_max' => $jenis->suhu_tanah_max,
        'kelembapan_udara_min' => $jenis->kelembapan_udara_min,
        'kelembapan_udara_max' => $jenis->kelembapan_udara_max,
        'kelembapan_tanah_min' => $jenis->kelembapan_tanah_min,
        'kelembapan_tanah_max' => $jenis->kelembapan_tanah_max,
    ]);
}


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'suhu_tanah_max' => 'required|numeric',
            'suhu_tanah_min' => 'required|numeric',
            'kelembapan_tanah_max' => 'required|numeric',
            'kelembapan_tanah_min' => 'required|numeric',
            'suhu_udara_max' => 'required|numeric',
            'suhu_udara_min' => 'required|numeric',
            'kelembapan_udara_max' => 'required|numeric',
            'kelembapan_udara_min' => 'required|numeric',
        ]);

        JenisTanaman::create($request->all());
        return redirect()->route('jenis_tanaman.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jenis = JenisTanaman::findOrFail($id);
        return view('jenis_tanaman.edit', compact('jenis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'suhu_tanah_max' => 'required|numeric',
            'suhu_tanah_min' => 'required|numeric',
            'kelembapan_tanah_max' => 'required|numeric',
            'kelembapan_tanah_min' => 'required|numeric',
            'suhu_udara_max' => 'required|numeric',
            'suhu_udara_min' => 'required|numeric',
            'kelembapan_udara_max' => 'required|numeric',
            'kelembapan_udara_min' => 'required|numeric',
        ]);

        $jenis = JenisTanaman::findOrFail($id);
        $jenis->update($request->all());

        return redirect()->route('jenis_tanaman.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jenis = JenisTanaman::findOrFail($id);
        $jenis->delete();

        return redirect()->route('jenis_tanaman.index')->with('success', 'Data berhasil dihapus.');
    }
}