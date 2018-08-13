<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_obj = Brand::all();
        return view('admin.brand.list')->with('list_obj', $list_obj);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = new Brand();
        $obj->name = Input::get('name');
        $obj->description = Input::get('description');
        $obj->images = Input::get('images');
        $obj->save();
        return redirect('/admin/brand');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = Brand::find($id);
        if ($obj == null) {
            return view('404');
        }
        return view('admin.brand.show')
            ->with('obj', $obj);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = Brand::find($id);
        if ($obj == null) {
            return view('404');
        }
        return view('admin.brand.edit')
            ->with('obj', $obj);
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
        $obj = Brand::find($id);
        if ($obj == null) {
            return view('404');
        }
        $obj->name = Input::get('name');
        $obj->description = Input::get('description');
        $obj->images = Input::get('images');
        $obj->save();
        return redirect('/admin/brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Brand::find($id);
        if ($obj == null) {
            return response('brand not found or has been deleted!', 404);
        }
        $obj->delete();
        return response('Deleted', 200);
    }



    public function showJson($id)
    {
        $obj = Brand::find($id);
        if ($obj == null) {
            return response()->json(['msg' => 'Not found'], 404);
        }
        return response()->json(['item' => $obj], 200);
    }

    public function quickUpdate(Request $request, $id)
    {
        $obj = Brand::find($id);
        if ($obj == null) {
            return response()->json(['msg' => 'Not found'], 404);
        }
        $obj->name = Input::get('name');
        $obj->description = Input::get('description');
        $obj->images = Input::get('images');
        $obj->save();
        return response()->json(['item' => $obj], 200);
    }
}
