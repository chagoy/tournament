<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.0/css/bulma.min.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        @include ('layouts.nav')

        @yield('content')
    </div>
        @yield('footer')    
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.0/axios.min.js">
    </script>
    <script> 
            @if ( isset($boxer))
            if (window.location.pathname == '/tournament/create/store/') {
                var boxers = <?php echo json_encode($boxer); ?>;
            }
            @endif
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
