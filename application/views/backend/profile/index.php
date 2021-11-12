<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
  <div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
        <div class="col-12">
          <div class="page-title-box">
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard')?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Profile</li>
              </ol>
            </div>
            <h4 class="page-title">Profile</h4>
          </div>
        </div>
      </div>
      <!-- end page title -->

      <div class="row">
        <div class="col-lg-4 col-xl-4">
          <div class="card-box text-center">
            <img src="<?= base_url()?>assets/images/logo.png" class="rounded-circle avatar-lg img-thumbnail"
              alt="profile-image">

            <h4 class="mb-0"><?= $ses_user['nama']?></h4>
            <p class="text-muted"><?= $ses_user['email']?></p>

            <div class="text-left mt-3">
              <h4 class="font-13 text-uppercase">About Me :</h4>
              <p class="text-muted font-13 mb-3">
                Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                1500s, when an unknown printer took a galley of type.
              </p>
              <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ml-2">Geneva
                  D. McKnight</span></p>

              <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ml-2">(123)
                  123 1234</span></p>

              <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 ">user@email.domain</span>
              </p>

              <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ml-2">USA</span></p>
            </div>

          </div> <!-- end card-box -->

        </div> <!-- end col-->

        <div class="col-lg-8 col-xl-8">
          <div class="card-box">
            <ul class="nav nav-pills navtab-bg nav-justified">
              <li class="nav-item">
                <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link active">
                  Edit Data Admin
                </a>
              </li>
            </ul>
            <div class="tab-content">

              <div class="tab-pane show active" id="settings">
                <form method="POST" action="<?= base_url('backend/profile')?>" class="parsley-examples">
                  <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> Personal Info</h5>

                  <?= $this->session->flashdata('msg');
                  ?>
                  <?= validation_errors()?>

                  <input type="hidden" name="id" value="<?= $ses_user['id']?>">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="firstname">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" id="firstname"
                          value="<?= $ses_user['nama']?>" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username"
                          value="<?= $ses_user['username']?>" required>
                      </div>
                    </div> <!-- end col -->
                  </div> <!-- end row -->

                  <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $ses_user['email']?>"
                      required>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password"
                          id="pass2" data-parsley-minlength="6" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="pass_konf">Password Konfirmasi</label>
                        <input type="password" class="form-control" name="pass_konf" data-parsley-equalto="#pass2"
                          data-parsley-minlength="6" required placeholder="Enter password konfirmasi">
                      </div>
                    </div> <!-- end col -->
                  </div> <!-- end row -->

                  <div class="text-right">
                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                        class="mdi mdi-content-save"></i> Update</button>
                  </div>
                </form>
              </div>
              <!-- end settings content-->

            </div> <!-- end tab-content -->
          </div> <!-- end card-box-->

        </div> <!-- end col -->
      </div>
      <!-- end row-->

    </div> <!-- container -->

  </div> <!-- content -->