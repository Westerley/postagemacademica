<aside class="col s12 m5 l4">

    <p> Contribuidores </p>
    <ul class="collection">
        @foreach($ratingProfiles as $ratingProfile)
            <li class="collection-item avatar">
                <img src="/image/profile/user/{{ $ratingProfile->image }}" alt="{{ $ratingProfile->image }}" class="circle">
                <p class="title"> {{ $ratingProfile->name }} </p>
                <p> Postagens: {{ $ratingProfile->qtd }} </p>
            </li>
        @endforeach
    </ul>

    <p> Postagens </p>
    <ul class="collection">
        @foreach($ratingPosts as $ratingPost)
            @if($ratingPost->likes != 0)
                <li class="collection-item avatar">
                    <img src="/image/profile/user/{{ $ratingPost->image }}" alt="{{ $ratingPost->name }}" class="circle">
                    <span class="title"> {{ $ratingPost->name }} </span>
                    <p> {{ $ratingPost->title }} </p>
                    <p> {{ $ratingPost->created_at }} <br>
                        Likes: {{ $ratingPost->likes }}
                    </p>
                </li>
            @endif
        @endforeach
    </ul>

</aside>