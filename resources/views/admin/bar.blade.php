    <div class="sl-logo"><img style="width: 50%;" src="{{ url('/images/logo.png') }}"></div>
    <div class="sl-sideleft">
      <label class="sidebar-label">Navigasi</label>
      <div class="sl-sideleft-menu">
        <a href="{{url('/Admin/Home')}}" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{url('/Admin/KalenderTimeline')}}" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-calendar tx-22"></i>
            <span class="menu-item-label">Kalender</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{url('/Admin/Akun/LihatAkun')}}" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-person-stalker tx-22"></i>
            <span class="menu-item-label">Akun</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{url('/Admin/Produk/LihatProduk')}}" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon fa fa-inbox tx-22"></i>
            <span class="menu-item-label">Produk</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-document-text tx-20"></i>
            <span class="menu-item-label">Pesanan</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="{{url('/Admin/Pesanan/DaftarPesanan')}}" class="nav-link">Daftar Pesanan</a></li>
          <li class="nav-item"><a href="{{ url('/Admin/Pesanan/TambahPesanan')}}" class="nav-link">Tambah Pesanan</a></li>
          <li class="nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#pengaturanpesananmodal" class="nav-link">Pengaturan Order Pesanan</a></li>
        </ul>
        <a href="{{url('/Admin/ListStaff/DaftarStaff')}}" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-person tx-22"></i>
            <span class="menu-item-label">Staff Locomotive</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
      </div>
      <br>
    </div>
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name">{{$view['user']->name}}</span>
              <img src="{{ url('images/people.png') }}" class="wd-32 rounded-circle" alt="">
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href="{{url('Admin/PengaturanAkun')}}"><i class="icon ion-ios-gear-outline"></i>Pengaturan Akun</a></li>
              </ul>
              <ul class="list-unstyled user-profile-nav">
                <li>
                  <a href="{{ route('logout') }}"] onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="icon ion-power"></i>Keluar
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }} 
                  </form>
                </li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- Modal Tambah Staff-->
    <div class="modal fade" id="pengaturanpesananmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Staff</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{url('Admin/ListStaff/TambahStaff')}}" method="post">
                @csrf
                <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label">Nama: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="nama" id="nama">
                    </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label">Email : <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="email" id="email">
                    </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Jabatan : <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="jabatan" id="jabatan">
                    </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Unit : <span class="tx-danger">*</span></label>
                        <select name="unit" id="unit" class="form-control select2">
                        <option label="Pilih"></option>
                        <option value="Production">Locomotive Production</option>
                        <option value="Wedding">Locomotive Wedding</option>
                        </select>
                    </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">No. Handphone : <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="no_telefon" id="no_telefon">
                    </div>
                    </div><!-- col-4 -->
                </div><!-- row -->
                </div><!-- form-layout -->
            </div>
            <div class="modal-footer">
                <button class="btn btn-info mg-r-5" type="submit">Tambah Akun</button>
            </div>
            </form>
        </div>
        </div>
    </div>