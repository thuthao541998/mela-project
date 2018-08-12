<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_obj = Article::paginate(10);
        return view('admin.article.list')->with('list_obj', $list_obj);
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
    public function store()
    {
        $obj = new Article();
        $obj->name = Input::get('name');
        $obj->author = Input::get('author');
        $obj->title = Input::get('title');
        $obj->content = Input::get('content');
        $obj->images = Input::get('images');
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
        $obj = Article::find($id);
        if ($obj == null) {
            return view('404');
        }
        return view('admin.article.show')
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
            return view('404');
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
    public function update($id)
    {
        $obj = Article::find($id);
        if ($obj == null) {
            return view('404');
        }
        $obj->name = Input::get('name');
        $obj->author = Input::get('author');
        $obj->title = Input::get('title');
        $obj->content = Input::get('content');
        $obj->images = Input::get('images');
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
        $obj->price = Input::get('price');
        $obj->images = Input::get('images');
        $obj->save();
        return response()->json(['item' => $obj], 200);
    }
}
