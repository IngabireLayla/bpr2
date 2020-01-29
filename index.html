<!DOCTYPE html>
<html lang="en">

<?php
session_start();
    require_once 'bknd/db_connect.php';
	    include'bknd/db_con.php';
    
    $db = new DB_CONNECT();
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
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="body_img_1">
    <div style="height: 92vh" class="body_img_1_cover">
        <div class="flex-center flex-column">
            <h1 class="font-weight-bold text-uppercase white-text animated fadeIn mb-4"> Online Beauty Saloon Appointments System </h1>

            <h4 class="white-text mb-4">
                A web application to help you find Beauty Salons everywhere in Rwanda
            </h4>

            <h5 class="white-text mt-0 mb-4">
                A Final Year Project by Diane
            </h5>
  <!-- Location selection -->
            <div class="d-flex">
                <div class="dropdown">
                    <button class="btn btn-unique dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>Select &nbsp Location &nbsp</b></button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#b_parlour_Kigali" >Kigali City</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#b_parlour_North" >Northern - Province</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#b_parlour_South" >Southern - Province</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#b_parlour_East" >Eastern - Province</a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#b_parlour_West" >Western - Province</a>
                    </div>
                </div>
				<?php 
		
					if(!isset($_SESSION['client_name']) && !isset($_SESSION['client_id'])){
				?>
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modalLoginForm"><b>Login</b></button>
				<?php
					}
					?>
            </div>
        </div>
    </div>

    <footer style="height: 8vh" class="page-footer font-small primary-color-dark pt-0">
        <div class="footer-copyright py-3 text-center">
            © Diane 2019, All Rights Reserved.
        </div>
    </footer>
    

    <!-- Login -->
    <div class="modal fade modal_cover_1" id="modalLoginForm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header text-center primary-color-dark white-text">
                    <h4 class="modal-title font-weight-bold white-text">Member Login</h4>
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

                </div>
				
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn warning-color-dark darken-5" name="usr_login">Login</button>
                </div>
				
                </form>
            </div>
        </div>
    </div>

    <!-- Modal: Salons in Kigali -->
    <div class="modal fade modal_cover_1" id="b_parlour_Kigali" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header primary-color-dark">
                    <h4 class="modal-title text-white"> Online Beauty Saloon Appointments System - <b>KIGALI</b></h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <?php
                        $sql_K = mysql_query("SELECT * FROM chadia_salons WHERE s_status!='DELETED' AND s_address >= '286' AND s_address <= '320' ORDER BY s_name ");

                        if (mysql_num_rows($sql_K) > 0){

                            echo "<div class='row'>";
                            while ($row_K = mysql_fetch_array($sql_K, MYSQLI_ASSOC)) {

                                $salon_id_K = $row_K['id'];
                                $anyServ_K = mysql_query("SELECT * FROM chadia_services WHERE serv_salon ='$salon_id_K' ");

                                $address_id_K = $row_K['s_address'];

                                $sekt_K = mysql_query("SELECT * FROM chadia_sectors WHERE id = '$address_id_K' ");
                                $addr_K = mysql_fetch_array($sekt_K, MYSQLI_ASSOC);
                                $address_K = $addr_K['sector']." - ".$addr_K['district'];

                                echo "<div class='col-md-6 mb-4'>
                                    <div class='view overlay z-depth-1-half'>
                                        <img src='assets/pics/salon_logo/".$row_K['s_logo']."' class='img-fluid mx-auto' style='height:150px;' >
                                        <div class='mask rgba-white-slight'></div>
                                    </div>

                                    <h4 class='my-3 font-weight-bold text-uppercase'>".$row_K['s_name']."</h4>
                                    <p class='grey-text'>
                                        <i class='fa fa-home mr-2'></i>".$address_K."
                                        <span class='pull-right'><i class='fa fa-phone mr-2'></i>".$row_K['mngr_phone']."</span>
                                    </p>
                                    <p>Availability : <span class='text-danger'><b>".$row_K['s_availability']."</b></span></p>

                                    <div class='btn-group btn-block btn-md mb-2' role='group' aria-label='Basic example'>
                                        <button type='button' class='btn px-2 btn-block btn-secondary waves-effect'>Open : ".$row_K['s_open_from']."</button>
                                        <button type='button' class='btn px-2 btn-block btn-secondary waves-effect'>Close : ".$row_K['s_open_to']."</button>";
                                        if ($row_K['s_availability']=='OPEN' && mysql_num_rows($anyServ_K) > 0){
                                            echo"<a href='salon.php?service=$salon_id_K' class='btn btn-block btn-unique waves-effect' target='_self'>More</a>";
                                        }
                                    echo "</div>";
                                echo "</div>";
                            }
                            echo "</div>";
                        }
                        else{ echo'<p class="text-center h4"><b>No records found!</b></p>'; }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Salons in North -->
    <div class="modal fade modal_cover_1" id="b_parlour_North" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header primary-color-dark">
                    <h4 class="modal-title text-white"> Online Beauty Saloon Appointments System - <b>NORTH</b></h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <?php
                        $sql_N = mysql_query("SELECT * FROM chadia_salons WHERE s_status!='DELETED' AND s_address >= '1' AND s_address <= '89' ORDER BY s_name ");

                        if (mysql_num_rows($sql_N) > 0){

                            echo "<div class='row'>";
                            while ($row_N = mysql_fetch_array($sql_N, MYSQLI_ASSOC)) {

                                $salon_id_N = $row_N['id'];
                                $anyServ_N = mysql_query("SELECT * FROM chadia_services WHERE serv_salon ='$salon_id_N' ");

                                $address_id_N = $row_N['s_address'];

                                $sekt_N = mysql_query("SELECT * FROM chadia_sectors WHERE id = '$address_id_N' ");
                                $addr_N = mysql_fetch_array($sekt_N, MYSQLI_ASSOC);
                                $address_N = $addr_N['sector']." - ".$addr_N['district'];

                                echo "<div class='col-md-6 mb-4'>
                                    <div class='view overlay z-depth-1-half'>
                                        <img src='assets/pics/salon_logo/".$row_N['s_logo']."' class='img-fluid mx-auto' style='height:150px;' >
                                        <div class='mask rgba-white-slight'></div>
                                    </div>

                                    <h4 class='my-3 font-weight-bold text-uppercase'>".$row_N['s_name']."</h4>
                                    <p class='grey-text'>
                                        <i class='fa fa-home mr-2'></i>".$address_N."
                                        <span class='pull-right'><i class='fa fa-phone mr-2'></i>".$row_N['mngr_phone']."</span>
                                    </p>
                                    <p>Availability : <span class='text-danger'><b>".$row_N['s_availability']."</b></span></p>

                                    <div class='btn-group btn-block btn-md mb-2' role='group' aria-label='Basic example'>
                                        <button type='button' class='btn px-2 btn-block btn-secondary waves-effect'>Open : ".$row_N['s_open_from']."</button>
                                        <button type='button' class='btn px-2 btn-block btn-secondary waves-effect'>Close : ".$row_N['s_open_to']."</button>";
                                        if ($row_N['s_availability']=='OPEN' && mysql_num_rows($anyServ_N) > 0){
                                            echo"<a href='salon.php?service=$salon_id_N' class='btn btn-block btn-unique waves-effect' target='_self'>More</a>";
                                        }
                                    echo "</div>";
                                echo "</div>";
                            }
                            echo "</div>";
                        }
                        else{ echo'<p class="text-center h4"><b>No records found!</b></p>'; }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Salons in South -->
    <div class="modal fade modal_cover_1" id="b_parlour_South" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header primary-color-dark">
                    <h4 class="modal-title text-white"> Online Beauty Saloon Appointments System - <b>SOUTH</b></h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <?php
                        $sql_S = mysql_query("SELECT * FROM chadia_salons WHERE s_status!='DELETED' AND s_address >= '90' AND s_address <= '190' ORDER BY s_name ");

                        if (mysql_num_rows($sql_S) > 0){

                            echo "<div class='row'>";
                            while ($row_S = mysql_fetch_array($sql_S, MYSQLI_ASSOC)) {

                                $salon_id_S = $row_S['id'];
                                $anyServ_S = mysql_query("SELECT * FROM chadia_services WHERE serv_salon ='$salon_id_S' ");

                                $address_id_S = $row_S['s_address'];

                                $sekt_S = mysql_query("SELECT * FROM chadia_sectors WHERE id = '$address_id_S' ");
                                $addr_S = mysql_fetch_array($sekt_N, MYSQLI_ASSOC);
                                $address_S = $addr_S['sector']." - ".$addr_S['district'];

                                echo "<div class='col-md-6 mb-4'>
                                    <div class='view overlay z-depth-1-half'>
                                        <img src='assets/pics/salon_logo/".$row_S['s_logo']."' class='img-fluid mx-auto' style='height:150px;' >
                                        <div class='mask rgba-white-slight'></div>
                                    </div>

                                    <h4 class='my-3 font-weight-bold text-uppercase'>".$row_S['s_name']."</h4>
                                    <p class='grey-text'>
                                        <i class='fa fa-home mr-2'></i>".$address_S."
                                        <span class='pull-right'><i class='fa fa-phone mr-2'></i>".$row_S['mngr_phone']."</span>
                                    </p>
                                    <p>Availability : <span class='text-danger'><b>".$row_S['s_availability']."</b></span></p>

                                    <div class='btn-group btn-block btn-md mb-2' role='group' aria-label='Basic example'>
                                        <button type='button' class='btn px-2 btn-block btn-secondary waves-effect'>Open : ".$row_S['s_open_from']."</button>
                                        <button type='button' class='btn px-2 btn-block btn-secondary waves-effect'>Close : ".$row_S['s_open_to']."</button>";
                                        if ($row_S['s_availability']=='OPEN' && mysql_num_rows($anyServ_S) > 0){
                                            echo"<a href='salon.php?service=$salon_id_S' class='btn btn-block btn-unique waves-effect' target='_self'>More</a>";
                                        }
                                    echo "</div>";
                                echo "</div>";
                            }
                            echo "</div>";
                        }
                        else{ echo'<p class="text-center h4"><b>No records found!</b></p>'; }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Salons in East -->
    <div class="modal fade modal_cover_1" id="b_parlour_East" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header primary-color-dark">
                    <h4 class="modal-title text-white">Online Beauty Saloon Appointments System - <b>EAST</b></h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <?php
                        $sql_E = mysql_query("SELECT * FROM chadia_salons WHERE s_status!='DELETED' AND s_address >= '191' AND s_address <= '285' ORDER BY s_name ");

                        if (mysql_num_rows($sql_E) > 0){

                            echo "<div class='row'>";
                            while ($row_E = mysql_fetch_array($sql_E, MYSQLI_ASSOC)) {

                                $salon_id_E = $row_E['id'];
                                $anyServ_E = mysql_query("SELECT * FROM chadia_services WHERE serv_salon ='$salon_id_E' ");

                                $address_id_E = $row_E['s_address'];

                                $sekt_E = mysql_query("SELECT * FROM chadia_sectors WHERE id = '$address_id_E' ");
                                $addr_E = mysql_fetch_array($sekt_E, MYSQLI_ASSOC);
                                $address_E = $addr_E['sector']." - ".$addr_E['district'];

                                echo "<div class='col-md-6 mb-4'>
                                    <div class='view overlay z-depth-1-half'>
                                        <img src='assets/pics/salon_logo/".$row_E['s_logo']."' class='img-fluid mx-auto' style='height:150px;' >
                                        <div class='mask rgba-white-slight'></div>
                                    </div>

                                    <h4 class='my-3 font-weight-bold text-uppercase'>".$row_E['s_name']."</h4>
                                    <p class='grey-text'>
                                        <i class='fa fa-home mr-2'></i>".$address_E."
                                        <span class='pull-right'><i class='fa fa-phone mr-2'></i>".$row_E['mngr_phone']."</span>
                                    </p>
                                    <p>Availability : <span class='text-danger'><b>".$row_E['s_availability']."</b></span></p>

                                    <div class='btn-group btn-block btn-md mb-2' role='group' aria-label='Basic example'>
                                        <button type='button' class='btn px-2 btn-block btn-secondary waves-effect'>Open : ".$row_E['s_open_from']."</button>
                                        <button type='button' class='btn px-2 btn-block btn-secondary waves-effect'>Close : ".$row_E['s_open_to']."</button>";
                                        if ($row_E['s_availability']=='OPEN' && mysql_num_rows($anyServ_E) > 0){
                                            echo"<a href='salon.php?service=$salon_id_E' class='btn btn-block btn-unique waves-effect' target='_self'>More</a>";
                                        }
                                    echo "</div>";
                                echo "</div>";
                            }
                            echo "</div>";
                        }
                        else{ echo'<p class="text-center h4"><b>No records found!</b></p>'; }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Salons in West -->
    <div class="modal fade modal_cover_1" id="b_parlour_West" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header primary-color-dark">
                    <h4 class="modal-title text-white"> Online Beauty Saloon Appointments System - <b>WEST</b></h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <?php
                        $sql_W = mysql_query("SELECT * FROM chadia_salons WHERE s_status!='DELETED' AND s_address >= '321' AND s_address <= '416' ORDER BY s_name ");

                        if (mysql_num_rows($sql_W) > 0){

                            echo "<div class='row'>";
                            while ($row_W = mysql_fetch_array($sql_W, MYSQLI_ASSOC)) {

                                $salon_id_W = $row_W['id'];
                                $anyServ_W = mysql_query("SELECT * FROM chadia_services WHERE serv_salon ='$salon_id_W' ");

                                $address_id_W = $row_W['s_address'];

                                $sekt_W = mysql_query("SELECT * FROM chadia_sectors WHERE id = '$address_id_W' ");
                                $addr_W = mysql_fetch_array($sekt_W, MYSQLI_ASSOC);
                                $address_W = $addr_W['sector']." - ".$addr_W['district'];

                                echo "<div class='col-md-6 mb-4'>
                                    <div class='view overlay z-depth-1-half'>
                                        <img src='assets/pics/salon_logo/".$row_W['s_logo']."' class='img-fluid mx-auto' style='height:150px;' >
                                        <div class='mask rgba-white-slight'></div>
                                    </div>

                                    <h4 class='my-3 font-weight-bold text-uppercase'>".$row_W['s_name']."</h4>
                                    <p class='grey-text'>
                                        <i class='fa fa-home mr-2'></i>".$address_W."
                                        <span class='right'><i class='fa fa-phone mr-2'></i>".$row_W['mngr_phone']."</span>
                                    </p>
                                    <p>Availability : <span class='text-danger'><b>".$row_W['s_availability']."</b></span></p>

                                    <div class='btn-group btn-block btn-md mb-2' role='group' aria-label='Basic example'>
                                        <button type='button' class='btn px-2 btn-block btn-secondary waves-effect'>Open : ".$row_W['s_open_from']."</button>
                                        <button type='button' class='btn px-2 btn-block btn-secondary waves-effect'>Close : ".$row_W['s_open_to']."</button>";
                                        if ($row_W['s_availability']=='OPEN' && mysql_num_rows($anyServ_W) > 0){
                                            echo"<a href='salon.php?service=$salon_id_W' class='btn btn-block btn-unique waves-effect' target='_self'>More</a>";
                                        }
                                    echo "</div>";
                                echo "</div>";
                            }
                            echo "</div>";
                        }
                        else{ echo'<p class="text-center h4"><b>No records found!</b></p>'; }
                    ?>
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
</body>

</html>
