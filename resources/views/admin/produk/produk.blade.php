@extends('admin.layout')
@section('content')
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item">Sistem Information Management</a>
        <a class="breadcrumb-item">Produk</a>
        <span class="breadcrumb-item active">Lihat Produk</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Produk</h5>
          <p>List Daftar Produk</p>
        </div><!-- sl-page-title -->
        <div class="card pd-20 pd-sm-40">
        @if($view['produk']->count() != 0)
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
                  <th>Nama</th>
                  <th>Harga</th>
                  <th>Kuantitas</th>
                  <th>Deskripsi</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php $a=1; ?>
                @foreach($view['produk'] as $produk)
              	<tr>
              		<td>{{ $a }}</td>
              		<td>{{ $produk->nama_produk }}</td>
              		<td>{{ "Rp ".number_format($produk->harga_produk,0,',','.').",-" }}</td>
              		<td>{{ $produk->kuantitas_produk }}</td>
              		<td>{{ $produk->deskripsi_produk }}</td>
              		<td style="color: white;">
              			<a href="{{ url('Admin/Produk/UbahProduk/'.$produk->id) }}" class="btn btn-sm btn-primary">Edit</a>
              			<a href="{{ url('Admin/Produk/HapusProduk/'.$produk->id) }}" class="btn btn-sm btn-danger">Hapus</a>
              		</td>
                  <?php $a++; ?>
                  @endforeach
              	</tr>
              </tbody>
            </table>
          </div><!-- table-wrapper -->
          <br>
          <div style="color: white;" align="center">
      		<a class="btn btn-primary">Export Data Produk</a>
      		<a href="{{ url('Admin/Produk/TambahProduk') }}" class="btn btn-success">Tambah Produk</a>
        @else
        <div class="alert alert-danger" role="alert">Belum Ada Akun !</div>
        <div style="color: white;" align="center">
          <a href="{{ url('Admin/Produk/TambahProduk') }}" class="btn btn-success">Tambah Produk</a>
        </div>
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

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
      });
    </script>
@endsection