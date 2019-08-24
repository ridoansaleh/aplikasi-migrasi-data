<?php 
	session_start();	
	if(isset($_POST['simpan'])){	
		include('action/config.php');

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

		$input = mysql_query("INSERT INTO data_pelanggan VALUES('$nomor','$tanggal','$odp','$jenisOdp','$nomorTelepon', 
		'$noSpeedy','$jenisLayanan', '$namaPelanggan', '$alamat', '$setterMna', '$snOnt', '$tanggalCreate', '$noServiceOrder',
		'$tanggalCloseSO', '$petugas', '$keterangan', '$status')") or die(mysql_error());
		
		//echo '<script>window.location="table.php"</script>';
		header("location:table.php");
		
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
		<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- MetisMenu CSS -->
		<link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="dist/css/sb-admin-2.css" rel="stylesheet">

		<!-- Morris Charts CSS -->
		<link href="bower_components/morrisjs/morris.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
							<li><a href="dashboard.php">Dashboard</a></li>
							<li><a href="chart.php">Chart</a></li>
							<li><a href="table.php">Table</a></li>
							<li class="active"><a href="form.php">Form</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="action/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
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
							<h1 class="page-header">Form</h1>
						</div>
					</div>
		
					<div class="row">
						<div class="panel panel-info">
							<div class="panel-heading">
								Form Data Pelanggan PT. Telkom Indonesia Kawasan Cijawura
							</div>
							<!-- form's start -->
							<div class="panel-body">
								<form action="form.php" method="post">
									<div class="col-xs-6">
										<div class="form-group">
											<label>Nomor</label>
											<input type="text" name="no" class="form-control" placeholder="Nomor" required />
										</div>
										<div class="form-group">
											<label>Tanggal</label>
											<input type="date" name="tanggal" class="form-control" required />
										</div>
										<div class="form-group">
											<label>ODP</label>
											<input type="text" name="odp" class="form-control" placeholder="ODP" required />
										</div>
										<div class="form-group">
											<label>Jenis ODP</label>
											<select name="jenisodp" class="form-control">
												<option>Jenis ODP</option>
												<option>FBW</option>
												<option>FBX</option>
												<option>FBY</option>
												<option>FBZ</option>
												<option>FDM</option>
												<option>FCA</option>
											</select>
										</div>
										<div class="form-group">
											<label>Nomor Telepon / Handphone</label>
											<input type="text" name="telepon" class="form-control" placeholder="Nomor Telepon / Handphone" required />
										</div>
										<div class="form-group">
											<label>Nomor Speedy</label>
											<input type="text" name="speedy" class="form-control" placeholder="Nomor Speedy"/>
										</div>
										<div class="form-group">
											<label>Jenis Layanan</label>
											<select name="jenislayanan" class="form-control">
												<option>Jenis Layanan</option>
												<option>1P</option>
												<option>2P</option>
												<option>3P</option>
											</select>
										</div>
										<div class="form-group">
											<label>Nama Pelanggan</label>
											<input type="text" name="namapelanggan" class="form-control" placeholder="Nama Pelanggan" required />
										</div>
										<div class="form-group">
											<label>Alamat</label>
											<textarea name="alamat" class="form-control" rows="3" placeholder="Alamat"></textarea>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label>Setter MNA</label>
											<select name="settermna" class="form-control">
												<option>Setter MNA</option>
												<option>BTN01</option>
												<option>BTN02</option>
												<option>BTN03</option>
												<option>BTN04</option>
												<option>BTN05</option>
												<option>BTN06</option>
												<option>BTN07</option>
												<option>BTN08</option>
												<option>BTN09</option>
												<option>BTN10</option>
											</select>
										</div>
										<div class="form-group">
											<label>SN ONT</label>
											<input type="text" name="snont" class="form-control" placeholder="SN ONT" required />
										</div>
										<div class="form-group">
											<label>Tanggal Create</label>
											<input type="date" name="tanggalcreate" class="form-control" placeholder="Tanggal Create" required />
										</div>
										<div class="form-group">
											<label>Nomor Service Order</label>
											<input type="text" name="noservice" class="form-control" placeholder="Nomor Service Order" required />
										</div>
										<div class="form-group">
											<label>Tanggal Close SO</label>
											<input type="date" name="tanggalclose" class="form-control" placeholder="Tanggal Close SO" required />
										</div>
										<div class="form-group">
											<label>Petugas</label>
											<input type="text" name="petugas" class="form-control" placeholder="Petugas" required />
										</div>
										<div class="form-group">
											<label>Keterangan</label>
											<textarea name="keterangan" class="form-control" rows="4" placeholder="Keterangan"></textarea>
										</div>
										<div class="form-group">
											<label>Status</label>
											<input type="text" name="status" class="form-control" placeholder="Status" required/>
										</div>
										<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
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
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="bower_components/raphael/raphael-min.js"></script>
    <script src="bower_components/morrisjs/morris.min.js"></script>
    <script src="js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
	
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

	</body>
</html>
