<!Doctype html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/icon?family=Material+Icons" >
        <link rel="stylesheet" type="text/css" href="/css/style.css" media="screen,projection">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    </head>

    <body>

        {!! MaterializeCSS::include_full() !!}

        @include('include.menu')

        <main>

            <div class="container">

                <div class="row white">

                    @yield('content')

                </div>

            </div>

        </main>

        @include('include.footer')

    </body>

</html>

<script>
    $(document).ready(function() {
        $('select').material_select();
    });
</script>