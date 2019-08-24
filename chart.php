<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<title>Migration Star</title>
	  
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
		
		<!--
		<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
        <script src="http://cdn.oesmith.co.uk/morris-0.4.1.min.js"></script> -->
		
		<!-- Morris Charts JavaScript -->
		<script src="js/raphael-min.js"></script>
		<script src="js/jquery-1.8.2.min.js"></script>
		<script src="js/morris-0.4.1.min.js"></script>

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
							<li class="active"><a href="chart.php">Chart</a></li>
							<li><a href="table.php">Table</a></li>
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
						<h1 class="page-header">Chart</h1>
					</div>
				</div>
		
				<div class="row">
					<div class="col-xs-12 col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								Bar Chart 
							</div>
							<div class="panel-body">
							<div class="table-responsive">
								<div id="morris-bar-chart">
									<script>
									Morris.Bar({
									  element: 'morris-bar-chart',
										<?php 
										include('action/config.php');
										$p1   = mysql_query("SELECT * FROM data_pelanggan WHERE dp_jenisODP='FBW'");
										$p2   = mysql_query("SELECT * FROM data_pelanggan WHERE dp_jenisODP='FBX'");
										$p3   = mysql_query("SELECT * FROM data_pelanggan WHERE dp_jenisODP='FBY'");
										$p4   = mysql_query("SELECT * FROM data_pelanggan WHERE dp_jenisODP='FBZ'");
										$p5   = mysql_query("SELECT * FROM data_pelanggan WHERE dp_jenisODP='FDM'");
										$p6   = mysql_query("SELECT * FROM data_pelanggan WHERE dp_jenisODP='FCA'");
										$bbs1 = mysql_num_rows($p1); 
										$bbs2 = mysql_num_rows($p2); 
										$bbs3 = mysql_num_rows($p3); 
										$bbs4 = mysql_num_rows($p4); 
										$bbs5 = mysql_num_rows($p5); 
										$bbs6 = mysql_num_rows($p6);
										?>
									  data: [
										{ y: 'fbw', a: <?php echo $bbs1; ?>},
										{ y: 'fbx', a: <?php echo $bbs2; ?>},
										{ y: 'fby', a: <?php echo $bbs3; ?>},
										{ y: 'fbz', a: <?php echo $bbs4; ?>},
										{ y: 'fdm', a: <?php echo $bbs5; ?>},
										{ y: 'fca', a: <?php echo $bbs6; ?>}
									  ],
									  xkey: 'y',
									  ykeys: ['a'],
									  labels: ['Jumlah'],
									  barColors: function (row, series, type) {
													console.log("--> "+row.label, series, type);
													if(row.label == "fbw") return "#AD1D28";
													else if(row.label == "fbx") return "#DEBB27";
													else if(row.label == "fby") return "#fec04c";
													else if(row.label == "fbz") return "#1AB244";
													else if(row.label == "fdm") return "#DEB887";
													else if(row.label == "fca") return "#008B8B";
												}
									});
									</script>
								</div>
							</div>
							</div>
							<div class="panel-footer">
								<center><small>Grafik Kategori Pelanggan berdasarkan jenis ODP yang digunakan</small></center><br/>
								<div class="btn-group btn-group-justified" role="group" aria-label="...">
									<div class="btn-group" role="group">
										<a href="submenu/fbw.php"><button type="button" class="btn btn-default">fbw</button></a>
									</div>
									<div class="btn-group" role="group">
										<a href="submenu/fbx.php"><button type="button" class="btn btn-default">fbx</button></a>
									</div>
									<div class="btn-group" role="group">
										<a href="submenu/fby.php"><button type="button" class="btn btn-default">fby</button></a>
									</div>
									<div class="btn-group" role="group">
										<a href="submenu/fbz.php"><button type="button" class="btn btn-default">fbz</button></a>
									</div>
									<div class="btn-group" role="group">
										<a href="submenu/fdm.php"><button type="button" class="btn btn-default">fdm</button></a>
									</div>
									<div class="btn-group" role="group">
										<a href="submenu/fca.php"><button type="button" class="btn btn-default">fca</button></a>
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
	
    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

	</body>
</html>
