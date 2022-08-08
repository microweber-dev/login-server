<?php
namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function App\Http\Controllers\redirect;
use function App\Http\Controllers\view;

class MyProfileController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('profile.my-profile');
    }
}
