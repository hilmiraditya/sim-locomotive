          
            <h6 class="card-body-title">PROGRESS </h6>
            <p class="mg-b-20 mg-sm-b-30">Kondisi Progress Pesanan Client</p>
            <div class="row mg-b-25">
              <div class="col-lg-10">
                <div class="form-group">
                  <input class="form-control" type="text" 
                  value="@if($view['pesanan']->status_pesanan == 0) Dibatalkan @elseif($view['pesanan']->status_pesanan == 1) Sedang Berjalan @else Sudah Selesai" name="nama_klien @endif" disabled>
                </div>
              </div>
              <div class="col-lg-2">
              	<div class="form-group">
            			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalpesanan">
            					Ubah Progress
            			</button>
              	</div>
              </div>
            </div> 
            <!-- Modal -->
            <div class="modal fade" id="modalpesanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">UBAH PROGRESS</h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form method="post" action="{{ url('Admin/Pesanan/UbahStatusPesanan/'.$view['pesanan']->id) }}">
                    @csrf
                    <div class="modal-body">
                      <div class="form-group">
                        <label>Status Pesanan :</label>
                        <select class="form-control" name="status_pesanan">
                          <option value="0">Dibatalkan</option>
                          <option value="1">Sedang Berjalan</option>
                          <option value="2">Sudah Selesai</option>
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-sm btn-primary">Ubah Progress</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>