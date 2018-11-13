      <h6 class="card-body-title">PEMESANAN PRODUK</h6>
          <p>Tekan Checkbox tambah untuk memasukkan item ke dalam pemesanan</p>
          <div class="table-bordered">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Harga</th>
                  <th>Kuantitas</th>
                  <th>Deskripsi</th>
                  <th>Tambah</th>
                </tr>
              </thead>
              <tbody>
                <?php $a=1; ?>
                @foreach($view['produk'] as $produk)
              	<tr>
              		<td>{{ $a }}</td>
              		<td>{{ $produk->nama_produk }}</td>
              		<td>{{ "Rp ".number_format($produk->harga_produk,0,',','.').",-" }}</td>
              		<td>{{ $produk->kuantitas_produk }}</td>
              		<td>{{ $produk->deskripsi_produk }}</td>
              		<td>
                    <input type="checkbox" name="vehicle" value="{{$produk->id}}">
              		</td>
                  <?php $a++; ?>
                  @endforeach
              	</tr>
              </tbody>
            </table>
            <br>
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Total Harga HPP : <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="name" disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Total Harga HPP + 30% : <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="name" disabled>
                </div>
              </div><!-- col-4 -->    
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Total Harga HPP + 40% : <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="name" disabled>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Total Harga Akhir : <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="name">
                </div>
              </div><!-- col-4 -->
            </div>         
          </div><!-- table-wrapper -->