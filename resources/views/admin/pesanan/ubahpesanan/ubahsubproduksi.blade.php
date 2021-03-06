          <div class="form-layout">
            <h6 class="card-body-title">Produksi</h6>
            <div class="row mg-b-25">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Unit Produksi : <span class="tx-danger">*</span></label>
                  <select class="form-control" type="text" name="unit_produksi">
                    <option value="Locomotive Production">Locomotive Production</option>
                    <option value="Locomotive Wedding">Locomotive Wedding</option>
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <p class="mg-b-10">Tanggal Awal Produksi : <span class="tx-danger">*</span></p>
                <div class="input-group">
                  <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                <input type="date" name="agenda_produksi_dari" class="form-control" value="{{ $view['pesanan']->agenda_produksi_dari}}">
              </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <p class="mg-b-10">Tanggal Akhir Produksi : <span class="tx-danger">*</span></p>
                <div class="input-group">
                  <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                <input type="date" name="agenda_produksi_hingga" class="form-control" value="{{ $view['pesanan']->agenda_produksi_hingga}}">
              </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Deskripsi Agenda Produksi : <span class="tx-danger">*</span></label><br>
                  <textarea class="form-control" type="text" name="deskripsi_agenda_produksi">
                  {{$view['pesanan']->deskripsi_agenda_produksi}}
                  </textarea>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Catatan Tambahan :</label>
                  <textarea class="form-control" type="text" name="catatan_lain">
                    {{$view['pesanan']->catatan_lain}}
                  </textarea>
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->
            <h6 class="card-body-title">Revisi & Serah Terima</h6>
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <p class="mg-b-10">Jadwal Preview Pertama : <span class="tx-danger">*</span></p>
                <div class="input-group">
                  <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                <input type="date" name="preview_pertama" class="form-control" value="{{ $view['pesanan']->preview_pertama}}">
              </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <p class="mg-b-10">Jadwal Rev isi 1 : <span class="tx-danger">*</span></p>
                <div class="input-group">
                  <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                <input type="date" name="jadwal_1" class="form-control" value="{{$view['pesanan']->jadwal_1}}">
              </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <p class="mg-b-10">Jadwal Revisi 2 : <span class="tx-danger">*</span></p>
                <div class="input-group">
                  <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                <input type="date" name="jadwal_2" class="form-control" value="{{$view['pesanan']->jadwal_2}}">
              </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <p class="mg-b-10">Jadwal Serah Terima : <span class="tx-danger">*</span></p>
                <div class="input-group">
                  <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                <input type="date" name="serah_terimah" value="{{$view['pesanan']->serah_terimah}}" class="form-control">
              </div>
              </div><!-- col-4 -->
            </div><!-- row -->
          </div><!-- form-layout -->
          <div align="center">
            <button type="submit" class="btn btn-primary">Ubah Pesanan</button>
          </div>