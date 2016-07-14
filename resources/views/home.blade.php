@extends('layouts.app')

@section('content')

    <article class="col s12 m7 l8">

        <br>

        <section class="input-field col s12">
            <select>
                <option value="" disabled selected>Disciplinas</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
            </select>
            <label>Filtrar Por: </label>
        </section>

        <section class="section">

            <header>
                <div class="chip">
                    <img src="/image/profile/user/sem_foto.png" alt="Contact Person">
                    Bruno Marcos
                </div>

                <h5> Hello World em PHP </h5>
            </header>

            <article>
                <p> Chips can be used to represent small blocks of information. They are most commonly
                    used either for contacts or for tags. Chips can be used to represent
                    small blocks of information. They are most commonly used either for contacts or for tags.
                </p>
            </article>

            <footer>
                Download: <a href="anexos/"> helloworld.rar </a>

                <p>
                    <a href="#"> <i class="small material-icons"> thumb_up </i> </a>
                    <a href="#"> <i class="small material-icons"> thumb_down </i> </a>
                </p>
            </footer>

        </section>

        <div class="divider"> </div>

    </article>

    @include('include.top-five')

@endsection
