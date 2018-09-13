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
        return $list_obj;
    }

    public function indexClient()
    {
        $limit = 10;
        $list_obj = Comment::paginate($limit);
        return view('client.comment.list', compact('comment'))->with('list_obj', $list_obj);
    }

    public function store()
    {
        $obj = new Comment();
        $obj->product_id = Input::get('product_id');
        $obj->user_id = Input::get('user_id');
        $obj->content = Input::get('content');
        $obj->save();
        $comments = Comment::whereRaw('product_id='.Input::get('product_id'))->orderByRaw('created_at DESC')->get();
        return $comments;
    }


    public function destroy()
    {
        $id = Input::get('id');
        $obj = Comment::find($id);
        if ($obj == null) {
            return response('The artitle is not found or has been deleted!', 404);
        }
        $obj->delete();
        $comments = Comment::whereRaw('product_id='.Input::get('product_id'))->orderByRaw('created_at DESC')->get();
        return $comments;
    }

}
