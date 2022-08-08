@extends('layouts.skeleton')

@section('body')
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal"
        <a href="{{ url('/') }}">
          <span class="brand-title" title="{{ config('app.name', 'Authv') }}">
            <img style="width: 50px" src="{{ config('authv.logo_url.desktop') }}"/> MWLogin.com - Microweber Login Server
          </span>
        </a>
    </h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#">Home</a>
        <a class="p-2 text-dark" href="#">My Websites</a>
        <a class="p-2 text-dark" href="#">Members Area</a>
    </nav>
    <!-- Example single danger button -->
    <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            My Profile
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
        </div>
    </div>
</div>







<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--no-drawer-button">
  <header class="brand-header mdl-layout__header">
    <div class="mdl-layout__header-row">
      @include('widgets.logo')
      <!-- Add spacer, to align navigation to the right in desktop -->
      <div class="mdl-layout-spacer"></div>
      <div class="brand-navigation-container">
        <nav class="brand-navigation mdl-navigation">
          @if (Auth::guest())
          <a class="mdl-navigation__link mdl-typography--text-uppercase" href="{{ url('/login') }}">Login</a>
          <a class="mdl-navigation__link mdl-typography--text-uppercase" href="{{ url('/register') }}">Register</a>
          @endif
        </nav>
      </div>
      @if (Auth::user())
      <button class="mdl-button mdl-js-button mdl-js-ripple-effect" id="more-button">
        {{ Auth::user()->name }}
      </button>
      <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
        <li class="mdl-menu__item">
          <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
          </a>
          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </li>
      </ul>
      @endif
    </div>
  </header>
  <div class="mdl-layout__content">
    <div class="mdl-grid">
      <div class="mdl-cell mdl-cell--1-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
      <div class="page-content mdl-cell mdl-cell--10-col">
        @yield('content')
      </div>
    </div>
  </div>
</div>



@endsection
