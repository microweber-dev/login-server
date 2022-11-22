<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AskToAuthorizeController extends Controller
{
    public function index(Request $request)
    {
        $clientId = $request->get('client_id');
        $redirectUri = $request->get('redirect_uri');
        $responseType = $request->get('response_type');

        $redirectDomain = '';
        $parseRedirect = parse_url($redirectUri);
        if (isset($parseRedirect['host'])) {
            $redirectDomain = $parseRedirect['host'];
        }

        $findClient = \Laravel\Passport\Client::where('id', $clientId)->first();
        if ($findClient) {
            if (!empty($findClient->locale)) {
                session()->put('site_lang', $findClient->locale);
            }
        }

        $logoutUrl = route('logout');
        $currentAccountLoginUrl = url('/') . '/oauth/authorize?client_id='.$clientId.'&redirect_uri='.$redirectUri.'&response_type='.$responseType;
        $anotherAccountLoginUrl = route('login').'?after_login='.base64_encode($currentAccountLoginUrl);

        $user = Auth::user();
        if ($user == null) {
            return redirect($anotherAccountLoginUrl);
        }

        return view('auth.ask-to-authorize',[
            'user'=>$user,
            'logoutUrl'=>$logoutUrl,
            'anotherAccountLoginUrl'=>$anotherAccountLoginUrl,
            'currentAccountLoginUrl'=>$currentAccountLoginUrl,
            'redirectDomain'=>$redirectDomain
        ]);
    }
}
