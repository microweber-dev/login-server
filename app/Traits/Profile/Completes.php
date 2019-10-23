<?php
namespace App\Traits\Profile;

use App\Models\OAuth;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Validator;

trait Completes
{

	/**
	 * Show the profile completion form.
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function showForm(Request $request)
	{
		if ($request->session()->has('oauth_user_id') && Auth::guest()) {
			$id = $request->session()->get('oauth_user_id');
			$user = OAuth\User::where('id', $id)->whereNull('email')->first();

			if ($user) {
				return view('profile.complete', [
					'name' => $user->name,
					'username' => $user->nickname,
					'askEmail' => true,
					'askPassword' => false
				]);
			}
		} elseif (Auth::check()) {
			$user = Auth::user();

			$askPassword = false;
			if (is_array($user->accounts)) {
				$askPassword = ($user->accounts->count() == 0);
			}

			return view('profile.complete', [
				'name' => $user->name,
				'username' => $user->username,
				'askEmail' => false,
				'askPassword' => $askPassword
			]);
		}

		return redirect('/register');
	}

	/**
	 * Handle a profile completion request for the application.
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function complete(Request $request)
	{
		if ($request->session()->has('oauth_user_id') && Auth::guest()) {
			$oid = $request->session()->get('oauth_user_id');
			$ouser = OAuth\User::where('id', $oid)->whereNull('email')->first();
			if ($ouser) {
				$this->validator($request->all(), true, false)
					->validate();
				$user = $this->create($request->all());
				$ouser->user_id = $user->id;
				$ouser->save();
				Auth::login($user, true);
			}
		} elseif (Auth::check()) {
			$user = Auth::user();

			$havePassword = false;
			if (is_array($user->accounts)) {
				$havePassword = ($user->accounts->count() == 0);
			}

			$this->validator($request->all(), false, $havePassword)
				->validate();
			$user->name = $request->get('name');
			$user->username = $request->get('username');

			if ($havePassword) {
				$user->password = bcrypt($request->get('password'));
			}

			$user->save();
		}

		$sess = $request->session()->all();
		if (isset($sess['_token'])) {
			if (isset($sess['url']) and isset($sess['url']['intended'])) {
				return redirect($sess['url']['intended']);
			}
		}

		return redirect('/home');
	}
}