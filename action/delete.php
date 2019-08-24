		<?php
			if(isset($_GET['noTelepon'])){
				include('config.php');
				
				$noTelepon = $_GET['noTelepon'];
				$cek = mysql_query("SELECT dp_noTelepon FROM data_pelanggan WHERE dp_noTelepon='$noTelepon'") or die(mysql_error());
				
				if(mysql_num_rows($cek) == 0){
					echo '<script>window.history.back()</script>';		
				}else{
					$del = mysql_query("DELETE FROM data_pelanggan WHERE dp_noTelepon='$noTelepon'");
					if($del){	  
						echo '<script>window.location="../table.php"</script>';				
					}else{				
						//do nothing				
					}			
				}	
			}else{
				//do nothing	
			}
		?>

