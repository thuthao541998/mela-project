<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo = '/admin';
    use AuthenticatesUsers{
        logout as performLogout;
    }
    public function index()
    {
        return view('admin.login');
    }

    protected function guard()
    {
        return Auth::guard('web_sellUser');
    }
    public function logout(Request $request )
    {

        $this->performLogout($request);
        return redirect('/admin-login');
    }
}
