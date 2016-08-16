@extends('layouts.profile')

@section('content')

    <form action="/courses/save/{{ Auth::user()->id }}" method="POST" class="col s12 m12 l12">

        <h5 class="center">Disciplinas do Curso</h5>

        @if(Session::has('message'))
            <script type="text/javascript">
                Materialize.toast('{{ Session::get('message') }}', 3000, 'rounded')
            </script>
        @endif

        <input type="hidden" id="id" name="id" value="{{ Auth::user()->id }}">

        {!! csrf_field() !!}
        <div class="row" style="margin-left: 8%">
            <div class="col s12 m6 l4">
                @foreach($courses as $course)
                    <p>
                        <input type="checkbox" id="{{ $course->id }}" name="courses[]" value="{{ $course->id }}"
                        @foreach($registrations as $registration)
                            @if($registration->id_courses == $course->id)
                                checked
                            @endif
                        @endforeach
                        />

                        <label for="{{ $course->id }}">{{ $course->name }}</label>
                    </p>
                @endforeach
            </div>
        </div>

        <div class="row #f9fbe7 lime lighten-5">
            <div class="col s12 m12 l12">
                <div class="right" style="margin-right: 10%">
                    <p> Total de disciplinas: <b> {{ count($courses) }} </b></p>
                    <p> Matriculadas: <b> {{ count($registrations) }} </b></p>
                    <button class="btn waves-effect waves-light center" type="submit"> Salvar</button>
                    <br> <br>
                </div>
            </div>
        </div>

    </form>

@endsection