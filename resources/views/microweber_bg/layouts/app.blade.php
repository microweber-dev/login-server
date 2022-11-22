@extends('layouts.skeleton')

@section('body')

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white" style="border-bottom: 4px solid #eaeaea;" >
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h5 class="my-0 mr-md-auto font-weight-normal">
                        <a href="{{ url('/') }}">
                          <span class="brand-title" title="{{ config('app.name', 'Authv') }}">
                              <img style="width: 230px;margin-top: 10px;" src="{{ asset('skins/microweber_bg/logo.png') }}"/>
                          </span>
                        </a>
                    </h5>
                </div>
                <div class="col-md-5">
                    <nav class="my-2 my-md-0 mr-md-3 pt-3">
                        <a class="p-2 text-dark" href="{{url('/')}}">{{__('Home')}}</a>
                        <a class="p-2 text-dark" href="{{env('EXTERNAL_LOGIN_WHMCS_URL')}}/clientarea.php?action=services">{{__('My Websites')}}</a>
                        <a class="p-2 text-dark" href="{{env('EXTERNAL_LOGIN_WHMCS_URL')}}/clientarea.php">{{__('Members Area')}}</a>
                    </nav>
                </div>

                <div class="col-md-2">
                    <div>
                        <nav>
                            @if (Auth::guest())
                                <a class="mdl-navigation__link mdl-typography--text-uppercase" href="{{ url('/login') }}">{{__('Login')}}</a>
                                <a class="mdl-navigation__link mdl-typography--text-uppercase"
                                   href="{{ url('/register') }}">{{__('Register')}}</a>
                            @endif
                        </nav>
                    </div>
                    @if (Auth::user())
                        <button class="btn btn-primary mdl-js-ripple-effect mt-2" id="more-button">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
                            <a href="/my-profile">
                                <li class="mdl-menu__item">
                                    {{__('My Profile')}}
                                </li>
                            </a>
                            <a href="/change-password">
                                <li class="mdl-menu__item">
                                    {{__('Change Password')}}
                                </li>
                            </a>
                            <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <li class="mdl-menu__item">
                                    {{__('Logout')}}
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </a>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @yield('content')

@endsection
