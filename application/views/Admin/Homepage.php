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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Bantuan Langsung Tunai</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $blt[0]->jumlah;?></div>

                    </div>
                    <div class="col-auto">
                      <i class="fas fa-box fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Bantuan Pangan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $bpnt[0]->jumlah;?></div>

                    </div>
                    <div class="col-auto">
                      <i class="fas fa-box fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Keluarga Harapan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pkh[0]->jumlah;?></div>

                    </div>
                    <div class="col-auto">
                      <i class="fas fa-box fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Warga</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $warga[0]->jumlah;?></div>

                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            <!-- Invoice Example -->

            <!-- Message From Customer-->

          </div>
          <!--Row-->




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

</body>

</html>