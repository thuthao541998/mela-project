<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\StoreArticlePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use JD\Cloudder\Facades\Cloudder;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_obj = Article::orderByRaw('created_at DESC')->paginate(5);
        return view('admin.article.list', compact('article'))->with('list_obj', $list_obj);
    }

    public function indexClient()
    {
        $limit = 10;
        $list_obj = Article::orderByRaw('created_at DESC')->paginate($limit);
        return view('client.article.list', compact('article'))->with('list_obj', $list_obj);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticlePost $request)
    {
        $request->validated();
        $obj = new Article();
        $obj->author = Input::get('author');
        $obj->title = Input::get('title');
        $obj->content = Input::get('content');
        if(Input::hasFile('images')){
            $image_id = time();
            Cloudder::upload(Input::file('images')->getRealPath(), $image_id);
            $obj->images = Cloudder::secureShow($image_id);
        }
        $obj->save();
        return redirect('/admin/article');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('errors.404');

    }

    public function showClient($id)
    {
        $obj = Article::find($id);
        if ($obj == null) {
            return view('admin.404.404');
        }
        return view('client.article.detail')
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
        $obj = Article::find($id);
        if ($obj == null) {
            return view('admin.404.404');
        }
        return view('admin.article.edit')
            ->with('obj', $obj);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, StoreArticlePost $request)
    {
        $request->validated();
        $obj = Article::find($id);
        if ($obj == null) {
            return view('admin.404.404');
        }
        $obj->author = Input::get('author');
        $obj->title = Input::get('title');
        $obj->content = Input::get('content');
        if(Input::hasFile('images')){
            $image_id = time();
            Cloudder::upload(Input::file('images')->getRealPath(), $image_id);
            $obj->images = Cloudder::secureShow($image_id);
        }
        $obj->save();
        return redirect('/admin/article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        $obj = Article::find($id);
        if ($obj == null) {
            return response('The artitle is not found or has been deleted!', 404);
        }
        $obj->delete();
        return response('Deleted', 200);
    }

    public function destroyMany()
    {

        Article::destroy(Input::get('ids'));
        return Input::get('ids');
    }


    public function showJson($id)
    {
        $obj = Article::find($id);
        if ($obj == null) {
            return response()->json(['msg' => 'Not found'], 404);
        }
        return response()->json(['item' => $obj], 200);
    }

    public function quickUpdate(Request $request, $id)
    {
        $obj = Article::find($id);
        if ($obj == null) {
            return response()->json(['msg' => 'Not found'], 404);
        }
        $obj->name = Input::get('name');
        $obj->author = Input::get('author');
        $obj->content = Input::get('content');
        $obj->images = Input::get('images');
        $obj->save();
        return response()->json(['item' => $obj], 200);
    }
}
