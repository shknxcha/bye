<?php

namespace App\Http\Controllers\Api;

//import model Product
use App\Models\Sensor;

use App\Http\Controllers\Controller;

//import resource SensorResource
use App\Http\Resources\SensorResource;

//import Http request
use Illuminate\Http\Request;

//import facade Validator
use Illuminate\Support\Facades\Validator;

//import facade Storage
use Illuminate\Support\Facades\Storage;

class SensorController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all Sensors
        $sensors = Sensor::latest()->paginate(2);

        //return collection of Sensors as a resource
        return new SensorResource(true, 'List Data Sensors', $sensors);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'humidity'         => 'required|numeric',
            'temperature'         => 'required|numeric',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        //create Sensor
        $sensors = Sensor::create([
            'humidity'         => $request->humidity,
            'temperature'   => $request->temperature,
        ]);

        //return response
        return new SensorResource(true, 'Data Sensor Berhasil Ditambahkan!', $sensors);
    }
    public function show($id)
    {
        //find sensor by ID
        $sensors = Sensor::find($id);

        //return single Sensor as a resource
        return new SensorResource(true, 'Detail Data Sensor!', $sensors);
    }
     /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(Request $request, $id)
{
    // Validasi input
    $validator = Validator::make($request->all(), [
        'humidity'    => 'required|numeric',
        'temperature' => 'required|numeric',
    ]);

    // Jika validasi gagal
    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    // Cari sensor berdasarkan ID
    $sensors = Sensor::find($id);

    // Jika sensor tidak ditemukan
    if (!$sensors) {
        return response()->json([
            'success' => false,
            'message' => 'Data Sensor Tidak Ditemukan',
            'data'    => null
        ], 404);
    }

    // Update data sensor
    $sensors->update([
        'humidity'    => $request->humidity,
        'temperature' => $request->temperature,
    ]);

    // Return response
    return new SensorResource(true, 'Data Sensor Berhasil Diubah!', $sensors);
}
/**
 * destroy
 *
 * @param  mixed $id
 * @return \Illuminate\Http\JsonResponse
 */
public function destroy($id)
{
    // Cari sensor berdasarkan ID
    $sensor = Sensor::find($id);

    // Jika sensor tidak ditemukan
    if (!$sensor) {
        return response()->json([
            'success' => false,
            'message' => 'Data Sensor Tidak Ditemukan',
            'data'    => null
        ], 404);
    }

    // Hapus data sensor
    $sensor->delete();

    // Return response sukses
    return new SensorResource(true, 'Data Sensor Berhasil Dihapus!', null);
}


}