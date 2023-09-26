<html>
<head>
	<title>Data Permohonan Surat</title>
</head>
<body>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


	<style type="text/css">
		.logo{
			height: 100px;
			padding-left: 200px;
		}
		.judul{
			padding-left: 136px;
		}
	</style>
	<div class="container">
		
		<table style="display: 0">
			<tr>
				<td width="10%"><img src="<?php echo base_url()."assets/front/img/logo tangkot.png"; ?>" class="logo"></td>
				<td><h3 class="judul">Laporan <?php echo $keterangan;?> <br> Kelurahan Karang Timur</h3></td>
			</tr>

		</table>


	</div>
</div>
</div>


<hr>
<style type="text/css">
	.tanggal{
		text-align: right;
		margin-right: 30px;
	}
	table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
	}

	td, th {
		border: 1px solid #dddddd;
		text-align: left;
		padding: 8px;
	}

	tr:nth-child(even) {
		background-color: #dddddd;
	}

</style>
<p class="tanggal">Tangerang, <?php echo date('d-M-Y');?> </p>
<center>
	<h3> Data Permohonan </h3>
</center>

<table>
	<tr>
		<th>No.</th>
		<th>Nik</th>
		<th>Nama Lengkap</th>
		<th>Jenis Bantuan</th>
		<th>Jumlah Nominal</th>
		<th>Tanggal</th>

	</tr>
	<?php 
	$no = 0 ;
	foreach ($laporan as $data) { 
		$no++;
		$nik = $data->nik;
		$nama_lengkap = $data->nama_warga;
		$jenis_bansos = $data->jenis_bansos;
		$jumlah_nominal = $data->jumlah_nominal;
		$tanggal = $data->tanggal;

		?>
		<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $nik;?></td>
			<td><?php echo $nama_lengkap;?></td>
			<td>
				<?php if ($jenis_bansos == 'BLT') { ?>
					<p>Bantuan Langsung Tunai</p>
				<?php }elseif ($jenis_bansos == 'BPNT') { ?>
					<p>Bantuan Pangan Non Tunai</p>
				<?php }else{ ?>
					<p>Program Keluarga Harapan</p>
				<?php } ?>
			</td>
			<td><?php echo number_format($jumlah_nominal);?></td>				
			<td><?php echo $tanggal; ?></td>
		</tr>
	<?php } ?>
</table>
<script type="text/javascript">
	window.print();
</script>


</body>
</html>