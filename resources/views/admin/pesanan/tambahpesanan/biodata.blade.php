@extends('admin.layout')
@section('content')
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Sistem Information Management</a>
        <a class="breadcrumb-item" href="">Pesanan</a>
        <span class="breadcrumb-item active">Tambah Pesanan</span>
      </nav>
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Tambah Pesanan (1/2)</h5>
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
          <form action="{{url('Admin/Produk/TambahProduk')}}" method="post">
          @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Nama : <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="nama_produk">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Harga : <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="harga_produk">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Kuantitas : <span class="tx-danger">*</span></label>
                  <select class="form-control" name="kuantitas_produk">
                    <option>Silahkan Dipilih..</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Deskripsi : <span class="tx-danger">*</span></label>
                  <textarea class="form-control" type="text" name="deskripsi_produk"></textarea>
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Tambah Produk</button>
              <a style="color: white;" class="btn btn-danger" href="{{url('Admin/Produk/LihatProduk')}}">Batal</a>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </form>
        </div><!-- card -->
       </div></div>
@endsection