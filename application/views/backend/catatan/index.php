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
                    <th class="text-center"></th>
                    <th class="text-center">No. Registrasi</th>
                    <th class="text-center">Keluhan Sekarang</th>
                    <th class="text-center">Tekanan Darah (mmHg)</th>
                    <th class="text-center">Berat Badan (kg)</th>
                    <th class="text-center">Umur Kehamilan (Minggu)</th>
                    <th class="text-center">Tinggi Fundus (cm)</th>
                    <th class="text-center">Letak Janin Kep/Su/Li</th>
                    <th class="text-center">Denyut Jantung Janin/Menit</th>
                    <th class="text-center">Kaki Bengkak</th>
                    <th class="text-center">Hasil Pemeriksaan Laboratorium</th>
                    <th class="text-center">Tindakan (Terapi. TT/Fe Rujukkan, Umpan Balik)</th>
                    <th class="text-center">Nasihat yang Disampaikan</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center">Tanggal Upload</th>
                  </tr>
                </thead>

                <tbody>
                  <?php foreach($get_catatan as $data):?>
                  <tr>
                    <td>
                      <a href="" class="badge badge-warning" data-target="#edit-modal<?= $data['id']?>"
                        data-toggle="modal">Edit</a>
                      <a href="" class="badge badge-danger" data-target="#hapus-modal<?= $data['id']?>"
                        data-toggle="modal">Hapus</a>
                    </td>
                    <td><?= $data['no_regis']?></td>
                    <td><?= $data['keluhan']?></td>
                    <td><?= $data['tekanan_darah']?></td>
                    <td><?= $data['berat_badan']?></td>
                    <td><?= $data['umur_kehamilan']?></td>
                    <td><?= $data['tinggi_fundus']?></td>
                    <td><?= $data['letak_janin']?></td>
                    <td><?= $data['denyut']?></td>
                    <td><?= $data['kaki_bengkak']?></td>
                    <td><?= $data['hasil_pemeriksaan']?></td>
                    <td><?= $data['tindakan']?></td>
                    <td><?= $data['nasihat']?></td>
                    <td><?= $data['keterangan']?></td>
                    <td><?= $data['tgl']?></td>
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
      <form action="<?= base_url('backend/catatan')?>" class="parsley-examples" method="POST">

        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body p-4">

            <div class="form-group">
              <label for="field-1" class="control-label">NO. Registrasi</label>
              <select name="register_id" id="register_id" class="form-control">
                <?php foreach($get_noregis as $register):?>
                <option value="<?= $register['regis_id']?>"><?= $register['no_regis']?></option>
                <?php endforeach;?>
              </select>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Keluhan Sekarang</label>
                  <input type="text" name="keluhan" class="form-control" value="<?= set_value('keluhan')?>" id="keluhan"
                    placeholder="Enter Keluhan Sekarang" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Tekanan Darah (mmHg)</label>
                  <input type="text" name="tekanan_darah" class="form-control" value="<?= set_value('tekanan_darah')?>"
                    id="tekanan_darah" placeholder="Enter Tekanan Darah (mmHg)" required>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="field-1" class="control-label">Berat Badan (kg)</label>
              <input type="text" name="berat_badan" class="form-control" value="<?= set_value('	berat_badan')?>"
                id="	berat_badan" placeholder="Enter Berat Badan (kg)" required>
            </div>

            <div class="row mt-2">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Umur Kehamilan (Minggu)</label>
                  <input type="text" name="umur_kehamilan" class="form-control"
                    value="<?= set_value('umur_kehamilan')?>" id="umur_kehamilan"
                    placeholder="Enter Umur Kehamilan (Minggu)" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Tinggi Fundus (cm)</label>
                  <input type="text" name="tinggi_fundus" class="form-control" value="<?= set_value('tinggi_fundus')?>"
                    id="tinggi_fundus" placeholder="Enter Tinggi Fundus (cm)" required>
                </div>
              </div>
            </div>

            <div class="row mt-2">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Letak Janin Kep/Su/Li</label>
                  <input type="text" name="letak_janin" class="form-control" value="<?= set_value('letak_janin')?>"
                    id="letak_janin" placeholder="Letak Janin Kep/Su/Li" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Denyut Jantung Janin/Menit</label>
                  <input type="text" name="denyut" class="form-control" value="<?= set_value('denyut')?>" id="denyut"
                    placeholder="Denyut Jantung Janin/Menit" required>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="field-1" class="control-label">Kaki Bengkak</label>
              <input type="text" name="kaki_bengkak" class="form-control" value="<?= set_value('kaki_bengkak')?>"
                id="kaki_bengkak" placeholder="Enter +/-" required>
            </div>

            <div class="form-group">
              <label for="field-1" class="control-label">Hasil Pemeriksaan Laboratorium</label>
              <input type="text" name="hasil_pemeriksaan" class="form-control"
                value="<?= set_value('hasil_pemeriksaan')?>" id="hasil_pemeriksaan"
                placeholder="Enter Hasil Pemeriksaan Laboratorium" required>
            </div>

            <div class="row mt-2">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Tindakan (Terapi. TT/Fe Rujukkan, Umpan Balik)</label>
                  <input type="teks" name="tindakan" class="form-control" value="<?= set_value('tindakan')?>"
                    id="tindakan" placeholder="Enter Terapi. TT/Fe Rujukkan, Umpan Balik" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Nasihat yang Disampaikan</label>
                  <input type="text" name="nasihat" class="form-control" value="<?= set_value('nasihat')?>" id="nasihat"
                    placeholder="Enter Nasihat yang Disampaikan" required>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="field-1" class="control-label">Keterangan</label>
              <textarea name="keterangan" id="keterangan" cols="30" rows="5" class="form-control"></textarea>
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

  <?php foreach($get_catatan as $edit):?>
  <!-- edit data -->
  <div id="edit-modal<?= $edit['id']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <form action="<?= base_url('backend/catatan/edit')?>" class="parsley-examples" method="POST">

        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Update Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body p-4">

            <input type="hidden" name="id" value="<?= $edit['id']?>">

            <div class="form-group">
              <label for="field-1" class="control-label">NO. Registrasi</label>
              <select name="register_id" id="register_id" class="form-control">
                <?php foreach($get_noregis as $register):?>
                <option value="<?= $register['regis_id']?>" <?php if($edit['register_id'] != $register['regis_id']):?>
                  <?php else:?> selected <?php endif;?>>
                  <?= $register['no_regis']?></option>
                <?php endforeach;?>
              </select>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Keluhan Sekarang</label>
                  <input type="text" name="keluhan" class="form-control" value="<?= $edit['keluhan']?>" id="keluhan"
                    placeholder="Enter Keluhan Sekarang" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Tekanan Darah (mmHg)</label>
                  <input type="text" name="tekanan_darah" class="form-control" value="<?= $edit['tekanan_darah']?>"
                    id="tekanan_darah" placeholder="Enter Tekanan Darah (mmHg)" required>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="field-1" class="control-label">Berat Badan (kg)</label>
              <input type="text" name="berat_badan" class="form-control" value="<?= $edit['berat_badan']?>"
                id="	berat_badan" placeholder="Enter Berat Badan (kg)" required>
            </div>

            <div class="row mt-2">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Umur Kehamilan (Minggu)</label>
                  <input type="text" name="umur_kehamilan" class="form-control" value="<?= $edit['umur_kehamilan']?>"
                    id="umur_kehamilan" placeholder="Enter Umur Kehamilan (Minggu)" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Tinggi Fundus (cm)</label>
                  <input type="text" name="tinggi_fundus" class="form-control" value="<?= $edit['tinggi_fundus']?>"
                    id="tinggi_fundus" placeholder="Enter Tinggi Fundus (cm)" required>
                </div>
              </div>
            </div>

            <div class="row mt-2">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Letak Janin Kep/Su/Li</label>
                  <input type="text" name="letak_janin" class="form-control" value="<?= $edit['letak_janin']?>"
                    id="letak_janin" placeholder="Letak Janin Kep/Su/Li" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Denyut Jantung Janin/Menit</label>
                  <input type="text" name="denyut" class="form-control" value="<?= $edit['denyut']?>" id="denyut"
                    placeholder="Denyut Jantung Janin/Menit" required>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="field-1" class="control-label">Kaki Bengkak</label>
              <input type="text" name="kaki_bengkak" class="form-control" value="<?= $edit['kaki_bengkak']?>"
                id="kaki_bengkak" placeholder="Enter +/-" required>
            </div>

            <div class="form-group">
              <label for="field-1" class="control-label">Hasil Pemeriksaan Laboratorium</label>
              <input type="text" name="hasil_pemeriksaan" class="form-control" value="<?= $edit['hasil_pemeriksaan']?>"
                id="hasil_pemeriksaan" placeholder="Enter Hasil Pemeriksaan Laboratorium" required>
            </div>

            <div class="row mt-2">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Tindakan (Terapi. TT/Fe Rujukkan, Umpan Balik)</label>
                  <input type="teks" name="tindakan" class="form-control" value="<?= $edit['tindakan']?>" id="tindakan"
                    placeholder="Enter Terapi. TT/Fe Rujukkan, Umpan Balik" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Nasihat yang Disampaikan</label>
                  <input type="text" name="nasihat" class="form-control" value="<?= $edit['nasihat']?>" id="nasihat"
                    placeholder="Enter Nasihat yang Disampaikan" required>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="field-1" class="control-label">Keterangan</label>
              <textarea name="keterangan" id="keterangan" cols="30" rows="5"
                class="form-control"><?= $edit['keterangan']?></textarea>
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
  <?php foreach($get_catatan as $hapus):?>
  <div id="hapus-modal<?= $hapus['id']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">

      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body p-4">
          <p>Apakah anda yakin ingin menghapus data?</p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
          <a href="<?= base_url('backend/catatan/hapus/').$hapus['id']?>"
            class="btn btn-danger waves-effect waves-light">Hapus</a>
        </div>
      </div>

    </div>
  </div><!-- /.modal -->
  <?php endforeach;?>