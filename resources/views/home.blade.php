<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="padding:20px">

            <h4>
                Welcome {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}},
                <br>

                You are logged in!
                <br />
                <br />

            </h4>

            <a class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition mt-2 mr-2" href="{{env('EXTERNAL_LOGIN_WHMCS_URL')}}" style="margin-right: 10px">Go to Website</a>
            <a class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition mt-2 mr-2" href="{{env('EXTERNAL_LOGIN_WHMCS_URL')}}/clientarea.php">Go to Members Area</a>

                <br />
                <br />

            <hr>

            <a href="" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition mt-2 mr-2"
               onclick="event.preventDefault(); document.getElementById('logout-form-main').submit();">
                Logout
            </a>

            <form id="logout-form-main" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>


            </div>
        </div>
    </div>

</x-app-layout>
