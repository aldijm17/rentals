<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bicycle;
class DashboardController extends Controller
{
    public function index()
    {
        $availableBicycles = Bicycle::where('status', 'Tersedia')->count();
        $rentedBicycles = Bicycle::where('status', 'Disewa')->count();
        
        return view('dashboard', compact('availableBicycles', 'rentedBicycles'));
    }
}
