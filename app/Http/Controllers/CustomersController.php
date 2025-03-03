<?php

    namespace App\Http\Controllers;

    use Illuminate\Support\Facades\DB;
    use App\Models\Customers;
    use Illuminate\Http\Request;
    use carbon\Carbon;
    class CustomersController extends Controller
    {

        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $customers = DB::table('customers')
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        // Konversi data ke array untuk Chart.js
            $dates = $customers->pluck('date')->toArray();
            $counts = $customers->pluck('count')->toArray();

            $customers = Customers::all();
            return view('customers.index',compact('customers','dates','counts'));
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
                'nama'=> 'required',
                'alamat'=> 'required',
                'no_telpon'=> 'required',
                'email'=> 'required',

            ]);
            Customers::create($request->all());
            return redirect()->route('customers.index')->with('notification','Customer Berhasil Ditambahkan');
        }

        /**
         * Display the specified resource.
         */
        public function show(Customers $customers)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(Request $request, string $id)
        {
            $customers = Customers::findOrFail($id);
            return view('customers.edit',compact('customers'));
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
            $request->validate([
                'nama'=> 'required',
                'alamat'=> 'required',
                'no_telpon'=> 'required',
                'email'=> 'required',
            ]);
            $customers = Customers::findOrFail($id);
            $customers->update($request->all());
            return redirect()->route('customers.index');
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Customers $customers, string $id)
        {
            $customers = Customers::findOrFail($id);
            $customers->delete();
            return redirect()->route('customers.index')->with('notification','Customer Berhasil Di Hapus');
        }
    }
