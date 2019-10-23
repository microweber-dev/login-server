@extends('layouts.minimal')

@section('content')


<link rel="stylesheet" type="text/css" href="/css/mw.new.css">




     <h2>Sign Up</h2>


     <div class="sign-in-top">
         Have an account?                   <a href="{{ url('/login') }}" class="cbtn cbtn-alt ">Log In</a>
     </div>


     <br><br>

    <div class="sign-grid-holder">
        <div class="sign-grid">
            <div class="sign-grid-col">
               <form class="form-vertical" role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}
                <div class="register-card mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__supporting-text">

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label{{ $errors->has('name') ? ' is-invalid' : '' }}">
                            <input class="mdl-textfield__input" type="text" id="name" name="name" value="{{ old('name') }}" autofocus />
                            <label class="mdl-textfield__label" for="name">{{ trans('label.name') }}</label>
                            @if ($errors->has('name'))
                            <span class="mdl-textfield__error">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label{{ $errors->has('username') ? ' is-invalid' : '' }}">
                            <input class="mdl-textfield__input" type="text" id="username" name="username" value="{{ old('username') }}" />
                            <label class="mdl-textfield__label" for="username">{{ trans('label.username') }}</label>
                            @if ($errors->has('username'))
                            <span class="mdl-textfield__error">{{ $errors->first('username') }}</span>
                            @endif
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label{{ $errors->has('email') ? ' is-invalid' : '' }}">
                            <input class="mdl-textfield__input" type="email" id="email" name="email" value="{{ old('email') }}" />
                            <label class="mdl-textfield__label" for="email">{{ trans('label.email') }}</label>
                            @if ($errors->has('email'))
                            <span class="mdl-textfield__error">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label{{ $errors->has('password') ? ' is-invalid' : '' }}">
                            <input class="mdl-textfield__input" type="password" id="password" name="password" value="{{ old('password') }}" />
                            <label class="mdl-textfield__label" for="password">{{ trans('label.password') }}</label>
                            @if ($errors->has('password'))
                            <span class="mdl-textfield__error">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        {!! Authv::immigrationFields() !!}

                        <div class="mdl-card__actions" style="text-align: left">
                            <button type="submit" class="cbtn cbtn-submit">
                                Sign up
                            </button>
                        </div>
                        </div>
                        </div>

                    </form>

            </div>
            <div class="sign-grid-col">
                Sign up with social account
                <br><br>
               @include('auth.social')
            </div>
        </div>
        <small class="agree">
            * By signing up, you agree to our Terms of Use, Privacy Policy <br>
and to receive Microweber emails, newsletters & updates.
        </small>

    </div>




@endsection
