<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bicycle;
class DashboardController extends Controller
{
    public function Index (){

        $bicycle = Bicycle::all();
        return view('dashboard', compact('bicycle'));

    }
}
