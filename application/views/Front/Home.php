<!DOCTYPE html>
<html lang="zxx">
<?php include 'Part/Head.php';?>

<body id="top">

	<?php include 'Part/Header.php';?>



	<?php 

	$gambar_banner =  $data_banner[0]['gambar'];
	
	?>



	<style type="text/css">

		.banner {
			position: relative;
			overflow: hidden;
			background: #fff;
			background: url("<?php echo base_url() . "assets/upload/"; ?><?php echo $gambar_banner;?>") no-repeat;
			background-size: cover;
			min-height: 550px;
		}

	</style>

	<!-- Slider Start -->
	<section class="banner">
		<div class="container">

			<div class="row">
				<div class="col-lg-6 col-md-12 col-xl-7">
					<div class="block">
						<div class="divider mb-3"></div>




					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="features">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="feature-block d-lg-flex">


						<div class="row">
							<div class="col-md-6">
								<div class="feature-item mb-5 mb-lg-0">
									<div class="feature-icon mb-4">
										<i class="icofont-ui-clock"></i>
									</div>
									<span>Timing schedule</span>
									<h4 class="mb-3">Working Hours</h4>
									<ul class="w-hours list-unstyled">
										<li class="d-flex justify-content-between">Sun - Wed : <span>8:00 - 17:00</span></li>
										<li class="d-flex justify-content-between">Thu - Fri : <span>9:00 - 17:00</span></li>
										<li class="d-flex justify-content-between">Sat - sun : <span>10:00 - 17:00</span></li>
									</ul>
								</div>
							</div>
							<div class="col-md-6">
								<div class="feature-item mb-5 mb-lg-0">
									<div class="feature-icon mb-4">
										<i class="icofont-support"></i>
									</div>
									<span>Emegency Cases</span>
									<h4 class="mb-3">1-800-700-6200</h4>
									<p>Get ALl time support for emergency.We have introduced the principle of family medicine.Get Conneted with us for any urgency .</p>
								</div>
							</div>
						</div>
					</div>					
				</div>
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
