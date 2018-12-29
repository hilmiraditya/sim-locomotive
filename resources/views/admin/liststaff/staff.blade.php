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
                  <td>{{$acc->nama_staff}}</td>
                  <td>{{$acc->email_staff}}</td>
                  <td>
                    @if($acc->unit_staff == "Production") <a style="color: white;" class="btn btn-sm btn-primary">Production</a>
                    @else <a style="color: white;" class="btn btn-sm btn-success">Wedding</a>
                    @endif
                  </td>
                  <td>{{$acc->jabatan_staff}}</td>
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
    {{-- <script>
        jQuery(document).ready(function(){
          jQuery('#ajaxSubmit').click(function(e){
              e.preventDefault();
              $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
              jQuery.ajax({
                url: "{{url('Admin/ListStaff/TambahStaff')}}",
                method: 'post',
                data: {
                    nama_staff : jQuery('#nama').val(),
                    email_staff : jQuery('#email').val(),
                    jabatan_staff : jQuery('#jabatan').val(),
                    unit_staff : jQuery('#unit').val(),
                    no_telefon_staff : jQuery('#no_telefon').val(),
                },
                success: function(result){
                    // console.log(result);
                    if((result.errors)){
                      jQuery('.pesan_gagal').show();
                      jQuery('.pesan_sukses').html(result.pesan_sukses);
                    }
                    else{

                      // jQuery('.pesan_sukses').show();
                      // jQuery('.pesan_sukses').html(result.pesan_sukses);                      
                    }
                }});
              });
          });
    </script> --}}
@endsection
@section('modal')
<!-- Modal Tambah Staff-->
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
                  <input class="form-control" type="text" name="nama" id="nama">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Email : <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="email" id="email">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Jabatan : <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="jabatan" id="jabatan">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Unit : <span class="tx-danger">*</span></label>
                  <select name="unit" id="unit" class="form-control select2">
                    <option label="Pilih"></option>
                    <option value="Production">Locomotive Production</option>
                    <option value="Wedding">Locomotive Wedding</option>
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">No. Handphone : <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="no_telefon" id="no_telefon">
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->
          </div><!-- form-layout -->
      </div>
      <div class="modal-footer">
            <button class="btn btn-info mg-r-5" type="submit" id="ajaxsubmit">Tambah Akun</button>
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
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Nama:</label>
                  <input class="form-control" type="text" value="{{$acc->nama_staff}}" disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Email :</label>
                  <input class="form-control" type="text" value="{{$acc->email_staff}}" disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Jabatan :</label>
                  <input class="form-control" type="text" value="{{$acc->jabatan_staff}}" disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Unit :</label>
                  <input class="form-control" type="text" value="{{$acc->unit_staff}}" disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">No. Handphone :</label>
                  <input class="form-control" type="text" value="{{$acc->no_telefon_staff}}" disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div id="accordion" class="accordion" role="tablist" aria-multiselectable="true">
                  <div class="card">
                    <div class="card-header" role="tab" id="headingOne">
                      <h6 class="mg-b-0">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="tx-gray-800 transition collapsed">
                          Pekerjaan yang dikerjakan
                        </a>
                      </h6>
                    </div><!-- card-header -->

                    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" style="">
                      <div class="card-body">
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
                              <td>
                                <a href="#" class="btn btn-sm btn-danger">Opsi</a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" role="tab" id="headingTwo">
                      <h6 class="mg-b-0">
                        <a class="collapsed transition" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Pekerjaan yang sudah selesai
                        </a>
                      </h6>
                    </div>
                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                      <div class="card-body">
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
                              <td>
                                <a href="#" class="btn btn-sm btn-danger">Opsi</a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" role="tab" id="headingThree">
                      <h6 class="mg-b-0">
                        <a class="collapsed transition" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Pekerjaan yang dibatalkan
                        </a>
                      </h6>
                    </div>
                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                      <div class="card-body">
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
                              <td>
                                <a href="#" class="btn btn-sm btn-danger">Opsi</a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div><!-- collapse -->
                  </div><!-- card -->
                </div>
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
