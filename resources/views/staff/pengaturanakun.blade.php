@extends('staff.layout')
@section('content')
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Sistem Information Management</a>
        <span class="breadcrumb-item active">Pengaturan Akun</span>
      </nav>
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Pengaturan Akun</h5>
        </div>
        <div class="card pd-20 pd-sm-40">
          <form action="{{url('Staff/PengaturanAkun')}}" method="post">
          @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <input type="hidden" value="{{$view['user']->id}}" name="id">
                <div class="form-group">
                  <label class="form-control-label">Nama: <span class="tx-danger">*</span></label>
                  <input class="form-control" name="name" type="text" value="{{$view['user']->name}}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                  <input disabled class="form-control" name="email" type="text" value="{{$view['user']->email}}">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-8">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="password" name="password" placeholder="(kosongkan jika password tidak ingin diubah)">
                </div>
              </div><!-- col-8 -->
            </div><!-- row -->
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Ubah Akun</button>
              <a style="color: white;" class="btn btn-danger" href="{{url('Staff/Home')}}">Batal</a>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </form>
        </div><!-- card -->
       </div></div>
@endsection