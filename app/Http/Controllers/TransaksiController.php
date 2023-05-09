<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('start_date')) {
            $start_date = Carbon::parse($request->start_date)->format('Y-m-d').' 00:00:00';
        }else{
            $start_date = Carbon::now()->startOfMonth()->format('Y-m-d').' 00:00:00';
        }
        
        if ($request->has('end_date')) {
            $end_date = Carbon::parse($request->end_date)->format('Y-m-d').' 23:59:00';
        }else{
            $end_date = Carbon::now()->endOfMonth()->format('Y-m-d').' 23:59:00';
        }

        $data = Transaksi::whereBetween('created_at', [$start_date, $end_date])->orderBy('id', 'desc')->get();
        $report['pengeluaran'] = Transaksi::whereBetween('created_at', [$start_date, $end_date])->where('category_id', 1)->where('status', 1)->sum('nominal');
        $report['pemasukan'] = Transaksi::whereBetween('created_at', [$start_date, $end_date])->where('category_id', 2)->where('status', 1)->sum('nominal');
        $report['saldo'] = $report['pemasukan'] - $report['pengeluaran'];
        $report['start_date'] = Carbon::parse($start_date)->format('Y-m-d');
        $report['end_date'] = Carbon::parse($end_date)->format('Y-m-d');

        return view('transaksi.index', ['data' => $data, 'report' => $report]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('status', 1)->orderBy('id', 'desc')->get();

        return view('transaksi.create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'category_id' => 'required',
                'category_detail_id' => 'required',
                'nominal' => 'required|integer',
                'status' => 'required|integer',
            ]);
            $data = $request->all();

            $create = Transaksi::create($data);
            return redirect()->route('transaction.index')->with('success', 'Berhasil input data!!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', $th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if(!is_numeric($id)) {
            return abort(404);
        }
        $data = Transaksi::findOrFail($id);

        return view('transaksi.detail', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('status', 1)->orderBy('id', 'desc')->get();
        $data = Transaksi::findOrFail($id);

        return view('transaksi.edit', ['data' => $data, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'category_id' => 'required',
                'category_detail_id' => 'required',
                'nominal' => 'required|integer',
                'status' => 'required|integer',
            ]);
            
            $data = $request->all();

            $update = Transaksi::findOrFail($id)->update($data);

            return redirect()->route('transaction.index')->with('success', 'Berhasil edit data!!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', $th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $destroy = Transaksi::findOrFail($id)->delete();

            return redirect()->route('transaction.index')->with('success', 'Berhasil hapus data!!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', $th);
        }
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $request->validate([
                'status' => 'required|integer',
            ]);
            
            $data = $request->all();

            $update = Transaksi::findOrFail($id)->update($data);

            return redirect()->route('transaction.index')->with('success', 'Berhasil edit data!!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', $th);
        }
    }
}
