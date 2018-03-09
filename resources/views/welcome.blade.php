<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token ()}}">
        <title>Laravel</title>
    </head>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
        <link href="cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">



        <!-- Styles -->

    <body>
        <div class="contanier" id="app">
            <tasks></tasks>
        </div>
    </body>
    {{--  <script type="text/javascript" scr="assets/js/app.js"></script>  --}}
    <script src="{{ mix('js/app.js') }}"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js">
    </script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"> </script>
  

</html>
