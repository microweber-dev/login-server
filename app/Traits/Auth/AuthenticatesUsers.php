<?php
namespace App\Traits\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers as Authenticates;
use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Validator;

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

    public function refreshCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }

	/**
	 * Attempt to log the user into the application.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return bool
	 */
	protected function attemptLogin(Request $request)
	{

        $validator = Validator::make(
            $request->all(),
            [
                'g-recaptcha-response' => 'required|captcha'
            ]
        );

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

		$is_auth = $this->guard()->attempt($this->credentials($request));

		if (! $is_auth) {
			$creds = $this->credentials($request);

			if (isset($creds['email']) && isset($creds['password']) && !empty(env('EXTERNAL_LOGIN_WHMCS_URL'))) {

				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, env('EXTERNAL_LOGIN_WHMCS_URL') . '/index.php?m=microweber_addon&function=validate_login');
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS,
					http_build_query(
						array(
							'username' => $creds['email'],
							'password' => $creds['password']
						)
					)
				);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				$server_output = curl_exec($ch);
				curl_close($ch);

				$server_output = @json_decode($server_output, true);

				if (isset($server_output['result'])) {
					if ($server_output['result'] == 'success') {

						$user = \App\User::firstOrNew([
							'email' => $creds['email']
						]);
						$user->password = \Hash::make($creds['password']);
						$user->save();

						$is_auth = $this->guard()->attempt($this->credentials($request));
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
}
