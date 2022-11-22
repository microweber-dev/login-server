@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        My Profile
                    </div>
                    <div class="card-body">

                        <h4>
                            Welcome {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}!
                        </h4>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
