<!DOCTYPE html>
<html lang="zxx">
<?php include 'Part/Head.php';?>
<!-- datatable -->
<link href="<?php echo base_url()."assets/Admin/"; ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


<body id="top">

	<?php include 'Part/Header.php';?>


	<section class="page-title">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block text-center">
						<span class="text-white">Data Bantuan Sosial</span>
						<h1 class="text-capitalize mb-5 text-lg">Bantuan Pangan Non Tunai</h1>

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
<section>
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
				</tr>
			</tfoot>
			<tbody>
				<?php
				$no = 0;
				foreach ($data_bansos->result_array() as $row) :

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
						<td><?php echo $jenis_bansos;?></td>
						<td>Rp.<?php echo number_format($jumlah_nominal) ?></td>
					</tr>
				<?php endforeach; ?>

			</tbody>
		</table>
	</div>
</section>




<!-- footer Start -->
<?php include 'Part/Footer.php';?>

<?php include 'Part/Js.php';?>
<!-- Page level plugins -->
<script src="<?php echo base_url()."assets/Admin/"; ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()."assets/Admin/"; ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script>
	$(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
  });
</script>
</body>
</html>
