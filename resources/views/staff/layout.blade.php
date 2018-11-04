<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIM Locomotive</title>
    <link href="{{ url('/admin_page/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{ url('/admin_page/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ url('/admin_page/lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="../lib/rickshaw/rickshaw.min.css" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ url('/admin_page/css/starlight.css') }}">
  </head>

  <body>

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><img style="width: 50%;" src="{{ url('/images/logo.png') }}"></div>
    <div class="sl-sideleft">
      <label class="sidebar-label">Navigation</label>
      <div class="sl-sideleft-menu">
        <a href="{{'/Staff/Home'}}" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name">{{$view['user']->name}}</span>
              <img src="{{ url('images/people.png') }}" class="wd-32 rounded-circle" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li>
                  <a href="{{ route('logout') }}"] onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="icon ion-power"></i>Keluar
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }} 
                  </form>
                </li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->
    <!-- ########## START: MAIN PANEL ########## -->$
    @yield('content')
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="{{ url('admin_page/lib/jquery/jquery.js') }}"></script>
    <script src="{{ url('admin_page/lib/popper.js/popper.js') }}"></script>
    <script src="{{ url('admin_page/lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ url('admin_page/lib/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ url('admin_page/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ url('admin_page/lib/jquery.sparkline.bower/jquery.sparkline.min.js') }}"></script>
    <script src="{{ url('admin_page/lib/d3/d3.js') }}"></script>
    <script src="{{ url('admin_page/lib/rickshaw/rickshaw.min.js') }}"></script>
    <script src="{{ url('admin_page/lib/chart.js/Chart.js') }}"></script>
    <script src="{{ url('admin_page/lib/Flot/jquery.flot.js') }}"></script>
    <script src="{{ url('admin_page/lib/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ url('admin_page/lib/Flot/jquery.flot.resize.js')}}"></script>
    <script src="{{ url('admin_page/lib/flot-spline/jquery.flot.spline.js') }}"></script>

    <script src="{{ url('admin_page/js/starlight.js') }}"></script>
    <script src="{{ url('admin_page/js/ResizeSensor.js')}}"></script>
    <script src="{{ url('admin_page/js/dashboard.js') }}"></script>
  </body>
  @yield('modal')
</html>
