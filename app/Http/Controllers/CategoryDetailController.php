<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryDetail;
use Illuminate\Http\Request;

class CategoryDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CategoryDetail::orderBy('id', 'desc')->get();

        return view('category_detail.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('status', 1)->orderBy('id', 'desc')->get();

        return view('category_detail.create', ['category' => $category]);
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
                'name' => 'required',
            ]);
            $data = $request->all();

            $create = CategoryDetail::create($data);
            return redirect()->route('category-detail.index')->with('success', 'Berhasil input data!!');
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
        $data = CategoryDetail::findOrFail($id);

        return view('category_detail.detail', ['data' => $data]);
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
        $data = CategoryDetail::findOrFail($id);

        return view('category_detail.edit', ['data' => $data, 'category' => $category]);
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
                'name' => 'required',
            ]);
            
            $data = $request->all();

            $update = CategoryDetail::findOrFail($id)->update($data);

            return redirect()->route('category-detail.index')->with('success', 'Berhasil edit data!!');
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
            $destroy = CategoryDetail::findOrFail($id)->delete();

            return redirect()->route('category-detail.index')->with('success', 'Berhasil hapus data!!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('danger', $th);
        }
    }

    public function findCategory($category_id)
    {
        $category_details = CategoryDetail::where('category_id', $category_id)->orderBy('id', 'desc')->get();
        
        $html = '';
        
        foreach ($category_details as $item) {
            $html .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }
        
        return $html;
    }

}
