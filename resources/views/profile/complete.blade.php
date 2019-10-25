@extends('layouts.minimal')

@section('content')
    <link rel="stylesheet" type="text/css" href="/css/mw.new.css">

    <div class="container text-center">
        <div class="login-holder">
            <form class="form-vertical" role="form" method="POST" action="{{ route('complete-profile') }}">
                {{ csrf_field() }}

                <h2>{{ trans('all.one_more_step') }}</h2>

                <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                    <label class="control-label" for="name">{{ trans('label.name') }}</label>

                    <input class="form-control @if ($errors->has('name')) is-invalid @endif" type="text" id="name" name="name" value="{{ old('name') ? old('name') : $name }}" autofocus/>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('username') ? ' has-danger' : '' }}">
                    <label class="control-label" for="username">{{ trans('label.username') }}</label>

                    <input class="form-control @if ($errors->has('username')) is-invalid @endif" type="text" id="username" name="username" value="{{ old('username') ? old('username') : $username }}"/>
                    @if ($errors->has('username'))
                        <div class="invalid-feedback">{{ $errors->first('username') }}</div>
                    @endif
                </div>

                @if ($askEmail)
                    <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                        <label class="control-label" for="email">{{ trans('label.email') }}</label>

                        <input class="form-control @if ($errors->has('email')) is-invalid @endif" type="email" id="email" name="email" value="{{ old('email') }}"/>
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                @endif

                @if ($askPassword)
                    <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                        <label class="control-label" for="password">{{ trans('label.password') }}</label>

                        <input class="form-control @if ($errors->has('password')) is-invalid @endif" type="password" id="password" name="password"/>
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                @endif

                <div class="my-4">
                    <button type="submit" class="btn btn-primary">
                        {{  trans('button.register') }}
                    </button>
                </div>


            </form>
        </div>
    </div>
@endsection
