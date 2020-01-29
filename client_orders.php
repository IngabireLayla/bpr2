<!DOCTYPE html>
<html lang="en">

<?php 
    session_start(); 
		error_reporting(0);
	 if(!isset($_SESSION['client_name']) && !isset($_SESSION['client_id'])){ 
        session_destroy(); 
        echo'<meta http-equiv="refresh" content="0, url=bknd/logout.php">';
    }
    include'bknd/db_con.php'; 

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="assets/pics/b_parlour.jpg">
    <title>Beauty Parlour</title>
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
</head>

<body class="grey lighten-3">

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light primary-color-dark scrolling-navbar">
            <div class="container-fluid">
                <!-- Brand -->
                <a class="navbar-brand waves-effect" href="#" target="_self">
                    <strong class="blue-text">
                        <span class="">CLIENT</span>
                        <span class="mx-2">/</span>
                        <span class="font-weight-bold text-uppercase"><?php echo $_SESSION['client_name'];?></span>
                        <!-- <span class="ml-4">Beauty Parlour Directory</span> -->
                    </strong>
                </a>

                <!-- Collapse -->
                <button class="navbar-toggler font-weight-bold blue-gradient" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left -->
                    <ul class="navbar-nav mr-auto list-group" role="tablist">
                        <li class="nav-item active">
                            <a class="primary-color-dark text-white list-group-item list-group-item-action" target="_self" href="index.php" role="tab"><i class="fa fa-plus mr-3"></i>New Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="primary-color-dark text-white list-group-item list-group-item-action active" data-toggle="list" href="#All_Pending" role="tab"><i class="fa fa-clock-o mr-3"></i>Pending</a>
                        </li>
                        <li class="nav-item">
                            <a class="primary-color-dark text-white list-group-item list-group-item-action" data-toggle="list" href="#All_Approved" role="tab"><i class="fa fa-check-square-o mr-3"></i>Approved</a>
                        </li>
                        <li class="nav-item">
                            <a class="primary-color-dark text-white list-group-item list-group-item-action" data-toggle="list" href="#All_Canceled" role="tab"><i class="fa fa-times mr-3"></i>Canceled</a>
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
                <a class="primary-color-dark text-white list-group-item list-group-item-action" target="_self" href="index.php" role="tab"><i class="fa fa-plus mr-3"></i>New Order</a>

                <a class="primary-color-dark text-white list-group-item list-group-item-action active" data-toggle="list" href="#All_Pending" role="tab"><i class="fa fa-clock-o mr-3"></i>Pending</a>
                <a class="primary-color-dark text-white list-group-item list-group-item-action" data-toggle="list" href="#All_Approved" role="tab"><i class="fa fa-check-square-o mr-3"></i>Approved</a>
                <a class="primary-color-dark text-white list-group-item list-group-item-action" data-toggle="list" href="#All_Canceled" role="tab"><i class="fa fa-times mr-3"></i>Canceled</a>

                <a class="primary-color-dark text-white list-group-item list-group-item-action" target="_self" href="bknd/logout.php" role="tab"><i class="amber-text fa fa-lock mr-3"></i>Logout</a>
            </div>

        </div>
    </header>

    <!--Main layout-->
    <main class="pt-5 mx-lg-5">

        <?php
		$client_phone="";
            $currSalon = $_SESSION['client_name'];
			$client_id=$_SESSION['client_id'];
			
            //Get Services by this salon
			
			
			 $query = $conn->query("SELECT * FROM chadia_clients WHERE id = '$client_id'")or die(mysql_error());
			
				while($rows = $query->fetch()){
					$client_name= $rows['c_names'];
					$client_phone=$rows['c_phone'];	
					
				}
				
			
        ?>

        <!-- Tab panes -->
        <div class="tab-content">
            
            <!-- ORDERS PENDING -->
            <div class="tab-pane active" id="All_Pending" role="tabpanel">
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="card mb-4" >
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="mb-2 mb-sm-0 pt-1">
                                    <a class="font-weight-bold" href="" target="_self"><b>Pending</b></a>
                                </h4>
                            </div>
                            <div class="card-body" style="overflow-x: scroll;">
                                <table class="dt_table table table-striped table-bordered table-sm mb-0 pb-0" cellspacing="0" width="100%">
                                    <thead class="text-muted">
                                        <tr>
                                            <th class="font-weight-bold">Order Date</th>
                                            <th class="font-weight-bold">Salon</th>
                                            <th class="font-weight-bold text-center">Service</th>
                                            <th class="font-weight-bold text-center">Service Price</th>
											
											<th class="font-weight-bold">Booking Date</th>
                                            <th class="font-weight-bold">Booking Time</th>
                                            <th class="font-weight-bold text-center">Status</th>
                                            <th class="font-weight-bold text-center">Action</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            
                                            // Pending Services
												$service_re=$service_price=$re_salon=$service_desc=$salon=$salon_emp=$service_name="";
                                                $findOrders = $conn->query("SELECT * FROM chadia_orders WHERE o_cust_phone='$client_phone' AND o_status='PENDING' ORDER BY id DESC")or die('Konnection error'.mysql_error());
                                                while ($rows= $findOrders->fetch()){
                                                    $fnd_0_id = $rows['id'];
                                                    $fnd_0_day = $rows['o_day'];
                                                    $fnd_0_time = $rows['o_time'];
													$service_re=$rows['o_service'];
                                                    $fnd_0_emp =$rows['o_employee'];
													$pre_approved=$rows['mng_status'];
													$client_approved=$rows['client_status'];
                                                    $fnd_0_status = $rows['o_status'];
													$fnd_0_date = $rows['o_date'];
													
													$serv= $conn->query("SELECT * FROM chadia_services WHERE id='$service_re'")or die('Konnection error'.mysql_error());
													if($rows2=$serv->fetch()){
													$re_salon=$rows2['serv_salon'];
													$service_name=$rows2['serv_name'];
													$service_price=$rows2['serv_price'];
													$service_desc=$rows2['serv_description'];
													
													$serv2= $conn->query("SELECT * FROM chadia_salons WHERE id='$re_salon'")or die('Konnection error'.mysql_error());
													if($rows3=$serv2->fetch()){
														$salon=$rows3['s_name'];
													}
													}
													$fnd_0_serv_name =$service_name;
													$fnd_0_serv_price=$service_price;
																
                                                    echo "<tr>".
													"<td class='align-middle'>$fnd_0_date</td>".
														 "<th class='align-middle' scope='row'><b>$salon</br></th>".
                                                        "<th class='align-middle' scope='row'><b>$fnd_0_serv_name</br></th>".
                                                        "<td class='align-middle'>$fnd_0_serv_price</td>".
                                                        
                                                        "<td class='align-middle'>$fnd_0_day</td>".
                                                        "<td class='align-middle'>$fnd_0_time</td>".
                                                        "<td class='align-middle'>$fnd_0_status</td>".
                                                        "<td class='align-middle p-1'>";
														?>
														<?php
														if($pre_approved=='Pre_approved' && $client_approved=='Pending'){
															echo" <a href='cancel_orders.php?app_order_id=$fnd_0_id' class='btn btn-sm btn-block btn-success  my-0 font-italic'>Approve</a><br><br>
														
                                                          <a href='cancel_orders.php?cancel_order_id=$fnd_0_id' class='btn btn-sm btn-block danger-color-dark my-0 font-italic'>Cancel</a>";
														}else if($client_approved=='APPROVED'){
															echo "Waiting for final Approval";
														}ELSE{
															echo "Waiting for manager";
														}
														echo"
                                                        </td>
                                                    </tr>";
                         
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ORDERS APPROVED -->
            <div class="tab-pane" id="All_Approved" role="tabpanel">
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="card mb-4" >
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="mb-2 mb-sm-0 pt-1">
                                    <a class="font-weight-bold" href="" target="_self"><b>Approved</b></a>
                                </h4>
                            </div>
                            <div class="card-body" style="overflow-x: scroll;">
                                 <table class="dt_table table table-striped table-bordered table-sm mb-0 pb-0" cellspacing="0" width="100%">
                                    <thead class="text-muted">
                                        <tr>
                                            <th class="font-weight-bold">Order Date</th>
                                            <th class="font-weight-bold">Salon</th>
                                            <th class="font-weight-bold text-center">Service</th>
                                            <th class="font-weight-bold text-center">Price</th>
                                            <th class="font-weight-bold text-center">Employee</th>
											<th class="font-weight-bold">Booking Date</th>
                                            <th class="font-weight-bold">Booking Time</th>
                                            <th class="font-weight-bold text-center">Status</th>
                                            
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            
                                            // Approved Services
											$employee=$emp_name="";
											$service_re=$service_price=$re_salon=$service_desc=$salon=$salon_emp=$service_name="";
                                                $findOrders = $conn->query("SELECT * FROM chadia_orders WHERE o_cust_phone='$client_phone' AND o_status='APPROVED' ORDER BY id DESC")or die('Konnection error'.mysql_error());
                                                while ($rows= $findOrders->fetch()){
                                                    $fnd_0_id = $rows['id'];
                                                    $fnd_0_day = $rows['o_day'];
                                                    $fnd_0_time = $rows['o_time'];
													$service_re=$rows['o_service'];
                                                    $employee=$rows['o_employee'];
                                            
                                                    $fnd_0_status = $rows['o_status'];
													$fnd_0_date = $rows['o_date'];
													
													$serv= $conn->query("SELECT * FROM chadia_services WHERE id='$service_re'")or die('Konnection error'.mysql_error());
													if($rows2=$serv->fetch()){
													$re_salon=$rows2['serv_salon'];
													$service_name=$rows2['serv_name'];
													$service_price=$rows2['serv_price'];
													$service_desc=$rows2['serv_description'];
													
													$serv2= $conn->query("SELECT * FROM chadia_salons WHERE id='$re_salon'")or die('Konnection error'.mysql_error());
													if($rows3=$serv2->fetch()){
														$salon=$rows3['s_name'];
													}
													}
													
                                               
													$serv3= $conn->query("SELECT * FROM chadia_employees WHERE id='$employee'")or die('Konnection error'.mysql_error());
													if($rows4=$serv3->fetch()){
														$emp_name=$rows4['e_names'];
													}
													
													$fnd_0_serv_name =$service_name;
													$fnd_0_serv_price=$service_price;

																
                                                    echo "<tr>".
													"<td class='align-middle'>$fnd_0_date</td>".
														 "<th class='align-middle' scope='row'><b>$salon</br></th>".
                                                        "<th class='align-middle' scope='row'><b>$fnd_0_serv_name</br></th>".
                                                        "<td class='align-middle'>$fnd_0_serv_price</td>".
                                                         "<td class='align-middle'>$emp_name</td>".
                                                        "<td class='align-middle'>$fnd_0_day</td>".
                                                        "<td class='align-middle'>$fnd_0_time</td>".
                                                        "<td class='align-middle'>$fnd_0_status</td>".
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
            <div class="tab-pane" id="All_Canceled" role="tabpanel">
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="card mb-4" >
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="mb-2 mb-sm-0 pt-1">
                                    <a class="font-weight-bold" href="" target="_self"><b>Canceled</b></a>
                                </h4>
                            </div>
                            <div class="card-body" style="overflow-x: scroll;">
                                 <table class="dt_table table table-striped table-bordered table-sm mb-0 pb-0" cellspacing="0" width="100%">
                                    <thead class="text-muted">
                                        <tr>
                                            <th class="font-weight-bold">Order Date</th>
                                            <th class="font-weight-bold">Salon</th>
                                            <th class="font-weight-bold text-center">Service</th>
                                            <th class="font-weight-bold text-center">Price</th>
                                            
											<th class="font-weight-bold">Booking Date</th>
                                            <th class="font-weight-bold">Booking Time</th>
                                            <th class="font-weight-bold text-center">Status</th>
                                          
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                            
                                            // Pending Services
												$service_re=$service_price=$re_salon=$service_desc=$salon=$salon_emp=$service_name="";
                                                $findOrders = $conn->query("SELECT * FROM chadia_orders WHERE o_cust_phone='$client_phone' AND o_status='CANCELED' ORDER BY id DESC")or die('Konnection error'.mysql_error());
                                                while ($rows= $findOrders->fetch()){
                                                    $fnd_0_id = $rows['id'];
                                                    $fnd_0_day = $rows['o_day'];
                                                    $fnd_0_time = $rows['o_time'];
													$service_re=$rows['o_service'];
                                                    $fnd_0_emp =$rows['o_employee'];
                                            
                                                    $fnd_0_status = $rows['o_status'];
													$fnd_0_date = $rows['o_date'];
													
													$serv= $conn->query("SELECT * FROM chadia_services WHERE id='$service_re'")or die('Konnection error'.mysql_error());
													if($rows2=$serv->fetch()){
													$re_salon=$rows2['serv_salon'];
													$service_name=$rows2['serv_name'];
													$service_price=$rows2['serv_price'];
													$service_desc=$rows2['serv_description'];
													
													$serv2= $conn->query("SELECT * FROM chadia_salons WHERE id='$re_salon'")or die('Konnection error'.mysql_error());
													if($rows3=$serv2->fetch()){
														$salon=$rows3['s_name'];
													}
													}
													$fnd_0_serv_name =$service_name;
													$fnd_0_serv_price=$service_price;
																
                                                    echo "<tr>".
													"<td class='align-middle'>$fnd_0_date</td>".
														 "<th class='align-middle' scope='row'><b>$salon</br></th>".
                                                        "<th class='align-middle' scope='row'><b>$fnd_0_serv_name</br></th>".
                                                        "<td class='align-middle'>$fnd_0_serv_price</td>".
                                                        
                                                        "<td class='align-middle'>$fnd_0_day</td>".
                                                        "<td class='align-middle'>$fnd_0_time</td>".
                                                        "<td class='align-middle'>$fnd_0_status</td>".
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
    </main>

    <!-- Modal: Approve Order -->
    <div class="modal fade modal_cover_2" id="modalOrderApproval" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header text-center primary-color-dark white-text">
                    <h4 class="modal-title font-weight-bold white-text"><b>ORDER CONFIRMATION</b></h4>
                    <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h4 class="font-weight-bold text-muted lead text-center py-0 mb-4">Order Details</h4>
                    <table class="table table-striped table-bordered table-sm mb-0 pb-0 view overlay z-depth-1-half rounded" cellspacing="0" width="100%">
                        <tbody class="">
                            <tr><td class="text-muted font-weight-bold">Service :</td><td class="font-weight-bold" id="this_0_service"></td></tr>
                            <tr><td class="text-muted font-weight-bold">Customer :</td><td class="font-weight-bold" id="this_0_customer"></td></tr>
                            <tr><td class="text-muted font-weight-bold">Time :</td><td class="font-weight-bold" id="this_0_booking"></td></tr>
                            <tr><td class="text-muted font-weight-bold">Price :</td><td class="font-weight-bold" id="this_0_price"></td></tr>
                        </tbody>
                    </table>
                    <form method="POST" >
                        
                        <div class="row my-3">
                            <div class="col-sm-4">
                                <span class="">Order No. :</span>
                                <input type="text" class="form-control" name="approved_id" id="this_0_id" readonly />
                            </div>

                            <div class="col-sm-8">
                                <span class="">Hair Done By :</span>
                                <select class="form-control" name="approved_emp">
                                    <?php
                                        $getStylists = $conn->query("SELECT * FROM chadia_employees WHERE e_status='ACTIVE' AND e_salon='$currSalon' ORDER BY e_names")or die('Konnection error'.mysql_error());
                                        while ($getStylists_arr = $getStylists->fetch()) {

                                            $stylist_id = $getStylists_arr['id'];
                                            $stylist_name = $getStylists_arr['e_names'];

                                            echo "<option value='$stylist_id'>$stylist_name</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <hr class="mb-3">

                        <button type="submit" formaction="bknd/apr_order.php" class="btn btn-block btn-unique"><b>confirm order</b></button>
                    </form>
                </div>
            </div>
        </div>
    </div>


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

            $('.order_status').each(function() {
                if($(this).text() == 'APPROVED') { 
                    $(this).css('background-color', '#59698d');
                    $(this).css('color', '#fff');
                }
            });
        });
    </script>
    <script src="bknd/find_data.js"></script>
</body>

</html>
