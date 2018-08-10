<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_obj = Product::all();
        return view('admin.product.list')->with('list_obj', $list_obj);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = new Product();
        $obj->name = Input::get('name');
        $obj->author = Input::get('author');
        $obj->content = Input::get('content');
        $obj->images = Input::get('images');
        $obj->save();
        return redirect('/admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = Product::find($id);
        if ($obj == null) {
            return view('404');
        }
        return view('admin.product.show')
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
        $obj = Product::find($id);
        if ($obj == null) {
            return view('404');
        }
        return view('admin.product.edit')
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
        $obj = Product::find($id);
        if ($obj == null) {
            return view('404');
        }
        $obj->name = Input::get('name');
        $obj->price = Input::get('price');
        $obj->overview = Input::get('overview');
        $obj->description = Input::get('description');
        $obj->images = Input::get('images');
        $obj->save();
        return redirect('/admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Product::find($id);
        if ($obj == null) {
            return response('article not found or has been deleted!', 404);
        }
        $obj->delete();
        return response('Deleted', 200);
    }
}
