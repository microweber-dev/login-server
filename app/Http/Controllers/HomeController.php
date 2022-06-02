<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $afterLogin = base64_decode(Cookie::get('after_login', false));
        if ($afterLogin) {
            return redirect($afterLogin);
        }

        //  dd($request->session()->all());
        if ($request->session()->has('return_url')) {
            $value = $request->session()->pull('return_url',false);

            return redirect($request->session()->get('return_url'));
        }
        $all_sess = $request->session()->all();
        if (isset($all_sess['url'])) {
            if (isset($all_sess['url']['intended']) and $all_sess['url']['intended']) {
               $value = $request->session()->pull('url.intended',false);
                $request->session()->forget('url.intended');

                sleep(1);

                return redirect($value);
            }
        }


        return view('home');
    }
}
