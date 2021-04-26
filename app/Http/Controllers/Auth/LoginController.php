<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Overtrue\LaravelSocialite\Socialite;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /*
     * 重定向github授权界面
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /*
     * 接收github验证回调
     */
    public function handleProviderCallback()
    {
        $github_user = Socialite::driver('github')->user();
        $user=User::where('github_name',$github_user->name)->first();
        if(empty($user)){
            $user=User::create([
                'name'=>$github_user->name,
                'email'=>$github_user->email,
                'github_name'=>$github_user->name,
                'avatar'=>$github_user->avatar,
                'verified'=>1,
            ]);
        }
        Auth::login($user);
        return Redirect()->guest('/');

    }
}
