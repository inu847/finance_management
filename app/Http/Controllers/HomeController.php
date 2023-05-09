<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
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
        $data['pengeluaran'] = Transaksi::where('category_id', 1)->where('status', 1)->sum('nominal');
        $data['pemasukan'] = Transaksi::where('category_id', 2)->where('status', 1)->sum('nominal');
        $data['saldo'] = $data['pemasukan'] - $data['pengeluaran'];

        return view('dashboard', ['data' => $data]);
    }
}
