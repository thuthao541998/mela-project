<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Http\Requests\StoreProductPost;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use JD\Cloudder\Facades\Cloudder;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $limit = 10;
        $brands = Brand::all();
        $choosedBrandId = Input::get('brandId');
        $categories = Category::all();
        $choosedCategoryId = Input::get('categoryId');
        $list_obj = null;
        if(($choosedCategoryId == null && $choosedBrandId == null)){
            $list_obj = Product::paginate($limit);
        }else if($choosedBrandId == null || $choosedBrandId == '0'){
            $list_obj = Product::where('categoryId', $choosedCategoryId)-> paginate($limit);
        }else if ($choosedCategoryId == null || $choosedCategoryId == '0'){
            $list_obj = Product::where('brandId', $choosedBrandId)-> paginate($limit);
        } else {
            $list_obj = Product::where([
                'categoryId'=> $choosedCategoryId,
                'brandID'=> $choosedBrandId
            ]) -> paginate($limit);
        }
        return view('admin.product.list')
            ->with('list_obj', $list_obj)
            ->with('brands',$brands)
            ->with('categories',$categories)
            ->with('choosedBrandId',$choosedBrandId)
            ->with('choosedCategoryId',$choosedCategoryId)
            ->with('null',null)
            ;
    }

    public function indexClient()
    {
        $limit = 10;
        $brands = Brand::all();
        $choosedBrandId = Input::get('brandId');
        $categories = Category::all();
        $choosedCategoryId = Input::get('categoryId');
        $list_obj = null;
        if(($choosedCategoryId == null && $choosedBrandId == null)){
            $list_obj = Product::paginate($limit);
        }else if($choosedBrandId == null || $choosedBrandId == '0'){
            $list_obj = Product::where('categoryId', $choosedCategoryId)-> paginate($limit);
        }else if ($choosedCategoryId == null || $choosedCategoryId == '0'){
            $list_obj = Product::where('brandId', $choosedBrandId)-> paginate($limit);
        } else {
            $list_obj = Product::where([
                'categoryId'=> $choosedCategoryId,
                'brandID'=> $choosedBrandId
            ]) -> paginate($limit);
        }
        return view('client.product')
            ->with('list_obj', $list_obj)
            ->with('brands',$brands)
            ->with('categories',$categories)
            ->with('choosedBrandId',$choosedBrandId)
            ->with('choosedCategoryId',$choosedCategoryId)
            ->with('null',null)
            ;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create')
            ->with('categories', $categories)
            ->with('brands', $brands)
            ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductPost $request)
    {
        $request->validated();
        $obj = new Product();
        $obj->name = Input::get('name');
        $obj->price = Input::get('price');
        $obj->overview = Input::get('overview');
        $obj->description = Input::get('description');
        $obj->brandId = Input::get('brandId');
        $obj->categoryId = Input::get('categoryId');
        if(Input::hasFile('images')){
            $image_id = time();
            Cloudder::upload(Input::file('images')->getRealPath(), $image_id);
            $obj->images = Cloudder::secureShow($image_id);
        }
        $obj->save();
        return redirect('/admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        $choosedBrandId = $obj->brandId;
        $choosedCategoryId = $obj->categoryId;
        if ($obj == null) {
            return view('admin.404.404');
        }
        return view('admin.product.edit')
            ->with('obj', $obj)
            ->with('categories', $categories)
            ->with('choosedCategoryId', $choosedCategoryId)
            ->with('brands',$brands)
            ->with('choosedBrandId', $choosedBrandId)
            ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductPost $request, $id)
    {
        $request->validated();
        $obj = Product::find($id);
        if ($obj == null) {
            return view('admin.404.404');
        }
        $obj->name = Input::get('name');
        $obj->price = Input::get('price');
        $obj->overview = Input::get('overview');
        $obj->description = Input::get('description');
        $obj->brandId = Input::get('brandId');
        $obj->categoryId = Input::get('categoryId');
        if(Input::hasFile('images')){
            $image_id = time();
            Cloudder::upload(Input::file('images')->getRealPath(), $image_id);
            $obj->images = Cloudder::secureShow($image_id);
        }
        $obj->save();
        return redirect('/admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Product::find($id);
        if ($obj == null) {
            return response('Product not found or has been deleted!', 404);
        }
        $obj->delete();
        return response('Deleted', 200);
    }
    public function destroyMany()
    {

        Product::destroy(Input::get('ids'));
        return Input::get('ids');
    }



    public function showJson($id)
    {
        $obj = Product::find($id);
        if ($obj == null) {
            return response()->json(['msg' => 'Not found'], 404);
        }
        return response()->json(['item' => $obj], 200);
    }

    public function quickUpdate(Request $request, $id)
    {
        $obj = Product::find($id);
        if ($obj == null) {
            return response()->json(['msg' => 'Not found'], 404);
        }
        $obj->name = Input::get('name');
        $obj->price = Input::get('price');
        $obj->overview = Input::get('overview');
        $obj->save();
        return response()->json(['item' => $obj], 200);
    }
}
