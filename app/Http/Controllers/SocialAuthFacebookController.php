<?php

namespace App\Http\Controllers;

use App\User;
use Guzzle\Service\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Socialite;
use App\Services\SocialFacebookAccountService;

class SocialAuthFacebookController extends Controller
{
    /**
     * Create a redirect method to facebook api.
     *
     * @return void
     */
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(SocialFacebookAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
        auth()->login($user);
        return redirect()->to('/');
    }
    public function callbackZalo(){
//        Lấy access Token
        $appId = '3902778407091030839';
        $appSecret = '6r7VDfTIF0cRP35qQ739';
        $client = new Client('https://oauth.zaloapp.com/v3/access_token?app_id='
                                                                                        .$appId.'&app_secret='.$appSecret.'&code='.Input::get('code'));
        $res = $client ->get() -> send() -> json();
        $access_token = json_decode(json_encode($res));

//        Truy xuất dữ liệu người dùng
        $client = new Client('https://graph.zalo.me/v2.0/me?fields=id,name,birthday,gender,picture&access_token='.$access_token -> access_token);
        $res = $client ->get() -> send() -> json();
        $user = json_decode(json_encode($res));

//          Lưu dữ liệu vào DB
        $user = User::firstOrCreate([
            'email' => $user -> id.'@zalo.com',
        ],
            [
                'name' => $user -> name,
                'password' => bcrypt($user -> id),
                'remember_token' => $access_token,
            ]);

//        Đăng nhập
        Auth::guard() -> login($user);
       return redirect('/') ;
    }
}
