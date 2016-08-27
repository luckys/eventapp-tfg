<!-- left side start-->
<div class="left-side sticky-left-side">

    <!--logo and iconic logo start-->
    <div class="logo">
        <a><img src="{{ asset('themes/admin/images/logo.png')  }}" alt=""></a>
    </div>

    <div class="left-side-inner">

        <!--sidebar nav start-->
        <ul class="nav nav-pills nav-stacked custom-nav">
            @if(Auth::check())
                <li class="active"><a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                <li><a href="{{ url('admin/events') }}"> <i class="fa fa-group" aria-hidden="true"></i><span>Eventos</span></a></li>
                <li><a href="{{ url('admin/talks') }}"><i class="fa fa-volume-up" aria-hidden="true"></i> <span>Charlas</span></a></li>
            @endif

        </ul>
        <!--sidebar nav end-->

    </div>
</div>