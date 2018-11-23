          <div class="form-layout">
            <h6 class="card-body-title">PROGRESS PESANAN :</h6>
            <div class="row mg-b-25">
              <div class="col-lg-10">
                <div class="form-group">
                  <input class="form-control" type="text" 
                  value="@if($view['pesanan']->status_pesanan == 0) Dibatalkan @elseif($view['pesanan']->status_pesanan == 1) Sedang Berjalan @else Sudah Selesai" name="nama_klien @endif" disabled>
                </div>
              </div>
              <div class="col-lg-2">
              	<div class="form-grup">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalpesanan">
  						Ubah Progress
					</button>
              	</div>
              </div>
            </div>
         </div>