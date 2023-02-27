<div class="col-md-3 left_col menu_fixed">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="dashboard" class="site_title"><i class="fa fa-pie-chart"></i> <span>Bienvenido</span></a>
    </div>
    <div class="clearfix"></div>
    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="{{ asset('build/assets/production/images/img.jpg')}}" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Hola!,</span>
        <h2>John Doe</h2>
      </div>
    </div>
    <!-- /menu profile quick info -->
    <br>
    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-user"></i> Usuarios<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu"> 
                <li><a href="{{ route('usuarios.index')}}"><i class="fa fa-home"></i> Home Usuarios </a></li>
              </ul>
          </li>
          <li><a><i class="fa fa-edit"></i> Roles <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ route('roles.index')}}"><i class="fa fa-home"></i> Home Roles </a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-table"></i> Datasets <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{url('/index')}}"><i class="fa fa-home"></i> Home Datasets </a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="sidebar-footer hidden-small">
        <form method="POST" action="{{ route('logout') }}" class="inline">
        @csrf
        <button type="submit" class="glyphicon glyphicon-off">
            {{ __('Salir') }}
        </button>
        </form>
    </div>
    </div>
    <!-- /sidebar menu -->
  </div>
</div>


