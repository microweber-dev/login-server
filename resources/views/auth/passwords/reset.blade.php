@extends('layouts.minimal')

@section('content')

    <div class="container text-center">
        <div class="login-holder">

            <form class="form-vertical" role="form" method="POST" action="{{ url('/password/reset') }}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">

                <h2>Reset password</h2>
                <br/>
                <br/>

                <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                    <label class="control-label" for="email">{{ trans('label.email') }}</label>

                    <input class="form-control @if ($errors->has('email')) is-invalid @endif" type="email" id="email" name="email" value="{{ $email or old('email') }}" autofocus/>
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div
                    @endif
                </div>

                <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                    <label class="control-label" for="password">{{ trans('label.password') }}</label>

                    <input class="form-control @if ($errors->has('password')) is-invalid @endif" type="password" id="password" name="password"/>
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                    <label class="control-label" for="password">{{ trans('label.password_confirmation') }}</label>

                    <input class="form-control @if ($errors->has('password_confirmation')) is-invalid @endif" type="password" id="password-confirm" name="password_confirmation"/>
                    @if ($errors->has('password_confirmation'))
                        <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
                    @endif
                </div>

                <div class="my-4">
                    <button type="submit" class="btn btn-primary">
                        {{ trans('button.reset_password') }}
                    </button>
                </div>


            </form>

        </div>
    </div>
@endsection
