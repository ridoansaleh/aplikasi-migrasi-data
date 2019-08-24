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
		
		<!-- Custom Fonts -->
		<link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		
		<style type="text/css">
			body { 
				 background: url('images/blurred-background-5.jpg') no-repeat center center fixed; 
				 -webkit-background-size: cover;
				 -moz-background-size: cover;
				 -o-background-size: cover;
				 background-size: cover;
			}

			.panel-default {
				 //opacity: 0.9;
				 margin-top:130px;
			}
			.form-group.last {
				margin-bottom:0px;
			}
		</style>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	
	<body>		
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading"> 			
						<strong class="">Login</strong>
					</div>
					<div class="panel-body">
						<form action="index.php" method="post" class="form-horizontal" role="form">
							<div class="form-group">
								<label class="col-sm-3 control-label">Username</label>
								<div class="col-sm-9">
									<input type="text" name="username" class="form-control" placeholder="Username" required="">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-3 control-label">Password</label>
								<div class="col-sm-9">
									<input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required="">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<div class="checkbox">
										<label class="">
											<input type="checkbox" class="">Remember me
										</label>
									</div>
								</div>
							</div>
							<div class="form-group last">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="submit" name="login" class="btn btn-success btn-sm">Sign in</button>
									<button type="reset" class="btn btn-default btn-sm">Reset</button>
								</div>
							</div>
							<?php 
								session_start();
								include('action/config.php');

								if(isset($_POST['login'])){
									 
									$username = $_POST['username'];
									$password = $_POST['password'];
								 
									$sql = "select * from admin where username='".$username."' and password='".$password."'";
									$query = mysql_query($sql) or die (mysql_error());

									if($query){
										$row = mysql_num_rows($query);
										if($row > 0){
											$_SESSION['isLoggedIn']=1;
											$_SESSION['username']=$username;
											header('Location: dashboard.php');
										}else{
											echo '<br/>
													<div class="alert alert-danger alert-dismissible" role="alert">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
														<strong>Error :</strong> Username atau password Anda salah ! 
													</div>';
										}
									}
								}					
							?>
						</form>
					</div>
					<div class="panel-footer">Not Registered? <a href="#" class="">Register here</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>
	
    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
	
	<script type="text/javascript">
		$(function() {

			$('#login-form-link').click(function(e) {
				$("#login-form").delay(100).fadeIn(100);
				$("#register-form").fadeOut(100);
				$('#register-form-link').removeClass('active');
				$(this).addClass('active');
				e.preventDefault();
			});
			$('#register-form-link').click(function(e) {
				$("#register-form").delay(100).fadeIn(100);
				$("#login-form").fadeOut(100);
				$('#login-form-link').removeClass('active');
				$(this).addClass('active');
				e.preventDefault();
			});

		});
	</script>


	</body>
</html>
