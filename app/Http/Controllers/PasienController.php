<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RumahSakit;
use App\Models\Pasien;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->rs;

        $pasien = Pasien::with('RumahSakit');
        if ($search) {
            $pasien->where('rs_id', $search);
        }

        if ($request->ajax()) {
            return response()->json($pasien->get());
        }

        $rs = RumahSakit::select('id', 'nama')->get();
        return view('halaman.pasien', [
            'rs' => $rs,
            'pasien' => $pasien->get(),
            'search' => $search,
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:20',
            'rs_id' => 'required|integer'
        ]);


        $pasien = new Pasien();
        $pasien->nama = $request->nama;
        $pasien->alamat = $request->alamat;
        $pasien->telepon = $request->telepon;
        $pasien->rs_id = $request->rs_id;
        $pasien->save();

        return redirect()->to('/pasien')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:20',
            'rs_id' => 'required|integer'
        ]);

        $pasien = Pasien::find($id);
        $pasien->nama = $request->nama;
        $pasien->alamat = $request->alamat;
        $pasien->telepon = $request->telepon;
        $pasien->rs_id = $request->rs_id;
        $pasien->save();

        return redirect()->to('/pasien')->with('success', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = Pasien::find($id);
        $pasien->delete();

        return redirect()->to('/pasien')->with('success', 'Data berhasil dihapus.');
    }
}