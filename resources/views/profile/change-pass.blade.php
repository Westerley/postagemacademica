@extends('layouts.profile')

@section('content')

    <form method="POST" action="" enctype="multipart/form-data" class="col s10 m8 l8 offset-s1 offset-m2 offset-l2">

        <h5 class="center"> Alterar Senha </h5>

        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">spellcheck</i>
                <input id="titulo" name="titulo" type="text" class="validate" required>
                <label for="titulo">Título</label>
            </div>
        </div>

        <div class="center">
            <button class="btn waves-effect waves-light" type="reset" style="margin-bottom: 1%"> Cancelar </button>
            <button class="btn waves-effect waves-light" type="submit" style="margin-bottom: 1%"> Alterar </button>
        </div>

    </form>

    <br>

@endsection
