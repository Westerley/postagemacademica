@extends('layouts.profile')

@section('content')

    <form action="#" class="col s12 m12 l12">

        @forelse($courses as $course)
            <h2> Teste </h2>
        @endforelse

        <h5 class="center">Disciplinas do Curso</h5>

        {!! csrf_field() !!}

        <div class="row" style="margin-left: 8%">
            <div class="col s12 m6 l4">
                <p>
                    <input type="checkbox" id="test5" />
                    <label for="test5">Análise de algoritmo</label>
                </p>
                <p>
                    <input type="checkbox" id="test6" checked="checked" />
                    <label for="test6">Yellow</label>
                </p>
                <p>
                    <input type="checkbox" id="test5" />
                    <label for="test5">Red</label>
                </p>

                <p>
                    <input type="checkbox" id="test6" checked="checked" />
                    <label for="test6">Yellow</label>
                </p>
                <p>
                    <input type="checkbox" id="test5" />
                    <label for="test5">Red</label>
                </p>
                <p>
                    <input type="checkbox" id="test6" checked="checked" />
                    <label for="test6">Yellow</label>
                </p>
                <p>
                    <input type="checkbox" id="test5" />
                    <label for="test5">Análise de algoritmo</label>
                </p>
            </div>

            <div class="col s12 m6 l4">
                <p>
                    <input type="checkbox" id="test6" checked="checked" />
                    <label for="test6">Yellow</label>
                </p>
                <p>
                    <input type="checkbox" id="test5" />
                    <label for="test5">Red</label>
                </p>
                <p>
                    <input type="checkbox" id="test6" checked="checked" />
                    <label for="test6">Yellow</label>
                </p>
                <p>
                    <input type="checkbox" id="test5" />
                    <label for="test5">Red</label>
                </p>
                <p>
                    <input type="checkbox" id="test6" checked="checked" />
                    <label for="test6">Yellow</label>
                </p>
                <p>
                    <input type="checkbox" id="test6" checked="checked" />
                    <label for="test6">Yellow</label>
                </p>
                <p>
                    <input type="checkbox" id="test5" />
                    <label for="test5">Análise de algoritmo</label>
                </p>
            </div>

            <div class="col s12 m6 l4">
                <p>
                    <input type="checkbox" id="test6" checked="checked" />
                    <label for="test6">Yellow</label>
                </p>
                <p>
                    <input type="checkbox" id="test5" />
                    <label for="test5">Red</label>
                </p>
                <p>
                    <input type="checkbox" id="test6" checked="checked" />
                    <label for="test6">Yellow</label>
                </p>
                <p>
                    <input type="checkbox" id="test5" />
                    <label for="test5">Red</label>
                </p>
                <p>
                    <input type="checkbox" id="test6" checked="checked" />
                    <label for="test6">Yellow</label>
                </p>
            </div>

        </div>

        <div class="row #f9fbe7 lime lighten-5">
            <div class="col s12 m12 l12">
                <div class="right" style="margin-right: 10%">
                    <p> Total de disciplinas: <b> 11 </b> </p>
                    <p> Matriculadas: <b> 5 </b></p>
                    <button class="btn waves-effect waves-light center" type="submit"> Salvar </button>
                    <br> <br>
                </div>
            </div>
        </div>

    </form>

@endsection