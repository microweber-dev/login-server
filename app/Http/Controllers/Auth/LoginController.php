<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Cookie;


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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     // $this->middleware('guest', ['except' => ['logout','token','me']]);
      $this->middleware('guest', ['except' => ['logout']]);
    //  $this->middleware('guest', ['except' => ['logout','token','me']]);
    }


    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        $request = request();

        $afterLogin = $request->get('after_login', false);
        if ($afterLogin) {
            Cookie::queue('after_login', $afterLogin, 60 * 24 * 24);
            return redirect('login');
        }

        return view('auth.login');
    }

}
