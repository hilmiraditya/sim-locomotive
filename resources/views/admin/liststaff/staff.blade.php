@extends('admin.layout')
@section('content')
   <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item">Sistem Information Management</a>
        <a class="breadcrumb-item">Staff Locomotive</a>
        <span class="breadcrumb-item active">Daftar Staff</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Daftar Staff</h5>
          <p>Lihat informasi Staff dan detil pekerjaanya.</p>
        </div><!-- sl-page-title -->
        <div class="card pd-20 pd-sm-40">
		    @if($view['staff']->count() != 0)
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
          @if (count($errors) > 0)
          <div class = "alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
          </div>
          @endif
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Unit</th>
                  <th>Jabatan</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
              	<?php $a=1; ?>
              	@foreach($view['staff'] as $acc)
                <tr>
                  <td>{{$a}}</td>
                  <td>{{$acc->nama}}</td>
                  <td>{{$acc->email}}</td>
                  <td>
                    @if($acc->unit == "Production") <a style="color: white;" class="btn btn-sm btn-primary">Production</a>
                    @else <a style="color: white;" class="btn btn-sm btn-success">Wedding</a>
                    @endif
                  </td>
                  <td>{{$acc->jabatan}}</td>
                  <td>
                    <button style="color: white;" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detilmodal{{$acc->id}}">Detil
                    </button>
                  	<a style="color: white;" href="{{ url('Admin/ListStaff/HapusStaff/'.$acc->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                  </td>
                </tr>
                <?php $a++; ?>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        @else
		<div class="alert alert-danger" role="alert">Belum Ada Staff yang terdaftar !</div>
		@endif
    <div align="center">
        <button style="color: white;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahstaffmodal">
          Tambah Staff
         </button>
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
@section('modal')
<!-- Modal -->
<div class="modal fade" id="tambahstaffmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{url('Admin/ListStaff/TambahStaff')}}" method="post">
          @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Nama: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="nama">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Email : <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="email">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Jabatan : <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="jabatan">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Unit : <span class="tx-danger">*</span></label>
                  <select name="unit" class="form-control select2">
                    <option label="Pilih"></option>
                    <option value="Production">Locomotive Production</option>
                    <option value="Wedding">Locomotive Wedding</option>
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">No. Handphone : <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="no_telefon">
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->
          </div><!-- form-layout -->
      </div>
      <div class="modal-footer">
            <button class="btn btn-info mg-r-5" type="submit">Tambah Akun</button>
      </div>
      </form>
    </div>
  </div>
</div>
@foreach($view['staff'] as $acc)
<!-- Modal -->
<div class="modal fade" id="detilmodal{{$acc->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detil {{$acc->nama}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="{{url('Admin/ListStaff/TambahStaff')}}" method="post">
          @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Nama:</label>
                  <input class="form-control" type="text" value="{{$acc->nama}}" disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Email :</label>
                  <input class="form-control" type="text" value="{{$acc->email}}" disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Jabatan :</label>
                  <input class="form-control" type="text" value="{{$acc->jabatan}}" disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Unit :</label>
                  <input class="form-control" type="text" value="{{$acc->unit}}" disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">No. Handphone :</label>
                  <input class="form-control" type="text" value="{{$acc->no_telefon}}" disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <label class="form-control-label">Pembagian Kerja :</label>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Keterangan</th>
                      <th scope="col">Nama Client</th>
                      <th scope="col">Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                      <td>@fat</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Larry</td>
                      <td>the Bird</td>
                      <td>@twitter</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div><!-- row -->
          </div><!-- form-layout -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Ubah Biodata</button>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection