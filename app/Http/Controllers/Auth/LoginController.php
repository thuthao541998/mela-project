<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers {
        logout as performLogout;
    }


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/';

    /**
     * @param string $redirectTo
     */




    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }


    protected function redirectTo()
    {
        return Session::get('pre_urlPath');
    }

    public function index(){
//        Take previous url

        if(!Session::has('pre_url')){
            Session::put('pre_url', URL::previous());
        }else{
            if(URL::previous() != URL::to('client-login')) Session::put('pre_url', URL::previous());
        }
//        take previous url path
        $urlpath = str_replace(url('/'), '', url()->previous());
        if(!Session::has('pre_urlPath')){
            Session::put('pre_urlPath', $urlpath);
        }else{
            if(URL::previous() != URL::to('client-login')) Session::put('pre_urlPath', $urlpath);
        }
        return view('client.login');
    }
    public function logout(Request $request )
    {

        $this->performLogout($request);
        return redirect('/');
    }

}
