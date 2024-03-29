<?php

namespace App\Http\Controllers\Auth;

use App;
use App\Http\Controllers\Controller;
use App\Models\OAuth;
use Auth;
use Illuminate\Http\Request;
use Socialite;

class SocialiteController extends Controller
{
    /**
     * Redirect the user to the Provider's authentication page.
     *
     * @return Response
     */
    public function redirectTo(Request $request, $providerName)
    {
        return Socialite::driver($providerName)->redirect();
    }

    /**
     * Obtain the user information from Provider.
     *
     * @return Response
     */
    public function handleCallback(Request $request, $providerName)
    {
        $provider = OAuth\Provider::where('name', $providerName)->first();
        if (!$provider) {
            $provider = OAuth\Provider::firstOrCreate([
                'name' => $providerName
            ]);
        }

        $puser = Socialite::driver($providerName)->user();


        $ouser = $provider->users()->where('id', $puser->getId())->first();
        if ($ouser == null) {

            $ouser = $this->create($provider->id, $puser);
        }
        $existingUser = true;

        if ($ouser->user_id) {

            $user = App\User::where('id', $ouser->user_id)->first();
            Auth::login($user, true);
            $request->session()->put('oauth_user_id', $ouser->id);


          Auth::loginUsingId($ouser->user_id, true);
          Auth::login($user, true);
         Auth::login($user, true);

        } else {
            if ($ouser->email) {
                $user = App\User::where('email', $ouser->email)->first();
                if ($user == null) {
                    $data = ['email' => $ouser->email];
                    if ($ouser->name) {
                        $data['name'] = $ouser->name;
                    }
                    $user = App\User::create($data);
                    $existingUser = false;
                }
                $ouser->user_id = $user->id;
                $ouser->save();
                Auth::login($user, true);
            } else {
                $request->session()->put('oauth_user_id', $ouser->id);
                $existingUser = false;
            }
        }
        if ($existingUser) {
            return $this->redirectAfterLogin($request);
        } else {
            return redirect()->route('complete-profile');
        }
    }

    public function redirectAfterLogin($request)
    {
        // tyka bug s login redirect  pecata

        $sess = $request->session()->all();
        if (isset($sess['_token'])) {
             if (isset($sess['url']) and isset($sess['url']['intended'])) {
                return redirect($sess['url']['intended']);

            }
        }


        return redirect('/');
    }

    protected function create($providerId, $puser)
    {
        $ouser = new OAuth\User();
        $ouser->provider_id = $providerId;

        $ouser->id = $puser->getId();
        $ouser->name = $puser->getName();
        $ouser->nickname = $puser->getNickname();
        $ouser->email = $puser->getEmail();
        $ouser->avatar = $puser->getAvatar();

        $ouser->token = $puser->token;
        if (isset($puser->tokenSecret)) {
            $ouser->token_secret = $puser->tokenSecret;
        } else {
            $ouser->refresh_token = $puser->refreshToken;
            $ouser->expires_in = $puser->expiresIn;
        }

        $ouser->save();

        return $ouser;
    }
}
