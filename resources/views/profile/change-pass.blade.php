@extends('layouts.profile')

@section('content')

    <form method="POST" action="{{ url('/profile/password/'.$user->id) }}" enctype="multipart/form-data" class="col s10 m8 l8 offset-s1 offset-m2 offset-l2">

        <h5 class="center"> Alterar Senha </h5>

        {!! csrf_field() !!}

        <div class="row">
            <div class="input-field col s10">
                <i class="material-icons prefix">lock</i>
                <input id="old-password" type="password" name="old-password" required class="validate">
                <label for="old-password">Senha Antiga</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s10">
                <i class="material-icons prefix">lock</i>
                <input id="password" type="password" name="password" required class="validate">
                <label for="password">Nova Senha</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s10">
                <i class="material-icons prefix">lock</i>
                <input id="password-confirm" name="password-confirm" type="password" required
                       class="validate">
                <label for="password-confirm">Confirmar Nova Senha</label>
            </div>
        </div>

        <div class="center">
            <button class="btn waves-effect waves-light" type="reset" style="margin-bottom: 1%"> Cancelar </button>
            <button class="btn waves-effect waves-light" type="submit" style="margin-bottom: 1%"> Alterar </button>
        </div>

    </form>

    <br>

@endsection
