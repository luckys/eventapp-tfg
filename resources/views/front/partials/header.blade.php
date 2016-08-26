<div id="fh5co-header">
    <header id="fh5co-header-section">
        <div class="container">
            <div class="nav-header">
                <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
                <h1 id="fh5co-logo"><a href="{{ url('/') }}">EventApp</a></h1>
                <nav id="fh5co-menu-wrap" role="navigation">
                    <ul class="sf-menu" id="fh5co-primary-menu">
                        <li><a class="active" href="{{ url('/') }}">Inicio</a></li>
                        <li><a <a href="{{ url('events') }}">Eventos</a></li>
                        <li><a href="{{ url('talks') }}">Charlas</a></li>
                        <li><a data-toggle="modal" data-target="#myModalLogin" href="#">Acceder</a></li>
                        <li><a data-toggle="modal" data-target="#myModal" href="#">Registrarse</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
</div>

@include('front.user.create')
@include('front.user.login')