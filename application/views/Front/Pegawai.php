<!DOCTYPE html>
<html lang="zxx">
<?php include 'Part/Head.php';?>
<body id="top">

	<?php include 'Part/Header.php';?>


	<section class="page-title ">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block text-center">
						<span class="text-white">Kelurahan Karang Timur</span>
						<h1 class="text-capitalize mb-5 text-lg">Data Pegawai</h1>

          <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Our services</a></li>
        </ul> -->
    </div>
</div>
</div>
</div>
</section>


<section class="section service-2">
	<div class="container">
		<div class="row">
			<?php foreach ($data_pegawai->result_array() as $row) { 
				$gambar = $row['foto'];
				$nip     = $row['nip'];
				$nama = $row['nama'];
				$jabatan = $row['jabatan'];
				?>

				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="service-block mb-5 mb-lg-0">
						<img src="<?php echo base_url() . "assets/upload/"; ?><?php echo $gambar;?>" alt="" class="img-fluid">
						<div class="content">
							<h4 class="mt-4 mb-2 title-color"><?php echo $nip;?>,<?php echo $nama;?></h4>
							<p class="mb-4"><?php echo $jabatan;?></p>
						</div>
					</div>
				</div>

			<?php } ?>
		</div>
	</div>
</section>


<!-- footer Start -->
<?php include 'Part/Footer.php';?>


    <!-- 
    Essential Scripts
    =====================================-->
    <?php include 'Part/Js.php';?>

</body>
</html>