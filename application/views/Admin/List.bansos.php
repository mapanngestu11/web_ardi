<!DOCTYPE html>
<html lang="en">

<?php include 'Part/Head.php';?>
<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include 'Part/Sidebar.php';?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php include 'Part/Topbar.php';?>
        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><span class="badge badge-primary">Pendataan Bansos</span></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/Homepage/') ?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Pendataan Bansos</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Pendataan Bansos</h6>
                  <button class="btn btn-primary block" style=" float: right;" data-toggle="modal" data-target="#default" data-backdrop="static" data-keyboard="false">Tambah Data</button>

                  <!-- modal tambah -->
                  <div class="modal fade " id="default" role="dialog" aria-hidden="true" data-backdrop="static">>
                    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="myModalLabel1">Tambah Data</h5>
                          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                          </button>
                        </div>
                        <style>
                          .form-input {
                            padding-top: 5px;
                          }
                          .tambah_warga{
                            display: none;
                          }
                          .btn-cek{
                            margin-top: 40px;
                          }
                        </style>

                        <div class="modal-body">
                          <div class="modal-body">
                            <div class="row mb-4">
                              <div class="col-md-8">
                                <label>Cek Nik</label>
                                <div class="form-group form-input"> 
                                  <input type="text" name="nik" class="form-control" required="">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <button onclick="check_nik()" id="cek_nik" class="btn btn-primary btn-cek">Cek</button>
                              </div>
                            </div>
                            <form action="<?php echo base_url() . 'Admin/Bansos/add'; ?>" method="post" enctype="multipart/form-data" id="tambah_warga" class="tambah_warga">
                              <div class="row">
                                <div class="col-md-6">
                                  <label>Nik</label>
                                  <div class="form-group form-input">
                                    <input type="text" name="nik" id="nik" class="form-control" readonly="">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label>Nama Lengkap</label>
                                  <div class="form-group form-input">
                                    <input type="text" name="nama_warga" id="nama_warga" class="form-control" readonly="">
                                  </div>
                                </div>
                              </div>


                              <div class="row">
                                <div class="col-md-6">
                                  <label>Keterangan</label>
                                  <textarea class="form-control" rows="8" name="keterangan"></textarea>
                                </div>
                                <div class="col-md-6">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <label>Nama Bansos</label>
                                      <input type="text" name="nama_bansos" class="form-control" required="">
                                    </div>
                                    <div class="col-md-12 mt-4">
                                      <label>Jenis Bansos</label>
                                      <select name="jenis_bansos" class="form-control"> 
                                        <option value=""> Pilih </option>
                                        <option value="BLT"> Bantuan Langsung Tunai </option>
                                        <option value="BPNT"> Bantuan Pangan Non Tunai </option>
                                        <option value="PKH"> Program Keluarga Harapan </option>
                                      </select>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                      <label>Jumlah Nominal</label>
                                      <input type="number" name="jumlah_nominal" class="form-control" required="">
                                    </div>
                                    <style type="text/css">
                                      .informasi{
                                        color: red;
                                      }
                                    </style>

                                  </div>
                                </div>
                              </div>

                              <div class="row mt-4">
                                <div class="col-md-12">
                                  <label>Upload File</label>
                                  <input type="file" name="file" class="form-control">
                                </div>
                              </div>
                              <div class="row mt-4">
                                <div class="col-md-12">
                                  <label>Nama Petugas</label>
                                  <?php
                                  $nama_user = $this->session->userdata('nama_lengkap');

                                  ?>
                                  <input type="text" name="nama_user" class="form-control" value="<?php echo $nama_user;?>" readonly="">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal">
                              <i class="bx bx-x d-block d-sm-none"></i>
                              <span class="d-none d-sm-block">Batal</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1">
                              <i class="bx bx-check d-block d-sm-none"></i>
                              <span class="d-none d-sm-block">Tambah</span>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end modal -->
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Nama Bansos</th>
                        <th>Keterangan</th>
                        <th>Nik</th>
                        <th>Nama Warga</th>
                        <th>Jenis Bansos</th>
                        <th>Jumlah Nominal</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                       <th>No</th>
                       <th>Nama Bansos</th>
                       <th>Keterangan</th>
                       <th>Nik</th>
                       <th>Nama Warga</th>
                       <th>Jenis Bansos</th>
                       <th>Jumlah Nominal</th>
                       <th>Action</th>
                     </tr>
                   </tfoot>
                   <tbody>
                    <?php
                    $no = 0;
                    foreach ($bansos->result_array() as $row) :

                      $no++;
                      $id_bansos           = $row['id_bansos'];
                      $nik     = $row['nik'];
                      $nama_warga = $row['nama_warga'];
                      $nama_bansos = $row['nama_bansos'];
                      $keterangan = $row['keterangan'];
                      $jenis_bansos = $row['jenis_bansos'];
                      $jumlah_nominal = $row['jumlah_nominal'];
                      ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $nama_bansos ?></td>
                        <td><?php echo $keterangan ?></td>
                        <td><?php echo $nik ?></td>
                        <td><?php echo $nama_warga ?></td>
                        <td>
                          <?php if ($jenis_bansos == 'BLT') { ?>
                            <p>Bantuan Langsung Tunai</p>
                          <?php }elseif ($jenis_bansos == 'BPNT') { ?>
                            <p>Bantuan Pangan Non Tunai</p>
                          <?php }else{ ?>
                            <p>Program Keluarga Harapan</p>
                          <?php } ?>
                        </td>
                        <td>Rp.<?php echo number_format($jumlah_nominal) ?></td>
                        <td>
                          <div class="form-button-action">
                            <a class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#ModalEdit<?php echo $id_bansos; ?>"><span class="fa fa-edit" style="color:white;"></span></a>
                            <a class="btn btn-link btn-danger btn-lg" data-toggle="modal" data-target="#ModalHapus<?php echo $id_bansos; ?>"><i class=" fa fa-times" data-original-title="Edit Task" style="color:white;"></i></a>
                          </div>
                        </td>
                      <?php endforeach; ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
          <!--Row-->

          <!-- Documentation Link -->


        </div>
        <!---Container Fluid-->
      </div>


      <!-- modal hapus -->
      <?php foreach ($bansos->result_array() as $row) :
        $id_bansos = $row['id_bansos'];
        $nama_warga = $row['nama_warga'];
        ?>
        <div class="modal fade" id="ModalHapus<?php echo $id_bansos; ?>" tabindex="-1" role="dialog" aria-labelledby="">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <!--    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button> -->
                <h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url() . 'Admin/Bansos/delete' ?>" method="post">
                <div class="modal-body">
                  <input type="hidden" name="id_bansos" value="<?php echo $id_bansos; ?>" />

                  <p>Apakah Anda yakin mau menghapus <b><?php echo $nama_warga; ?></b> ?</p>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Batal</span>
                  </button>
                  <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <!-- end modal hapus -->


      <!-- modal edit -->
      <?php foreach ($bansos->result_array() as $row) :
        $id_bansos = $row['id_bansos'];
        $nik = $row['nik'];
        $nama_warga = $row['nama_warga'];
        $nama_bansos = $row['nama_bansos'];
        $jenis_bansos = $row['jenis_bansos'];
        $keterangan = $row['keterangan'];







        ?>
        <div class="modal fade " id="ModalEdit<?php echo $id_bansos; ?>" role="dialog" aria-hidden="true" data-backdrop="static">>
          <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Update Data</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                  <i data-feather="x"></i>
                </button>
              </div>
              <style>
                .form-input {
                  padding-top: 5px;
                }
              </style>

              <div class="modal-body">
                <div class="modal-body">
                  <form action="<?php echo base_url() . 'Admin/Bansos/update'; ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-6">
                        <label>Nik</label>
                        <div class="form-group form-input">
                          <input type="text" name="nik" id="nik" class="form-control" value="<?php echo $nik;?>" readonly="">
                          <input type="hidden" name="id_bansos" value="<?php echo $id_bansos;?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label>Nama Lengkap</label>
                        <div class="form-group form-input">
                          <input type="text" name="nama_warga" id="nama_warga" value="<?php echo $nama_warga;?>" class="form-control" readonly="">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label>Keterangan</label>
                        <textarea class="form-control" rows="6" name="keterangan"><?php echo $keterangan;?></textarea>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-12">
                            <label>Nama Bansos</label>
                            <input type="text" name="nama_bansos" class="form-control" value="<?php echo $nama_bansos;?>" required="">
                          </div>
                          <div class="col-md-12">
                            <label>Jenis Bansos</label>
                            <select name="jenis_bansos" class="form-control"> 
                              <option value="<?php echo $jenis_bansos;?>"> <?php echo $jenis_bansos;?> </option>
                              <option value="BLT"> Bantuan Langsung Tunai </option>
                              <option value="BPNT"> Bantuan Pangan Non Tunai </option>
                              <option value="PKH"> Program Keluarga Harapan </option>
                            </select>
                          </div>
                          <div class="col-lg-12">
                            <label>Jumlah Nominal</label>
                            <input type="text" name="jumlah_nominal" class="form-control" value="<?php echo $jumlah_nominal;?>">
                          </div>
                          <style type="text/css">
                            .informasi{
                              color: red;
                            }
                          </style>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label>Upload File</label>
                        <input type="file" name="file" class="form-control">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label>Nama Petugas</label>
                        <?php
                        $nama_user = $this->session->userdata('nama_lengkap');

                        ?>
                        <input type="text" name="nama_user" class="form-control" value="<?php echo $nama_user;?>" readonly="">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Batal</span>
                  </button>
                  <button type="submit" class="btn btn-primary ml-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Simpan</span>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <!-- end modal -->
      <!-- Footer -->
      <?php include 'Part/Footer.php';?>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php include 'Part/Js.php';?>

  <!-- Page level custom scripts -->
  <script type="text/javascript">
    function check_nik() {

      var input_check_nik = $('[name="nik"]').val();

      $.ajax({
        url: "<?= site_url('Admin/Bansos/cek_warga/') ?>",
        type: "POST",
        dataType: "JSON",
        data: {
          input_check_nik: input_check_nik
        },

        success: function(data) {

          if (data.result != '' ) {
               // alert(data.result[0].nik);
               document.getElementById("tambah_warga").style.display = "block";      
               $('#nik').val(data.result[0].nik);
               $('#nama_warga').val(data.result[0].nama_warga);
               console.log(data.result[0].nik);
             }else{
              alert("Warga Tidak Terdaftar.");
              
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {

          }
        })
    }
  </script>

  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

  <!-- msg -->
  <?php if ($this->session->flashData('msg') == 'warning') : ?>
    <script type="text/javascript">
      Swal.fire({
        type: 'warning',
        title: 'Perhatian !',
        heading: 'Success',
        text: "Proses Gagal !",
        showHideTransition: 'slide',
        icon: 'warning',
        hideAfter: false,
        bgColor: '#7EC857'
      });
    </script>

    <?php elseif ($this->session->flashData('msg') == 'success') : ?>
      <script type="text/javascript">
        Swal.fire({
          type: 'success',
          title: 'Sukses',
          heading: 'Success',
          text: "Data Berhasil Di Tambahkan.",
          showHideTransition: 'slide',
          icon: 'success',
          hideAfter: false,
          bgColor: '#7EC857'
        });
      </script>
      <?php elseif ($this->session->flashData('msg') == 'success_update') : ?>
        <script type="text/javascript">
          Swal.fire({
            type: 'success',
            title: 'Sukses',
            heading: 'Success',
            text: "Data Berhasil Di Update.",
            showHideTransition: 'slide',
            icon: 'success',
            hideAfter: false,
            bgColor: '#7EC857'
          });
        </script>
        <?php elseif ($this->session->flashData('msg') == 'success-hapus') : ?>
          <script type="text/javascript">
            Swal.fire({
              type: 'success',
              title: 'Sukses',
              heading: 'Success',
              text: "Data Berhasil dihapus.",
              showHideTransition: 'slide',
              icon: 'success',
              hideAfter: false,
              bgColor: '#7EC857'
            });
          </script>
          <?php else : ?>

          <?php endif; ?>

        </body>

        </html>