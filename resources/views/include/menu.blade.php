<header class="navbar-fixed">

    @if (Auth::guest())
        <nav class="#424242 grey darken-3">
            <div class="nav-wrapper">
                <a href="{{ url('/') }}" class="brand-logo center">Postagem Acadêmica</a>
            </div>
        </nav>
    @else

        <ul id="configuracoes" class="dropdown-content">
            <li><a href="{{ url('profile') }}"> Alterar Dados </a> </li>
            <li><a href="{{ url('logout') }}"> Alterar Senha </a> </li>
            <li><a href="{{ url('logout') }}"> Sair </a> </li>
        </ul>

        <nav class="#424242 grey darken-3">

            <ul class="right">
                <a href="{{ url('/') }}" class="brand-logo center">Postagem Acadêmica</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li> <a  href="{{ url('timeline') }}"> {{ Auth::user()->name }} </a> </li>
                    <li> <a class="dropdown-button" href="#!" data-activates="configuracoes"> Configurações <i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </ul>

            <ul id="slide-out" class="side-nav #ffffff white">
                <li> {{ Auth::user()->name }} </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li>
                            <a class="collapsible-header"> Perfil <i class="mdi-navigation-arrow-drop-down"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{ url('/timeline') }}">Posts</a></li>
                                    <li><a href="{{ url('/courses') }}">Disciplinas</a></li>
                                    <li><a href="{{ url('/post') }}">Cadastrar</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li>
                            <a class="collapsible-header"> Configurações <i class="mdi-navigation-arrow-drop-down"></i></a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{ url('/timeline') }}"> Alterar Perfil </a></li>
                                    <li><a href="{{ url('/courses') }}"> Alterar Senha </a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li><a href="{{ url('logout') }}"> Sair </a> </li>
            </ul>

            <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

        </nav>
    @endif

</header>

<script>
    $('.button-collapse').sideNav({
            menuWidth: 300, // Default is 240
            edge: 'left', // Choose the horizontal origin
            closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
        }
    );
</script>