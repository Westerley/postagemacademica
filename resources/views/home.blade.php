@extends('layouts.app')

@section('content')

    <div class="col s12 m7 l8">

        <div class="section">

            <div class="chip">
                <img src="/image/profile/user/sem_foto.png" alt="Contact Person">
                Bruno Marcos
            </div>

            <div>
                <h5> Hello World em PHP </h5>

                <p> Chips can be used to represent small blocks of information. They are most commonly
                    used either for contacts or for tags. Chips can be used to represent
                    small blocks of information. They are most commonly used either for contacts or for tags.
                </p>

                Download: <a href="anexos/"> helloworld.rar </a>

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
                Bruno Allison
            </div>

            <div>
                <h5> Caixeiro Viajante </h5>

                <p> Chips can be used to represent small blocks of information. They are most commonly
                    used either for contacts or for tags. Chips can be used to represent
                    small blocks of information. They are most commonly used either for contacts or for tags.
                </p>

                Download: <a href="anexos/"> caixeiro_viajante.rar </a>

                <p>
                    <a href="#"> <i class="small material-icons"> thumb_up </i> </a>
                    <a href="#"> <i class="small material-icons"> thumb_down </i> </a>
                </p>

            </div>

        </div>

        <div class="divider"> </div>

    </div>

    @include('include.top-five')

@endsection
