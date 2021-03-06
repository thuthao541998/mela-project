<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Http\Requests\StoreProductPost;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
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
        }else if($choosedBrandId == null){
            $list_obj = Product::where('categoryId', $choosedCategoryId)-> paginate($limit);
        }else if ($choosedCategoryId == null){
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

    public function indexClient(Request $request)
    {
        $limit = 10;
        $brands = Brand::all();
        $choosedBrandId = Input::get('brandId');
        $categories = Category::all();
        $choosedCategoryId = Input::get('categoryId');
        $list_obj = null;

        if(($choosedCategoryId == null && $choosedBrandId == null)){
            $list_obj = Product::paginate($limit);
        } else if($choosedBrandId == null || $choosedBrandId == '0'){
            $list_obj = Product::where('categoryId', $choosedCategoryId)-> paginate($limit);
        } else if ($choosedCategoryId == null || $choosedCategoryId == '0'){
            $list_obj = Product::where('brandId', $choosedBrandId)-> paginate($limit);
        } else {
            $list_obj = Product::where([
                'categoryId'=> $choosedCategoryId,
                'brandID'=> $choosedBrandId
            ]) -> paginate($limit);
        }
        return view('client.product.list')
            ->with('list_obj', $list_obj)
            ->with('brands',$brands)
            ->with('categories',$categories)
            ->with('choosedBrandId',$choosedBrandId)
            ->with('choosedCategoryId',$choosedCategoryId)
            ->with('null',null);
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
        $obj->discount = Input::get('discount');
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
    public function showClient($id)
    {
        $obj = Product::find($id);
        if ($obj == null) {
            return view('errors.404');
        }
        $limit = 8;
        $list_obj = null;
        $categoryId = $obj->categoryId;
        $brandId = $obj->brandId;
        $no_category_item = Product::where('categoryId', $categoryId)->count();
        $no_brand_item = Product::where('brandId', $brandId)->count();
        if ($limit <= $no_category_item){
            $list_obj = DB::table('products')->take($limit)->get();
        } else{
            $list_obj = DB::table('products')->get();
            for ($i = 0; $i < $limit - $no_brand_item; $i++){
                $brand_items = Product::where('categoryId', '!=', $categoryId)->where('brandId', $brandId);
                $list_obj->push($brand_items[$i]);
            }
        }

        return view('client.product.detail')
            ->with('obj', $obj)
            ->with('list_obj', $list_obj)
            ->with('comments',$obj->comments);
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
        $obj->discount = Input::get('discount');
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

    public function search(Request $request) {
        if($request->ajax())
        {
            $query = $request->get('query');
            if($query != '')
            {
                $list_obj = Product::where('name', 'like', '%'.$query.'%')->get();
            }
            else
            {
                $list_obj = Product::orderBy('id')->get();
            }
            return response()->json([
                'list_obj' => $list_obj
            ], 200);
        }
    }
}