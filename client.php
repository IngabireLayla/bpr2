  <!DOCTYPE html>
<html lang="en">

<?php 
    session_start(); 
    include'bknd/db_con.php'; 
	//error_reporting(0);
	if(isset($_GET['salon'])&& isset($_GET['Service'])){
		$_SESSION['salon']=$_GET['salon'];
		$_SESSION['client_service']=$_GET['Service'];
	}else if(!isset($_GET['salon'])&& !isset($_GET['Service']) && isset($_SESSION['client_name']) && isset($_SESSION['client_id'])){
		//echo'<meta http-equiv="refresh" content="0, url=client_orders.php">';
	}
	else if(!isset($_SESSION['client_name']) && !isset($_SESSION['client_id'])){ 
        session_destroy(); 
        echo'<meta http-equiv="refresh" content="0, url=bknd/logout.php">';
    }
	

    $Parlour =$_SESSION['salon'];

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
    <title> Online Beauty Saloon Appointments System</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="assets/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="assets/css/dash.css" rel="stylesheet">
    <!-- Material Design Datatables -->
    <link href="assets/css/addons/datatables.css" rel="stylesheet">

    <style type="text/css">
        @media screen {
            #printSection {
                display: none;
            }
        }

        @media print {
            body * {
                visibility:hidden;
            }
            #printSection, #printSection * {
                visibility:visible;
            }
            #printSection {
                position:absolute;
                left:0;
                top:0;
            }
        }

    </style>
</head>

<body class="grey lighten-3">

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light primary-color-dark scrolling-navbar">
            <div class="container-fluid">
                <a class="navbar-brand waves-effect" href="#" target="_self">
                    <strong class="blue-text">
                        <span class="">Client</span>
                        <span class="mx-2">/</span>
                        <span class="font-weight-bold text-uppercase"><?php echo $_SESSION['client_name'];?></span>
                    </strong>
                </a>

                <button class="navbar-toggler font-weight-bold blue-gradient" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mr-auto list-group" role="tablist">
                      
                        <li class="nav-item">
                            <a class="primary-color-dark text-white list-group-item list-group-item-action" target="_self" href="client_orders.php" role="tab"><i class="fa fa-bars mr-3"></i>Orders</a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="primary-color-dark text-white list-group-item list-group-item-action" target="_self" href="bknd/logout.php" role="tab"><i class="amber-text fa fa-lock mr-3"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Sidebar -->

        <div class="sidebar-fixed position-fixed primary-color-dark">

            <a class="logo-wrapper waves-effect text-white h3" target="_self" href=""><?php echo $_SESSION['client_name']; ?></a>

            <div class="list-group list-group-flush" id="myList" role="tablist">
               
    
                <a class="primary-color-dark text-white list-group-item list-group-item-action" target="_self" href="client_orders.php" role="tab"><i class="fa fa-bars mr-3"></i>Orders</a>
              
                <a class="primary-color-dark text-white list-group-item list-group-item-action" target="_self" href="bknd/logout.php" role="tab"><i class="amber-text fa fa-lock mr-3"></i>Logout</a>
            </div>

        </div>
    </header>

    <!--Main layout-->
    <main class="pt-5 mx-lg-5">

        <?php 
            $thisServiceSalon =$_SESSION['client_service'];
			
            $SalonToggle = $SALON_OPEN_CLOSED = "";

            $IsSalonOpen = $conn->query("SELECT * FROM chadia_salons WHERE id='$thisServiceSalon' ")or die('Konnection '.mysql_error()); 
            $IsSalonOpen_arr = $IsSalonOpen->fetch();

            if ($IsSalonOpen_arr['s_availability'] == 'OPEN'){
                $SalonToggle = "<button type='submit' class='btn btn-block btn-lg danger-color-dark' set_AVAILABILITY_to='CLOSED' id='toggleOPENsalon'><b>Click to CLOSE Salon</b></button>";

                $SALON_OPEN_CLOSED = "OPEN";
            }
            else {
                $SalonToggle = "<button type='submit' class='btn btn-block btn-lg default-color-dark' set_AVAILABILITY_to='OPEN' id='toggleOPENsalon'><b>Click to OPEN Salon</b></button>";

                $SALON_OPEN_CLOSED = "CLOSED";
            }
			
			$client_id=$_SESSION['client_id'];
			 $found_s_logo=$found_mngr_email="";
			  $query = $conn->query("SELECT * FROM chadia_clients WHERE id = '$client_id'")or die(mysql_error());
			
				while($rows = $query->fetch()){
					$client_name= $rows['c_names'];
					$client_phone=$rows['c_phone'];
					
				}
				
				
				$client_service=$_SESSION['client_service'];
			 $found_s_logo=$found_mngr_email="";
			  $query = $conn->query("SELECT * FROM chadia_services WHERE id = '$client_service'")or die(mysql_error());
			
				while($rows = $query->fetch()){
					$found_name = $rows['serv_name'];
					$found_s_logo= $rows['serv_picture'];
					  $found_mngr_email=$rows['serv_description'];
					  $found_price=$rows['serv_price'];
					
				}

        ?>
        
        
		
		
		
		<!-- Modal: Edit Service -->
   
    
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body rounded grey lighten-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="p-0 m-0 mb-2">Hair Style : <b><span class="text-uppercase" id="hairStyle"><?= @$found_name?></span></b></h3>
                            <h5 class="p-0 m-0 text-muted">Salon : <b><span class="text-uppercase" id="hairSalon"><?= @$selectedSalon?></span></b></h3>
                        </div>
                    </div>
                    <div class="form-row">
					 
                        <!-- Service Details -->
                        <div class="col-md-6">
                            <!-- Service Logo -->
                            <div class="view overlay z-depth-1-half bg-white rounded">
                                <img id="hairImage" src="assets/pics/service_image/<?php echo $found_s_logo;?>" class="img-fluid mx-auto" style="height:150px;" >
                                <div class="mask rgba-white-slight"></div>
                            </div>
							

                            <!-- Service Details -->
                            <div class="my-3">
                                <table class="table table-striped table-bordered table-sm mb-0 pb-0 view overlay z-depth-1-half rounded" cellspacing="0" width="100%">
                                    <tbody class="black-text font-weight-bold">
                                        <tr class="bg-white"><td class="text-muted text-justify" id="hairDescr  "><?=$found_mngr_email?></td></tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="">
                                <table class="table table-striped table-bordered table-sm mb-0 pb-0 view overlay z-depth-1-half rounded" cellspacing="0" width="100%">
                                    <tbody class="black-text font-weight-bold">
                                        <tr class="bg-white"><td class="text-muted text-center h3 font-weight-bold" id="hairPrice"><?=@$found_price?></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- New Service Data -->
                        <div class="col-md-6">
                            <div class="card p-3">
                                <form method="POST">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <h4 class="my-0 py-0 text-muted text-center">ORDER DETAILS</h4>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <span class="">Enter Your Names</span>
                                            <input type="text" class="form-control text-uppercase" required name="hairCust" value="<?=$client_name?>" readonly />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-9">
                                            <span class="">Enter Phone No.</span>
                                            <input type="tel" class="form-control" required name="hairPhone" value="<?=$client_phone?>" readonly pattern="[0]{1}[7]{1}[0-9]{8}" />
                                        </div>

                                        <div class="col-sm-3">
                                            <span class="">Service</span>
                                            <input type="text" class="form-control" required  readonly name="hairServ" id="hairServ" value="<?=$client_service?>"/>
                                        </div>
                                    </div>

                                    <div class="form-row mb-3">                                    
                                        <div class="col-sm-6">
                                            <span class="">Set Date</span>
                                            <input type="date" class="form-control" required name="hairDate" min="<?php echo date("Y-m-d"); ?>" />
                                        </div>

                                        <div class="col-sm-6">
                                            
                                            <input type="time"class="form-control" required name="hairTime" min="<?=$selectedSalon_open_from?>"   max="<?=$selectedSalon_open_to ?>" />
                                        </div>
                                    </div>
									
									  <div class="">
												<span class="">Select Employee</span>
											<select class="form-control" name="emp" required>
												
												<?php
												  $query2 = $conn->query("SELECT * FROM chadia_employees WHERE e_salon = '$Parlour' && e_services='$thisServiceSalon'")or die(mysql_error());
												  	while($r = $query2->fetch()){
														?>
														<option value="<?=$r['id']?>"><?=$r['e_names']?></option>
														<?php
											
													}
												?>
											
											</select>
                                            
                                        </div>
                                    </div>

                                    <hr class="mb-3">
									 <div class="modal-footer d-flex justify-content-center">
										<button  type="submit"  class="btn warning-color-dark darken-5" name="usr_account" ><b>Place &nbsp&nbsp Order</b</button>
									</div>
												
								<?php
								
								/*
								$d = strtotime("+1 months",strtotime("2015-05-25"));
								echo   date("Y-m-d",$d)."<br><br>";
								$date = date('Y-m-j');
								$newdate = strtotime ( '-10 minute' , strtotime ( $date ) ) ;
								$newdate = date ( 'Y-m-j' , $newdate );

								//echo "hhhhhhhh".$newdate."<br><br>";
								
								$datetime = date("Y-m-d H:i:s");

// Convert datetime to Unix timestamp
								$timestamp = strtotime($datetime);

							
								$time = $timestamp + (2 * 60);

								// Date and time after subtraction
								$datetime = date("H:i", $time);
								echo $datetime." bbbb<br>";
								
								
								$time1="15:45";
								$time2="15:55";
								$diff=abs(strtotime($time1)-strtotime($time2));
								$tmins=$diff/60;
								
								echo $tmins;
								
										*/
									?>
											
									<b>If you don't need to place this order please 
									<a href ="client_orders.php"><b>Cancel it here</b></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
            $employee= $_POST['emp'];
			 $email=$_SESSION['client_email'];
			 
			$elapsed=abs(strtotime($NEW_hairTime)-strtotime(date('H:i')))/60;
			if($NEW_hairDate==date('Y-m-d')  &&($NEW_hairTime<date('H:i')||  $elapsed<30)) {
				  echo'<script>alert("choose correct time . Atleast 30Min time interval from now")</script>';
				
			}else{
			
			  
			  $query3 = $conn->query("SELECT * FROM chadia_orders WHERE o_employee= '$employee' AND o_time='$NEW_hairTime' ")or die(mysql_error());
			
				if($r = $query3->fetch()){
					$time= $r['o_time'];
					echo'<script>alert("this time is taken try an other hour.")</script>';
				}else{
			 
			 
            $add_NU_order = $conn->query("INSERT INTO chadia_orders (o_service, o_day, o_time, o_cust_name, o_cust_phone,o_cust_email,o_employee) VALUES ('$NEW_hairServ', '$NEW_hairDate', '$NEW_hairTime', '$NEW_hairCust', '$NEW_hairPhone','$email','$employee') ")or die('Error!'.error());
            if($add_NU_order){
				$message1="After Manager Verfication ;You need to confirm if you are available before 35min at booking time  otherwise your booking Order will be cancelled";
				$message2="\n Booking order Service: ".$NEW_hairServ." Booking Date: ".$NEW_hairDate."Time: ".$NEW_hairTime;
				$message=$message1." ".$message2;
				$date=date("Y-m-d H:i:s");
				$subject="Client Placing Orders on ".$date;
				
				
				if(mail($email,$subject,$message)){
					 echo'<script>alert("Thanks for making order check your Email for details.")</script>';
				}else{
					echo '<script>alert("your order is successful recorded but email no sent, you need to confirm your availability after manager Verification")</script>';
				}
				
               
                echo '<meta http-equiv="refresh" content="0, url=client_orders.php">';
            }
            else {
                $nw_line = "<br>";
                echo'<script>alert("ERROR..... \n FAILED TO RECORD YOUR ORDER \n PLEASE RELOAD AND TRY AGAIN. THANKS.")</script>';
                // echo '<meta http-equiv="refresh" content="0, url=salon.php?service=$Parlour">';
            }
		
		}
			}
		}
    ?>
          






		  

    <input type="type" hidden disabled id="SLN_STATS" value="<?php echo $_SESSION['MNGR_ID']; ?>">

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="assets/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="assets/js/mdb.js"></script>
    <!-- MDB Datatables -->
    <script type="text/javascript" src="assets/js/addons/datatables.js"></script>

    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();

    </script>

    <script type="text/javascript">
        // Datatables

        $(document).ready(function () {

            $('#IsSalonAvailable').each(function() {
                if($(this).text() == 'OPEN') {
                    $(this).css('color', '#0d47a1');
                }
                else if($(this).text() == 'CLOSED') {
                    $(this).css('color', '#CC0000');
                }
            });

            // Print Report

            document.getElementById("btnPrint_ALL").onclick = function () {
                printElement(document.getElementById("printThis_ALL"));
            }

            document.getElementById("btnPrint_APR").onclick = function () {
                printElement(document.getElementById("printThis_APR"));
            }

            document.getElementById("btnPrint_PND").onclick = function () {
                printElement(document.getElementById("printThis_PND"));
            }

            document.getElementById("btnPrint_CNL").onclick = function () {
                printElement(document.getElementById("printThis_CNL"));
            }

            function printElement(elem) {
                var domClone = elem.cloneNode(true);
                
                var $printSection = document.getElementById("printSection");
                
                if (!$printSection) {
                    var $printSection = document.createElement("div");
                    $printSection.id = "printSection";
                    document.body.appendChild($printSection);
                }
                
                $printSection.innerHTML = "";
                $printSection.appendChild(domClone);
                window.print();
            }
        });
    </script>
    <script src="bknd/find_data.js"></script>
    <script src="bknd/mngr_stats.js"></script>
</body>

</html>
