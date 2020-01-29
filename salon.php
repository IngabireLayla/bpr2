<!DOCTYPE html>
<html lang="en">

<?php 
	session_start();
    include'bknd/db_con.php';
	$service_id="";
 
    $Parlour = $_GET['service'];
	

    $query = $conn->query("SELECT * FROM chadia_salons WHERE id ='$Parlour' ")or die(mysql_error());
            
    $rows = $query->fetch();
    $selectedSalon = $rows['s_name'];
    $selectedSalon_open_from = $rows['s_open_from'];
    $selectedSalon_open_to = $rows['s_open_to'];
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="assets/pics/b_parlour.jpg">
    <title>Beauty Saloon Appointments System </title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="assets/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="">

    <!--Main Navigation-->
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light primary-color-dark scrolling-navbar">
            <div class="container-fluid">
                
                <a class="navbar-brand waves-effect" href="#" target="_self">
                    <strong class="blue-text"><span class="font-weight-bold text-uppercase"><?php echo $selectedSalon;?></span><span class="ml-4">Beauty Saloon Appointments System </span></strong>
                </a>

                <button class="navbar-toggler font-weight-bold text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-button btn btn-md btn-outline-primary my-0 text-white" href="index.php" target="_self"><b>Back</b><span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!--Main layout-->
    <main class="pt-5 mx-lg-5">
        <div class='row mt-5'>
        
        <?php
			
            $sq = $conn->query("SELECT * FROM chadia_services WHERE serv_salon ='$Parlour' AND serv_status='ACTIVE' ")or die('Error right here'.mysql_error());

            if($sq->rowcount()<1){
                echo "<div class='col-sm-6 mx-auto'>
                    <div class='card'>
                        <div class='card-body text-center text-danger'>
                            <h4 class='py-3 font-weight-bold'>There selected Salon has no SERVICES yet</h4>
                            <a class='btn danger-color-dark waves-effect text-white' href='index.php' target='_self'><b>Back</b></a>
                        </div>
                    </div>
                </div>";
            } 
            else{ 
				
                while ($row = $sq->fetch()) {
                    $service_img = $row['serv_picture'];
                    $service_id = $row['id'];
                    echo "<div class='col-md-3 mb-4'>
                        <div class='card'>
                            <div class='card-header purple accent-4 font-weight-bold text-white text-center'>".$row['serv_name']."</div>
                            <div class='card-body p-3'>
                                <img src='assets/pics/service_image/$service_img' class='img-fluid' style='height:150px' >

                                <div class='form-row mt-2'>
                                    <div class='col-6'>
                                        <a class='btn btn-block btn-md btn-light px-2' disabled><b>".$row['serv_price']."&nbsp&nbspRWF</b></a>
                                    </div>
                                    <div class='col-6'>
									";
									
		
					if(!isset($_SESSION['client_name']) && !isset($_SESSION['client_id'])){
			
				
								echo"<input type='button' id='$service_id' value='Order Now' class='btn warning-color-dark darken-5' target='_self' data-toggle='modal' data-target='#modalLoginForm' onclick='clickMe(this)'/>";
                   		
					}else{
						
					echo"<input type='button' id='$service_id' value='Order Now' name='order_now'  class='btn warning-color-dark darken-5' onclick='select2(this)'/>";	
					}
							echo "		</div>
                                </div>
                            </div>
                        </div>
                    </div>";

                    /* 
                       <a class='btn btn-block btn-md default-color-dark px-2' href='logorder.php?order=".$row['id']."' target='_self'><b>Order Now</b></a>
                    */
                }
            }
        ?>
        </div>
    </main>

  
	
   <!-- Login -->
    <div class="modal fade modal_cover_1" id="modalLoginForm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header text-center primary-color-dark white-text">
                    <h4 class="modal-title font-weight-bold white-text">VERIFY YOUR ACCOUNT</h4>
                    <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="bknd/login.php" method="POST">
                <div class="modal-body mx-1">
                    <div class="md-form mb-3">
                        <i class="fa fa-envelope prefix orange-text"></i>
                        <input type="email" class="form-control" required placeholder="Email" name="usr_email">
                    </div>

                    <div class="md-form mb-4">
                        <i class="fa fa-lock prefix orange-text"></i>
                        <input type="password" class="form-control" required placeholder="Password" name="usr_pswd">
                    </div>
					
					<div class="md-form mb-4" id="r_service_div">
                        <i class="fa fa-lock prefix orange-text"></i>
                        <input type="text" id="r_service" class="form-control" required value="" name="service_id">
                    </div>
					
					<div class="md-form mb-4" id="s_service_div">
                        <i class="fa fa-lock prefix orange-text"></i>
                        <input type="text" id="s_service" class="form-control" required value="<?= $Parlour?>" name="service_salon">
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn warning-color-dark darken-5" name="usr_login" >Login</button>
                </div>
				 <div class="modal-footer d-flex justify-content-center">
				<b> If you don't have account make <a id="call_modalLoginForm2"  target='_self' data-toggle='modal' data-target='#modalLoginForm2' onclick="create_account()"><i style="color:blue">Sign up here</i></a></b>
                   
                </div>
                </form>
            </div>
        </div>
    </div>

	 <!-- CREATE ACCOUNT -->
    <div class="modal fade modal_cover_1" id="modalLoginForm2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center primary-color-dark white-text">
                    <h4 class="modal-title font-weight-bold white-text">SET UP CLIENT ACCOUNT</h4>
                    <button type="button" id="close_modalLoginForm2" class="close white-text" data-dismiss="modal" aria-label="Close" onclick="close_accountForm()"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="account.php" method="POST">
                <div class="modal-body mx-1">
				
				
					 <div class="md-form mb-4">
                        <i class="fa fa-user prefix orange-text"></i>
                        <input type="text" class="form-control  text-uppercase" required placeholder="First name" name="fname">
                    </div>
					
					 <div class="md-form mb-4">
                        <i class="fa fa-user prefix orange-text"></i>
                        <input type="text" class="form-control  text-uppercase" required placeholder="Last name" name="lname">
                    </div>
					
				
                    <div class="md-form mb-3">
                        <i class="fa fa-envelope prefix orange-text"></i>
                        <input type="email" class="form-control" required placeholder="Email" name="usr_email">
                    </div>

                    <div class="md-form mb-4">
                        <i class="fa fa-phone prefix orange-text"></i>
                        <input type="tel" class="form-control" required placeholder="Phone No." name="usr_phone" pattern="[0]{1}[7]{1}[0-9]{8}">
                    </div>
					
					 <div class="md-form mb-4">
                        <i class="fa fa-lock prefix orange-text"></i>
                        <input type="password" class="form-control" required placeholder="Account Password" name="usr_pswd">
                    </div>
					
					
					<div class="md-form mb-4" id="acc_service_div">
                        <i class="fa fa-lock prefix orange-text"></i>
                        <input type="text" id="s_service_acc" class="form-control" required value="<?= $Parlour?>" name="service_salon">
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn warning-color-dark darken-5" name="usr_account" >Sign up</button>
                </div>
                </form>
            </div>
        </div>
    </div>
	
	
	
	
	
 
	 <?php


        if (isset($_POST['hairServ']) && isset($_POST['hairDate']) && isset($_POST['hairTime']) && isset($_POST['hairCust']) && isset($_POST['hairPhone'])) {
            
            $NEW_hairServ = $_POST['hairServ'];
            $NEW_hairDate = $_POST['hairDate'];
            $NEW_hairTime = $_POST['hairTime'];
            $NEW_hairCust = strtoupper($_POST['hairCust']);
            $NEW_hairPhone = $_POST['hairPhone'];
                
            $add_NU_order = $conn->query("INSERT INTO chadia_orders (o_service, o_day, o_time, o_cust_name, o_cust_phone) VALUES ('$NEW_hairServ', '$NEW_hairDate', '$NEW_hairTime', '$NEW_hairCust', '$NEW_hairPhone') ")or die('Error!'.error());
            if($add_NU_order){
                echo'<script>alert("Your Order has been recorded Successfully. Thanks.")</script>';
                // echo '<meta http-equiv="refresh" content="0, url=salon.php?service=$Parlour">';
            }
            else {
                $nw_line = "<br>";
                echo'<script>alert("ERROR..... \n FAILED TO RECORD YOUR ORDER \n PLEASE RELOAD AND TRY AGAIN. THANKS.")</script>';
                // echo '<meta http-equiv="refresh" content="0, url=salon.php?service=$Parlour">';
            }
        }
    ?>

	

	
	
	
	
	
	
	
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="assets/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="assets/js/mdb.js"></script>

    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();

        var date = new Date();
        date.setDate(date.getDate());

        $('#hairDate').datepicker({ 
            startDate: date
        });
	function clickMe(e){
	 document.getElementById('r_service_div').style.display = "none";
	document.getElementById('s_service_div').style.display = "none";
	
	var service_r=document.getElementById(e.id).id;
	document.getElementById('r_service').value=service_r ; 
    
}
	function select2(e){
	
	var service_r2=document.getElementById(e.id).id;
	//alert(service_r2);
    //indow.location.href = "http://localhost/main.php?width=" + width + "&height=" + height;
    window.location.href="client.php?salon=<?= $Parlour;?>&Service="+service_r2;
}
function create_account(){
	 document.getElementById('modalLoginForm').style.display = "none";
	 document.getElementById('acc_service_div').style.display = "none";
}

function close_accountForm(){
	document.getElementById('modalLoginForm').style.display = "block";
}

</script>
		
		


    <script src="bknd/find_data.js"></script>
</body>

</html>
