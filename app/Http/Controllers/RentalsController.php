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
        
    }

    /**
     * Store a newly created resource in storage.
     */

     public function transaction(string $id){
        $customers = Customers::All();
        $bicycle = Bicycle::findOrFail($id);
        return view('rentals.transaction', compact('bicycle', 'customers'));
     }

     public function progrestransaction(Request $request){
        $request->validate([
            'tanggal_sewa' => 'required',
            'tanggal_kembali' => 'required',
            'total_biaya' => 'required',
        ]);
    
        $rentals = Rentals::create([
            'id_bicycle' => $request->id_bicycle, // Correct syntax
            'id_customer' => $request->id_customer, // Correct syntax
            'tanggal_sewa' => $request->tanggal_sewa,
            'tanggal_kembali' => $request->tanggal_kembali,
            'total_biaya' => $request->total_biaya,
            'status' => 'disewa',
        ]);
        
        // Kurangi jumlah sepeda yang tersedia
        $bicycle = Bicycle::findOrFail($request->id_bicycle);
        $bicycle->jumlah = $bicycle->jumlah - 1;
        $bicycle->save();
    
        return redirect()->route('status-success');
    }
    
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
        
        // Jika status disewa, kurangi jumlah sepeda
        if ($request->status == 'disewa') {
            $bicycle = Bicycle::findOrFail($request->id_bicycle);
            $bicycle->jumlah = $bicycle->jumlah - 1;
            $bicycle->save();
        }
        
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
        $oldStatus = $rentals->status;
        $oldBicycleId = $rentals->id_bicycle;
        
        $rentals->update($request->all());
        
        // Jika sepeda berubah atau status berubah
        if ($oldBicycleId != $request->id_bicycle || $oldStatus != $request->status) {
            // Jika sebelumnya disewa, kembalikan stok sepeda lama
            if ($oldStatus == 'disewa') {
                $oldBicycle = Bicycle::findOrFail($oldBicycleId);
                $oldBicycle->jumlah = $oldBicycle->jumlah + 1;
                $oldBicycle->save();
            }
            
            // Jika sekarang disewa, kurangi stok sepeda baru
            if ($request->status == 'disewa') {
                $newBicycle = Bicycle::findOrFail($request->id_bicycle);
                $newBicycle->jumlah = $newBicycle->jumlah - 1;
                $newBicycle->save();
            }
        }
        
        return redirect()->route('rentals.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id)
    {
        $rentals = Rentals::findOrFail($id);
        
        // Jika rental yang dihapus statusnya disewa, kembalikan stok sepeda
        if ($rentals->status == 'disewa') {
            $bicycle = Bicycle::findOrFail($rentals->id_bicycle);
            $bicycle->jumlah = $bicycle->jumlah + 1;
            $bicycle->save();
        }
        
        $rentals->delete();
        return redirect()->route('rentals.index');
    }

    /**
     * Update the status of a rental.
     */
    public function updateStatus(Request $request, string $id)
    {
        $rentals = Rentals::findOrFail($id);
        $oldStatus = $rentals->status;
        $rentals->status = $request->status;
        $rentals->save();
        
        $bicycle = Bicycle::findOrFail($rentals->id_bicycle);
        
        // Jika status berubah dari disewa ke dikembalikan
        if ($oldStatus == 'disewa' && $request->status == 'dikembalikan') {
            // Tambah jumlah sepeda karena dikembalikan
            $bicycle->jumlah = $bicycle->jumlah + 1;
        } 
        // Jika status berubah dari dikembalikan ke disewa
        else if ($oldStatus == 'dikembalikan' && $request->status == 'disewa') {
            // Kurangi jumlah sepeda karena disewa lagi
            $bicycle->jumlah = $bicycle->jumlah - 1;
        }
        
        $bicycle->save();
        
        return redirect()->route('rentals.index')->with('success', 'Status berhasil diperbarui');
    }
}
