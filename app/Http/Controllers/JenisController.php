<?php

namespace App\Http\Controllers;
use App\Models\JenisTanaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JenisController extends Controller
{
    public function index()
    {
        $jenisTanaman = JenisTanaman::all();
        return view('jenis_tanaman.index', compact('jenisTanaman'));
    }

    // public function create()
    // {
    //     return view('jenis_tanaman.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama' => 'required|string',
    //         'suhu_tanah_max' => 'required|numeric',
    //         'suhu_tanah_min' => 'required|numeric',
    //         'kelembapan_tanah_max' => 'required|numeric',
    //         'kelembapan_tanah_min' => 'required|numeric',
    //         'suhu_udara_max' => 'required|numeric',
    //         'suhu_udara_min' => 'required|numeric',
    //         'kelembapan_udara_max' => 'required|numeric',
    //         'kelembapan_udara_min' => 'required|numeric',
    //     ]);

    //     JenisTanaman::create($request->all());
    //     return redirect()->route('jenis_tanaman.index')->with('success', 'Data berhasil ditambahkan.');
    // }

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

    // public function destroy($id)
    // {
    //     $jenis = JenisTanaman::findOrFail($id);
    //     $jenis->delete();

    //     return redirect()->route('jenis_tanaman.index')->with('success', 'Data berhasil dihapus.');
    // }
}