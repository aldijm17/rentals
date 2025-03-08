<?php

namespace App\Http\Controllers;

use App\Models\Bicycle;
use Illuminate\Http\Request;

class BicycleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bicycle = Bicycle::all();
        return view('bicycle.index', compact('bicycle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'merk' => 'required',
        'foto' => 'required',
        'jumlah' => 'required',
        'tipe' => 'required',
        'warna' => 'required',
        'harga_sewa' => 'required',
        'deskripsi' => 'required',
        'status' => 'required',
    ]);

    $imageName = time().'.'.$request->foto->extension();
    $request->foto->move(public_path('images'), $imageName);

    Bicycle::create([
        'merk' => $request->merk,
        'foto' => 'images/'.$imageName,
        'jumlah' => $request->jumlah,
        'tipe' => $request->tipe,
        'warna' => $request->warna,
        'harga_sewa' => $request->harga_sewa,
        'deskripsi' => $request->deskripsi,
        'status' => $request->status,
    ]);

    return redirect()->route('bicycles.index');
}

    /**
     * Display the specified resource.
     */
    public function show(Bicycle $bicycle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bicycle=Bicycle::findOrFail($id);
        return view('bicycle.edit', compact('bicycle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $request->validate([
        'merk' => 'required',
        'tipe' => 'required',
        'warna' => 'required',
        'harga_sewa' => 'required',
        'deskripsi' => 'required',
        'status' => 'required',
    ]);

    $bicycle = Bicycle::findOrFail($id);

    // Cek apakah ada foto baru yang diunggah
    if ($request->hasFile('foto')) {
        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Hapus foto lama jika ada
        if ($bicycle->foto && file_exists(public_path($bicycle->foto))) {
            unlink(public_path($bicycle->foto));
        }

        // Simpan foto baru
        $imageName = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('images'), $imageName);
        $bicycle->foto = 'images/'.$imageName;
    }

    // Update data
    $bicycle->update([
        'merk' => $request->merk,
        'tipe' => $request->tipe,
        'warna' => $request->warna,
        'harga_sewa' => $request->harga_sewa,
        'deskripsi' => $request->deskripsi,
        'status' => $request->status,
    ]);

    return redirect()->route('bicycles.index')->with('success', 'Data berhasil diperbarui');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id)
    {
        $bicycle= Bicycle::findOrFail($id);
        $bicycle->delete();
        return redirect()->route('bicycles.index');
    }
}
