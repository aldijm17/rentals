<?php

    namespace App\Http\Controllers;

    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use App\Models\Customers;
    use Illuminate\Http\Request;
    use carbon\Carbon;
    class CustomersController extends Controller
    {
        public function registerForm()
{
    return view('customers.register');
}

public function register(Request $request)
{
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:customers',
        'password' => 'required|string|min:8|confirmed',
        'alamat' => 'required|string',
        'no_telpon' => 'required|string|max:20',
    ]);

    $customer = Customers::create([
        'nama' => $validatedData['nama'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
        'alamat' => $validatedData['alamat'],
        'no_telpon' => $validatedData['no_telpon'],
    ]);

    Auth::guard('customer')->login($customer);

    return redirect()->route('home.guest')->with('success', 'Registrasi berhasil! Selamat datang di BikeRent.');
}
        public function loginForm()
    {
        return view('customers.login');
    }
    
    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if (Auth::guard('customer')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        
        return back()->withErrors(['email' => 'Email atau password salah']);
    }
    
    // Proses logout
    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
    
    // Halaman dashboard customer
    public function dashboard()
    {
        $customer = Auth::guard('customer')->user();
        return view('customer.dashboard', compact('customer'));
    }



        /**
         * Display a listing of the resource.
         */
        public function index()
        {
        $customer = Auth::guard('customer')->user();

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
            return view('customers.index',compact('customers','customer', 'dates','counts'));
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
