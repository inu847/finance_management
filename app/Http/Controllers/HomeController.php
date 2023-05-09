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
        $data['saldo'] = Transaksi::where('status', 1)->sum('nominal');
        $data['pengeluaran'] = Transaksi::where('category_id', 1)->where('status', 1)->sum('nominal');
        $data['pemasukan'] = Transaksi::where('category_id', 2)->where('status', 1)->sum('nominal');

        return view('dashboard', ['data' => $data]);
    }
}
