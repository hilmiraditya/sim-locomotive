@extends('admin.layout')
@section('content')
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Sistem Information Management</a>
        <span class="breadcrumb-item active">Kalendar Timeline</span>
      </nav>
      <div class="sl-pagebody">
          @if(session()->has('pesan_sukses'))
           <div class="alert alert-success" role="alert">
            {{session()->get('pesan_sukses')}}
           </div>       
          @endif
        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Kalendar Timeline</h6>
          <p class="mg-b-20 mg-sm-b-30">Lihat Kalendar Timeline Locomotive Production</p>
          <p class="mg-b-20 mg-sm-b-30">
          <div id="calendaroi">
            <div id='loading'>loading...</div>
            <div id='calendar'></div>
          </div>
          </p>
        </div>
        <br>
      </div>
    </div>
@endsection
