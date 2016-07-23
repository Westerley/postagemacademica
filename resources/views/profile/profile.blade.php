@extends('layouts.profile')

@section('content')

    <form action="{{ url('/profile/edit/'.$profile->id) }}"  method="POST"  enctype="multipart/form-data" class="col s10 m8 l8 offset-s1 offset-m2 offset-l2">

        {!! csrf_field() !!}

        <h5 class="center"> Alterar Perfil </h5>

        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input id="name" name="name" type="text" disabled required class="validate" value="{{ Auth::user()->name }}">
                <label for="name">Nome</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m8 l8">
                <i class="material-icons prefix">location_on</i>
                <input id="street" name="street" type="text" required class="validate" value="{{ $profile->street }}">
                <label for="street">Rua</label>
            </div>
            <div class="input-field col s12 m4 l4">
                <i class="material-icons prefix">my_location</i>
                <input id="number" name="number" type="text" required class="validate" value="{{ $profile->number }}">
                <label for="number">Número</label>
            </div>
        </div>

        <div class="row">
            <div class="col s4">
                <label>Sexo</label>
                <p>
                    <input name="genre" value="M" type="radio" id="male" @if($profile->genre == 'M') checked @endif/>
                    <label for="male">Masculino</label>
                </p>
                <p>
                    <input name="genre" value="F" type="radio" id="female" @if($profile->genre == 'F') checked @endif/>
                    <label for="female">Feminino</label>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m4">
                <select name="occupation">
                    <option value="1" disabled selected> Profissão </option>
                    <option value="1" @if($profile->id_occupation == 1) selected @endif> Estudante </option>
                    <option value="2"  @if($profile->id_occupation == 2) selected @endif> Professor</option>
                </select>
            </div>
            <div class="input-field col s12 m4">
                <i class="material-icons prefix">phone</i>
                <input id="telephone" type="tel" name="telephone" required class="validate" value="{{ $profile->telephone }}">
                <label for="telephone">Telefone</label>
            </div>
            <div class="input-field col s12 m4">
                <i class="material-icons prefix">stay_primary_portrait</i>
                <input id="cellphone" type="tel" name="cellphone" required class="validate" value="{{ $profile->cellphone }}">
                <label for="cellphone">Celular</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">mode_edit</i>
                <textarea id="icon_prefix2" name="about" class="materialize-textarea">{{ $profile->about }}</textarea>
                <label for="icon_prefix2">Sobre mim</label>
            </div>
        </div>

        <div class="center">
            <button class="btn waves-effect waves-light" type="reset" style="margin-bottom: 1%"> Cancelar </button>
            <button class="btn waves-effect waves-light" type="submit" style="margin-bottom: 1%">Alterar
                <i class="material-icons right">send</i>
            </button>
        </div>

    </form>

    <br>

@endsection