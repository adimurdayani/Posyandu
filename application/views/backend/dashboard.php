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
                <h4 class="page-title">Dashboard</h4>
              </div>
            </div>
          </div>
          <!-- end page title -->

          <div class="row">
            <div class="col-md-6 col-xl-3">
              <div class="widget-rounded-circle card-box">
                <div class="row">
                  <div class="col-6">
                    <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                      <i class="fe-database font-22 avatar-title text-info"></i>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="text-right">
                      <h3 class="mt-1"><span data-plugin="counterup"><?= $jumlah_catatan?></span></h3>
                      <p class="text-muted mb-1 text-truncate">Catatan Kesehatan Ibu Hamil</p>
                    </div>
                  </div>
                </div> <!-- end row-->
              </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
              <div class="widget-rounded-circle card-box">
                <div class="row">
                  <div class="col-6">
                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                      <i class="fe-list font-22 avatar-title text-primary"></i>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="text-right">
                      <h3 class="text-dark mt-1"><span data-plugin="counterup"><?= $jumlah_kelurahan?></span></h3>
                      <p class="text-muted mb-1 text-truncate">Total Kelurahan</p>
                    </div>
                  </div>
                </div> <!-- end row-->
              </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
              <div class="widget-rounded-circle card-box">
                <div class="row">
                  <div class="col-6">
                    <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                      <i class="fe-bar-chart-line- font-22 avatar-title text-info"></i>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="text-right">
                      <h3 class="text-dark mt-1"><span data-plugin="counterup"><?= $jumlah_register?></span></h3>
                      <p class="text-muted mb-1 text-truncate">Total Register</p>
                    </div>
                  </div>
                </div> <!-- end row-->
              </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
              <div class="widget-rounded-circle card-box">
                <div class="row">
                  <div class="col-6">
                    <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                      <i class="fe-users font-22 avatar-title text-primary"></i>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="text-right">
                      <h3 class="text-dark mt-1"><span data-plugin="counterup"><?= $jumlah_ibu?></span></h3>
                      <p class="text-muted mb-1 text-truncate">Total Ibu Hamil</p>
                    </div>
                  </div>
                </div> <!-- end row-->
              </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
          </div>
          <!-- end row-->


          <div class="row">
            <div class="col-8">
              <div class="card">
                <div class="card-body">
                  <h4 class="header-title">Tabel User Regis</h4>

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
                          <a href="<?= base_url('backend/d_regis')?>" class="badge badge-success"><i class="mdi mdi-eye"
                              title="Hapus"></i></a>
                        </td>
                        <td class="text-center"><?= $data['nama']?></td>
                        <td><?= $data['nama_role']?></td>
                        <td><?= $data['email']?></td>
                        <td><?= $data['no_hp']?></td>

                        <td>
                          <?php if($data['no_hp'] != 0):?>
                          <div class="badge badge-success">Teraktivasi</div>
                          <?php else:?>
                          <div class="badge badge-danger">Tidak Teraktivasi</div>
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
            <div class="col-4">

              <div class="card">
                <div class="card-body">
                  <h4>Pengguna Saat Ini</h4>

                  <div class="badge badge-blue">
                    <?= $ses_user['nama']?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end row-->

        </div> <!-- container -->

      </div> <!-- content -->