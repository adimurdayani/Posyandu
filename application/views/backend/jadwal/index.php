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

              <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#add-modal"><i
                  class="mdi mdi-pencil-plus"></i>Add</a>

              <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kelurahan</th>
                    <th>Tanggal Kegiatan</th>
                    <th>Waktu Kegiatan</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  <?php $no = 1; foreach($get_jadwal as $data):?>
                  <tr>
                    <td><?= $no++?></td>
                    <td><?= $data['kelurahan']?></td>
                    <td><?= $data['tgl_kegiatan']?></td>
                    <td><?= $data['waktu_kegiatan']?></td>
                    <td><?= $data['keterangan']?></td>
                    <td>
                      <a href="#" class="badge badge-warning" data-toggle="modal"
                        data-target="#edit-modal<?= $data['id']?>"><i class="mdi mdi-grease-pencil"
                          title="Edit"></i></a>
                      <br>
                      <a href="#" class="badge badge-danger" data-toggle="modal"
                        data-target="#hapus-modal<?= $data['id']?>"><i class="mdi mdi-trash-can" title="Edit"></i></a>
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
      <form action="<?= base_url('backend/jadwal')?>" class="parsley-examples" method="POST">

        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add jadwal</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body p-4">

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Kelurahan</label>
                  <select name="kelurahan_id" id="kelurahan_id" class="form-control">
                    <?php foreach($get_kelurahan as $kelurahan):?>
                    <option value="<?= $kelurahan['id']?>"><?= $kelurahan['kelurahan']?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-2" class="control-label">Tanggal Kegiatan</label>
                  <input type="date" name="tgl_kegiatan" value="<?= set_value('tgl_kegiatan')?>" class="form-control"
                    id="field-2" placeholder="Enter tanggal kegiatan" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="field-3" class="control-label">Waktu Kegiatan</label>
                  <input type="time" name="waktu_kegiatan" class="form-control"
                    value="<?= set_value('waktu_kegiatan')?>" id="field-3" required placeholder="Enter waktu kegiatan">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="field-3" class="control-label">Keterangan</label>
              <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control" required></textarea>
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
  <?php foreach($get_jadwal as $edit):?>
  <div id="edit-modal<?= $edit['id']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <form action="<?= base_url('backend/jadwal/edit')?>" class="parsley-examples" method="POST">

        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit jadwal</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body p-4">

            <input type="hidden" name="id" value="<?= $edit['id']?>">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Kelurahan</label>
                  <select name="kelurahan_id" id="kelurahan_id" class="form-control">
                    <?php foreach($get_kelurahan as $kelurahan):?>
                    <option value="<?= $kelurahan['id']?>" <?php if($edit['kelurahan_id'] != $kelurahan['id']):?>
                      <?php else:?> selected <?php endif;?>><?= $kelurahan['kelurahan']?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-2" class="control-label">Tanggal Kegiatan</label>
                  <input type="date" name="tgl_kegiatan" value="<?= $edit['tgl_kegiatan']?>" class="form-control"
                    id="field-2" placeholder="Enter tanggal kegiatan" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="field-3" class="control-label">Waktu Kegiatan</label>
                  <input type="time" name="waktu_kegiatan" class="form-control" value="<?= $edit['waktu_kegiatan']?>"
                    id="field-3" required placeholder="Enter waktu kegiatan">
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="field-3" class="control-label">Keterangan</label>
              <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control"
                required><?= $edit['keterangan']?></textarea>
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


  <!-- hapus data -->
  <?php foreach($get_jadwal as $hapus):?>
  <div id="hapus-modal<?= $hapus['id']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <form action="" class="parsley-examples" method="POST">

        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Hapus jadwal</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body p-4">

            <p>Apakah anda ingin menghapus data?</p>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
            <a href="<?= base_url('backend/jadwal/hapus/') . $hapus['id']?>"
              class="btn btn-danger waves-effect waves-light">Hapus</a>
          </div>
        </div>

    </div>
  </div><!-- /.modal -->
  <?php endforeach;?>