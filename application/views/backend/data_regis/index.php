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

              <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                <thead>
                  <tr>
                    <th class="text-center"></th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Grup</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">No. Hp</th>
                    <th class="text-center">Aktivasi</th>
                    <th class="text-center">Tanggal</th>
                  </tr>
                </thead>

                <tbody>
                  <?php $no = 1; foreach($get_regis as $data):?>
                  <tr>

                    <td class="text-center">
                      <a href="" class="badge badge-danger" data-target="#hapus-modal<?= $data['id']?>"
                        data-toggle="modal"><i class="mdi mdi-trash-can" title="Hapus"></i></a>
                    </td>
                    <td class="text-center"><?= $data['nama']?></td>
                    <td><?= $data['nama_role']?></td>
                    <td><?= $data['email']?></td>
                    <td><?= $data['no_hp']?></td>

                    <td>
                      <?php if($data['aktivasi'] != 1):?>
                      <a href="" class="badge badge-danger" data-target="#status-modal<?= $data['id']?>"
                        data-toggle="modal">Tidak Teraktivasi</a>
                      <?php else:?>
                      <a href="" class="badge badge-success" data-target="#status-modal<?= $data['id']?>"
                        data-toggle="modal">Teraktivasi</a>
                      <?php endif;?>
                    </td>
                    <td><?= $data['created_at']?></td>

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
  <?php foreach($get_regis  as $edit):?>
  <div id="status-modal<?= $edit['id']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <form action="<?= base_url('backend/d_regis/edit')?>" class="parsley-examples" method="POST">

        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Aktivasi User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body p-4">

            <input type="hidden" name="id" id="id" value="<?= $edit['id']?>">

            <div class="form-group">
              <label for="field-1" class="control-label">Pilih Aktivasi</label>
              <select name="aktivasi" id="aktivasi" class="form-control">
                <option value="0" <?php if($edit['aktivasi'] == 0):?> selected <?php endif;?>>Tidak
                  Teraktivasi</option>
                <option value="1" <?php if($edit['aktivasi'] == 1):?> selected <?php endif;?>>Teraktivasi
                </option>
              </select>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning waves-effect waves-light">Update</button>
          </div>
        </div>

      </form>
    </div>
  </div><!-- /.modal -->
  <?php endforeach;?>


  <!-- add data -->
  <?php foreach($get_regis as $hapus):?>
  <div id="hapus-modal<?= $hapus['id']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body p-4">

          <p>Apakah anda ingin menghapus data ini <b>"<?= $hapus['nama']?>"</b></p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
          <a href="<?= base_url('backend/d_regis/hapus/').$hapus['id']?>"
            class="btn btn-danger waves-effect waves-light">Hapus</a>
        </div>
      </div>

    </div>
  </div><!-- /.modal -->
  <?php endforeach;?>