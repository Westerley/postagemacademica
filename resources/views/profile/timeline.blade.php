@extends('layouts.profile')

@section('content')

    <div class="col s12 l4 m4 descricao-perfil">
        <div class="card-panel white">
            <p> Vinculo:           <span> Aluno </span> </p>
            <p> Nome:              <span> Westerley Reis </span> </p>
            <p> Email:  <span> Westerreis_@hotmail.com </span> </p>
            <p> Celular:  <span> (67) 99999-9999 </span> </p>
            <p> Semestre:          <span> 7º </span> </p>
            <p> Posts Realizados:  <span> 10 </span> </p>
        </div>
    </div>

    <div class="col s12 l8 m8">

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

        <div class="section">

            <div class="chip">
                <img src="/image/profile/user/sem_foto.png" alt="Contact Person">
                Westerley Reis
            </div>

            <div>
                <h5> Arvore Binária em Java </h5>

                <p> Chips can be used to represent small blocks of information. They are most commonly
                    used either for contacts or for tags. Chips can be used to represent
                    small blocks of information. They are most commonly used either for contacts or for tags.
                </p>

                Download: <a href="anexos/"> arquivo </a>

                <p>
                    <a href="#"> <i class="small material-icons"> thumb_up </i> </a>
                    <a href="#"> <i class="small material-icons"> thumb_down </i> </a>
                </p>
            </div>

        </div>

        <div class="divider"> </div>

        <div class="section">

            <div class="chip">
                <img src="/image/profile/user/sem_foto.png" alt="Contact Person">
                Westerley Reis
            </div>

            <div>
                <h5> CRUD em Ruby </h5>

                <p> Chips can be used to represent small blocks of information. They are most commonly
                    used either for contacts or for tags. Chips can be used to represent
                    small blocks of information. They are most commonly used either for contacts or for tags.
                </p>

                Download: <a href="anexos/"> arquivo </a>

                <p>
                    <a href="#"> <i class="small material-icons"> thumb_up </i> </a>
                    <a href="#"> <i class="small material-icons"> thumb_down </i> </a>
                </p>

            </div>

        </div>

        <div class="divider"> </div>

    </div>

@endsection
