    <div class="sl-logo"><img style="width: 50%;" src="{{ url('/images/logo.png') }}"></div>
    <div class="sl-sideleft">
      <label class="sidebar-label">Navigasi</label>
      <div class="sl-sideleft-menu">
        <a href="{{'/Admin/Home'}}" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{'/Admin/KalenderTimeline'}}" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-calendar tx-22"></i>
            <span class="menu-item-label">Kalender</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{'/Admin/Akun/LihatAkun'}}" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-person-stalker tx-22"></i>
            <span class="menu-item-label">Akun</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{'/Admin/Produk/LihatProduk'}}" class="sl-menu-link">
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
          <li class="nav-item"><a href="{{'/Admin/Pesanan/DaftarPesanan'}}" class="nav-link">Daftar Pesanan</a></li>
          <li class="nav-item"><a href="{{ '/Admin/Pesanan/TambahPesanan' }}" class="nav-link">Tambah Pesanan</a></li>
        </ul>
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