<!Doctype html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link type="text/css" href="/css/style.css" rel="stylesheet" media="screen,projection">
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    </head>

    <body>

        {!! MaterializeCSS::include_full() !!}

        @include('include.menu')

        <main class="container">

            <header class="row">

                <div class="capa-perfil" style="background-image: url('/image/profile/cape/capa.jpg');"> </div>

                <div class="container icone">
                    <div class="row">
                        <div class="col s12 m12 l3">
                            <img src="/image/profile/user/sem_foto.png" class="responsive-img" id="img-perfil">
                        </div>
                        <div class="col s12 m12 l9 profile-menu hide-on-med-and-down">
                            <ul class="N/A transparent">
                                <li> <a class="menu" href="{{ url('/timeline') }}"> POSTS </a> </li>
                                <li> <a class="menu" href="{{ url('/courses') }}"> DISCIPLINAS </a> </li>
                                <li> <a class="menu" href="{{ url('/post') }}"> POSTAR </a> </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </header>

            <div class="row white" style="margin-top: -2%;">

                <span class="hide-on-med-and-down">
                    <br> <br>

                    <hr>

                    <br>
                </span>

                @yield('content')

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