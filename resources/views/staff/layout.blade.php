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

    @include('admin.bar')
    @yield('content')

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
