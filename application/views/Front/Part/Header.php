	<header>
		<div class="header-top-bar">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<ul class="top-bar-info list-inline-item pl-0 mb-0">

							<li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>RT.002 / RW.004, Karang Timur, Kec. Karang Tengah </li>
						</ul>
					</div>
					<div class="col-lg-6">
						<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
							<a href="tel:+23-345-67890" >
								<span>Nomor Telp : </span>
								<span class="h4">(021) 55764961</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navigation" id="navbar">
			<div class="container">
				<a class="navbar-brand" href="index.html">
					<img src="images/logo.png" alt="" class="img-fluid">
				</a>

				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icofont-navigation-menu"></span>
				</button>
				
				<div class="collapse navbar-collapse" id="navbarmain">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="<?php echo base_url('Home') ?>">Home</a>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="department.html" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profil <i class="icofont-thin-down"></i></a>
							<ul class="dropdown-menu" aria-labelledby="dropdown02">
								<li><a class="dropdown-item" href="#">Data Agenda</a></li>
								<li><a class="dropdown-item" href="#">Galeri</a></li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="department.html" id="bansos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Informasi Bantuan Sosial <i class="icofont-thin-down"></i></a>
							<ul class="dropdown-menu" aria-labelledby="bansos">
								<li><a class="dropdown-item" href="#">Bantuan Langsung Tunai</a></li>
								<li><a class="dropdown-item" href="#">Bantuan Pangan Non Tunai</a></li>
								<li><a class="dropdown-item" href="#">Program Keluarga Harapan</a></li>
							</ul>
						</li>

						<li class="nav-item"><a class="nav-link" href="<?php echo base_url('Warga') ?>">Daftar Warga</a></li>
						<li class="nav-item"><a class="nav-link" href="<?php echo base_url('Kontak') ?>">Kontak</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	