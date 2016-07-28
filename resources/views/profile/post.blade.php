@extends('layouts.profile')

@section('content')

    <form method="POST" action="{{ url('post') }}" enctype="multipart/form-data" class="col s10 m8 l8 offset-s1 offset-m2 offset-l2">

        <h5 class="center">Cadastrar Post</h5>

        {!! csrf_field() !!}

        <input name="id_profile" type="hidden" value="{{ Auth::user()->id }}">

        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">spellcheck</i>
                <input id="title" name="title" type="text" class="validate" required>
                <label for="title"> Título </label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">mode_edit</i>
                <textarea id="content" name="content" class="materialize-textarea" length="250" required> </textarea>
                <label for="content">Conteúdo</label>
            </div>
        </div>

        <div class="row">
            <div class="file-field input-field col s12 l6">
                <div class="btn waves-effect waves-light #80cbc4 teal lighten-3">
                    <span>Arquivo</span>
                    <input type="file" name="file" required>
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <div class="input-field col s12 l6 ">
                <select name="course">
                    <option value="1" disabled selected> Disciplina </option>
                    <option value="1"> Programação II </option>
                    <option value="2"> Programação OO </option>
                    <option value="3"> Programação Comercial </option>
                    <option value="4"> Comércio Eletrônico </option>
                </select>
            </div>
        </div>

        <div class="center">
            <button class="btn waves-effect waves-light" type="reset" style="margin-bottom: 1%"> Cancelar </button>
            <button class="btn waves-effect waves-light" type="submit" style="margin-bottom: 1%"> Cadastrar </button>
        </div>

    </form>

    <br>

@endsection