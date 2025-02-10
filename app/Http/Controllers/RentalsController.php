<?php

namespace App\Http\Controllers;

use App\Models\Rentals;
use App\Models\Customers;
use App\Models\Bicycle;
use Illuminate\Http\Request;

class RentalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customers::all();
        $bicycles = Bicycle::all();
        $rentals=Rentals::with('bicycles','customers')->get();
        return view('rentals.index', compact('rentals','bicycles','customers'));
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
            'id_customer',
            'id_bicycle',
            'tanggal_sewa',
            'tanggal_kembali',
            'total_biaya',
            'status'
        ]);
        $rentals = Rentals::create($request->all());
        return redirect()->route('rentals.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rentals $rentals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customers = Customers::all();
        $bicycles = Bicycle::all();
        $rentals = Rentals::findOrFail($id);
        return view('rentals.edit', compact('customers','bicycles','rentals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_customer' => 'required',
            'id_bicycle' => 'required',
            'tanggal_sewa' => 'required',
            'tanggal_kembali' => 'required',
            'total_biaya' => 'required',
            'status' => 'required',
        ]);

        $rentals = Rentals::findOrFail($id);
        $rentals->update($request->all());
        return redirect()->route('rentals.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rentals $rentals, string $id)
    {
        $rentals = Rentals::findOrFail($id);
        $rentals->delete();
        return redirect()->route('rentals.index');
    }
}
