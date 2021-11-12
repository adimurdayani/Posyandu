<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

  <div class="h-100" data-simplebar>

    <!-- User box -->
    <div class="user-box text-center">
      <img src="<?= base_url()?>assets/images/logo.png" alt="user-img" title="Mat Helme"
        class="rounded-circle avatar-md">
      <div class="dropdown">
        <a href="<?= base_url()?>" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
          data-toggle="dropdown"><?= $ses_user['nama']?></a>
        <div class="dropdown-menu user-pro-dropdown">

          <!-- item-->
          <a href="javascript:void(0);" class="dropdown-item notify-item">
            <i class="fe-settings mr-1"></i>
            <span>Settings</span>
          </a>

          <!-- item-->
          <a href="javascript:void(0);" class="dropdown-item notify-item" data-target="#logout-modal"
            data-toggle="modal">
            <i class="fe-log-out mr-1"></i>
            <span>Logout</span>
          </a>

        </div>
      </div>
      <p class="text-muted"><?= $ses_user['username']?></p>
    </div>

    <!--- Sidemenu -->
    <div id="sidebar-menu">

      <ul id="side-menu">

        <li class="menu-title">Navigation</li>

        <li>
          <a href="<?= base_url()?>">
            <i class="mdi mdi-view-dashboard-outline"></i>
            <span> Dashboard </span>
          </a>
        </li>

        <li class="menu-title mt-2">Apps</li>

        <li>
          <a href="<?= base_url('backend/catatan')?>">
            <i class="mdi mdi-clipboard-file-outline"></i>
            <span> Catatan K.I.H </span>
          </a>
        </li>

        <li>
          <a href="<?= base_url('backend/jadwal')?>">
            <i class="mdi mdi-calendar"></i>
            <span> Jadwal Imunisasi </span>
          </a>
        </li>

        <li class="menu-title mt-2">Relation</li>

        <li>
          <a href="<?= base_url('backend/kelurahan')?>">
            <i class="mdi mdi-cloud-search-outline"></i>
            <span> Data Kelurahan </span>
          </a>
        </li>

        <li>
          <a href="<?= base_url('backend/role')?>">
            <i class="mdi mdi-account-network-outline"></i>
            <span> Data Role </span>
          </a>
        </li>

        <li class="menu-title mt-2">Settings</li>

        <li>
          <a href="#sidebarAuth" data-toggle="collapse">
            <i class="mdi mdi-account-cog"></i>
            <span> User Manajemen </span>
            <span class="menu-arrow"></span>
          </a>
          <div class="collapse" id="sidebarAuth">
            <ul class="nav-second-level">
              <li>
                <a href="<?= base_url('backend/user')?>">Data User</a>
              </li>
              <li>
                <a href="<?= base_url('backend/d_ibu')?>">Data Ibu Hamil</a>
              </li>
              <li>
                <a href="<?= base_url('backend/d_regis')?>">Data Registrasi</a>
              </li>
            </ul>
          </div>
        </li>

        <li>
          <a href="<?= base_url('backend/profile')?>">
            <i class="fe-user"></i>
            <span> Profile </span>
          </a>
        </li>

      </ul>
    </div>
    </li>
    </ul>

  </div>
  <!-- End Sidebar -->

  <div class="clearfix"></div>

</div>
<!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->

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