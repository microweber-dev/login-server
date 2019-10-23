@extends('layouts.minimal')

@section('content')
<link rel="stylesheet" type="text/css" href="/css/mw.new.css">

     <h2>Log In</h2>
	
     <div class="sign-in-top">
         New to Microweber?        <a href="{{ url('/register') }}" class="cbtn cbtn-alt ">Sign Up </a>
     </div>


     <br><br>
    <div class="sign-grid-holder">
    <div class="sign-grid">
    <div class="sign-grid-col">

  <form class="form-vertical" role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}
    <div class="login-card mdl-card mdl-shadow--2dp">
      <div class="mdl-card__supporting-text" style="text-align: left">

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label{{ $errors->has('login') ? ' is-invalid' : '' }}">
          <input class="mdl-textfield__input" type="text" id="login" name="login" value="{{ old('login') }}" autofocus />
          <label class="mdl-textfield__label" for="login">{{ trans('label.login') }}</label>
          @if ($errors->has('login'))
          <span class="mdl-textfield__error">{{ $errors->first('login') }}</span>
          @endif
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label{{ $errors->has('password') ? ' is-invalid' : '' }}">
          <input class="mdl-textfield__input" type="password" id="password" name="password" value="{{ old('password') }}" />
          <label class="mdl-textfield__label" for="password">{{ trans('label.password') }}</label>
          @if ($errors->has('password'))
          <span class="mdl-textfield__error">{{ $errors->first('password') }}</span>
          @endif
        </div>

        <?php /*<div class="mdl-field">
          <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="remember">
            <input id="remember" type="checkbox" name="remember" class="mdl-switch__input" checked>
            <span class="mdl-switch__label">Remember Me</span>
          </label>
        </div>*/ ?>

        <label class="check pull-left" style="display: inline-block">
            <input id="remember" type="checkbox" name="remember" class="mdl-switch__input" checked>
            <i></i>
             <span class="check-label">Remember Me</span>
        </label>

        <a href="{{ url('/password/reset') }}" class="xlink pull-right">
          Forgot Password?
        </a>

      </div>
      <div class="mdl-card__actions" style="text-align: left">
        <?php /*<button type="submit" class="mdl-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-js-button mdl-js-ripple-effect">
          {{ trans('button.login') }}
        </button>*/ ?>
        <button type="submit" class="cbtn cbtn-submit">
          {{ trans('button.login') }}
        </button>

      </div>
    </div>
  </form>
 </div>
 <div class="sign-grid-col sign-grid-col-right" >
<div class="idp-list-small">
    @include('auth.social')
</div>
</div>
</div>
</div>

<?php /*<a href="{{ url('/register') }}" class="mdl-button mdl-js-button mdl-js-ripple-effect">
  New user? <span class="mdl-button--accent">Create account</span>
  </a>*/ ?>
  @endsection
