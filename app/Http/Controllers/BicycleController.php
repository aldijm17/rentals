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
            'tipe' => 'required',
            'warna' => 'required',
            'harga_sewa' => 'required',
            'status' => 'required',
        ]);

        Bicycle::create($request->all());
        return redirect()->route('bicycle.index');
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
    public function edit(Bicycle $bicycle, string $id)
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
            'status' => 'required',
        ]);
        $bicycle= Bicycle::findOrFail($id);
        $bicycle->update($request->all());
        return redirect()->route('bicycle.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bicycle $bicycle, string $id)
    {
        $bicycle= Bicycle::findOrFail($id);
        $bicycle->delete();
        return redirect()->route('bicycle.index');
    }
}
