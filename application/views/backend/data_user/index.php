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
                <li class="breadcrumb-item"><a href="<?= base_url()?>">Dashboard</a></li>
                <li class="breadcrumb-item active"><?= $judul;?></li>
              </ol>
            </div>
            <h4 class="page-title"><?= $judul;?></h4>
          </div>
        </div>
      </div>
      <!-- end page title -->

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h4 class="header-title">Tabel <?= $judul;?></h4>

              <?= $this->session->flashdata('message');?>
              <?= form_error('email', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>', '</div>')?>
              <?= form_error('conf_pass', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>', '</div>')?>
              <?= form_error('username', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>', '</div>')?>

              <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#add-modal"><i
                  class="mdi mdi-pencil-plus"></i>Add</a>

              <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                <thead>
                  <tr>
                    <th class="text-center"></th>
                    <th class="text-center">No.</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Tipe User</th>
                    <th class="text-center">Status</th>
                  </tr>
                </thead>

                <tbody>
                  <?php $no = 1; foreach($get_user as $data):?>
                  <tr>
                    <td class="text-center">
                      <a href="#" class="badge badge-warning" data-toggle="modal"
                        data-target="#edit-modal<?= $data['id']?>"><i class="mdi mdi-grease-pencil"
                          title="Edit"></i></a>
                      <br>
                      <a href="<?= base_url('backend/user/hapus/'). $data['id']?>" class="badge badge-danger"><i
                          class="mdi mdi-trash-can" title="Edit"></i></a>
                    </td>
                    <td class="text-center"><?= $no++?></td>
                    <td><?= $data['nama']?></td>
                    <td><?= $data['email']?></td>
                    <td class="text-center"><?= $data['username']?></td>
                    <td class="text-center"><?= $data['nama_role']?></td>
                    <td class="text-center">

                      <?php if($data['user_active'] == 1):?>
                      <div class="badge badge-success">
                        <i class="mdi mdi-check-bold"></i>
                      </div>
                      <?php else:?>
                      <div class="badge badge-danger">
                        <i class="mdi mdi-close-thick"></i>
                      </div>
                      <?php endif;?>

                    </td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
              </table>

            </div> <!-- end card body-->
          </div> <!-- end card -->
        </div><!-- end col-->
      </div>
      <!-- end row-->
    </div>
  </div>

  <!-- add data -->
  <div id="add-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog">
      <form action="<?= base_url('backend/user')?>" class="parsley-examples" method="POST">

        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body p-4">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Name</label>
                  <input type="text" name="nama" class="form-control" value="<?= set_value('nama')?>" id="nama"
                    placeholder="Enter your name" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-2" class="control-label">Username</label>
                  <input type="text" name="username" value="<?= set_value('username')?>" class="form-control"
                    id="field-2" placeholder="Enter your username" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="field-3" class="control-label">Email</label>
                  <input type="email" name="email" class="form-control" value="<?= set_value('email')?>" id="field-3"
                    required placeholder="Enter your email">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-4" class="control-label">Password</label>
                  <input type="password" name="password" class="form-control" id="pass2" data-parsley-minlength="6"
                    required placeholder="Enter your password">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-5" class="control-label">Confirm Password</label>
                  <input type="password" name="conf_pass" class="form-control" data-parsley-equalto="#pass2"
                    data-parsley-minlength="6" id="conf_pass" required placeholder="Enter confirm password">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="user_id">Tipe User</label>
                  <select name="user_id" id="user_id" class="form-control">
                    <?php foreach($get_role as $role):?>
                    <option value="<?= $role['id']?>"><?= $role['nama_role']?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
          </div>
        </div>

      </form>
    </div>
  </div><!-- /.modal -->

  <!-- add data -->
  <?php foreach($get_user as $user):?>
  <div id="edit-modal<?= $user['id']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <form action="<?= base_url('backend/user/edit')?>" class="parsley-examples" method="POST">

        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Update User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body p-4">

            <input type="hidden" name="id" value="<?= $user['id']?>">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Name</label>
                  <input type="text" name="nama" class="form-control" value="<?= $user['nama']?>" id="nama"
                    placeholder="Enter your name" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-2" class="control-label">Username</label>
                  <input type="text" name="username" value="<?= $user['username']?>" class="form-control" id="field-2"
                    placeholder="Enter your username" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="field-3" class="control-label">Email</label>
                  <input type="email" name="email" class="form-control" value="<?= $user['email']?>" id="field-3"
                    required placeholder="Enter your email">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-4" class="control-label">Password</label>
                  <input type="password" name="password" class="form-control" id="pass1" data-parsley-minlength="6"
                    required placeholder="Enter your password">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-5" class="control-label">Confirm Password</label>
                  <input type="password" name="conf_pass" class="form-control" data-parsley-equalto="#pass1"
                    data-parsley-minlength="6" id="conf_pass" required placeholder="Enter confirm password">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="user_id">Tipe User</label>
                  <select name="user_id" id="user_id" class="form-control">
                    <?php foreach($get_role as $role_id):?>
                    <option value="<?= $role_id['id']?>" <?php if($user['user_id'] == $role_id['id']):?> selected
                      <?php endif;?>><?= $role_id['nama_role']?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="user_active">Aktifkan User</label>
                  <select name="user_active" id="user_active" class="form-control">
                    <option value="0" <?php if($user['user_active'] == 0):?> selected <?php endif;?>>Tidak Aktif
                    </option>
                    <option value="1" <?php if($user['user_active'] == 1):?> selected <?php endif;?>>Aktif</option>
                  </select>
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info waves-effect waves-light">Save Change</button>
          </div>
        </div>

      </form>
    </div>
  </div><!-- /.modal -->
  <?php endforeach;?>