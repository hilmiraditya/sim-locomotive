<h6 class="card-body-title">STAFF</h6>
<p>Staff yang terlibat produksi</p>
<div class="table-bordered">
  @if($view['liststaff']->count() > 0)
  <table id="datatable1" class="table table-bordered table-responsive">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Staff</th>
        <th>Jabatan</th>
        <th>Nomor</th>
        <th>Opsi</th>
      </tr>
    </thead>
    <tbody>
      <?php $a=1; ?>
      @foreach($view['liststaff'] as $staff)
      <tr>
        <td>{{ $a }}</td>
        <td>{{ $staff->nama_staff }}</td>
        <td>{{ $staff->jabatan_staff }}</td>
        <td>{{ $staff->no_telefon_staff }}</td>
        <td>
          <a style="color:white;" class="btn btn-sm btn-danger">Batal</a>
        </td>
        <?php $a++; ?>
      @endforeach
      </tr>
    </tbody>
  </table>
  @else
  <div>
    <div class="alert alert-danger">
      <a><b>Belum ada staff yang terdaftar di produksi ini !</b></a>
    </div>
  </div>
  @endif
  <div align="center">
    <a style="color:white;" class="btn btn-md btn-primary" data-toggle="modal" data-target="#invitestaffmodal">
      Tambah Staff kedalam produksi ini
    </a>
  </div>
  <br>
</div><!-- table-wrapper -->
<!-- INVITE STAFF MODAL -->
<div id="invitestaffmodal" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content tx-size-sm">
        <div class="modal-header pd-x-20">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Invite Staff</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body pd-20">
            @if($view['staff']->count() > 0)
            <form action="{{ url('Admin/Pesanan/InviteStaff/'.$view['pesanan']->id) }}" method="POST">
              @csrf
              <table id="datatable1" class="table display responsive nowrap">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Unit</th>
                      <th>Jabatan</th>
                      <th>Undang</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $a=1; ?>
                    @foreach($view['staff'] as $acc)
                    <tr>
                      <td>{{$a}}</td>
                      <td>{{$acc->nama_staff}}</td>
                      <td>{{$acc->email_staff}}</td>
                      <td>
                        @if($acc->unit_staff == "Production") <a style="color: white;" class="btn btn-sm btn-primary">Production</a>
                        @else <a style="color: white;" class="btn btn-sm btn-success">Wedding</a>
                        @endif
                      </td>
                      <td>{{$acc->jabatan_staff}}</td>
                      <td>
                        <input type="checkbox" name="id_staff[]" value="{{$acc->id}}" id="confirm{{$acc->id}}">
                      </td>
                    </tr>
                    <?php $a++; ?>
                    @endforeach
                  </tbody>
                </table>
              
              @else
              <div>
                  <div class="alert alert-danger">
                    <a><b>Belum ada staff yang terdaftar di produksi ini !</b></a>
                  </div>
                </div>
              @endif
        </div><!-- modal-body -->
        @if($view['staff']->count() > 0)
        <div class="modal-footer">
          <input type="submit" value="Undang Staff" class="btn btn-info pd-x-20">
        </div>
      </form>
        @endif
      </div>
    </div><!-- modal-dialog -->
  </div><!-- modal -->
  