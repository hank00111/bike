<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=1200">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'project') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <script src="../js/jquery.easing.js"></script> 
    <script src="../js/jquery.sub.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/comm3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/subtest.css') }}" rel="stylesheet">

</head>
<body>
    <!--@include('layouts.menu')-->
    <div id="app">
        
        @include('layouts.navtest')
        

        <main>

            <div class="container">

                <div class="main_1">
                    @yield('content')
                </div>

            </div>

        </main>
 
    </div>

    <div class="jumbotron text-center" style="margin-bottom:0;padding:3rem 2rem">
        <p style="color:#fff">©2018 Project HANK</p>
    </div>

</body>
</html>
