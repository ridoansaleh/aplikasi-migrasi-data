<!DOCTYPE html>
<html lang="en">
	<head>
	    <title>Migration Star</title>
	    <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		
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
							<li class="active"><a href="table.php">Table</a></li>
							<li><a href="form.php">Form</a></li>
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
						<h1 class="page-header">Table</h1>
					</div>
				</div>
	
				<div class="row">
				<div class="col-lg-12">			
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Data Pelanggan PT. Telkom Indonesia Kawasan Cijawura, Kota Bandung
                        </div>
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
								<div class="table-responsive"> 
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal</th>
                                            <th>ODP</th>
                                            <th>Jenis ODP</th>
                                            <th>No. Telepon</th>
                                            <th>No. Speedy</th>
                                            <th>Jenis Layanan</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Alamat</th>
                                            <th>Setter MNA</th>
                                            <th>SN ONT</th>
                                            <th>Tanggal Create</th>
                                            <th>No. Service Order</th>
                                            <th>Tanggal Close SO</th>
                                            <th>Petugas</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
										include('action/config.php');
										$query = mysql_query("SELECT * FROM data_pelanggan ORDER BY dp_nomor") or die(mysql_error());
										
										if(mysql_num_rows($query) == 0){	
											//do nothing							
										}else{	
											$no = 1;	
											while($data = mysql_fetch_assoc($query)){	
												echo '<tr class="odd gradeX">';
													echo '<td>'.$data['dp_nomor'].'</td>';
													echo '<td>'.$data['dp_tanggal'].'</td>';
													echo '<td>'.$data['dp_odp'].'</td>';	
													echo '<td>'.$data['dp_jenisODP'].'</td>';	
													echo '<td>'.$data['dp_noTelepon'].'</td>';	
													echo '<td>'.$data['dp_noSpeedy'].'</td>';	
													echo '<td>'.$data['dp_jenisLayanan'].'</td>';	
													echo '<td>'.$data['dp_namaPelanggan'].'</td>';
													echo '<td>'.$data['dp_alamat'].'</td>';
													echo '<td>'.$data['dp_setterMna'].'</td>';
													echo '<td>'.$data['dp_snOnt'].'</td>';
													echo '<td>'.$data['dp_tanggalCreate'].'</td>';
													echo '<td>'.$data['dp_noServiceOrder'].'</td>';
													echo '<td>'.$data['dp_tanggalCloseSO'].'</td>';
													echo '<td>'.$data['dp_petugas'].'</td>';
													echo '<td>'.$data['dp_keterangan'].'</td>';
													echo '<td>'.$data['dp_status'].'</td>';
													echo '<td><a href="submenu/edit.php?noTelepon='.$data['dp_noTelepon'].'">Edit</a> | 
															  <a href="action/delete.php?noTelepon='.$data['dp_noTelepon'].'">Hapus</a></td>';
												echo '</tr>';									
												$no++;										
											}								
										}
										?>
                                    </tbody>
                                </table>
							
									<div class="well">
										Cari dan import file (.csv) :<br/><br/>
										<form class="form-inline" enctype='multipart/form-data' action='' method='post'>
											<div class="form-group">
												<input type='file' name='file' size='100'/><br/>
												<input class="btn btn-primary" type="submit" name='upload' value='Upload'/>
											</div>
										</form>
										<?php								
											if (isset($_POST['upload'])){									
												$filename=$_FILES["file"]["tmp_name"];
												$allowedExts = array("csv");
												$temp = explode(".", $_FILES["file"]["name"]);
												$extension = end($temp);
												
												if($_FILES["file"]["size"] > 0 && in_array($extension, $allowedExts)){
													$file = fopen($filename, "r");
													$sts=false;
													while (($data = fgetcsv($file, 10000, ",")) !== FALSE){									
														$sql = "INSERT INTO data_pelanggan(dp_nomor, dp_tanggal, dp_odp, dp_jenisODP, dp_noTelepon, dp_noSpeedy, dp_jenisLayanan, 
																dp_namaPelanggan, dp_alamat, dp_setterMna, dp_snOnt, dp_tanggalCreate, dp_noServiceOrder, dp_tanggalCloseSO, 
																dp_petugas, dp_keterangan, dp_status) 
																VALUES('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]',
																'$data[10]','$data[11]','$data[12]','$data[13]','$data[14]','$data[15]','$data[16]')"; 
														mysql_query($sql);
													}
													echo '<script>window.location="table.php"</script>';
													fclose($file);														
												}else{
													echo '<br/>
														  <div class="alert alert-danger alert-dismissible" role="alert">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
																<strong>Error :</strong> File yang Anda upload bukan file .csv atau Anda belum memilih file .csv 
														  </div>';
												}
											}																				
										?>
									</div>
								</div>
							</div>						
						</div>
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

    <!-- DataTables JavaScript -->
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

	</body>
</html>
