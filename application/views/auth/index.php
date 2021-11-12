<div class="account-pages mt-5 mb-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-pattern">

          <div class="card-body p-4">

            <div class="text-center w-75 m-auto">
              <div class="auth-logo">
                <a href="index.html" class="logo logo-dark text-center">
                  <span class="logo-lg">
                    <img src="<?= base_url()?>assets/images/logo-posyandu.png" alt="" height="50">
                  </span>
                </a>
              </div>
              <p class="text-muted mb-4 mt-3">Enter your username and password to access admin panel.</p>
              <?= $this->session->flashdata('message');?>
            </div>

            <form action="<?= base_url('login')?>" method="POST">

              <div class="form-group mb-3">
                <label for="emailaddress">Username</label>
                <input class="form-control" type="text" id="username" name="username"
                  value="<?= set_value('username')?>" placeholder="Enter your username">
                <?= form_error('username', '<small class="text-danger">', '</small>')?>
              </div>

              <div class="form-group mb-3">
                <label for="password">Password</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password"
                    placeholder="Enter your password">
                  <div class="input-group-append" data-password="false">
                    <div class="input-group-text">
                      <span class="password-eye"></span>
                    </div>
                  </div>
                </div>
                <?= form_error('password', '<small class="text-danger">', '</small>')?>
              </div>

              <div class="form-group mb-0 text-center">
                <button class="btn btn-info btn-block" type="submit"> Log In </button>
              </div>

            </form>

          </div> <!-- end card-body -->
        </div>
        <!-- end card -->

      </div> <!-- end col -->
    </div>
    <!-- end row -->
  </div>
  <!-- end container -->
</div>
<!-- end page -->