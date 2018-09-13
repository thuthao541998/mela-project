<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/13/2018
 * Time: 8:45 PM
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $list_obj = User::orderByRaw('created_at DESC')->paginate(5);
        return view('admin.client.list')->with('list_obj', $list_obj);
    }
}