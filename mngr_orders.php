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
                        <span class="">Salon</span>
                        <span class="mx-2">/</span>
                        <span class="font-weight-bold text-uppercase"><?php echo $_SESSION['MNGR_SLN'];?></span>
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
                            <a class="primary-color-dark text-white list-group-item list-group-item-action" target="_self" href="mngr.php" role="tab"><i class="fa fa-home mr-3"></i>Home</a>
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

            <a class="logo-wrapper waves-effect text-white h3" target="_self" href=""><?php echo $_SESSION['MNGR_NM']; ?></a>

            <div class="list-group list-group-flush" id="myList" role="tablist">
                <a class="primary-color-dark text-white list-group-item list-group-item-action" target="_self" href="mngr.php" role="tab"><i class="fa fa-home mr-3"></i>Home</a>

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
            $currSalon = $_SESSION['MNGR_ID'];

            //Get Services by this salon
            $findServs_id = array();                                    
            $findServs = $conn->query("SELECT * FROM chadia_services WHERE serv_status='ACTIVE' AND serv_salon='$currSalon' ")or die('Konnection error'.mysql_error());
            while ($findServs_arr = $findServs->fetch()) {

                $findServs_id[] = $findServs_arr['id'];
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
                                            <th class="font-weight-bold">Service</th>
                                            <th class="font-weight-bold">Price</th>
                                            <th class="font-weight-bold text-center" colspan="2">Customer</th>
											
                                            <th class="font-weight-bold text-center" colspan="2">Booking</th>
											<th class="font-weight-bold text-center">Served by</th>
                                            <th class="font-weight-bold text-center" colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            
                                            // Pending Services
											$emp=$emp2="";
                                            for($var_i = 0; $var_i < count($findServs_id); $var_i++ ){

                                                $this_findServs_id = $findServs_id[$var_i];

                                                $findOrders = $conn->query("SELECT * FROM chadia_orders WHERE o_service='$this_findServs_id' AND o_status='PENDING' ")or die('Konnection error'.mysql_error());
                                                while ($findOrders_arr = $findOrders->fetch()) {

                                                    $getServDetails = $conn->query("SELECT * FROM chadia_services WHERE id='$this_findServs_id' ")or die('Konnection error'.mysql_error());
                                                    $getServDetails_arr = $getServDetails->fetch();

                                                    $fnd_0_id = $findOrders_arr['id'];
                                                    $fnd_0_day = $findOrders_arr['o_day'];
                                                    $fnd_0_time = $findOrders_arr['o_time'];
                                                    $fnd_0_cust_name = $findOrders_arr['o_cust_name'];
                                                    $fnd_0_cust_phone = $findOrders_arr['o_cust_phone'];
                                                    $fnd_0_serv_price = $getServDetails_arr['serv_price'];
                                                    $fnd_0_serv_name = $getServDetails_arr['serv_name'];
													$emp= $findOrders_arr['o_employee'];	

                                                    $fnd_0_status = $findOrders_arr['o_status'];

													$findemp= $conn->query("SELECT * FROM chadia_employees WHERE id='$emp' AND e_status='ACTIVE' ")or die('Konnection error'.mysql_error());
                                                    if ($findOemp_arr = $findemp->fetch()) {
													$emp2=$findOemp_arr['e_names']	;
													}
													
                                                    echo "<tr>".
                                                        "<th class='align-middle' scope='row'><b>$fnd_0_serv_name</br></th>".
                                                        "<td class='align-middle'>$fnd_0_serv_price</td>".
                                                        "<td class='align-middle text-muted font-weight-bold'>$fnd_0_cust_name</td>".
                                                        "<td class='align-middle'>$fnd_0_cust_phone</td>".
                                                        "<td class='align-middle'>$fnd_0_day</td>".
                                                        "<td class='align-middle'>$fnd_0_time</td>".
														"<td class='align-middle'>$emp2</td>".
                                                        "<td class='align-middle p-1'>"
														
														
														?>
														<?php
														if($findOrders_arr['mng_status']=='Pending' && $findOrders_arr['client_status']=='Pending' && $findOrders_arr['o_status']=='PENDING'){
													
                                                          echo "  <a href='bknd/apr_order.php? pre_approve_order_id=$fnd_0_id' class='btn btn-sm btn-block btn-success' 

                                                              <b>Pre_approve</b></a>";
														}else if($findOrders_arr['mng_status']=='Pre_approved' && $findOrders_arr['client_status']=='Pending' && $findOrders_arr['o_status']=='PENDING'){
															  echo "Waiting for customer feedback";  
														}
														else if($findOrders_arr['mng_status']=='Pre_approved' && $findOrders_arr['client_status']=='APPROVED' && $findOrders_arr['o_status']=='PENDING'){
															  echo"<a href='bknd/apr_order.php? approve_order_id=$fnd_0_id' class='btn btn-sm btn-block btn-success my-0 orderApprove' 

                                                              <b>Confirm</b></a>";
														}
														
                                                       echo" </td>".
                                                        "<td class='align-middle p-1'>
                                                            <button type='button' cancel_order_id='$fnd_0_id' class='btn btn-sm btn-block danger-color-dark my-0 font-italic orderCancel' >Cancel</button>
                                                        </td>
                                                    </tr>";
                                                }
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
                                            <th class="font-weight-bold">Service</th>
                                            <th class="font-weight-bold text-center" colspan="2">Customer</th>
                                            <th class="font-weight-bold text-center" colspan="2">Booking</th>
                                            <th class="font-weight-bold">Served By</th>
                                            <th class="font-weight-bold">Price</th>
                                            <th class="font-weight-bold">Receipt</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            // Approved Services

                                            for($var_i = 0; $var_i < count($findServs_id); $var_i++ ){

                                                $this_findServs_id = $findServs_id[$var_i];

                                                $findOrders = $conn->query("SELECT * FROM chadia_orders WHERE o_service='$this_findServs_id' AND o_status='APPROVED' ")or die('Konnection error'.mysql_error());
                                                while ($findOrders_arr = $findOrders->fetch()) {

                                                    $getServDetails = $conn->query("SELECT * FROM chadia_services WHERE id='$this_findServs_id' ")or die('Konnection error'.mysql_error());
                                                    $getServDetails_arr = $getServDetails->fetch();


                                                    $fnd_0_id = $findOrders_arr['id'];
                                                    $fnd_0_day = $findOrders_arr['o_day'];
                                                    $fnd_0_time = $findOrders_arr['o_time'];
                                                    $fnd_0_cust_name = $findOrders_arr['o_cust_name'];
                                                    $fnd_0_cust_phone = $findOrders_arr['o_cust_phone'];
                                                    $fnd_0_status = $findOrders_arr['o_status'];
                                                    $fnd_0_serv_price = $getServDetails_arr['serv_price'];
                                                    $fnd_0_serv_name = $getServDetails_arr['serv_name'];

                                                    $fnd_0_emp = $findOrders_arr['o_employee'];

                                                    $getServEmp = $conn->query("SELECT * FROM chadia_employees WHERE id='$fnd_0_emp' ")or die('Konnection error'.mysql_error());
                                                    $getServEmp_arr = $getServEmp->fetch();
                                                    $fnd_0_serv_emp = $getServEmp_arr['e_names'];

                                                    echo "<tr>".
                                                        "<th class='align-middle' scope='row'><b>$fnd_0_serv_name</br></th>".
                                                        "<td class='align-middle text-muted font-weight-bold'>$fnd_0_cust_name</td>".
                                                        "<td class='align-middle'>$fnd_0_cust_phone</td>".
                                                        "<td class='align-middle'>$fnd_0_day</td>".
                                                        "<td class='align-middle'>$fnd_0_time</td>".
                                                        "<td class='align-middle'>$fnd_0_serv_emp</td>".
                                                        "<td class='align-middle'>$fnd_0_serv_price</td>".
                                                        "<td class='align-middle p-1'>
                                                            <a href='report_bill.php?bill_no=$fnd_0_id' class='btn btn-block btn-secondary waves-effect' target='_blank'>Bill</a>
                                                        </td>".
                                                    "</tr>";
                                                }
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
                                            <th class="font-weight-bold">Service</th>
                                            <th class="font-weight-bold">Price</th>
                                            <th class="font-weight-bold text-center" colspan="2">Customer</th>
                                            <th class="font-weight-bold text-center" colspan="2">Booking</th>
                                            <th class="font-weight-bold">Date Canceled</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            // Canceled Services

                                            for($var_i = 0; $var_i < count($findServs_id); $var_i++ ){

                                                $this_findServs_id = $findServs_id[$var_i];

                                                $findOrders = $conn->query("SELECT * FROM chadia_orders WHERE o_service='$this_findServs_id' AND o_status='CANCELED' ")or die('Konnection error'.mysql_error());
                                                while ($findOrders_arr = $findOrders->fetch()) {

                                                    $getServDetails = $conn->query("SELECT * FROM chadia_services WHERE id='$this_findServs_id' ")or die('Konnection error'.mysql_error());
                                                    $getServDetails_arr = $getServDetails->fetch();

                                                    $fnd_0_day = $findOrders_arr['o_day'];
                                                    $fnd_0_time = $findOrders_arr['o_time'];
                                                    $fnd_0_cust_name = $findOrders_arr['o_cust_name'];
                                                    $fnd_0_cust_phone = $findOrders_arr['o_cust_phone'];
                                                    $fnd_0_serv_price = $getServDetails_arr['serv_price'];
                                                    $fnd_0_serv_name = $getServDetails_arr['serv_name'];

                                                    $date_done = date_create($findOrders_arr['o_date']);
                                                    $fnd_0_date_done = date_format($date_done, 'd-M-Y');

                                                    echo "<tr>".
                                                        "<th class='align-middle' scope='row'><b>$fnd_0_serv_name</br></th>".
                                                        "<td class='align-middle'>$fnd_0_serv_price</td>".
                                                        "<td class='align-middle text-muted font-weight-bold'>$fnd_0_cust_name</td>".
                                                        "<td class='align-middle'>$fnd_0_cust_phone</td>".
                                                        "<td class='align-middle'>$fnd_0_day</td>".
                                                        "<td class='align-middle'>$fnd_0_time</td>".
                                                        "<td class='align-middle'>$fnd_0_date_done</td>".
                                                    "</tr>";
                                                }
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
