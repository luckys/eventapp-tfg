<!-- header section start-->
<div class="header-section">

    <!--toggle button start-->
    <a class="toggle-btn"><i class="fa fa-bars"></i></a>
    <!--toggle button end-->


    <!--notification menu start -->
    <div class="menu-right">
        <ul class="notification-menu">
            <li>
                <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <img alt="" src="{{ asset('themes/admin/images/profiles/avatar-mini.jpg')  }}">

                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                    <li><a href="{{ url('auth/user/profile') }}"><i class="fa fa-user"></i> <span>Perfil</span></a></li>
                    <li><a href="{{ url('auth/user/change-password') }}"><i class="fa fa-key"></i> <span>Cambiar Contraseña</span></a></li>
                    <li><a href="{{ url('auth/logout') }}"><i class="fa fa-sign-out"></i> Salir</a></li>
                </ul>
            </li>

        </ul>
    </div>
    <!--notification menu end -->

</div>
<!-- header section end-->