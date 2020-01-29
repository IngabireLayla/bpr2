<?php 
	    include'bknd/db_con.php';
	

	if (isset($_REQUEST['usr_account'])) {
		
		$client_fname =strtoupper($_REQUEST['fname']);
		$client_lname=strtoupper($_REQUEST['lname']);
		$client_email = $_REQUEST['usr_email'];
		$client_pswd = md5($_REQUEST['usr_pswd']);
		$client_phone = $_REQUEST['usr_phone'];
		$client_service =$_REQUEST['service_salon'];
		$names=$client_fname." ".$client_lname;

		$sqls =$conn->query("SELECT * FROM chadia_clients WHERE c_phone='$client_phone' OR c_email='$client_email' ")or die('Error here!'.mysql_error());
			$count = $sqls->rowcount();
		
			if($count>0){
					echo"<script>alert('your email or Phone number is used check correctly or contact System administrator');window.location.href='salon.php?service=$client_service'</script>";
			}else{
		$sql = $conn->query("INSERT INTO chadia_clients (c_names,c_phone,c_email,c_password) VALUES ('$names','$client_phone','$client_email','$client_pswd')")or die('Error here!'.mysql_error());
		if($sql){
			
				$message="your account is created successfully. For authentication username is:".$client_email."& Password is:".$_REQUEST['usr_pswd'];
				if(mail($client_email,'Palour Beauty Client Account',$message)){
				echo"<script>alert('your account is successfully created now check your email. You can make order now');window.location.href='salon.php?service=$client_service'</script>";		
				}else{
					echo"<script>alert('your account is successfully created now.  But email not sent check you network connection. You can make order now using provided email and password');window.location.href='salon.php?service=$client_service'</script>";		
				}
		}else{
			echo"<script>alert('your account is  not created try again');window.location.href='salon.php?service=$client_service'</script>";		
		}
		
		

		
			}
	}

?>