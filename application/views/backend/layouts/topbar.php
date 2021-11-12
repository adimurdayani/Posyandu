<!-- Topbar Start -->
<div class="navbar-custom">
  <div class="container-fluid">
    <ul class="list-unstyled topnav-menu float-right mb-0">

      <li class="dropdown d-none d-lg-inline-block">
        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
          <i class="fe-maximize noti-icon"></i>
        </a>
      </li>

      <li class="dropdown notification-list topbar-dropdown">
        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#"
          role="button" aria-haspopup="false" aria-expanded="false">
          <img src="<?= base_url()?>assets/images/logo.png" alt="user-image" class="rounded-circle">
          <span class="pro-user-name ml-1">
            <?= $ses_user['nama']?> <i class="mdi mdi-chevron-down"></i>
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
          <!-- item-->
          <div class="dropdown-header noti-title">
            <h6 class="text-overflow m-0">Welcome !</h6>
          </div>

          <!-- item-->
          <a href="javascript:void(0);" class="dropdown-item notify-item">
            <i class="fe-settings"></i>
            <span>Settings</span>
          </a>

          <div class="dropdown-divider"></div>

          <!-- item-->
          <a href="javascript:void(0);" class="dropdown-item notify-item" data-target="#logout-modal"
            data-toggle="modal">
            <i class="fe-log-out"></i>
            <span>Logout</span>
          </a>

        </div>
      </li>

    </ul>

    <!-- LOGO -->
    <div class="logo-box">
      <a href="<?= base_url()?>" class="logo logo-dark text-center">
        <span class="logo-sm">
          <img src="<?= base_url()?>assets/images/logo-posyandu-sm.png" alt="" height="22">
          <!-- <span class="logo-lg-text-light">UBold</span> -->
        </span>
        <span class="logo-lg">
          <img src="<?= base_url()?>assets/images/logo-posyandu.png" alt="" height="20">
          <!-- <span class="logo-lg-text-light">U</span> -->
        </span>
      </a>

      <a href="<?= base_url()?>" class="logo logo-light text-center">
        <span class="logo-sm">
          <img src="<?= base_url()?>assets/images/logo-posyandu-sm.png" alt="" height="22">
        </span>
        <span class="logo-lg">
          <img src="<?= base_url()?>assets/images/logo-posyandu.png" alt="" height="20">
        </span>
      </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
      <li>
        <button class="button-menu-mobile waves-effect waves-light">
          <i class="fe-menu"></i>
        </button>
      </li>

      <li>
        <!-- Mobile menu toggle (Horizontal Layout)-->
        <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
          <div class="lines">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </a>
        <!-- End mobile menu toggle-->
      </li>

    </ul>
    <div class="clearfix"></div>
  </div>
</div>
<!-- end Topbar -->

<!-- logout data -->
<div id="logout-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
  style="display: none;">
  <div class="modal-dialog">
    <form action="<?= base_url('login/logout')?>" class="parsley-examples" method="POST">

      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Apakah anda yakin ingin keluar?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body p-4">

          <p>Jika anda ingin keluar dari website maka klik "tombol logout", jika anda tidak ingin keluar klik "tombol
            close"</p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger waves-effect waves-light">Logout</button>
        </div>
      </div>

    </form>
  </div>
</div><!-- /.modal -->