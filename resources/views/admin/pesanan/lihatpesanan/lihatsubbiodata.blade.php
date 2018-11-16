          <div class="form-layout">
            <h6 class="card-body-title">BIODATA KLIEN</h6>
            <div class="row mg-b-25">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Nama: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" value="{{ $view['pesanan']->nama_klien }}" name="nama_klien" disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">No Identitas: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" value="{{ $view['pesanan']->noidentitas_klien }}" name="noidentitas_klien" disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" value="{{ $view['pesanan']->email_klien }}" name="email_klien" disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Alamat: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" value="{{ $view['pesanan']->alamat_klien }}" name="alamat_klien" disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Perusahaan :</label>
                  <input class="form-control" type="text" value="{{ $view['pesanan']->perusahaan_klien }}" name="perusahaan_klien" disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Jabatan :</label>
                  <input class="form-control" type="text" value="{{ $view['pesanan']->jabatan_klien }}" name="jabatan_klien" disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">No. Telfon : <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" value="{{ $view['pesanan']->notelp_klien }}" name="notelp_klien" disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">WhatsApp : <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" value="{{ $view['pesanan']->nowhatsapp_klien }}" name="nowhatsapp_klien" disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Instagram :</label>
                  <input class="form-control" type="text" value="{{ $view['pesanan']->instagram_klien }}" name="instagram_klien" disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Twitter :</label>
                  <input class="form-control" type="text" value="{{ $view['pesanan']->twitter_klien }}" name="twiter_klien" disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Facebook :</label>
                  <input class="form-control" type="text" value="{{ $view['pesanan']->facebook_klien }}" name="facebook_klien" disabled>
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->
          </div><!-- form-layout -->