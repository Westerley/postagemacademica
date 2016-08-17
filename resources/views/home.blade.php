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

                <footer class="votacao" data-postid="{{ $post->id }}">
                    <p>
                        <a class="btnlike"> <i class="fa fa-thumbs-o-up fa-2x"> </i> </a> <span class="statusLike"> ({{ $post->like }}) </span>
                        <a> <i class="fa fa-thumbs-o-down fa-2x btnunlike"> </i> </a> <span class="statusUnlike"> ({{ $post->unlike }}) </span>
                        <span class="download"> <a href="/download/{{ $post->file }}"> <i class="fa fa-download"> Download </i> </a> </span>
                    </p>
                    {!! csrf_field() !!}
                </footer>

            </section>

            <div class="divider"> </div>

        @empty
            <h5 class="center"> Nenhuma postagem </h5>
        @endforelse

    </article>

    @include('include.top-five')

    <script>
        $(document).ready(function() {
            $(".btnlike").click(function (event) {
                event.preventDefault();
                event.
                alert(event.target.parentNode.dataset['postid']);
                $.post("/like-post", {
                    post_id: $('.btnlike').attr("id"),
                    _token: $('input[name="_token"]').attr("value")}, function (response) {
                    if(response.status == "sim")
                    {
                        alert('sim');
                    }
                });
            });

            $(".btnunlike").click(function () {
                $.post("/unlike-post", {
                    post_id: $('input[name="post_id"]').attr("value"),
                    _token:$('input[name="_token"]').attr("value")}, function (response) {
                    if(response.status == "sim")
                    {
                        $(".statusUnlike").html(response.qtde);
                    }
                });
            });
        });
    </script>

@endsection
