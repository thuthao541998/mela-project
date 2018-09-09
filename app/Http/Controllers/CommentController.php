<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_obj = Comment::paginate(5);
        return view('admin.comment.list', compact('comment'))->with('list_obj', $list_obj);
    }

    public function indexClient()
    {
        $limit = 10;
        $list_obj = Comment::paginate($limit);
        return view('client.comment.list', compact('comment'))->with('list_obj', $list_obj);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.comment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validated();
        $obj = new comment();
        $obj->content = Input::get('content');
        $obj->save();
        return redirect('/admin/comment');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = Comment::find($id);
        if ($obj == null) {
            return view('admin.404.404');
        }
        return view('admin.comment.detail')
            ->with('obj', $obj);
    }

    public function showClient($id)
    {
        $obj = comment::find($id);
        if ($obj == null) {
            return view('admin.404.404');
        }
        return view('client.comment.detail')
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
        $obj = Comment::find($id);
        if ($obj == null) {
            return view('admin.404.404');
        }
        return view('admin.comment.edit')
            ->with('obj', $obj);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $request->validated();
        $obj = Comment::find($id);
        if ($obj == null) {
            return view('admin.404.404');
        }
        $obj->content = Input::get('content');
        $obj->save();
        return redirect('/admin/comment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        $obj = Comment::find($id);
        if ($obj == null) {
            return response('The artitle is not found or has been deleted!', 404);
        }
        $obj->delete();
        return response('Deleted', 200);
    }

    public function showJson($id)
    {
        $obj = Comment::find($id);
        if ($obj == null) {
            return response()->json(['msg' => 'Not found'], 404);
        }
        return response()->json(['item' => $obj], 200);
    }

    public function quickUpdate(Request $request, $id)
    {
        $obj = Comment::find($id);
        if ($obj == null) {
            return response()->json(['msg' => 'Not found'], 404);
        }
        $obj->content = Input::get('content');
        $obj->save();
        return response()->json(['item' => $obj], 200);
    }
}
