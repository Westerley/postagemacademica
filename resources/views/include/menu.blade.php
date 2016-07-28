<header class="navbar-fixed">

    @if (Auth::guest())
        <nav class="#424242 grey darken-3">
            <div class="nav-wrapper">
                <a href="{{ url('/') }}" class="brand-logo center">Postagem Acadêmica</a>
            </div>
        </nav>
    @else

        <ul id="configuracoes" class="dropdown-content">
            <li><a href="{{ url('/profile/edit/'.Auth::user()->id) }}"> Alterar Dados </a> </li>
            <li><a href="{{ url('/profile/password/'.Auth::user()->id) }}"> Alterar Senha </a> </li>
            <li><a href="{{ url('/logout') }}"> Sair </a> </li>
        </ul>

        <nav class="#424242 grey darken-3">

            <ul class="right">
                <a href="{{ url('/') }}" class="brand-logo center hide-on-med-and-down">Postagem Acadêmica</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li> <a  href="{{ url('timeline') }}"> {{ Auth::user()->name }} </a> </li>
                    <li> <a class="dropdown-button" href="#!" data-activates="configuracoes"> Configurações <i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </ul>

            <ul id="slide-out" class="side-nav #fafafa grey lighten-5">
                <span> {{ Auth::user()->name }} </span>
                <li><a href="{{ url('/') }}"> <i class="fa fa-home"> </i> Home </a> </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li>
                            <a class="collapsible-header"> <i class="fa fa-user"> </i> Perfil </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li> <a href="{{ url('/timeline') }}"> <i class="fa fa-dashboard"> </i> Posts </a> </li>
                                    <li> <a href="{{ url('/courses') }}"> <i class="fa fa-tasks"> </i> Disciplinas </a> </li>
                                    <li> <a href="{{ url('/post') }}"> <i class="fa fa-institution"> </i> Postar </a> </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li>
                            <a class="collapsible-header"> <i class="fa fa-wrench"> </i> Configurações </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li> <a href="{{ url('/profile') }}">  <i class="fa fa-edit"> </i> Alterar Dados </a> </li>
                                    <li> <a href="{{ url('/password') }}"> <i class="fa fa-lock"> </i> Alterar Senha </a> </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li> <a href="{{ url('logout') }}"> <i class="fa fa-power-off"> </i> Sair </a> </li>
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