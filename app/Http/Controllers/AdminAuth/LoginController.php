<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo = '/admin';
    use AuthenticatesUsers;
    public function index()
    {
        return view('admin.login');
    }

    protected function guard()
    {
        return Auth::guard('web_sellUser');
    }
}
