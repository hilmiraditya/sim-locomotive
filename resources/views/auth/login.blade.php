<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- vendor css -->
    <link href="{{ url('/admin_page/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ url('/admin_page/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ url('/admin_page/css/starlight.css') }}">
    <link rel="icon" href="{{url('/images/logo.png')}}">
    <title>SIM Locomotive</title>
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse"><img style="width: 75%;height: 75%;" src="{{url('/images/logo.png')}}"></div>
        <br>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="tx-center mg-b-60">Sistem Information Management</div>
            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-info btn-block">Sign In</button>
        </form>
      </div>
    </div>
    <script src="{{ url('/admin_page/lib/jquery/jquery.js') }}"></script>
    <script src="{{ url('/admin_page/lib/popper.js/popper.js') }}"></script>
    <script src="{{ url('/admin_page/lib/bootstrap/bootstrap.js') }}"></script>
  </body>
</html>
