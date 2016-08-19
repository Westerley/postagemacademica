@extends('layouts.profile')

@section('content')

    <div class="col s12 m12 l4 descricao-perfil">
        <div class="card-panel white">
            <p> Vinculo:
                <span>
                    @if($profile->id_occupation == 1)
                        Estudante
                    @else
                        Professor
                    @endif
                </span>
            </p>
            <p> Nome:              <span> {{ Auth::user()->name }} </span> </p>
            <p> Email:             <span> {{ Auth::user()->email }} </span> </p>
            <p> Celular:
                <span>
                    @if( !empty($profile->cellphone) )
                        {{ $profile->cellphone }}
                    @else
                        Não Disponível
                    @endif
                </span>
            </p>
            <p> Posts Realizados:
                <span>
                    @if(count($posts) > 0)
                        {{ count($posts) }}
                    @else
                        Nenhuma Postagem
                    @endif
                </span>
            </p>
        </div>
    </div>

    <div class="col s12 m12 l8">

        <section>
            <div class="input-field col s12">
                <select>
                    <option value="" disabled selected> Disciplinas </option>
                    @foreach($registrations as $registration)
                        @foreach($courses as $course)
                            @if($registration->id_courses == $course->id)
                                <option value="{{ $registration->id_courses }}"> {{ $course->name }} </option>
                            @endif
                        @endforeach
                    @endforeach
                </select>
                <label>Filtrar Por: </label>
            </div>
        </section>

        <br>

        @forelse($posts as $post)

            <section class="section">

                <header>
                    <div class="chip">
                        <img src="/image/profile/user/{{ $profile->image }}" alt="Contact Person">
                        {{ Auth::user()->name }}
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
            <h5 class="center"> Nenhuma postagem realizada </h5>
        @endforelse

    </div>

@endsection
