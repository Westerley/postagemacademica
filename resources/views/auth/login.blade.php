@extends('layouts.app')

@section('content')

    <br> <br> <br>

    <div class="container col s12 l6">

        <div class="card-panel center">

            <div class="row">

                <h5> Se ainda nao é cadastrado. Cadastra-se! </h5>

                <form method="POST" action="{{ url('/register') }}">

                    {{ csrf_field() }}

                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="name" name="name" type="text" required class="validate"
                                   value="{{ old('name') }}">
                            <label for="name">Nome</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">mail</i>
                            <input id="email" name="email" type="email" required class="validate"
                                   value="{{ old('email') }}">
                            <label for="email">Email</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <input id="password" type="password" name="password" required class="validate">
                            <label for="password">Senha</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <input id="password-confirm" name="password_confirmation" type="password" required
                                   class="validate">
                            <label for="password-confirm">Confirmar Senha</label>
                        </div>
                    </div>

                    <button class="btn waves-effect waves-light" type="submit">Cadastrar
                        <i class="material-icons right">send</i>
                    </button>

                </form>

            </div>

        </div>

    </div>

    <div class="container col s12 l6">

        <div class="card-panel center">

            <div class="row ">

                <h5> Acesso ao sistema </h5>

                <form class="col s12" method="POST" action="{{ url('/login') }}">

                    {{ csrf_field() }}

                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">mail</i>
                            <input id="email" name="email" type="email" required class="validate"
                                   value="{{ old('email') }}">
                            <label for="email">Email</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <input id="password" name="password" type="password" required class="validate">
                            <label for="password">Senha</label>
                        </div>
                    </div>

                    <button class="btn waves-effect waves-light" type="submit"> Entrar</button>

                    <br> <br>

                    <div class="divider"></div>

                    <br>

                    <div class="row">
                        Esqueceu a <a href="{{ url('/password/reset') }}"> senha </a> ? <br>
                    </div>

                </form>

            </div>

        </div>

    </div>

@endsection
