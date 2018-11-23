      <h6 class="card-body-title">PEMESANAN PRODUK</h6>
          <p>Produk yang telah dipesan</p>
          <div class="table-bordered">
            <table id="datatable1" class="table table-bordered table-responsive">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Harga</th>
                  <th>Kuantitas</th>
                  <th>Deskripsi</th>
                </tr>
              </thead>
              <tbody>
                <?php $a=1; ?>
                @foreach($view['orderproduk'] as $produk)
                <tr>
                  <td>{{ $a }}</td>
                  <td>{{ $produk->nama_produk }}</td>
                  <td>{{ "Rp ".number_format($produk->harga_produk,0,',','.').",-" }}</td>
                  <td>{{ $produk->kuantitas_produk }}</td>
                  <td>{{ $produk->deskripsi_produk }}</td>
                  <?php $a++; ?>
                  @endforeach
                </tr>
              </tbody>
            </table>
            <br>
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Total Harga HPP :</label>
                  <input class="form-control" type="text" id="hpp" value="{{ "Rp ".number_format($view['orderproduk']->sum('harga_produk'),0,',','.') }}" disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Total Harga HPP + 30% :</label>
                  <input class="form-control" type="text" id="hpp30" value="{{ "Rp ".number_format(($view['orderproduk']->sum('harga_produk')*0.3)+$view['orderproduk']->sum('harga_produk'),0,',','.') }}" disabled>
                </div>
              </div><!-- col-4 -->    
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Total Harga HPP + 40% :</label>
                  <input class="form-control" type="text" id="hpp40" value="{{ "Rp ".number_format(($view['orderproduk']->sum('harga_produk')*0.4)+$view['orderproduk']->sum('harga_produk'),0,',','.') }}" disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Total Harga Akhir : <span class="tx-danger">*</span></label>
                  <input class="form-control" type="hidden" name="total_harga" value="{{ $view['pesanan']->total_harga }}">
                  <input class="form-control" type="text" id="hargaakhir" value="{{ "Rp " . number_format($view['pesanan']->total_harga,0,',','.').",-" }}" disabled>
                </div>
              </div><!-- col-4 -->
            </div>         
          </div><!-- table-wrapper -->
