<?php 
	session_start();	
	if(isset($_POST['edit'])){	
		include('../action/config.php');
		$nomor = $_POST['no'];	
		$tanggal = $_POST['tanggal'];
		$odp = $_POST['odp'];	
		$jenisOdp = $_POST['jenisodp'];	
		$nomorTelepon = $_POST['telepon'];	
		$noSpeedy = $_POST['speedy'];
		$jenisLayanan = $_POST['jenislayanan'];
		$namaPelanggan = $_POST['namapelanggan'];
		$alamat	= $_POST['alamat'];
		$setterMna = $_POST['settermna'];
		$snOnt = $_POST['snont'];
		$tanggalCreate = $_POST['tanggalcreate'];
		$noServiceOrder	= $_POST['noservice'];
		$tanggalCloseSO	= $_POST['tanggalclose'];
		$petugas = $_POST['petugas'];
		$keterangan	= $_POST['keterangan'];
		$status	= $_POST['status'];

		$update = mysql_query("UPDATE data_pelanggan SET dp_nomor='$nomor', dp_tanggal='$tanggal', dp_odp='$odp', dp_jenisODP='$jenisOdp', 
		dp_noTelepon='$nomorTelepon', dp_noSpeedy='$noSpeedy',dp_jenisLayanan='$jenisLayanan', dp_namaPelanggan='$namaPelanggan', dp_alamat='$alamat', 
		dp_setterMna='$setterMna', dp_snOnt='$snOnt', dp_tanggalCreate='$tanggalCreate', dp_noServiceOrder='$noServiceOrder', 
		dp_tanggalCloseSO='$tanggalCloseSO', dp_petugas='$petugas', dp_keterangan='$keterangan', dp_status='$status' WHERE dp_noTelepon='$nomorTelepon'") 
		or die(mysql_error());
				
		//echo '<script>window.location="../table.php"</script>';	
		header("location:../table.php");
	}else{	
		//do nothing 
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	    <title>Migration Star</title>
	    <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		 
		<!-- Bootstrap Core CSS -->
		<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- MetisMenu CSS -->
		<link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					<a class="navbar-brand" href="#">Migration Star</a>
				</div>
				<div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav">
							<li><a href="../dashboard.php">Dashboard</a></li>
							<li><a href="../chart.php">Chart</a></li>
							<li><a href="../table.php">Table</a></li>
							<li class="active"><a href="../form.php">Form</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="../action/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
						</ul>
					</div>
				</div>
			</div>
		</nav>   
		
		<br/><br/><br/>
	
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">Edit</h1>
					</div>
				</div>
		
				<div class="row">
					<div class="panel panel-warning">
						<div class="panel-heading">
							Form Data Pelanggan PT. Telkom Indonesia Kawasan Cijawura
						</div>
						<!-- form's start -->
						<div class="panel-body">
							<?php
								include('../action/config.php');
								$noTelepon = $_GET['noTelepon'];
								$show = mysql_query("SELECT * FROM data_pelanggan WHERE dp_noTelepon='$noTelepon'");
								
								if(mysql_num_rows($show) == 0){
									echo '<script>window.history.back()</script>';		
								}else{
									$data = mysql_fetch_assoc($show);	
								}
							?>
							<form action="edit.php" method="post">
							<input type="hidden" name="noTelepon" value="<?php echo $noTelepon; ?>">
								<div class="col-xs-6">
									<div class="form-group">
										<label>Nomor</label>
										<input type="text" name="no" class="form-control" value="<?php echo $data['dp_nomor']; ?>" required />
									</div>
									<div class="form-group">
										<label>Tanggal</label>
										<input type="date" name="tanggal" class="form-control" value="<?php echo $data['dp_tanggal']; ?>" required />
									</div>
									<div class="form-group">
										<label>ODP</label>
										<input type="text" name="odp" class="form-control" value="<?php echo $data['dp_odp']; ?>" required />
									</div>
									<div class="form-group">
										<label>Jenis ODP</label>
										<select name="jenisodp" class="form-control">
											<option value="">Jenis ODP</option>
											<option value="FBW" <?php if($data['dp_jenisODP'] == 'FBW'){ echo 'selected'; } ?>>FBW</option>
											<option value="FBX" <?php if($data['dp_jenisODP'] == 'FBX'){ echo 'selected'; } ?>>FBX</option>
											<option value="FBY" <?php if($data['dp_jenisODP'] == 'FBY'){ echo 'selected'; } ?>>FBY</option>
											<option value="FBZ" <?php if($data['dp_jenisODP'] == 'FBZ'){ echo 'selected'; } ?>>FBZ</option>
											<option value="FDM" <?php if($data['dp_jenisODP'] == 'FDM'){ echo 'selected'; } ?>>FDM</option>
											<option value="FCA" <?php if($data['dp_jenisODP'] == 'FCA'){ echo 'selected'; } ?>>FCA</option>
										</select>
									</div>
									<div class="form-group">
										<label>Nomor Telepon / Handphone</label>
										<input type="text" name="telepon" class="form-control" value="<?php echo $data['dp_noTelepon']; ?>" required />
									</div>
									<div class="form-group">
										<label>Nomor Speedy</label>
										<input type="text" name="speedy" class="form-control" value="<?php echo $data['dp_noSpeedy']; ?>"/>
									</div>
									<div class="form-group">
										<label>Jenis Layanan</label>
										<select name="jenislayanan" class="form-control">
											<option value="">Jenis Layanan</option>
											<option value="1P" <?php if($data['dp_jenisLayanan'] == '1P'){ echo 'selected'; } ?>>1P</option>
											<option value="2P" <?php if($data['dp_jenisLayanan'] == '2P'){ echo 'selected'; } ?>>2P</option>
											<option value="3P" <?php if($data['dp_jenisLayanan'] == '3P'){ echo 'selected'; } ?>>3P</option>
										</select>
									</div>
									<div class="form-group">
										<label>Nama Pelanggan</label>
										<input type="text" name="namapelanggan" class="form-control" value="<?php echo $data['dp_namaPelanggan']; ?>" required />
									</div>
									<div class="form-group">
										<label>Alamat</label>
										<textarea name="alamat" class="form-control" rows="3"> <?php echo $data['dp_alamat']; ?> </textarea>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="form-group">
										<label>Setter MNA</label>
										<select name="settermna" class="form-control">
											<option value="">Setter MNA</option>
											<option value="BTN01" <?php if($data['dp_setterMna'] == 'BTN01'){ echo 'selected'; } ?>>BTN01</option>
											<option value="BTN02" <?php if($data['dp_setterMna'] == 'BTN02'){ echo 'selected'; } ?>>BTN02</option>
											<option value="BTN03" <?php if($data['dp_setterMna'] == 'BTN03'){ echo 'selected'; } ?>>BTN03</option>
											<option value="BTN04" <?php if($data['dp_setterMna'] == 'BTN04'){ echo 'selected'; } ?>>BTN04</option>
											<option value="BTN05" <?php if($data['dp_setterMna'] == 'BTN05'){ echo 'selected'; } ?>>BTN05</option>
											<option value="BTN06" <?php if($data['dp_setterMna'] == 'BTN06'){ echo 'selected'; } ?>>BTN06</option>
											<option value="BTN07" <?php if($data['dp_setterMna'] == 'BTN07'){ echo 'selected'; } ?>>BTN07</option>
											<option value="BTN08" <?php if($data['dp_setterMna'] == 'BTN08'){ echo 'selected'; } ?>>BTN08</option>
											<option value="BTN09" <?php if($data['dp_setterMna'] == 'BTN09'){ echo 'selected'; } ?>>BTN09</option>
											<option value="BTN10" <?php if($data['dp_setterMna'] == 'BTN10'){ echo 'selected'; } ?>>BTN10</option>
										</select>
									</div>
									<div class="form-group">
										<label>SN ONT</label>
										<input type="text" name="snont" class="form-control" value="<?php echo $data['dp_snOnt']; ?>" required />
									</div>
									<div class="form-group">
										<label>Tanggal Create</label>
										<input type="date" name="tanggalcreate" class="form-control" value="<?php echo $data['dp_tanggalCreate']; ?>" required />
									</div>
									<div class="form-group">
										<label>Nomor Service Order</label>
										<input type="text" name="noservice" class="form-control" value="<?php echo $data['dp_noServiceOrder']; ?>" required />
									</div>
									<div class="form-group">
										<label>Tanggal Close SO</label>
										<input type="date" name="tanggalclose" class="form-control" value="<?php echo $data['dp_tanggalCloseSO']; ?>" required />
									</div>
									<div class="form-group">
										<label>Petugas</label>
										<input type="text" name="petugas" class="form-control" value="<?php echo $data['dp_petugas']; ?>" required />
									</div>
									<div class="form-group">
										<label>Keterangan</label>
										<textarea name="keterangan" class="form-control" rows="4"> <?php echo $data['dp_keterangan']; ?> </textarea>
									</div>
									<div class="form-group">
										<label>Status</label>
										<input type="text" name="status" class="form-control" value="<?php echo $data['dp_status']; ?>" required/>
									</div>
									<button type="submit" name="edit" class="btn btn-primary">Simpan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<footer class="footer">
			<div class="container-fluid">
				<div class="row"><center>
					<p class="text-muted">PT. Telkom Indonesia Regional III Jawa Barat&copy;2015<br/> 
					<small>Developed by : Ridoan Saleh Nasution</p></small></center>
				</div>
			</div>
		</footer>
		
	</div>



	<!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

	</body>
</html>
