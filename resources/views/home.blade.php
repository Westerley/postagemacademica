@extends('layouts.app')

@section('content')

    <article class="col s12 m7 l8">

        <br>

        <section class="input-field col s12">
            <select>
                <option value="" disabled selected>Disciplinas</option>
                @foreach($registrations as $registration)
                    @foreach($courses as $course)
                        @if($registration->id_courses == $course->id)
                            <option value="{{ $registration->id_courses }}"> {{ $course->name }} </option>
                        @endif
                    @endforeach
                @endforeach
            </select>
            <label>Filtrar Por: </label>
        </section>

        @forelse($posts as $post)

            <section class="section">

                <header>
                    <div class="chip">
                        <img src="/image/profile/user/" alt="Contact Person">
                        {{ Auth::user()->name }}
                    </div>

                    <h5> {{ $post->title }} </h5>
                </header>

                <article>
                    <p> {{ $post->content }} </p>
                </article>

                <footer class="votacao">
                    <p>
                        <a href="#"> <i class="fa fa-thumbs-o-up fa-2x"> </i> </a> <span> ({{ $post->like }}) </span>
                        <a href="#"> <i class="fa fa-thumbs-o-down fa-2x"> </i> </a> <span> ({{ $post->unlike }}) </span>
                        <span class="download"> <a href="/download/{{ $post->file }}"> <i class="fa fa-download"> Download </i> </a> </span>
                    </p>
                </footer>

            </section>

            <div class="divider"> </div>

        @empty
            <h5 class="center"> Nenhuma postagem </h5>
        @endforelse

    </article>

    @include('include.top-five')

@endsection
