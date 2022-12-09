@extends('layouts.minimal')

@section('content')

    <div class="container text-center">
        <div class="login-holder">

            <h2>{{ trans('all.sign_up') }}</h2>

            <div class="my-4">
                <div class="socials" style="margin-top:20px;margin-bottom: 5px;">
                    @include('auth.social')

                    {{ trans('all.already_have_account') }} <a href="{{ url('/login') }}">{{ trans('all.login') }}</a>
                </div>
            </div>

            <form class="form-vertical" role="form" method="POST" action="{{ url('/register') }}">

                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                    <label class="control-label" for="name">{{ trans('label.name') }}</label>
                    <input class="form-control @if ($errors->has('name')) is-invalid @endif" type="text" id="name" name="name" value="{{ old('name') }}" autofocus/>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('username') ? ' has-danger' : '' }}">
                    <label class="control-label" for="username">{{ trans('label.username') }}</label>
                    <input class="form-control @if ($errors->has('username')) is-invalid @endif" type="text" id="username" name="username" value="{{ old('username') }}"/>
                    @if ($errors->has('username'))
                        <div class="invalid-feedback">{{ $errors->first('username') }}</div>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                    <label class="control-label" for="email">{{ trans('label.email') }}</label>
                    <input class="form-control @if ($errors->has('email')) is-invalid @endif" type="email" id="email" name="email" value="{{ old('email') }}"/>
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

                <div style="display: none;">
                    {!! Authv::immigrationFields() !!}
                </div>


                <div class="mt-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="terms" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{__('I agree with the')}} <a href="https://microweber.com/terms/" target="_blank">{{__('Terms and Conditions')}}</a>
                        </label>
                    </div>
                    @if ($errors->has('terms'))
                        <div class="text-danger">{{ $errors->first('terms') }}</div>
                    @endif
                </div>

                <div class="d-flex justify-content-center mt-3">
                    <div class="captcha">
                        <span>{!! app('captcha')->display() !!}</span>
                        <!-- <button type="button" class="btn btn-success refresh-cpatcha"><i class="fa fa-refresh"></i></button> -->
                    </div>

                    @if ($errors->has('g-recaptcha-response'))
                        <div class="text-danger">{{ $errors->first('g-recaptcha-response') }}</div>
                    @endif

                </div>

                <div class="my-4 mt-1">
                    <button type="submit" class="btn btn-primary">{{ trans('all.sign_up') }}</button>
                </div>

            </form>
        </div>

    </div>
@endsection
