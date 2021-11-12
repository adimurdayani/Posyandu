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
                <li class="breadcrumb-item"><a href="<?= base_url('backend/d_ibu')?>">Data Ibu Hamil</a></li>
                <li class="breadcrumb-item active"><?= $judul;?></li>
              </ol>
            </div>
            <h4 class="page-title"><?= $judul;?></h4>
            <?= validation_errors()?>
          </div>
        </div>
      </div>
      <!-- end page title -->

      <div class="row">
        <div class="col-xl-8 col-lg-7">
          <!-- project card -->
          <div class="card d-block">
            <div class="card-body">
              <div class="dropdown float-right">
                <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown" aria-expanded="false">
                  <i class='mdi mdi-dots-horizontal font-18'></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item text-danger"
                    data-target="#hapus-modal<?= $get_ibu_id['id']?>" data-toggle="modal">
                    <i class='mdi mdi-delete-outline mr-1'></i>Delete
                  </a>
                </div> <!-- end dropdown menu-->
              </div> <!-- end dropdown-->

              <div class="custom-control custom-checkbox float-left">
                <input type="checkbox" class="custom-control-input" id="completedCheck" checked disabled>
                <label class="custom-control-label" for="completedCheck">
                  Data Keluarga
                </label>
              </div> <!-- end custom-checkbox-->
              <div class="clearfix"></div>

              <h4>DATA DIRI</h4>

              <div class="row">
                <div class="col-md-4">
                  <!-- assignee -->
                  <p class="mt-2 mb-1 text-muted">Nama Suami</p>
                  <div class="media">
                    <i class='mdi mdi-book-account-outline font-18 text-success mr-1'></i>
                    <div class="media-body">
                      <h5 class="mt-1 font-size-14">
                        <?= $get_ibu_id['nama_suami']?>
                      </h5>
                    </div>
                  </div>
                  <!-- end assignee -->
                </div> <!-- end col -->

                <div class="col-md-4">
                  <!-- assignee -->
                  <p class="mt-2 mb-1 text-muted">Nama Istri</p>
                  <div class="media">
                    <i class='mdi mdi-book-account-outline font-18 text-success mr-1'></i>
                    <div class="media-body">
                      <h5 class="mt-1 font-size-14">
                        <?= $get_ibu_id['nama_ibu']?>
                      </h5>
                    </div>
                  </div>
                  <!-- end assignee -->
                </div> <!-- end col -->

              </div> <!-- end row -->


              <h5 class="mt-3">Alamat:</h5>

              <p class="text-muted mb-4">
                <?= $get_ibu_id['alamat']?>
              </p>

            </div> <!-- end card-body-->

          </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-xl-4 col-lg-5">

          <div class="card">
            <div class="card-body">
              <div class="dropdown float-right">
                <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown" aria-expanded="false">
                  <i class='mdi mdi-dots-horizontal font-18'></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item text-danger"
                    data-target="#hapus-modal<?= $get_ibu_id['id']?>" data-toggle="modal">
                    <i class='mdi mdi-delete-outline mr-1'></i>Delete
                  </a>
                </div> <!-- end dropdown menu-->
              </div> <!-- end dropdown-->

              <h5 class="card-title font-16 mb-3">Detail Data</h5>

              <!-- start sub tasks/checklists -->
              <h5 class="mt-4 mb-2">Data Suami</h5>
              <div class="custom-control custom-checkbox mt-1">
                <input type="checkbox" class="custom-control-input" id="checklist1" checked disabled>
                <label class="custom-control-label strikethrough" for="checklist1">
                  Tanggal Lahir: <?= $get_ibu_id['tgl_lahir_suami']?>
                </label>
              </div>

              <div class="custom-control custom-checkbox mt-1">
                <input type="checkbox" class="custom-control-input" id="checklist3" checked disabled>
                <label class="custom-control-label strikethrough" for="checklist3">
                  Agama: <?= $get_ibu_id['agama_suami']?>
                </label>
              </div>

              <div class="custom-control custom-checkbox mt-1">
                <input type="checkbox" class="custom-control-input" id="checklist3" checked disabled>
                <label class="custom-control-label strikethrough" for="checklist3">
                  Pekerjaan: <?= $get_ibu_id['pekerjaan_suami']?>
                </label>
              </div>
              <!-- end sub tasks/checklists -->

              <!-- start sub tasks/checklists -->
              <h5 class="mt-4 mb-2">Data Istri</h5>
              <div class="custom-control custom-checkbox mt-1">
                <input type="checkbox" class="custom-control-input" id="checklist1" checked disabled>
                <label class="custom-control-label strikethrough" for="checklist1">
                  Tanggal Lahir: <?= $get_ibu_id['tgl_lahir']?>
                </label>
              </div>

              <div class="custom-control custom-checkbox mt-1">
                <input type="checkbox" class="custom-control-input" id="checklist2" checked disabled>
                <label class="custom-control-label strikethrough" for="checklist2">
                  Golongan Darah: <?= $get_ibu_id['gol_darah']?>
                </label>
              </div>

              <div class="custom-control custom-checkbox mt-1">
                <input type="checkbox" class="custom-control-input" id="checklist3" checked disabled>
                <label class="custom-control-label strikethrough" for="checklist3">
                  Agama: <?= $get_ibu_id['agama']?>
                </label>
              </div>

              <div class="custom-control custom-checkbox mt-1">
                <input type="checkbox" class="custom-control-input" id="checklist3" checked disabled>
                <label class="custom-control-label strikethrough" for="checklist3">
                  Pekerjaan: <?= $get_ibu_id['pekerjaan']?>
                </label>
              </div>
              <!-- end sub tasks/checklists -->
            </div>
          </div>
        </div>
      </div>
      <!-- end row -->

    </div> <!-- container -->

  </div> <!-- content -->

  <!-- hapus data -->
  <div id="hapus-modal<?= $get_ibu_id['id']?>" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Data Keluarga</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body p-4">

          <p>Apakah yakin ingin menghapus?</p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
          <a href="<?= base_url('backend/d_ibu/hapus/') . $get_ibu_id['id']?>"
            class="btn btn-danger waves-effect waves-light">Hapus</a>
        </div>
      </div>

    </div>
  </div><!-- /.modal -->

  <!-- add data -->
  <div id="edit-modal<?= $get_ibu_id['id']?>" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <form action="" class="parsley-examples" method="POST">

        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add Data Keluarga</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body p-4">

            <center>
              <h4>LENGKAPI DATA KELUARGA</h4>
            </center>
            <input type="hidden" name="id" id="id" value="<?= $get_ibu_id['id']?>">

            <div class="form-group">
              <label for="field-1" class="control-label">NO. Registrasi</label>
              <input type="text" name="no_regis" class="form-control" value="<?= $get_ibu_id['no_regis']?>" readonly>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Nama Ibu</label>
                  <input type="text" name="nama_ibu" class="form-control" value="<?= $get_ibu_id['nama_ibu']?>"
                    id="nama_ibu" placeholder="Enter nama ibu" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Nama Suami</label>
                  <input type="text" name="nama_suami" class="form-control" value="<?= $get_ibu_id['nama_suami']?>"
                    id="nama_suami" placeholder="Enter nama suami" required>
                </div>
              </div>
            </div>

            <center>
              <h4>DATA DIRI IBU</h4>
            </center>

            <div class="form-group">
              <label for="field-1" class="control-label">Agama</label>
              <select name="agama" class="form-control" id="agama">
                <option value="Islam">Islam</option>
                <option value="Hindu">Hindu</option>
                <option value="Kristen">Kristen</option>
                <option value="Buda">Buda</option>
              </select>
            </div>

            <div class="row mt-2">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Tempat Lahir</label>
                  <input type="text" name="t_lahir" class="form-control" value="<?= $get_ibu_id['t_lahir']?>"
                    id="t_lahir" placeholder="Enter tempat kelahiran" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Tanggal Lahir</label>
                  <input type="date" name="tgl_lahir" class="form-control" value="<?= $get_ibu_id['tgl_lahir']?>"
                    id="tgl_lahir" placeholder="Enter tanggal lahir" required>
                </div>
              </div>
            </div>

            <div class="row mt-2">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Pendidikan</label>
                  <select name="pendidikan" class="form-control" id="pendidikan">
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="S1">S1</option>
                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Golongan Darah</label>
                  <select name="gol_darah" class="form-control" id="gol_darah">
                    <option value="A">A</option>
                    <option value="AB">AB</option>
                    <option value="B">B</option>
                    <option value="O">O</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="field-1" class="control-label">Pekerjaan</label>
              <input type="text" name="pekerjaan" class="form-control" value="<?= $get_ibu_id['pekerjaan']?>"
                id="pekerjaan" placeholder="Enter pekerjaan" required>
            </div>


            <center>
              <h4>DATA DIRI SUAMI</h4>
            </center>

            <div class="form-group">
              <label for="field-1" class="control-label">Agama</label>
              <select name="agama_suami" class="form-control" id="agama_suami">
                <option value="Islam">Islam</option>
                <option value="Hindu">Hindu</option>
                <option value="Kristen">Kristen</option>
                <option value="Buda">Buda</option>
              </select>
            </div>

            <div class="row mt-2">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Tempat Lahir</label>
                  <input type="teks" name="t_lahir_suami" class="form-control"
                    value="<?= $get_ibu_id['t_lahir_suami']?>" id="t_lahir_suami" placeholder="Enter tanggal lahir"
                    required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Tanggal Lahir</label>
                  <input type="date" name="tgl_lahir_suami" class="form-control"
                    value="<?= $get_ibu_id['tgl_lahir_suami']?>" id="tgl_lahir_suami" placeholder="Enter tanggal lahir"
                    required>
                </div>
              </div>
            </div>

            <div class="row mt-2">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Pekerjaan</label>
                  <input type="text" name="pekerjaan_suami" class="form-control"
                    value="<?= $get_ibu_id['pekerjaan_suami']?>" id="pekerjaan_suami" placeholder="Enter pekerjaan"
                    required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Pendidikan</label>
                  <select name="pendidikan_suami" class="form-control" id="pendidikan_suami">
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="S1">S1</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="field-1" class="control-label">Alamat</label>
              <textarea name="alamat" id="alamat" cols="30" rows="5"
                class="form-control"><?= $get_ibu_id['alamat']?></textarea>
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