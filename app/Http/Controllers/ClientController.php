<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Support\Facades\Input;

class ClientController extends Controller
{
    public function index()
    {
        $list_obj = Client::all();
        return view('admin.client.list')->with('list_obj', $list_obj);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $obj = new Client();
        $obj->username = Input::get('username');
        $obj->password = Input::get('password')->hash('sha1');
        $obj->email = Input::get('email');
        $obj->address = Input::get('address');
        $obj->phone = Input::get('phone');
        $obj->birthday = Input::get('birthday');
        $obj->save();
        return redirect('/admin/client');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = Client::find($id);
        if ($obj == null) {
            return view('404');
        }
        return view('admin.client.show')
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
        $obj = Client::find($id);
        if ($obj == null) {
            return view('404');
        }
        return view('admin.client.edit')
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
        $obj = Client::find($id);
        if ($obj == null) {
            return view('404');
        }
        $obj->username = Input::get('username');
        $obj->password = Input::get('password');
        $obj->email = Input::get('email');
        $obj->address = Input::get('address');
        $obj->phone = Input::get('phone');
        $obj->birthday = Input::get('birthday');
        $obj->save();
        return redirect('/admin/client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Client::find($id);
        if ($obj == null) {
            return response('Client not found or has been deleted!', 404);
        }
        $obj->delete();
        return response('Deleted', 200);
    }
}
