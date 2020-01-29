<!DOCTYPE html>
<html lang="en">

<?php 
    session_start(); 
    include'bknd/db_con.php'; 
    if(!isset($_SESSION['MNGR_NM']) && !isset($_SESSION['MNGR_ID']) && !isset($_SESSION['MNGR_SLN'])){ 
        session_destroy(); 
        echo'<meta http-equiv="refresh" content="0, url=bknd/logout.php">';
    }
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="assets/pics/b_parlour.jpg">
    <title> Online Beauty Saloon Appointments System </title>
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
                        <span class="">Salon</span>
                        <span class="mx-2">/</span>
                        <span class="font-weight-bold text-uppercase"><?php echo $_SESSION['MNGR_SLN'];?></span>
                    </strong>
                </a>

                <button class="navbar-toggler font-weight-bold blue-gradient" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mr-auto list-group" role="tablist">
                        <li class="nav-item active">
                            <a class="primary-color-dark text-white list-group-item list-group-item-action active" data-toggle="list" href="#home_stats" role="tab"><i class="fa fa-home mr-3"></i>Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="primary-color-dark text-white list-group-item list-group-item-action" target="_self" href="mngr_orders.php" role="tab"><i class="fa fa-bars mr-3"></i>Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="primary-color-dark text-white list-group-item list-group-item-action" target="_self" href="mngr_services.php" role="tab"><i class="fa fa-list-alt mr-3"></i>Services</a>
                        </li>
                            
                        <li class="nav-item">
                            <a class="primary-color-dark text-white list-group-item list-group-item-action"  href="mngr.php" role="tab"><i class="fa fa-user mr-3"></i>Employees </a>
                        </li>
                        <li class="nav-item">
                            <a class="primary-color-dark text-white list-group-item list-group-item-action"  href="mngr.php" role="tab"><i class="fa fa-file-text mr-3"></i>Reports</a>
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

            <a class="logo-wrapper waves-effect text-white h3" target="_self" href=""><?php echo $_SESSION['MNGR_NM']; ?></a>

            <div class="list-group list-group-flush" id="myList" role="tablist">
                <a class="primary-color-dark text-white list-group-item list-group-item-action active" data-toggle="list" href="#home_stats" role="tab"><i class="fa fa-home mr-3"></i>Home</a>
                
                <a class="primary-color-dark text-white list-group-item list-group-item-action" target="_self" href="mngr_orders.php" role="tab"><i class="fa fa-bars mr-3"></i>Orders</a>
                <a class="primary-color-dark text-white list-group-item list-group-item-action" target="_self" href="mngr_services.php" role="tab"><i class="fa fa-list-alt mr-3"></i>Services</a>
                
                <a class="primary-color-dark text-white list-group-item list-group-item-action"  href="mngr.php" role="tab"><i class="fa fa-user mr-3"></i>Employees</a>
                <a class="primary-color-dark text-white list-group-item list-group-item-action"  href="mngr.php" role="tab"><i class="fa fa-file-text mr-3"></i>Reports</a>
                

                <a class="primary-color-dark text-white list-group-item list-group-item-action" target="_self" href="bknd/logout.php" role="tab"><i class="amber-text fa fa-lock mr-3"></i>Logout</a>
            </div>

        </div>
    </header>

    <!--Main layout-->
    <main class="pt-5 mx-lg-5">
 <?php 
            $thisServiceSalon = $_SESSION['MNGR_ID'];

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
        ?>
        
       
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- STATS -->
            <div class="tab-pane active" id="home_stats" role="tabpanel">
                <div class="col-sm-10 mx-auto">
                    <div class="row wow fadeIn mt-5">

				
	  <!-- Modal: Report employees-->
    <div  id="modalReportServ_EMP"  class="col-sm-10 mx-auto" tabindex="" >
        <button type="button" class="close white-text btn-lg mt-5 mr-5" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="modal-dialog modal-lg" role="document">
		
		
		
            <div id="printThis_EMP" class="modal-content">
                <div class="modal-header d-flex justify-content-between default-color-dark text-white">
                    <h4 class="my-0 pt-1 font-weight-bold ">Employee Report</h4>
					
					
                    <button class="btn btn-md btn-light m-0 px-3" id="btnPrint_EMP" data-dismiss="modal"><b><i class="fa fa-print mr-3"></i>Print</b></button>
                </div>
				
		
		 
		 
		 <?php
		 if(isset($_POST['check_employee'])){
			$from=$_POST['from'];
			$to=$_POST['to'];
			
		 
		 ?>
                <div class="modal-body">
                    <h4 class="text-muted text-center text-uppercase  font-weight-bold ">Report on Services performed </h4> 
					<?php echo"<center><b><i> From  $from  To $to</i></b></center>"; ?>
                    <div class="divider-new mt-3"></div>
                    <table class="dt_table table table-striped table-bordered table-sm mb-0 pb-0" cellspacing="0" width="100%">
                        <thead class="text-muted">
                            <tr>
                                <th class="font-weight-bold">Employee Name</th>
								<th class="font-weight-bold">Service Name</th>
                                <th class="font-weight-bold">Service Price</th>
                                <th class="font-weight-bold">Service Performed</th>
                                <th class="font-weight-bold" colspan="2">Total Money</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $APR_serv = $conn->query("SELECT * FROM chadia_employees WHERE e_salon='$thisServiceSalon' ")or die('Konnection '.mysql_error());
                                while ($serv_arr = $APR_serv->fetch()) {

                                    $serv_id = $serv_arr['id'];
                                    $emp_name = $serv_arr['e_names'];
									$emp_service=$serv_arr['e_services'];
									$serv="";
                                    $COUNT_serv=0;
									$COUNTS=0;
									$price=0;
									
												  
								$APR_findOrders2 = $conn->query("SELECT * FROM chadia_services WHERE id='$emp_service' AND serv_status='ACTIVE'")or die('Konnection error'.mysql_error());
                                    if ($APR_findOrders2->rowcount() > 0){
                                        if ($APR_findOrders_arr2 = $APR_findOrders2->fetch()){
                                            $COUNT_serv=$APR_findOrders_arr2 ['serv_price'];
											$serv=$APR_findOrders_arr2 ['serv_name'];
											$price=$APR_findOrders_arr2 ['serv_price'];
                                        }
									} 
									
									
                                    $APR_findOrders = $conn->query("SELECT * FROM chadia_orders WHERE o_employee='$serv_id' AND o_service='$emp_service' AND o_status='APPROVED' AND o_day >='$from' AND o_day<='$to' ")or die('Konnection error'.mysql_error());
                                    if ($APR_findOrders->rowcount() > 0){
                                        while ($APR_findOrders_arr = $APR_findOrders->fetch()){
                                            $COUNTS++;
											  $emp_service=$APR_findOrders_arr['o_service'];
											
                                   
											
                                        }
									}
										 
									$COUNT_serv=$COUNTS*$price;
									
                                       
                                        echo "<tr>".
                                            "<th class='align-middle' scope='row'><b>$emp_name</br></th>".
											"<td class='align-middle'>$serv</td>".
											"<td class='align-middle'>$price</td>".
                                            "<td class='align-middle'> $COUNTS</td>".
                                            "<td class='align-middle font-weight-bold text-muted'> $COUNT_serv</td>".
                                           
                                        "</tr>";
                                    
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
	
	
	
	
	
	
	
	
	
						
						
                    </div>
                </div>
            </div>

            <!-- EMPLOYEES -->
           


  
    <?php
		 }else{
			 echo"<script>alert('you must define date range'); window.location.href='mngr.php'</script>";
			 
		 }
        if (isset($_POST['edt_mngr_name']) && isset($_POST['edt_mngr_phone']) && isset($_POST['edt_mngr_email']) && isset($_POST['edt_mngr_pswd'])) {
            
            $mngr_id = $_SESSION['MNGR_ID'];
            $mngr_name = strtoupper($_POST['edt_mngr_name']);
            $mngr_phone = $_POST['edt_mngr_phone'];
            $mngr_email = $_POST['edt_mngr_email'];
            $mngr_pswd = md5($_POST['edt_mngr_pswd']);

            $edt_this_user = $conn->query("UPDATE chadia_salons SET mngr_names='$mngr_name', mngr_phone='$mngr_phone', mngr_email='$mngr_email', mngr_pass='$mngr_pswd' WHERE id='$mngr_id' ")or die('Error!'.error());
            if($edt_this_user){
                session_destroy();
                echo '<meta http-equiv="refresh" content="0, url=index.php">';
            }
            else {
                $nw_line = "<br>";
                echo'<script>alert("ERROR.....'.'<br>'.'FAILED TO UPDATE YOUR CREDENTIALS")</script>';                
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
            document.getElementById("btnPrint_EMP").onclick = function () {
                printElement(document.getElementById("printThis_EMP"));
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
