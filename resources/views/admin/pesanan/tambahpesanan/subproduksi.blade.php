          <div class="form-layout">
            <h6 class="card-body-title">Produksi</h6>
            <div class="row mg-b-25">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Unit Produksi :</label>
                  <select class="form-control" type="text" name="unit_produksi">
                    <option>Pilih Unit...</option>
                    <option value="Locomotive Production">Locomotive Production</option>
                    <option value="Locomotive Wedding">Locomotive Wedding</option>
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Produksi : <span class="tx-danger">*</span></label>
                  <textarea class="form-control" type="text" name="deskripsi_agenda_produksi">Tanggal ____________ Acara _______________ Tempat________________
                  </textarea>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Catatan Tambahan :</label>
                  <textarea class="form-control" type="text" name="catatan_lain"></textarea>
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->
            <h6 class="card-body-title">Revisi & Serah Terima</h6>
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <p class="mg-b-10">Jadwal Preview Pertama : <span class="tx-danger">*</span></p>
                <div class="input-group">
                  <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                <input type="text" name="preview_pertama" class="form-control fc-datepicker" placeholder="YYYY-MM-DD">
              </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <p class="mg-b-10">Jadwal Revisi 1 : <span class="tx-danger">*</span></p>
                <div class="input-group">
                  <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                <input type="text" name="jadwal_1" class="form-control fc-datepicker" placeholder="YYYY-MM-DD">
              </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <p class="mg-b-10">Jadwal Revisi 2 : <span class="tx-danger">*</span></p>
                <div class="input-group">
                  <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                <input type="text" name="jadwal_2" class="form-control fc-datepicker" placeholder="YYYY-MM-DD">
              </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <p class="mg-b-10">Jadwal Serah Terima : <span class="tx-danger">*</span></p>
                <div class="input-group">
                  <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                <input type="text" name="serah_terimah" class="form-control fc-datepicker" placeholder="YYYY-MM-DD">
              </div>
              </div><!-- col-4 -->
            </div><!-- row -->
          </div><!-- form-layout -->
          <div align="center">
            <button  type="submit" class="btn btn-success">Tambah Pesanan</button>
          </div>