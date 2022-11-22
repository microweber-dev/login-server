@extends('layouts.minimal')

@section('content')

    <style>
        .select-account {

        }
        .select-account li {
            color: #626262;
            cursor: pointer;
            padding-top: 22px;
            padding-bottom: 22px;
        }
        .select-account li:hover {
            background: #0303ff26;
            color:#000;
        }
        .select-account li a {
            color: #626262;
            font-size: 14px;
            font-weight: 500;
        }
        .select-account li a:hover {
            color:#000;
            text-decoration: none;
        }
        .first-letter-avatar {
            background: #0303ff;
            color: #fff;
            border-radius: 100%;
            text-align: center;
            font-size: 23px;
            width: 34px;
            height: 34px;
        }
    </style>
    <div class="container text-center">
        <div class="login-holder">
            <h2>{{ trans('all.login_title') }} </h2>
            <br />
            <h4>Choose an account</h4>
            <p>
                to continue to <span class="text-primary">{{$redirectDomain}}</span> </p>
            <br>

            <script>
                function useAnotherAccount()
                {
                    $.ajax({
                        type: "POST",
                        url: "{!! $logoutUrl !!}",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function (data) {
                            window.location.href = "{!! $anotherAccountLoginUrl !!}";
                        }
                    });
                }
                function loginWithCurrentAccount()
                {
                    window.location.href = "{!! $currentAccountLoginUrl !!}";
                }
            </script>

            <form class="form-vertical" role="form" method="POST" action="">
                {{ csrf_field() }}

                <div class="card" style="max-width: 500px;margin:0 auto;">
                    <ul class="list-group list-group-flush select-account"  style="text-align: left;">
                        <li class="list-group-item" onclick="loginWithCurrentAccount()">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                  <div class="first-letter-avatar">
                                      {{ ucfirst(mb_substr($user->email, 0,1)) }}
                                  </div>
                                </div>
                                <div class="flex-grow-1 ms-3 ml-3">
                                    <b>{{$user->name }}</b> <br />
                                   {{$user->email }}
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item" onclick="useAnotherAccount()">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <svg aria-hidden="true" class="stUf5b" fill="currentColor" focusable="false" width="34px" height="34px" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg"><path d="M12,2C6.48,2,2,6.48,2,12c0,5.52,4.48,10,10,10c5.52,0,10-4.48,10-10C22,6.48,17.52,2,12,2z M7.07,18.28 c0.43-0.9,3.05-1.78,4.93-1.78s4.51,0.88,4.93,1.78C15.57,19.36,13.86,20,12,20S8.43,19.36,7.07,18.28z M18.36,16.83 c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93,0.59-6.36,2.33C4.62,15.49,4,13.82,4,12c0-4.41,3.59-8,8-8c4.41,0,8,3.59,8,8 C20,13.82,19.38,15.49,18.36,16.83z"></path><path d="M12,6c-1.94,0-3.5,1.56-3.5,3.5S10.06,13,12,13c1.94,0,3.5-1.56,3.5-3.5S13.94,6,12,6z M12,11c-0.83,0-1.5-0.67-1.5-1.5 C10.5,8.67,11.17,8,12,8c0.83,0,1.5,0.67,1.5,1.5C13.5,10.33,12.83,11,12,11z"></path></svg>
                                </div>
                                <div class="flex-grow-1 ms-3 ml-3">
                                    <b>Use another account</b> <br />
                                    Login into another account
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <br />
                <br />
                <p>
                    To continue, <b>MwLogin</b> will share your name, email address, language preference, and profile picture with <b>{{$redirectDomain}}</b>.
                </p>
            </form>
        </div>

    </div>
@endsection
