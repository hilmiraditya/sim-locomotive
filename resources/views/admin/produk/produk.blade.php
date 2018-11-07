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
              	<tr>
              		<td>Wkwkwk</td>
              		<td>Wkwkwk</td>
              		<td>Wkwkwk</td>
              		<td>Wkwkwk</td>
              		<td>Wkwkwk</td>
              		<td style="color: white;">
              			<a class="btn btn-sm btn-primary">Edit</a>
              			<a class="btn btn-sm btn-danger">Hapus</a>
              		</td>
              	</tr>
              </tbody>
            </table>
          </div><!-- table-wrapper -->
          <br>
          <div style="color: white;" align="center">
      		<a class="btn btn-primary">Download Katalog Produk</a>
      		<a class="btn btn-success">Tambah Produk</a>
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