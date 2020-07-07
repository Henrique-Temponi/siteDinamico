<nav>
    <div class="nav-wrapper blue">
        <div class="container">
            <a href="{{ route('admin.principal') }}" class="brand-logo">Sis Admin</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="{{ route('admin.principal') }}">Inicio</a></li>
                <li><a target="_blanck" href="{{ route('site.home') }}">Site</a></li>
                @if(Auth::guest())
                    <li><a href="{{ route('admin.login') }}">login</a></li>
                @else
                    <li><a href="">{{ Auth::user()->name }}</a></li>
                    <li><a href="{{ route('admin.login.sair') }}">Sair</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<ul class="sidenav" id="mobile-demo">
    <li><a href="{{ route('admin.principal') }}">Inicio</a></li>
    <li><a target="_blanck" href="{{ route('site.home') }}">Site</a></li>
    @if(Auth::guest())
        <li><a href="{{ route('admin.login') }}">login</a></li>
    @else
        <li><a href="">{{ Auth::user()->name }}</a></li>
        <li><a href="{{ route('admin.login.sair') }}">Sair</a></li>
    @endif
</ul>