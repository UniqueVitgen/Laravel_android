<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('sass/app.scss') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        {{--<link rel="stylesheet" href="assets/sass/app.scss">--}}
        <style>
        </style><!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">

        <!-- Optional theme -->
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap-theme.css') }}" >

        <!-- Latest compiled and minified JavaScript -->
    </head>
    <body>
    @if(Auth::guest())
        @include('navigation.guest');
    @else
        @include('navigation.auth');
    @endif
    <div class="main">
        <div class="container">
            <div class="content">@yield('content')</div>
        </div>
    </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="{{  asset('bootstrap/js/bootstrap.js') }}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
    </body>
</html>
