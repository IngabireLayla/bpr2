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
    <title>Beauty Saloon Appointments System </title>
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
                <button class="navbar-toggler font-weight-bold blue-gradient" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mr-auto list-group" role="tablist">
                        <li class="nav-item active">
                            <a class="primary-color-dark text-white list-group-item list-group-item-action" target="_self" href="mngr.php" role="tab"><i class="fa fa-home mr-3"></i>Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="primary-color-dark text-white list-group-item list-group-item-action active" data-toggle="list" href="#All_Active" role="tab"><i class="fa fa-clock-o mr-3"></i>Active</a>
                        </li>
                        <li class="nav-item">
                            <a class="primary-color-dark text-white list-group-item list-group-item-action" data-toggle="list" href="#All_Deleted" role="tab"><i class="fa fa-times mr-3"></i>Deleted</a>
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

                <a class="primary-color-dark text-white list-group-item list-group-item-action active" data-toggle="list" href="#All_Active" role="tab"><i class="fa fa-clock-o mr-3"></i>Active</a>
                <a class="primary-color-dark text-white list-group-item list-group-item-action" data-toggle="list" href="#All_Deleted" role="tab"><i class="fa fa-times mr-3"></i>Deleted</a>

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
            <!-- ACTIVE SERVICES -->
            <div class="tab-pane active" id="All_Active" role="tabpanel">
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="card mb-4" >
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="mb-2 mb-sm-0 pt-1">
                                    <a class="font-weight-bold" href="" target="_self"><b>ACTIVE</b></a>
                                </h4>

                                <button class="btn btn-unique btn-md my-0 ml-0 p" type="button" data-toggle="modal" data-target="#modalNewService" ><i class="fa fa-plus mr-2"></i><b>New Service</b></button>
                            </div>
                            <div class="card-body" style="overflow-x: scroll;">
                                <table class="dt_table table table-striped table-bordered table-sm mb-0 pb-0" cellspacing="0" width="100%">
                                    <thead class="text-muted">
                                        <tr>
                                            <th class="font-weight-bold">Service</th>
                                            <th class="font-weight-bold">Price</th>
											 <th class="font-weight-bold">Duration</th>
                                            <th class="font-weight-bold">More</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            $thisServiceSalon = $_SESSION['MNGR_ID'];
                                            
                                            $getActiveServs = $conn->query("SELECT * FROM chadia_services WHERE serv_status='ACTIVE' AND serv_salon='$thisServiceSalon' ORDER BY serv_name")or die('Konnection error'.mysql_error());
                                            while ($getActiveServs_arr = $getActiveServs->fetch()) {

                                                $db_serv_id = $getActiveServs_arr['id'];
                                                $db_serv_name = $getActiveServs_arr['serv_name'];
                                                $db_serv_price = $getActiveServs_arr['serv_price'];
												$db_serv_d= $getActiveServs_arr['serv_duration'];
                                                echo "<tr>".
                                                    "<th class='align-middle' scope='row'><b>$db_serv_name</br></th>".
                                                    "<td class='align-middle'>$db_serv_price</td>".
													"<td class='align-middle'>$db_serv_d Min</td>".
                                                    "<td class='align-middle p-1'>
                                                        <button type='button' db_serv_id='$db_serv_id' class='btn btn-sm btn-block btn-success my-0 font-italic thisService' >Edit</button>
                                                    </td>".                                        
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

            <!-- DELETED SERVICES -->
            <div class="tab-pane" id="All_Deleted" role="tabpanel">
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="card mb-4" >
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="mb-2 mb-sm-0 pt-1">
                                    <a class="font-weight-bold" href="" target="_self"><b>DELETED</b></a>
                                </h4>
                            </div>
                            <div class="card-body" style="overflow-x: scroll;">
                                <table class="dt_table table table-striped table-bordered table-sm mb-0 pb-0" cellspacing="0" width="100%">
                                    <thead class="text-muted">
                                        <tr>
                                            <th class="font-weight-bold">Service</th>
                                            <th class="font-weight-bold">Price</th>
                                            <th class="font-weight-bold">Date Deleted</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            
                                            $getDeletedServs = $conn->query("SELECT * FROM chadia_services WHERE serv_status='DELETED' AND serv_salon='$thisServiceSalon' ORDER BY serv_name")or die('Konnection error'.mysql_error());
                                            while ($getDeletedServs_arr = $getDeletedServs->fetch()) {

                                                $db_serv_id = $getDeletedServs_arr['id'];
                                                $db_serv_name = $getDeletedServs_arr['serv_name'];
                                                $db_serv_price = $getDeletedServs_arr['serv_price'];

                                                $date_done = date_create($getDeletedServs_arr['serv_date']);
                                                $db_date_done = date_format($date_done, 'd-M-Y');

                                                echo "<tr>".
                                                    "<th class='align-middle' scope='row'><b>$db_serv_name</br></th>".
                                                    "<td class='align-middle'>$db_serv_price</td>".
                                                    "<td class='align-middle'>$db_date_done</td>".
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

    <!-- Modal: New Service -->
    <div class="modal fade modal_cover_1" id="modalNewService" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header text-center primary-color-dark white-text">
                    <h4 class="modal-title font-weight-bold white-text"><b>NEW Service</b></h4>
                    <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" >
                        <div class="row mb-3">
                            <div class="col-sm-8">
                                <span class="">Enter Service Names</span>
                                <input type="text" class="form-control text-uppercase" required name="new_service_name" placeholder="Enter Service Name" />
                            </div>
							
							 <div class="col-sm-4">
                                <span class="">Service Duration</span>
                                <input type="number" class="form-control" name="new_service_duration" min='0' max='600' placeholder="in minutes"  required />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-8">
                                <span class="">Service Image</span>
                                <input type="file" class="form-control" required name="new_service_image" />
                            </div>

                            <div class="col-sm-4">
                                <span class="">Service Price</span>
                                <input type="text" class="form-control" required name="new_service_price" placeholder="  RWF" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <span class="">Service Description</span>
                                <textarea rows="5" wrap="soft" class="form-control" name="new_service_descr" placeholder="Service Description"></textarea>
                            </div>
                        </div>

                        <hr class="mb-3">

                        <button type="submit" formaction="bknd/new_service.php" class="btn btn-block btn-unique"><b>Record New Service</b></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Edit Service -->
    <div class="modal fade modal_cover_2" id="modalEditService" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-center primary-color-dark white-text">
                    <h4 class="modal-title font-weight-bold white-text">
                        <b>Edit Service {<span class="mx-3 font-italic" id="Old_S_name"></span>}</b>
                    </h4>
                    <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <!-- Old Service Data -->
                        <div class="col-md-6">
                            <!-- Service Logo -->
                            <div class="view overlay z-depth-1-half">
                                <img id="Old_S_image" src="assets/pics/service_image/<?php echo $found_s_logo;?>" class="img-fluid mx-auto" style="height:150px;" >
                                <div class="mask rgba-white-slight"></div>
                            </div>

                            <!-- Service Details -->
                            <div class="mt-3">
                                <table class="table table-striped table-bordered table-sm mb-0 pb-0 rounded view overlay z-depth-1-half" cellspacing="0" width="100%">
                                    <thead class="text-center bg-secondary text-white"><tr><td class="lead">Details</td></tr></thead>
                                    <tbody class="black-text font-weight-bold">
                                        <tr ><td class="text-muted font-weight-bold" id="Old_S_price"></td></tr>
                                        <tr ><td class="text-muted text-justify" id="Old_S_descr"></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- New Service Data -->
                        <div class="col-md-6">
                            <div class="card p-3">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <div class="col-sm-9">
                                            <span class="">Edit Service Names</span>
                                            <input type="text" class="form-control text-uppercase" required name="edt_service_name" id="edt_service_name" placeholder="Edit Service Name" />
                                        </div>

                                        <div class="col-sm-3">
                                            <span class="">Id</span>
                                            <input type="text" class="form-control" required readonly name="edt_service_id" id="edt_service_id" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-8">
                                            <span class="">Service Image</span>
                                            <input type="file" class="form-control" required name="edt_service_image" />
                                        </div>

                                        <div class="col-sm-4">
                                            <span class="">Service Price</span>
                                            <input type="text" class="form-control" required name="edt_service_price" id="edt_service_price" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <span class="">Service Description</span>
                                            <textarea rows="5" wrap="soft" required class="form-control" name="edt_service_descr" id="edt_service_descr" ></textarea>
                                        </div>
                                    </div>

                                    <hr class="mb-3">

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <button type="submit" formaction="bknd/del_service.php" class="btn btn-block unique-color-dark"><b>Delete</b></button>
                                        </div>

                                        <div class="col-sm-6">
                                            <button type="submit" formaction="bknd/edt_service.php" class="btn btn-block warning-color-dark px-2"><b>SAVE &nbsp&nbsp CHANGES</b></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
