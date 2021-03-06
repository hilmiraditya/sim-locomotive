@extends('admin.layout')
@section('content')
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Sistem Information Management</a>
        <a class="breadcrumb-item" href="">Akun</a>
        <span class="breadcrumb-item active">Tambah Akun</span>
      </nav>
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Tambah Akun</h5>
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
          <form action="{{url('Admin/Akun/Tambah')}}" method="post">
          @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Nama: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="name">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="email">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-8">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="password" name="password">
                </div>
              </div><!-- col-8 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Hak Akses/Role : <span class="tx-danger">*</span></label>
                  <select name="role" class="form-control select2">
                    <option label="Pilih"></option>
                    <option value="Admin">Admin</option>
                    <option value="Staff">Staff</option>
                  </select>
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Tambah Akun</button>
              <a style="color: white;" class="btn btn-danger" href="{{url('Admin/Akun/LihatAkun')}}">Batal</a>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </form>
        </div><!-- card -->
       </div></div>
@endsection