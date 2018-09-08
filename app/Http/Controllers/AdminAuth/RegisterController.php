<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SellUser;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    protected $redirectPath = 'admin';
    public function index(){
        return view('admin.register');
    }
    public function register(Request $request)
    {

        //Validates data
        $this->validator($request->all())->validate();

        //Create seller
        $seller = $this->create($request->all());

        //Authenticates seller
//        $this->guard()->login($seller);

        //Redirects sellers
        return redirect($this->redirectPath);
    }
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:sell_users',
            'password' => 'required|min:6|confirmed',
        ]);

    }
    protected function create(array $data)
    {
        return SellUser::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    protected function guard()
    {
        return Auth::guard('web_sellUser');
    }
}
