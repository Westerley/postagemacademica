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

                <div class="capa-perfil" style="background-image: url('/image/profile/cape/cape-id-{{ Auth::user()->id }}.jpg')">
                    <a class="modal-trigger" href="#modal-cape">
                        <i class="fa fa-camera fa-3x"> </i>
                    </a>
                </div>

                <div id="modal-cape" class="modal">
                    <form method="POST" action="{{ url('/profile/update-cape') }}" enctype="multipart/form-data">

                        {!! csrf_field() !!}

                        <input type="hidden" name="profile_id" value="{{ Auth::user()->id }}">

                        <div class="modal-content center">
                            <h4>Trocar Capa</h4>
                            <div class="file-field input-field">
                                <div class="btn">
                                    <i class="fa fa-camera"> </i>
                                    <input type="file" id="uploadCape" name="cape" title="Escolher Imagem" required>
                                </div>
                            </div>
                            <br><br><br>
                            <div id="previewCape"> </div>
                        </div>

                        <div class="modal-footer">
                            <button class="modal-action modal-close waves-effect waves-green btn-flat" type="submit" style="margin-bottom: 1%"> Alterar </button>
                            <button class="modal-action modal-close waves-effect waves-green btn-flat" type="reset" style="margin-bottom: 1%"> Cancelar </button>
                        </div>
                    </form>
                </div>

                <div class="container icone">
                    <div class="row">
                        <div class="col s12 m12 l3">
                            <a class="modal-trigger upload" href="#modal-image"> <img src="/image/profile/user/user-id-{{ Auth::user()->id }}.jpg" class="responsive-img" id="img-perfil"> <i class="fa fa-camera fa-3x"> </i> </a>
                        </div>
                        <div id="modal-image" class="modal">
                            <form method="POST" action="{{ url('/profile/update-image') }}" enctype="multipart/form-data">

                                {!! csrf_field() !!}

                                <input type="hidden" name="profile_id" value="{{ Auth::user()->id }}">

                                <div class="modal-content center">
                                    <h4>Trocar Capa</h4>
                                    <div class="file-field input-field">
                                        <div class="btn">
                                            <i class="fa fa-camera"> </i>
                                            <input type="file" id="uploadImage" name="image" title="Escolher Imagem" required>
                                        </div>
                                    </div>
                                    <br><br><br>
                                    <div id="previewImage"> </div>
                                </div>

                                <div class="modal-footer">
                                    <button class="modal-action modal-close waves-effect waves-green btn-flat" type="submit" style="margin-bottom: 1%"> Alterar </button>
                                    <button class="modal-action modal-close waves-effect waves-green btn-flat" type="reset" style="margin-bottom: 1%"> Cancelar </button>
                                </div>
                            </form>
                        </div>
                        <div class="col s12 m12 l9 profile-menu hide-on-med-and-down">
                            <ul class="N/A transparent">
                                <li> <a class="menu" href="{{ url('/timeline') }}"> POSTS </a> </li>
                                <li> <a class="menu" href="{{ url('/courses/'. Auth::user()->id ) }}"> DISCIPLINAS </a> </li>
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

        $('.modal-trigger').leanModal({
            dismissible: true, // Modal can be dismissed by clicking outside of the modal
            opacity: .5, // Opacity of modal background
            in_duration: 300, // Transition in duration
            out_duration: 200, // Transition out duration
        });

        $("#uploadCape").on('change', function () {

            if (typeof (FileReader) != "undefined") {

                var previewCape = $("#previewCape");
                previewCape.empty();

                var reader = new FileReader();
                reader.onload = function (e) {
                    $("<img />", {
                        "src": e.target.result,
                        "class": "responsive-img",
                        "height": "15em",
                        "width": "17em"
                    }).appendTo(previewCape);
                }
                previewCape.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else{
                alert("Este navegador nao suporta FileReader.");
            }
        });

        $("#uploadImage").on('change', function () {

            if (typeof (FileReader) != "undefined") {

                var previewImage = $("#previewImage");
                previewImage.empty();

                var reader = new FileReader();
                reader.onload = function (e) {
                    $("<img />", {
                        "src": e.target.result,
                        "class": "responsive-img",
                        "height": "15em",
                        "width": "17em"
                    }).appendTo(previewImage);
                }
                previewImage.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else{
                alert("Este navegador nao suporta FileReader.");
            }
        });
    });
    $(document).ready(function(){
        $('.tooltipped').tooltip({delay: 50});
    });
</script>
