<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.index');
        } elseif (auth()->user()->role === 'sales') {
            return redirect()->route('sales.index');
        }

        // Redirect ke halaman default jika role tidak dikenal
        return redirect('/home')->with('error', 'Role is not recognized.');
    }
}
