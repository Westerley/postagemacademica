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

            <div class="row">

                <div class="capa-perfil"> </div>

                <div class="container icone">
                    <div class="row">
                        <div class="col s12 m12 l3">
                            <img src="/image/profile/user/sem_foto.png" class="responsive-img" id="img-perfil">
                        </div>
                        <div class="col s12 m12 l9 profile-menu">
                            <ul class="tabs N/A transparent">
                                <li class="tab col s2 l3"> <a class="active" href="#timeline"> Posts realizados </a> </li>
                                <li class="tab col s2 l3"> <a href="#profile"> Perfil </a> </li>
                                <li class="tab col s2 l3"> <a href="#post"> Cadastrar Post </a> </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row white" style="margin-top: -2%;">

                <br> <br>

                <hr>

                <br>

                <div id="timeline" class="col s12">

                    @include('profile.timeline')

                </div>

                <div id="profile" class="col s8 offset-s2">

                    @include('profile.profile')

                </div>

                <div id="post" class="col s8 offset-s2">

                    @include('profile.post')

                </div>

            </div>

        </div>

        @include('include.footer')

    </body>

</html>

<script>
    $(document).ready(function() {
        $('select').material_select();
    });
</script>