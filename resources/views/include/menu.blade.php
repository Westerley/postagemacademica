<div class="navbar-fixed">

    @if (Auth::guest())
        <nav class="#424242 grey darken-3">
            <div class="nav-wrapper">
                <a href="{{ url('/') }}" class="brand-logo center">Postagem Acadêmica</a>
            </div>
        </nav>
    @else
        <ul id="perfil" class="dropdown-content">
            <li><a href="{{ url('profile') }}">Perfil</a></li>
            <li><a href="{{ url('logout') }}">Sair</a></li>
        </ul>

        <nav class="#424242 grey darken-3">

            <ul class="right hide-on-med-and-down">
                <a href="{{ url('/') }}" class="brand-logo center">Postagem Acadêmica</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a class="dropdown-button" href="#!" data-activates="perfil"> {{ Auth::user()->name }} <i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </ul>

            <ul id="slide-out" class="side-nav #ffffff white">
                <li class="center"> {{ Auth::user()->name }} </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li>
                            <a class="collapsible-header">Perfil<i class="mdi-navigation-arrow-drop-down"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="#!">Post</a></li>
                                    <li><a href="#!">Perfil</a></li>
                                    <li><a href="#!">Disciplinas</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li><a href="#!">Sair</a></li>
            </ul>

            <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

        </nav>
    @endif

</div>

<script>
    $('.button-collapse').sideNav({
                menuWidth: 300, // Default is 240
                edge: 'right', // Choose the horizontal origin
                closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
            }
    );
</script>