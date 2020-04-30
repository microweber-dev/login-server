@extends('layouts.minimal')

<!-- Main Content -->
@section('content')
    @if (session('status'))
        <show-snackbar message="{{ session('status') }}" timeout="10000"></show-snackbar>
    @endif
    <link rel="stylesheet" type="text/css" href="/css/mw.new.css">

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

                <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                    <label class="control-label" for="email">{{ trans('label.email') }}</label>
                    <input class="form-control @if ($errors->has('email')) is-invalid @endif" type="email" id="email" name="email" value="{{ old('email') }}" autofocus/>

                    @if ($errors->has('email'))
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <div class="form-group" style="height: 140px;">
                    <div style="width:350px;float:left;">@captcha</div>
                    <input type="text" id="captcha" name="captcha" class="form-control @if ($errors->has('captcha')) is-invalid @endif" style="max-width: 250px;height:55px;float:left;" autocomplete="off">
                    @if ($errors->has('captcha'))
                        <div class="invalid-feedback">{{ $errors->first('captcha') }}</div>
                    @endif
                 </div>

                <div class="my-4">
                    <button type="submit" class="btn btn-primary">{{ trans('button.send_password_reset') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
