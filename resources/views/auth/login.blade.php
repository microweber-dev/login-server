@extends('layouts.minimal')

@section('content')

    <div class="container text-center">
        <div class="login-holder">
            <h2>{{ trans('all.login_title') }} </h2>

            <div class="my-4"><a href="{{ url('/register') }}" class="btn btn-outline-primary">{{ trans('all.sign_up_now') }}</a></div>

            <p>{!! trans('all.login_desc') !!}</p>
            <br>
            <form class="form-vertical" role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                    <label class="control-label" for="email">{{ trans('label.login') }}</label>
                    <input class="form-control @if ($errors->has('email')) is-invalid @endif" type="text" id="email" name="email" value="{{ old('email') }}" autofocus/>

                    @if ($errors->has('email'))
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                    <label class="control-label" for="password">{{ trans('label.password') }}</label>

                    <input class="form-control @if ($errors->has('password')) is-invalid @endif" type="password" id="password" name="password" value="{{ old('password') }}"/>

                    @if ($errors->has('password'))
                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                    @endif
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group text-left">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="remember" name="remember" checked="">
                                <label class="custom-control-label" for="remember">{{ trans('all.remember_me') }}</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 text-right">
                        <a href="{{ url('/password/reset') }}" class="btn btn-link">{{ trans('all.forgot_password') }}</a>
                    </div>
                </div>

                <div class="my-4">
                    <div class="captcha">
                        <span>{!! app('captcha')->display() !!}</span>
                        <!-- <button type="button" class="btn btn-success refresh-cpatcha"><i class="fa fa-refresh"></i></button> -->
                    </div>
                    @error('g-recaptcha-response')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="my-4">
                    <button type="submit" class="btn btn-primary">
                        {{ trans('button.login') }}
                    </button>
                </div>
            </form>
        </div>


        <div class="socials" style="margin-top:60px;">
            <p>{{ trans('all.connect_with_social') }}</p>
            @include('auth.social')
        </div>
    </div>
@endsection
