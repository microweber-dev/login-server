@extends('layouts.minimal')

<!-- Main Content -->
@section('content')

    <style>
        .is-invalid {
            border-color: red !important;
        }
    </style>

    <div class="container text-center">

        <div class="login-holder">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}

                <h2>{{ trans('all.reset_password') }}</h2>

                <div class="my-4">&nbsp;</div>

                @if (session('status'))
                    <div class="alert alert-info">{{ session('status') }}</div>
                @endif

                <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                    <label class="control-label" for="email">{{ trans('label.email') }}</label>
                    <input class="form-control @if ($errors->has('email')) is-invalid @endif" type="email" id="email" name="email" value="{{ old('email') }}" autofocus/>

                    @if ($errors->has('email'))
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <div class="my-4">
                    <div class="captcha">
                        <span>{!! app('captcha')->display() !!}</span>
                        <!-- <button type="button" class="btn btn-success refresh-cpatcha"><i class="fa fa-refresh"></i></button> -->
                    </div>

                    @if ($errors->has('g-recaptcha-response'))
                        <div class="text-danger">{{ $errors->first('g-recaptcha-response') }}</div>
                    @endif

                </div>

                <div class="my-4">
                    <button type="submit" class="btn btn-primary">{{ trans('button.send_password_reset') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
