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
          <div class="col-6">
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
                <?= validation_errors()?>

                <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#add-modal"><i
                    class="mdi mdi-pencil-plus"></i>Add</a>

                <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                  <thead>
                    <tr>
                      <th class="text-center"></th>
                      <th class="text-center">No.</th>
                      <th class="text-center">Tipe User</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $no = 1; foreach($get_role as $data):?>
                    <tr>

                      <td class="text-center">
                        <a href="" class="badge badge-warning" data-toggle="modal"
                          data-target="#edit-modal<?= $data['id']?>"><i class="mdi mdi-grease-pencil"
                            title="Edit"></i></a>
                        <br>
                        <a href="<?= base_url('backend/role/hapus/'). $data['id']?>" class="badge badge-danger"><i
                            class="mdi mdi-trash-can" title="Edit"></i></a>
                      </td>
                      <td class="text-center"><?= $no++?></td>
                      <td><?= $data['nama_role']?></td>

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
        <form action="<?= base_url('backend/role')?>" class="parsley-examples" method="POST">

          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Role</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="field-1" class="control-label">Nama Role</label>
                    <input type="text" name="nama_role" class="form-control" value="<?= set_value('nama_role')?>"
                      id="nama_role" placeholder="Enter your role name" required>
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

    <!-- edit data -->
    <?php foreach($get_role as $role):?>
    <div id="edit-modal<?= $role['id']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <form action="<?= base_url('backend/role/edit')?>" class="parsley-examples" method="POST">

          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Role</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">

              <input type="hidden" name="id" value="<?= $role['id']?>">

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="field-1" class="control-label">Nama Role</label>
                    <input type="text" name="nama_role" class="form-control" value="<?= $role['nama_role']?>"
                      id="nama_role" placeholder="Enter your role name" required>
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
    <?php endforeach;?>