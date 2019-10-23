<?php
namespace App\Traits\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers as Authenticates;
use Illuminate\Http\Request;
use App;

trait AuthenticatesUsers
{
	use Authenticates {
        username as legacyUsername;
        credentials as legacyCredentials;
    }

	/**
	 * Get the needed authorization credentials from the request.
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return array
	 */
	protected function credentials(Request $request)
	{
		$loginInput = $request->input($this->username());
		$loginField = filter_var($loginInput, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
		$request->merge([
			$loginField => $loginInput
		]);

		return $request->only($loginField, 'password');
	}

	/**
	 * Attempt to log the user into the application.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return bool
	 */
	protected function attemptLogin(Request $request)
	{
		$is_auth = $this->guard()->attempt($this->credentials($request));

		if (! $is_auth) {
			$creds = $this->credentials($request);

			if (isset($creds['email']) and isset($creds['password'])) {
				// http://members.microweber.com/_sync/check_pass_mwlogin/?email=peter@microweber.com&password=1234
				$ch = curl_init();

				curl_setopt($ch, CURLOPT_URL, "https://members.microweber.com/_sync/check_pass_mwlogin/");
				curl_setopt($ch, CURLOPT_POST, 1);

				curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($creds));

				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

				$server_output = curl_exec($ch);

				curl_close($ch);

				$server_output = @json_decode($server_output, true);
				// dd($server_output);

				if (isset($server_output['result'])) {
					if (isset($server_output['result']) == 'success') {
						if (isset($server_output['userid'])) {
							if (isset($server_output['passwordhash'])) {
								// $try_to_find_user = \User::firstOrCreate(['email' => $creds['email']]);
								$user = \App\User::firstOrNew([
									'email' => $creds['email']
								]);
								// $user->name= $data['full_name'];
								$user->password = \Hash::make($creds['password']);
								$user->save();

								$is_auth = $this->guard()->attempt($this->credentials($request));
							}
						}
					}
				}
			}
		}

		if (! $is_auth) {
			$is_auth = $this->guard()->attempt($this->credentials($request));
		}

		return $is_auth;
	}

	protected function sendLoginResponse(Request $request)
	{
		$request->session()->regenerate();

		$this->clearLoginAttempts($request);

		//
		$is_auth = $this->authenticated($request, $this->guard()
			->user());

		$redir = $is_auth ?: redirect()->intended($this->redirectPath());

		return $redir;
	}

	//
	// protected function sendLoginResponse(Request $request)
	// {
	// $request->session()->regenerate();
	//
	// $this->clearLoginAttempts($request);
	//
	// //http://members.microweber.com/_sync/check_pass_mwlogin/?email=peter@microweber.com&password=1234
	//
	// return $this->authenticated($request, $this->guard()->user())
	// ?: redirect()->intended($this->redirectPath());
	// }

	/**
	 * Get the login username to be used by the controller.
	 *
	 * @return string
	 */
	public function username()
	{
		return 'login';
	}
}
