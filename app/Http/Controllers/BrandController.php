<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Http\Requests\StoreBrandPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use JD\Cloudder\Facades\Cloudder;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_obj = null;
        $list_obj = Brand::paginate(5);
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
    public function store(StoreBrandPost $request)
    {
        $request->validated();
        $obj = new Brand();
        $obj->name = Input::get('name');
        $obj->description = Input::get('description');
        if(Input::hasFile('images')){
            $image_id = time();
            Cloudder::upload(Input::file('images')->getRealPath(), $image_id);
            $obj->images = Cloudder::secureShow($image_id);
        }
        try{
            $obj->save();
        } catch (Exception $e){
            return new \App\Exceptions\AdminException('Cannot save brand. Try again.');
        }
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
            return view('admin.404.404');
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
            return view('admin.404.404');
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
    public function update(StoreBrandPost $request, $id)
    {
        $request->validated();
        $obj = Brand::find($id);
        if ($obj == null) {
            return view('admin.404.404');
        }
        $obj->name = Input::get('name');
        $obj->description = Input::get('description');
        if(Input::hasFile('images')){
            $image_id = time();
            Cloudder::upload(Input::file('images')->getRealPath(), $image_id);
            $obj->images = Cloudder::secureShow($image_id);
        }
        try{
            $obj->save();
        } catch (Exception $e){
            return new \App\Exceptions\AdminException('Cannot update brand. Try again.');
        }
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
            return response('Brand not found or has been deleted!', 404);
        }
        $obj->delete();
        return response('Deleted', 200);
    }

    public function destroyMany()
    {
        Brand::destroy(Input::get('ids'));
        return Input::get('ids');
    }
}
