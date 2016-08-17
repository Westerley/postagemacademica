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
                {!! csrf_field() !!}
                <header>
                    <div class="chip">
                        @foreach($users as $user)
                            @if($post->id_profile == $user->id)
                                <img src="/image/profile/user/user-id-{{ $user->id }}.jpg" alt="Contact Person">
                                {{ $user->name }}
                            @endif
                        @endforeach
                    </div>

                    <h5> {{ $post->title }} </h5>
                </header>

                <article>
                    <p> {{ $post->content }} </p>
                </article>

                <footer class="votacao" lang="{{ $post->id }}">
                    <i class="fa fa-thumbs-o-up fa-2x rating" alt="like"> </i>
                    <span class="like">
                        ({{ \Illuminate\Support\Facades\DB::table('rates')->where('id_post', '=', $post->id)->where('like', '=' , 1)->count() }})
                    </span>
                    <i class="fa fa-thumbs-o-down fa-2x rating" alt="unlike"> </i>
                    <span class="unlike">
                        ({{ \Illuminate\Support\Facades\DB::table('rates')->where('id_post', '=', $post->id)->where('unlike', '=' , 1)->count() }})
                    </span>
                    <span class="download"> <a href="/download/{{ $post->file }}"> <i class="fa fa-download"> Download </i> </a> </span>
                </footer>

            </section>

            <div class="divider"> </div>

        @empty
            <h5 class="center"> Nenhuma postagem </h5>
        @endforelse

    </article>

    @include('include.top-five')

@endsection
