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
            <h1 class="h3 mb-0 text-gray-800"><span class="badge badge-primary">Data Laporan Bansos</span></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/Homepage/') ?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Laporan Bansos</li>
            </ol>
          </div>

          <style type="text/css">
            .btn-cetak{
              margin-top: 36px;
            }
          </style>
          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Laporan Bansos</h6>
                  <form action="<?php echo base_url() . 'Admin/bansos/cetak_laporan'; ?>" method="POST">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Pilih Bulan</label>
                          <input type="month" name="tanggal" class="form-control" required="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <button type="submit" class="btn btn-danger btn-rounded btn-cetak">Cetak Laporan</button>
                      </div>
                    </div>
                  </form>


                  <!-- modal tambah -->

                  <!-- end modal -->
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Nik</th>
                        <th>Nama</th>
                        <th>Jenis Bantuan</th>
                        <th>Jumlah Nominal</th>

                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                       <th>No</th>
                       <th>Nik</th>
                       <th>Nama</th>
                       <th>Jenis Bantuan</th>
                       <th>Jumlah Nominal</th>

                     </tr>
                   </tfoot>
                   <tbody>
                    <?php
                    $no = 0;
                    foreach ($bansos->result_array() as $row) :

                      $no++;

                      $nik     = $row['nik'];
                      $nama_warga = $row['nama_warga'];
                      $jenis_bansos = $row['jenis_bansos'];
                      $jumlah_nominal = $row['jumlah_nominal'];
                      ?>
                      <tr>
                        <td><?php echo $no ?></td>
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
        url: "<?= site_url('admin/surat_kk_baru/cek_warga/') ?>",
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
               $('#nama_lengkap').val(data.result[0].nama_lengkap);
                // console.log(data.result[0].nik);
              }else{
               alert("Nik Tidak Ditemukan");
               
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