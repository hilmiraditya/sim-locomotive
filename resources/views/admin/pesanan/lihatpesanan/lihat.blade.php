
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIM Locomotive</title>

    <!-- vendor css -->
    <link href="{{ url('admin_page/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ url('admin_page/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ url('admin_page/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ url('admin_page/lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ url('admin_page/lib/jquery.steps/jquery.steps.css') }}" rel="stylesheet">

    <link href="{{ url('admin_page/lib/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ url('admin_page/lib/spectrum/spectrum.css') }}" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ url('admin_page/css/starlight.css') }}">
  </head>

  <body>
    <!-- ########## START: LEFT PANEL ########## -->
    @include('admin.bar')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Sistem Information Management</a>
        <a class="breadcrumb-item" href="index.html">Pesanan</a>
        <span class="breadcrumb-item active">Lihat Pesanan</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Detail Pesanan</h5>
          <p>Pesanan atas nama : <b>{{ $view['pesanan']->nama_klien }}</b> | Dipesan pada : <b>{{$view['pesanan']->created_at}}</b></p>
        </div><!-- sl-page-title -->
        <div class="card pd-20 pd-sm-40">
          @if (count($errors) > 0)
          <div class = "alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
          </div>
          @endif
          @if(session()->has('pesan_sukses'))
            <div class="alert alert-success" role="alert">
            {{session()->get('pesan_sukses')}}
            </div>       
          @endif
            <div id="card pd-20 pd-sm-40">
                @include('admin.pesanan.lihatpesanan.lihatsubprogress')
                @include('admin.pesanan.lihatpesanan.lihatsubbiodata')
                @include('admin.pesanan.lihatpesanan.lihatsubproduk')
                @include('admin.pesanan.lihatpesanan.lihatsubproduksi')
                <div align="center">
                  <a href="{{ url('Admin/Pesanan/UbahPesanan/'.$view['pesanan']->id) }}" class="btn btn-primary">Ubah Pesanan</a>
                </div>
            </div>
        </div><!-- card -->
      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    <script src="{{ url('admin_page/lib/jquery/jquery.js') }}"></script>
    <script src="{{ url('admin_page/lib/popper.js/popper.js') }}"></script>
    <script src="{{ url('admin_page/lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ url('admin_page/lib/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ url('admin_page/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ url('admin_page/lib/highlightjs/highlight.pack.js') }}"></script>
    <script src="{{ url('admin_page/lib/jquery.steps/jquery.steps.js') }}"></script>
    <script src="{{ url('admin_page/lib/parsleyjs/parsley.js') }}"></script>
    
    <script src="{{ url('admin_page/lib/select2/js/select2.min.js') }}"></script>
    <script src="{{ url('admin_page/lib/spectrum/spectrum.js') }}"></script>

    <script src="{{ url('admin_page/js/starlight.js') }}"></script>
    <script>
      $(document).ready(function(){
        'use strict';

        $('#wizard1').steps({
          headerTag: 'h3',
          bodyTag: 'section',
          autoFocus: true,
          titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>'
        });
      });
    </script>
    <script>
      $(function(){

        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });

        // Select2 by showing the search
        $('.select2-show-search').select2({
          minimumResultsForSearch: ''
        });

        // Select2 with tagging support
        $('.select2-tag').select2({
          tags: true,
          tokenSeparators: [',', ' ']
        });

        // Datepicker
        $('.fc-datepicker').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true
        });

        $('#datepickerNoOfMonths').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true,
          numberOfMonths: 2
        });

        // Color picker
        $('#colorpicker').spectrum({
          color: '#17A2B8'
        });

        $('#showAlpha').spectrum({
          color: 'rgba(23,162,184,0.5)',
          showAlpha: true
        });

        $('#showPaletteOnly').spectrum({
            showPaletteOnly: true,
            showPalette:true,
            color: '#DC3545',
            palette: [
                ['#1D2939', '#fff', '#0866C6','#23BF08', '#F49917'],
                ['#DC3545', '#17A2B8', '#6610F2', '#fa1e81', '#72e7a6']
            ]
        });

      });
    </script>
    <script>
      function tambahdata(harga, id)
      {
        var awal, hasil;
        awal = parseInt(document.getElementById("hpp_value").value);
        if (document.getElementById("confirm".concat(id)).checked == true){
          hasil = awal + harga;
        }
        else{
          hasil = awal - harga;
        }
        //value
        document.getElementById("hpp_value").value = hasil;
        document.getElementById("hpp30_value").value = hasil + (hasil*0.3);
        document.getElementById("hpp40_value").value = hasil + (hasil*0.4);
        document.getElementById("hargaakhir").value = hasil + (hasil*0.4);

        //view
        document.getElementById("hpp").value = rupiah(document.getElementById("hpp_value").value);
        document.getElementById("hpp30").value = rupiah(document.getElementById("hpp30_value").value);
        document.getElementById("hpp40").value = rupiah(document.getElementById("hpp40_value").value);
      }
      function rupiah(bilangan)
      {
        var number_string = bilangan.toString(),
          sisa  = number_string.length % 3,
          rupiah  = number_string.substr(0, sisa),
          ribuan  = number_string.substr(sisa).match(/\d{3}/g);   
        if (ribuan) {
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }
        return "Rp. "+rupiah+",-";
      }
    </script>
  </body>
</html>
