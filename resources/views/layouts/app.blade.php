<!Doctype html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link type="text/css" href="/css/icon.css" rel="stylesheet" media="screen,projection">
        <link type="text/css" href="/css/style.css" rel="stylesheet" media="screen,projection">
    </head>

    <body>

        {!! MaterializeCSS::include_full() !!}

        @include('include.menu')

        <div class="container">

            <div class="row white">

                @yield('content')

            </div>

        </div>

        @include('include.footer')

    </body>

</html>