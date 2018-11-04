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
