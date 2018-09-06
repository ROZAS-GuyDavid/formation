<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Post</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
    </head>
    <body class="d-flex flex-column" style="min-height: 100vh;">
        <div class="flex-grow-1 d-flex flex-column">
            <div class="row">
                <div class="col-md-12">
                    @include('partials.menu-header')
                </div>
            </div>
            <div class="row flex-grow-1">
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </div>
        <footer  class="" style="height: 5%;">
            <div class="row">
                <div class="col-md-12">
                    @include('partials.menu-footer')
                </div>
            </div>
        </footer>
        @section('scripts')
        <script src="{{asset('js/app.js')}}"></script>
        @include('flashy::message')
    </body>
</html>