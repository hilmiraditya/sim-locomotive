@extends('admin.layout')
@section('content')
   <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item">Sistem Information Management</a>
        <a class="breadcrumb-item">Akun</a>
        <span class="breadcrumb-item active">Lihat Akun</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Akun</h5>
          <p>Atur akses akun untuk Staff & Admin</p>
        </div><!-- sl-page-title -->
        <div class="card pd-20 pd-sm-40">
		    @if($view['account']->count() != 0)
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
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Akses</th>
                  <th>Email</th>
                  <th>Akun Dibuat</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
              	<?php $a=1; ?>
              	@foreach($view['account'] as $acc)
                <tr>
                  <td>{{$a}}</td>
                  <td>{{$acc->name}}</td>
                  <td>
                  	@if($acc->admin == 1)<a style="color: white;" class="btn btn-sm btn-primary">Admin</a>
                  	@else <a style="color: white;" class="btn btn-sm btn-success">Staff</a>
                  	@endif
                  </td>
                  <td>{{$acc->email}}</td>
                  <td>{{$acc->created_at}}</td>
                  <td>
                  	<a style="color: white;" href="{{ url('Admin/Akun/Ubah/'.$acc->id) }}" class="btn btn-sm btn-success">Ubah</a>
                  	<a style="color: white;" href="{{ url('Admin/Akun/Hapus/'.$acc->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                  </td>
                </tr>
                <?php $a++; ?>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        @else
		<div class="alert alert-danger" role="alert">Belum Ada Akun !</div>
		@endif
    <div align="center">
      <a href="{{url('Admin/Akun/Tambah')}}" style="color: white;" class="btn btn-primary">Tambah Akun</a>
    </div>
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