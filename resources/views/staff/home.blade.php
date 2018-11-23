@extends('staff.layout')
@section('content')
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Sistem Information Management</a>
        <span class="breadcrumb-item active">Dashboard</span>
      </nav>
      <div class="sl-pagebody">
          @if(session()->has('pesan_sukses'))
           <div class="alert alert-success" role="alert">
            {{session()->get('pesan_sukses')}}
           </div>       
          @endif
        <div class="row row-sm">
          <div class="col-sm-6 col-xl-3">
            <div class="card pd-20 bg-primary">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Pesanan Dalam Pengerjaan :</h6>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span></span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$view['pengerjaan']}}</h3>
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="card pd-20 bg-success">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Pesanan Selesai :</h6>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span></span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$view['selesai']}}</h3>
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card pd-20 bg-warning">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Pesanan Batal :</h6>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span></span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$view['batal']}}</h3>
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="card pd-20 bg-sl-primary">
              <div class="d-flex justify-content-between align-items-center mg-b-10">
                <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Total Pesanan :</h6>
              </div><!-- card-header -->
              <div class="d-flex align-items-center justify-content-between">
                <span></span>
                <h3 class="mg-b-0 tx-white tx-lato tx-bold">{{$view['pesanan']}}</h3>
              </div><!-- card-body -->
            </div><!-- card -->
          </div><!-- col-3 -->
        </div><!-- row -->
        <br>
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Selamat datang</h6>
          <br>
          <p class="mg-b-20 mg-sm-b-30">Anda login sebagai <b>{{$view['user']->name}}</b> dengan hak akses <b>
            @if($view['user']->admin == true) Admin !
            @else Staff !
            @endif
          </b></p>
        </div>
        <br>
      </div>
    </div>
@endsection
