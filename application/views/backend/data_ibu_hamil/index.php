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
              <?= validation_errors()?>

              <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#add-modal"><i
                  class="mdi mdi-pencil-plus"></i>Add</a>

              <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                <thead>
                  <tr>
                    <th></th>
                    <th>No. Registrasi</th>
                    <th>Email Registrasi</th>
                    <th>Nama Istri</th>
                    <th>Nama Suami</th>
                  </tr>
                </thead>

                <tbody>
                  <?php $no = 1; foreach($get_ibu as $data):?>
                  <tr>

                    <td class="text-center">
                      <a href="" class="badge badge-danger" data-toggle="modal"
                        data-target="#hapus-modal<?= $data['id']?>"><i class="mdi mdi-trash-can" title="Detail"></i></a>
                      <a href="<?= base_url('backend/d_ibu/detail/') . $data['id']?>" class="badge badge-success"><i
                          class="mdi mdi-eye" title="Detail"></i></a>
                    </td>
                    <td><?= $data['no_regis']?></td>
                    <td><?= $data['email']?></td>
                    <td><?= $data['nama_ibu']?></td>
                    <td><?= $data['nama_suami']?></td>
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
    <div class="modal-dialog modal-lg">
      <form action="<?= base_url('backend/d_ibu')?>" class="parsley-examples" method="POST">

        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add Data Keluarga</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body p-4">

            <center>
              <h4>LENGKAPI DATA KELUARGA</h4>
            </center>

            <div class="form-group">
              <label for="field-1" class="control-label">Akun Registrasi</label>
              <select name="regis_id" id="regis_id" class="form-control">
                <?php foreach($get_register  as $regis):?>
                <option value="<?= $regis['id']?>"><?= $regis['nama']?></option>
                <?php endforeach;?>
              </select>
            </div>

            <div class="form-group">
              <label for="field-1" class="control-label">NO. Registrasi</label>
              <input type="text" name="no_regis" class="form-control" value="S-<?= sprintf("%04s", $no_regis)?>"
                readonly>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Nama Ibu</label>
                  <input type="text" name="nama_ibu" class="form-control" value="<?= set_value('nama_ibu')?>"
                    id="nama_ibu" placeholder="Enter nama ibu" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Nama Suami</label>
                  <input type="text" name="nama_suami" class="form-control" value="<?= set_value('nama_suami')?>"
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
                  <input type="text" name="t_lahir" class="form-control" value="<?= set_value('t_lahir')?>" id="t_lahir"
                    placeholder="Enter tempat kelahiran" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Tanggal Lahir</label>
                  <input type="date" name="tgl_lahir" class="form-control" value="<?= set_value('tgl_lahir')?>"
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
              <input type="text" name="pekerjaan" class="form-control" value="<?= set_value('pekerjaan')?>"
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
                  <input type="teks" name="t_lahir_suami" class="form-control" value="<?= set_value('t_lahir_suami')?>"
                    id="t_lahir_suami" placeholder="Enter tanggal lahir" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Tanggal Lahir</label>
                  <input type="date" name="tgl_lahir_suami" class="form-control"
                    value="<?= set_value('tgl_lahir_suami')?>" id="tgl_lahir_suami" placeholder="Enter tanggal lahir"
                    required>
                </div>
              </div>
            </div>

            <div class="row mt-2">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Pekerjaan</label>
                  <input type="text" name="pekerjaan_suami" class="form-control"
                    value="<?= set_value('pekerjaan_suami')?>" id="pekerjaan_suami" placeholder="Enter pekerjaan"
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
              <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"></textarea>
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

  <!-- hapus data -->
  <?php foreach($get_ibu as $hapus):?>
  <div id="hapus-modal<?= $hapus['id']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Data Keluarga</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body p-4">

          <p>Apakah anda yakin ingin menghapus data?</p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
          <a href="<?= base_url('backend/d_ibu/hapus/') . $hapus['id']?>"
            class="btn btn-danger waves-effect waves-light">Hapus</a>
        </div>
      </div>

    </div>
  </div><!-- /.modal -->
  <?php endforeach;?>