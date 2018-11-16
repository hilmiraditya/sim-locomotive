@extends('admin.layout')
@section('content')
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item">Sistem Information Management</a>
        <a class="breadcrumb-item">Pesanan</a>
        <span class="breadcrumb-item active">Daftar Pesanan</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Produk</h5>
          <p>List Daftar Produk</p>
        </div><!-- sl-page-title -->
        <div class="card pd-20 pd-sm-40">
        @if($view['pesanan']->count() != 0)
          <div class="table-wrapper">
          @if(session()->has('pesan_sukses'))
           <div class="alert alert-success" role="alert">
            {{session()->get('pesan_sukses')}}
           </div>       
          @endif
          @if(session()->has('pesan_gagal'))
           <div class="alert alert-danger" role="alert">
              {{session()->get('pesan_gagal')}}
           </div>       
          @endif
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Client</th>
                  <th>Unit</th>
                  <th>Kontak</th>
                  <th>Email</th>
                  <th>Progress</th>
                  <th>Input</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php $a=1; ?>
                @foreach($view['pesanan'] as $pesanan)
              	<tr>
              		<td>{{ $a }}</td>
              		<td>{{ $pesanan->nama_klien }}</td>
              		<td>{{ $pesanan->unit_produksi }}</td>
                  <td>
                    <b>WhatsApp</b> : {{ $pesanan->nowhatsapp_klien}}<br>
                    <b>No. Handphone</b> : {{ $pesanan->notelp_klien }}
                  </td>
                  <td>
                    @if($pesanan->isEmailed == 0)
                      <a class="btn btn-sm btn-warning">Belum dikirim</a>
                    @else 
                      <a class="btn btn-sm btn-success">Sudah dikirim</a>
                    @endif
                  </td>
                  <td style="color: white;">
                  @if($pesanan->status_pesanan == 0)
                    <a class="btn btn-sm btn-warning">Dibatalkan</a>
                  @elseif($pesanan->status_pesanan == 1)
                    <a class="btn btn-sm btn-primary">Sedang Berjalan</a>
                  @else
                    <a class="btn btn-sm btn-success">Selesai</a>
                  @endif
                  </td>
              		<td>{{ $pesanan->User->name }}</td>
              		<td style="color: white;">
              			<a href="{{url('Admin/Pesanan/LihatPesanan/'.$pesanan->id)}}" class="btn btn-sm btn-primary">Detil</a>
                    <a href="{{ url('Admin/Pesanan/KirimEmail/'.$pesanan->id) }}" class="btn btn-sm btn-success">Email</a>
                    <a href="{{url('Admin/Pesanan/HapusPesanan/'.$pesanan->id)}}" class="btn btn-sm btn-danger">Hapus</a>
              		</td>
                  <?php $a++; ?>
                  @endforeach
              	</tr>
              </tbody>
            </table>
          </div><!-- table-wrapper -->
          <br>
        @else
        <div class="alert alert-danger" role="alert">Belum Ada Pesanan !</div>
      @endif
		</div>
        </div><!-- card -->
      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
@endsection
@section('script')
    <script src="{{ url('admin_page/lib/jquery/jquery.js') }}"></script>
    <script src="{{ url('admin_page/lib/popper.js/popper.js') }}"></script>
    <script src="{{ url('admin_page/lib/bootstrap/bootstrap.js') }}"></script>
    <script src="{{ url('admin_page/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ url('admin_page/lib/highlightjs/highlight.pack.js') }}"></script>
    <script src="{{ url('admin_page/lib/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ url('admin_page/lib/datatables-responsive/dataTables.responsive.js') }}"></script>
    <script src="{{ url('admin_page/lib/select2/js/select2.min.js') }}"></script>
    <script>
      $(function(){
        'use strict';
        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });
        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
      });
    </script>
@endsection