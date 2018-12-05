<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIM Locomotive</title>
    <link href="{{ url('admin_page/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{ url('admin_page/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ url('admin_page/lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{ url('admin_page/lib/rickshaw/rickshaw.min.css') }}" rel="stylesheet">

    <link href="{{ url('admin_page/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ url('admin_page/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ url('admin_page/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ url('admin_page/lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ url('admin_page/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ url('admin_page/lib/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ url('admin_page/lib/jquery.steps/jquery.steps.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/admin_page/css/starlight.css') }}">
    <style>

    #calendaroi {
        margin: 40px 10px;
        padding: 0;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        font-size: 14px;
    }

    #loading {
        display: none;
        position: absolute;
        top: 10px;
        right: 10px;
    }

    #calendar {
        max-width: 900px;
        margin: 0 auto;
    }

    </style>
  </head>

  <body>

    @include('admin.bar')
    @yield('content')
    
    <script src="{{ url('admin_page/lib/jquery/jquery.js') }}"></script>
    <script src="{{ url('admin_page/lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ url('admin_page/lib/popper.js/popper.js') }}"></script>
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

    <!-- calendar script-->
    <link href="{{ url('calendar/fullcalendar.min.css') }}" rel='stylesheet' />
    <link href="{{ url('calendar/fullcalendar.print.min.css') }}" rel='stylesheet' media='print' />
    <script src="{{ url('calendar/lib/moment.min.js') }}"></script>
    <script src="{{ url('calendar/lib/jquery.min.js') }}"></script>
    <script src="{{ url('calendar/fullcalendar.min.js') }}"></script>
    <script src="{{ url('calendar/gcal.min.js') }}"></script>
    <script>
        $(document).ready(function() {
        $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,listYear'
        },

        displayEventTime: false, // don't show the time column in list view

        // THIS KEY WON'T WORK IN PRODUCTION!!!
        // To make your own Google API key, follow the directions here:
        // http://fullcalendar.io/docs/google_calendar/
        googleCalendarApiKey: 'c',

        // US Holidays
        events: 'en.usa#holiday@group.v.calendar.google.com',

        eventClick: function(event) {
            // opens events in a popup window
            window.open(event.url, 'gcalevent', 'width=700,height=600');
            return false;
        },

        loading: function(bool) {
            $('#loading').toggle(bool);
        }
        });
    });
    </script>
    @yield('script')
  </body>
</html>
