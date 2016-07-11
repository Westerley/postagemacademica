@extends('layouts.app')

@section('content')

    <div class="container">

        <br> <br> <br>

        <div class="container col l8 offset-l2 s12">

            <div class="center">

                <div class="row">

                    <h5> Redefinir senha </h5>

                    <div class="card-panel">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ url('/password/email') }}">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">mail</i>
                                    <input id="email" name="email" type="email" required class="validate"
                                           value="{{ old('email') }}">
                                    <label for="email">Email</label>
                                </div>
                            </div>

                            <button class="btn waves-effect waves-light" type="submit">Solicitar redifinição de senha
                                <i class="material-icons right">send</i>
                            </button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
