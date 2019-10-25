@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
<script>



    if (typeof(window.opener) !== "undefined" && this.name == 'SocialLoginWindow' ){
     //   window.opener.location.href='https://members.microweber.com/login_redirect.php?quiet=1&return_to=https://microweber.com/';


//        window.onbeforeunload = function(){
//            window.location.href = window.opener.location.href;
//        }
        window.opener.location.reload();
        this.close();
      //  self.close();

    } else {
      //  window.location.href='https://members.microweber.com/login_redirect.php?quiet=1&return_to=https://microweber.com/';

    }


</script>

                <div id="app">
                <passport-clients></passport-clients>
                <passport-authorized-clients></passport-authorized-clients>
                <passport-personal-access-tokens></passport-personal-access-tokens>
                    </div>
                <div class="panel-body">


                    <style>
                        .login-card-event.mdl-card {
                            width: auto;
                            height: auto;
                            background: #777777;
                        }
                        .login-card-event > .mdl-card__actions {
                            border-color: rgba(255, 255, 255, 0.2);
                        }
                        .login-card-event > .mdl-card__title {
                            align-items: flex-start;
                        }
                        .login-card-event > .mdl-card__title > h4 {
                            margin-top: 0;
                        }
                        .login-card-event > .mdl-card__actions {
                            display: flex;
                            box-sizing:border-box;
                            align-items: center;
                        }
                        .login-card-event > .mdl-card__actions > .material-icons {
                            padding-right: 10px;
                        }
                        .login-card-event > .mdl-card__title,
                        .login-card-event > .mdl-card__actions,
                        .login-card-event > .mdl-card__actions > .mdl-button {
                            color: white;
                        }
                    </style>

                    <div class="login-card-event mdl-card mdl-shadow--2dp">
                        <div class="mdl-card__title mdl-card--expand">
                            <h4>
                                Welcome {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}},
                                <br>

                                You are logged in!
                                <br>

                            </h4>
                        </div>
                        <div class="mdl-card__actions mdl-card--border">

                            <a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" href="{{env('EXTERNAL_LOGIN_WHMCS_URL')}}" style="margin-right: 10px">Go to Website</a>
                            <a class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" href="{{env('EXTERNAL_LOGIN_WHMCS_URL')}}/clientarea.php">Go to Members Area</a>
                        </div>
                    </div>



                    <hr>

                    <a href="" class="mdl-button mdl-js-button mdl-button--raised" onclick="event.preventDefault(); document.getElementById('logout-form-main').submit();">
                        Logout
                    </a>
                    <form id="logout-form-main" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>



                </div>


            </div>
        </div>
    </div>
</div>

@endsection
