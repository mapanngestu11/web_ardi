<!DOCTYPE html>
<html lang="zxx">
<?php include 'Part/Head.php';?>

<body id="top">

	<?php include 'Part/Header.php';?>


	<section class="page-title">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block text-center">
						<span class="text-white">Daftar Warga</span>
						<h1 class="text-capitalize mb-5 text-lg">Kelurahan Karang Timur</h1>

          <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Contact Us</a></li>
        </ul> -->
    </div>
</div>
</div>
</div>
</section>
<!-- contact form start -->

<section class="contact-form-wrap section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="section-title text-center">
					<h2 class="text-md mb-2">Daftar Warga</h2>
					<div class="divider mx-auto my-4"></div>
					
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<form class=" " method="post" action="<?php echo base_url('Warga/Add') ?>" enctype="multipart/form-data">
					<!-- form message -->
					<div class="row">
						<div class="col-12">
							<div class="alert alert-success contact__msg" style="display: none" role="alert">
								Your message was sent successfully.
							</div>
						</div>
					</div>
					<p><?php echo $this->session->flashdata('msg'); ?></p>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>NiK</label>
								<input name="nik" id="name" type="text" class="form-control" placeholder="Nik." >
							</div>
						</div>

						<div class="col-lg-6">
							<div class="form-group">
								<label>Nama Lengkap</label>
								<input name="nama_warga" id="email" type="text" class="form-control" placeholder="Nama Lengkap">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Jenis Kelamin</label>
								<select class="form-control" name="jenis_kelamin" required="">
									<option value=""> Pilih </option>
									<option value="Laki-Laki"> Laki - Laki </option>
									<option value="Perempuan"> Perempuan </option>
								</select>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="form-group">
								<label>No Handphone</label>
								<input name="no_hp" id="email" type="text" class="form-control" placeholder="Nomor Handphone">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>RT</label>
								<input type="text" name="rt" class="form-control" placeholder="Rt.">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>RW</label>
								<input type="text" name="rw" class="form-control" placeholder="Rt.">
							</div>
						</div>
					</div>

					<div class="form-group-2 mb-4">
						<label>Alamat</label>
						<textarea name="alamat" id="message" class="form-control" rows="8" placeholder="Alamat"></textarea>
					</div>
					<div class="form-group-2 mb-4">
						<label>Upload File</label>
						<input type="file" name="file" class="form-control">
					</div>

					<div class="text-center">
						<button type="submit" class="btn btn-main btn-round-full" >Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>



<!-- footer Start -->
<?php include 'Part/Footer.php';?>

<?php include 'Part/Js.php';?>
</body>
</html>