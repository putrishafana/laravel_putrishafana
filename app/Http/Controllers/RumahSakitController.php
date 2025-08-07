<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RumahSakit;

class RumahSakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rs = RumahSakit::all();

        return view('halaman.rumahsakit', compact('rs'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'email' => 'required|email|unique:d_rumahsakit,email',
            'telepon' => 'required|string|max:20',
        ]);

        $rs = new RumahSakit();
        $rs->nama = $request->nama;
        $rs->alamat = $request->alamat;
        $rs->email = $request->email;
        $rs->telepon = $request->telepon;
        $rs->save();

        return redirect()->to('/rumahsakit')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rs = RumahSakit::find($id);
        $rs->nama = $request->nama;
        $rs->alamat = $request->alamat;
        $rs->email = $request->email;
        $rs->telepon = $request->telepon;
        $rs->save();
        return redirect()->to('/rumahsakit')->with('success', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rs = RumahSakit::find($id);
        $rs->delete();
        return redirect()->to('/rumahsakit')->with('success', 'Data berhasil dihapus.');
    }
}