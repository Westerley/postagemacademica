@extends('layouts.profile')

@section('content')

    <div class="col s12 m12 l4 descricao-perfil">
        <div class="card-panel white">
            <p> Vinculo:
                <span>
                    @forelse($profiles as $profile)
                        @if($profile->id_occupation == 1)
                            Estudante
                        @else
                            Professor
                        @endif
                    @empty
                        Não Disponível
                    @endforelse
                </span>
            </p>
            <p> Nome:              <span> {{ Auth::user()->name }} </span> </p>
            <p> Email:             <span> {{ Auth::user()->email }} </span> </p>
            <p> Celular:
                <span>
                    @forelse($profiles as $profile)
                        @if( !empty($profile->cellphone) )
                            {{ $profile->cellphone }}
                        @else
                            Não Disponível
                        @endif
                    @empty
                        Não Disponível
                    @endforelse
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
                    <option value="" disabled selected>Disciplinas</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                </select>
                <label>Filtrar Por: </label>
            </div>
        </section>

        <br>

        @forelse($posts as $post)

            <section class="section">

                <header>
                    <div class="chip">
                        <img src="/image/profile/user/sem_foto.png" alt="Contact Person">
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
                        <span class="download"> <a href="/download/{{ $post->arquivo }}"> <i class="fa fa-download"> Download </i> </a> </span>
                    </p>
                </footer>

            </section>

            <div class="divider"> </div>

        @empty
            <h5 class="center"> Nenhuma postagem realizada </h5>
        @endforelse

    </div>

@endsection
