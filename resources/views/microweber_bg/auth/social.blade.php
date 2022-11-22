<div style="margin-bottom: 20px">
    @if (in_array('google', config('authv.socialite')) && !empty(env('GOOGLE_CLIENT_ID')))
    <a href="{{ url('/oauth2/google') }}">
        <img src="{{asset('skins/microweber_bg/google-login.png')}}" style="width: 250px" />
    </a>
@endif
</div>
