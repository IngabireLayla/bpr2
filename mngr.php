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
                            <a class="primary-color-dark text-white list-group-item list-group-item-action" data-toggle="list" href="#home_emps" role="tab"><i class="fa fa-user mr-3"></i>Employees</a>
                        </li>
                        <li class="nav-item">
                            <a class="primary-color-dark text-white list-group-item list-group-item-action" data-toggle="list" href="#home_rpts" role="tab"><i class="fa fa-file-text mr-3"></i>Reports</a>
                        </li>
                        <li class="nav-item">
                            <a class="primary-color-dark text-white list-group-item list-group-item-action" data-toggle="modal" data-target="#modalEditMngr" role="tab"><i class="fa fa-cog mr-3"></i>Edit</a>
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
                
                <a class="primary-color-dark text-white list-group-item list-group-item-action" data-toggle="list" href="#home_emps" role="tab"><i class="fa fa-user mr-3"></i>Employees</a>
                <a class="primary-color-dark text-white list-group-item list-group-item-action" data-toggle="list" href="#home_rpts" role="tab"><i class="fa fa-file-text mr-3"></i>Reports</a>
                <a class="primary-color-dark text-white list-group-item list-group-item-action" data-toggle="modal" data-target="#modalEditMngr" role="tab"><i class="fa fa-cog mr-3"></i>Edit</a>

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

                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header lead">
                                    <h4 class="text-center my-0">
                                        <span id="IsSalonAvailable" class="font-weight-bold"><?php echo $SALON_OPEN_CLOSED; ?></span>
                                    </h4>
                                </div>
                                <div class="card-body p-5">


                                    <h4 class="font-weight-bold lead text-muted text-center mb-4">Toggle Availability</h4>

                                    <?php echo $SalonToggle; ?>                                    

                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header lead">Orders</div>
                                <div class="card-body"><canvas id="chart_orders"></canvas></div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-0">
                            <div class="card">
                                <div class="card-header lead">Services</div>
                                <div class="card-body"><canvas id="chart_services"></canvas></div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-0">
                            <div class="card">
                                <div class="card-header lead">Employees</div>
                                <div class="card-body"><canvas id="chart_employees"></canvas></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- EMPLOYEES -->
            <div class="tab-pane" id="home_emps" role="tabpanel">
                <div class="row wow fadeIn mt-5">
                    <div class="col-sm-12">
                        <div class="card mb-4" >
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="mb-2 mb-sm-0 pt-1">
                                    <a class="font-weight-bold" href="" target="_self"><b>Employees</b></a>
                                </h4>

                                <button class="btn btn-unique btn-md my-0 mr-0 p" type="button" data-toggle="modal" data-target="#modalNewEmployee" ><i class="fa fa-plus mr-2"></i><b>New Employee</b></button>
                            </div>
                            <div class="card-body" style="overflow-x: scroll;">
                                <table class="dt_table table table-striped table-bordered table-sm mb-0 pb-0" cellspacing="0" width="100%">
                                    <thead class="text-muted">
                                        <tr>
                                            <th class="font-weight-bold">Name</th>
                                            <th class="font-weight-bold">Address</th>
                                            <th class="font-weight-bold">Phone</th>
                                            <th class="font-weight-bold">More</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            $getEmps = $conn->query("SELECT * FROM chadia_employees WHERE e_status='ACTIVE' AND e_salon='$thisServiceSalon' ORDER BY e_names")or die('Konnection error'.mysql_error());
                                            while ($getEmps_arr = $getEmps->fetch()) {

                                                $sector_id = $getEmps_arr['e_address'];
                                                $getSalonAddress = $conn->query("SELECT * FROM chadia_sectors WHERE id = '$sector_id' ")or die('Konnection '.mysql_error());
                                                $getSalonAddress_arr = $getSalonAddress->fetch();
                                                $db_emp_address = $getSalonAddress_arr['sector']." ".$getSalonAddress_arr['district'];


                                                $db_emp_id = $getEmps_arr['id'];
                                                $db_emp_name = $getEmps_arr['e_names'];
                                                $db_emp_phone = $getEmps_arr['e_phone'];

                                                echo "<tr>".
                                                    "<th class='align-middle' scope='row'><b>$db_emp_name</br></th>".
                                                    "<td class='align-middle'>$db_emp_address</td>".
                                                    "<td class='align-middle'>$db_emp_phone</td>".
                                                    "<td class='align-middle p-1'>
                                                        <button type='button' db_emp_id='$db_emp_id' db_emp_address='$db_emp_address' db_emp_name='$db_emp_name'db_emp_phone='$db_emp_phone' class='btn btn-sm btn-block btn-success my-0 font-italic thisEmployee' >Edit</button>
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

            <!-- REPORTS -->
            <div class="tab-pane" id="home_rpts" role="tabpanel">
                <div class="row wow fadeIn mt-5">
                    <div class="col-lg-6 mx-auto">
                        <div class="card ">
                            <div class="card-header d-flex justify-content-center"><h4 class="py-0 my-0 font-weight-bold text-muted">Reports</h4></div>
                            <div class="card-body px-5 pt-4 pb-0">
                                
                                <!-- Group Employee Report -->
								<div class="row bg-white py-3 mb-4 rounded view overlay z-depth-1-half">
                                    <div class="col-sm-12">
                                        <button type="button" id="report_serv_employee" class="btn btn-lg btn-block m-0 px-2 success-color-dark white-text" data-toggle="modal" data-target="#modalReportServ_EMP" >
                                            Employees Report
                                        </button>
                                    </div>
                                </div>
                                <div class="row bg-white py-3 mb-4 rounded view overlay z-depth-1-half">
                                    <div class="col-sm-12">
                                        <button type="button" id="report_serv_all" class="btn btn-lg btn-block m-0 px-2 warning-color-dark white-text" data-toggle="modal" data-target="#modalReportServ_ALL" >
                                            All Service
                                        </button>
                                    </div>
                                </div>
                                <div class="row bg-white py-3 mb-4 rounded view overlay z-depth-1-half">
                                    <div class="col-sm-12">
                                        <button type="button" id="report_serv_approved" class="btn btn-lg btn-block m-0 px-2 default-color-dark white-text" data-toggle="modal" data-target="#modalReportServ_APR" >
                                            Approved Orders
                                        </button>
                                    </div>
                                </div>
                                <div class="row bg-white py-3 mb-4 rounded view overlay z-depth-1-half">
                                    <div class="col-sm-12">
                                        <button type="button" id="report_serv_pending" class="btn btn-lg btn-block m-0 px-2 unique-color-dark white-text" data-toggle="modal" data-target="#modalReportServ_PND" >
                                            Pending Orders
                                        </button>
                                    </div>
                                </div>

                                <div class="row bg-white py-3 mb-4 rounded view overlay z-depth-1-half">
                                    <div class="col-sm-12">
                                        <button type="button" id="report_serv_canceled" class="btn btn-lg btn-block m-0 px-2 danger-color-dark white-text" data-toggle="modal" data-target="#modalReportServ_CNL" >
                                            Canceled Orders
                                        </button>
                                    </div>
                                </div>
								
								 

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal: New Employee -->
    <div class="modal fade modal_cover_1" id="modalNewEmployee" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header text-center primary-color-dark white-text">
                    <h4 class="modal-title font-weight-bold white-text"><b>NEW Employee</b></h4>
                    <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="row mb-2">
                            <div class="col">
                                <span class="">Enter Employee Names</span>
                                <input type="text" class="form-control text-uppercase" required name="new_employee_name" placeholder="Enter Employee Name" />
                            </div>
                        </div>

                        <div class="form-row mb-2">
                            <div class="col-sm-6">
                                <span class="">Employee Address</span>
                                <select class="form-control" required name="new_employee_address">
                                    <?php
                                        echo "<optgroup label='KIGALI'>";
                                            $sql_K = $conn->query("SELECT * FROM chadia_sectors WHERE province = 'KIGALI' ")or die('Konnection '.mysql_error()); 
                                            while($row_K = $sql_K->fetch()) {

                                                $Kigali_id = $row_K['id'];
                                                $Kigali_nm = $row_K['district']." &nbsp ".$row_K['sector'];

                                                echo "<option value='$Kigali_id'>$Kigali_nm</option>";
                                            }
                                        echo "</optgroup>";

                                        echo "<optgroup label='NORTHERN'>";
                                            $sql_N = $conn->query("SELECT * FROM chadia_sectors WHERE province = 'NORTHERN' ")or die('Konnection '.mysql_error()); 
                                            while($row_N = $sql_N->fetch()) {

                                                $North_id = $row_N['id'];
                                                $North_nm = $row_N['district']." &nbsp ".$row_N['sector'];

                                                echo "<option value='$North_id'>$North_nm</option>";
                                            }
                                        echo "</optgroup>";

                                        echo "<optgroup label='SOUTHERN'>";
                                            $sql_S = $conn->query("SELECT * FROM chadia_sectors WHERE province = 'SOUTHERN' ")or die('Konnection '.mysql_error()); 
                                            while($row_S = $sql_S->fetch()) {

                                                $South_id = $row_S['id'];
                                                $South_nm = $row_S['district']." &nbsp ".$row_S['sector'];

                                                echo "<option value='$South_id'>$South_nm</option>";
                                            }
                                        echo "</optgroup>";

                                        echo "<optgroup label='EASTERN'>";
                                            $sql_E = $conn->query("SELECT * FROM chadia_sectors WHERE province = 'EASTERN' ")or die('Konnection '.mysql_error()); 
                                            while($row_E = $sql_E->fetch()) {

                                                $East_id = $row_E['id'];
                                                $East_nm = $row_E['district']." &nbsp ".$row_E['sector'];

                                                echo "<option value='$East_id'>$East_nm</option>";
                                            }
                                        echo "</optgroup>";

                                        echo "<optgroup label='WESTERN'>";
                                            $sql_W = $conn->query("SELECT * FROM chadia_sectors WHERE province = 'WESTERN' ")or die('Konnection '.mysql_error()); 
                                            while($row_W = $sql_W->fetch()) {

                                                $West_id = $row_W['id'];
                                                $West_nm = $row_W['district']." &nbsp ".$row_W['sector'];

                                                echo "<option value='$West_id'>$West_nm</option>";
                                            }
                                        echo "</optgroup>";
                                    ?>                                    
                                </select>
                            </div>
                            
                            <div class="col-sm-6">
                                <span class="">Employee's Phone No.</span>
                                <input type="tel" class="form-control" required name="new_employee_phone" placeholder="Employee Phone No." pattern="[0]{1}[7]{1}[0-9]{8}" />
                            </div>
                        </div>
						 <div class="row mb-2">
                            <div class="col">
                                <span class="">Service</span>
								 <select name="new_employee_service" placeholder="Enter Employee Name" />
								<?php
								$salon="";
								 $IsSalonOpens = $conn->query("SELECT * FROM chadia_salons WHERE id='$thisServiceSalon' ")or die('Konnection '.mysql_error()); 
								if($IsSalonOpen_arr2 = $IsSalonOpens->fetch()){
									$salon=$IsSalonOpen_arr2['id'];
								};
								$getEmpss = $conn->query("SELECT * FROM chadia_services WHERE serv_status='ACTIVE' AND serv_salon='$salon'")or die('Konnection error'.mysql_error());
                                            while ($getEmps_arr3 = $getEmpss->fetch()) {
											?>
														<option value="<?=$getEmps_arr3['id']?>"><?=$getEmps_arr3['serv_name']?></option>
														<?php
											}
												?>
                               
								
								
								</select>
                            </div>
                        </div>

                        <hr class="mb-3">

                        <button type="submit" formaction="bknd/new_employee.php" class="btn btn-block btn-unique"><b>Record New Employee</b></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Edit Employee -->
    <div class="modal fade modal_cover_2" id="modalEditEmployee" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-center primary-color-dark white-text">
                    <h4 class="modal-title font-weight-bold white-text">
                        <b>Edit Employee : { <span class="mx-3 font-italic" id="Old_E_name"></span> }</b>
                    </h4>
                    <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body grey lighten-3">
                    <div class="row">
                        <!-- Old Employee Data -->
                        <div class="col-md-5">
                            <div class="card p-3">
                                <table class="table table-striped table-bordered table-sm mb-0 pb-0 rounded" cellspacing="0" width="100%">
                                    <thead class="text-center bg-secondary text-white"><tr><td colspan="2" class="lead">Old Data</td></tr></thead>
                                    <tbody class="black-text font-weight-bold">
                                        <tr class="text-muted"><td class="text-uppercase">names</td><td class="font-weight-bold" id="Old_E_names"></td></tr>
                                        <tr class="text-muted"><td class="text-uppercase">address</td><td class="font-weight-bold" id="Old_E_address"></td></tr>
                                        <tr class="text-muted"><td class="text-uppercase">Phone</td><td class="font-weight-bold" id="Old_E_Phone"></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- New Employee Data -->
                        <div class="col-md-7">
                            <div class="card p-3">
                                <form method="POST">
                                    <div class="row mb-2">
                                        <div class="col-md-9">
                                            <span class="">Edit Employee Names</span>
                                            <input type="text" class="form-control text-uppercase" required name="edt_employee_name" id="edt_employee_name" placeholder="Enter Employee Name" />
                                        </div>

                                        <div class="col-md-3">
                                            <span class="">Id</span>
                                            <input type="text" class="form-control" required readonly name="edt_employee_id" id="edt_employee_id" />
                                        </div>
                                    </div>

                                    <div class="form-row mb-2">
                                        <div class="col-sm-6">
                                            <span class="">Employee Address</span>
                                            <select class="form-control" required name="edt_employee_address" id="edt_employee_address">
                                                <?php
                                                    echo "<optgroup label='KIGALI'>";
                                                        $sql_K = $conn->query("SELECT * FROM chadia_sectors WHERE province = 'KIGALI' ")or die('Konnection '.mysql_error()); 
                                                        while($row_K = $sql_K->fetch()) {

                                                            $Kigali_id = $row_K['id'];
                                                            $Kigali_nm = $row_K['district']." &nbsp ".$row_K['sector'];

                                                            echo "<option value='$Kigali_id'>$Kigali_nm</option>";
                                                        }
                                                    echo "</optgroup>";

                                                    echo "<optgroup label='NORTHERN'>";
                                                        $sql_N = $conn->query("SELECT * FROM chadia_sectors WHERE province = 'NORTHERN' ")or die('Konnection '.mysql_error()); 
                                                        while($row_N = $sql_N->fetch()) {

                                                            $North_id = $row_N['id'];
                                                            $North_nm = $row_N['district']." &nbsp ".$row_N['sector'];

                                                            echo "<option value='$North_id'>$North_nm</option>";
                                                        }
                                                    echo "</optgroup>";

                                                    echo "<optgroup label='SOUTHERN'>";
                                                        $sql_S = $conn->query("SELECT * FROM chadia_sectors WHERE province = 'SOUTHERN' ")or die('Konnection '.mysql_error()); 
                                                        while($row_S = $sql_S->fetch()) {

                                                            $South_id = $row_S['id'];
                                                            $South_nm = $row_S['district']." &nbsp ".$row_S['sector'];

                                                            echo "<option value='$South_id'>$South_nm</option>";
                                                        }
                                                    echo "</optgroup>";

                                                    echo "<optgroup label='EASTERN'>";
                                                        $sql_E = $conn->query("SELECT * FROM chadia_sectors WHERE province = 'EASTERN' ")or die('Konnection '.mysql_error()); 
                                                        while($row_E = $sql_E->fetch()) {

                                                            $East_id = $row_E['id'];
                                                            $East_nm = $row_E['district']." &nbsp ".$row_E['sector'];

                                                            echo "<option value='$East_id'>$East_nm</option>";
                                                        }
                                                    echo "</optgroup>";

                                                    echo "<optgroup label='WESTERN'>";
                                                        $sql_W = $conn->query("SELECT * FROM chadia_sectors WHERE province = 'WESTERN' ")or die('Konnection '.mysql_error()); 
                                                        while($row_W = $sql_W->fetch()) {

                                                            $West_id = $row_W['id'];
                                                            $West_nm = $row_W['district']." &nbsp ".$row_W['sector'];

                                                            echo "<option value='$West_id'>$West_nm</option>";
                                                        }
                                                    echo "</optgroup>";
                                                ?>                                    
                                            </select>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <span class="">Employee's Phone No.</span>
                                            <input type="tel" class="form-control" required name="edt_employee_phone" id="edt_employee_phone" placeholder="Employee Phone No." pattern="[0]{1}[7]{1}[0-9]{8}" />
                                        </div>
                                    </div>

                                    <hr class="mb-3">

                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" formaction="bknd/del_employee.php" class="btn btn-block unique-color-dark"><b>DELETE</b></button>
                                        </div>

                                        <div class="col">
                                            <button type="submit" formaction="bknd/edt_employee.php" class="btn btn-block warning-color-dark"><b>SAVE &nbsp&nbsp CHANGES</b></button>
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

    <!-- Modal: Edit Credentials -->
    <div class="modal fade modal_cover_2" id="modalEditMngr" tabindex="-1" role="dialog" aria-hidden="true">
        <button type="button" class="close white-text btn-lg mt-5 mr-5" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST">

                        <div class="row mb-4">
                            <div class="col text-center">
                                <span class="text-uppercase h5 font-weight-bold">Edit Login Credentials</span>
                            </div>
                        </div>                        

                        <div class="row mb-2">
                            <div class="col">
                                <span class="">Names</span>
                                <input type="text" class="form-control text-uppercase" name="edt_mngr_name" placeholder="Enter Names" required />
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col">
                                <span class="">Phone No.</span>
                                <input type="tel" class="form-control" name="edt_mngr_phone" placeholder="Enter Phone" pattern="[0]{1}[7]{1}[0-9]{8}" required />
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col">
                                <span class="">Email</span>
                                <input type="email" class="form-control" name="edt_mngr_email" placeholder="Enter Email" required />
                            </div>
                        </div>
                            
                        <div class="row mb-2">
                            <div class="col">
                                <span class="">Password</span>
                                <input type="password" class="form-control" name="edt_mngr_pswd" placeholder="Enter Password" required />
                            </div>
                        </div>
                        
                        <hr class="mb-2">
                        
                        <button type="submit" class="btn mt-3 btn-block warning-color-dark"><b>Save &nbsp&nbsp Changes</b></button>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal: Report All Services -->
    <div class="modal fade modal_cover_2" id="modalReportServ_ALL" tabindex="-1" role="dialog" aria-hidden="true">
        <button type="button" class="close white-text btn-lg mt-5 mr-5" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="modal-dialog modal-lg" role="document">
            <div id="printThis_ALL" class="modal-content">
                <div class="modal-header d-flex justify-content-between warning-color-dark text-white">
                    <h4 class="my-0 pt-1 font-weight-bold ">All Services</h4>
                    <button class="btn btn-md btn-light m-0 px-3" id="btnPrint_ALL" ><b><i class="fa fa-print mr-3"></i>Print</b></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-muted text-center text-uppercase  font-weight-bold ">Report on all Services</h4>
                    <div class="divider-new mt-3"></div>
                    <table class="dt_table table table-striped table-bordered table-sm mb-0 pb-0" cellspacing="0" width="100%">
                        <thead class="text-muted">
                            <tr>
                                <th class="font-weight-bold">Service</th>
                                <th class="font-weight-bold">Price</th>
                                <th class="font-weight-bold">Cancelled</th>
                                <th class="font-weight-bold">Pending</th>
                                <th class="font-weight-bold">Approved</th>
								
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $ALL_serv = $conn->query("SELECT * FROM chadia_services WHERE serv_salon='$thisServiceSalon' ")or die('Konnection '.mysql_error());
                                while ($ALL_serv_arr = $ALL_serv->fetch()) {

                                    $db_serv_id = $ALL_serv_arr['id'];
                                    $db_serv_name = $ALL_serv_arr['serv_name'];
                                    $db_serv_price = $ALL_serv_arr['serv_price'];

                                    $ORDERS_ALL_CNL = $ORDERS_ALL_PND = $ORDERS_ALL_APR = array();
                                    $ALL_CANCELED_TT = $ALL_PENDING_TT = $ALL_APPROVED_TT = "";

                                    $findOrders = $conn->query("SELECT * FROM chadia_orders WHERE o_service='$db_serv_id' ")or die('Konnection error'.mysql_error());
                                    while ($findOrders_arr = $findOrders->fetch()) {
                                        if($findOrders_arr['o_status']=='CANCELED'){ $ORDERS_ALL_CNL[] = $db_serv_price; }
                                        else if($findOrders_arr['o_status']=='PENDING'){ $ORDERS_ALL_PND[] = $db_serv_price; }
                                        else if($findOrders_arr['o_status']=='APPROVED'){ $ORDERS_ALL_APR[] = $db_serv_price; }
                                    }

                                    $ALL_CANCELED_TT = array_sum($ORDERS_ALL_CNL);
                                    $ALL_PENDING_TT = array_sum($ORDERS_ALL_PND);
                                    $ALL_APPROVED_TT = array_sum($ORDERS_ALL_APR);

                                    echo "<tr>".
                                        "<th class='align-middle' scope='row'><b>$db_serv_name</br></th>".
                                        "<td class='align-middle'>$db_serv_price</td>".
                                        "<td class='align-middle'>$ALL_CANCELED_TT</td>".
                                        "<td class='align-middle'>$ALL_PENDING_TT</td>".
                                        "<td class='align-middle font-weight-bold text-muted'>$ALL_APPROVED_TT</td>".
                                    "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

	
	
	  <!-- Modal: Report employees-->
    <div class="modal fade modal_cover_2" id="modalReportServ_EMP" tabindex="-1" role="dialog" aria-hidden="true">
        <button type="button" class="close white-text btn-lg mt-5 mr-5" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="modal-dialog modal-lg" role="document">
		
		
		
            <div id="printThis_EMP" class="modal-content">
                <div class="modal-header d-flex justify-content-between default-color-dark text-white">
                    <h4 class="my-0 pt-1 font-weight-bold ">Employee Report</h4>

                </div>
				
						<center>		
						<form method="POST" action="employee_report.php" >	
								   <table class="col-sm-16">   
									<tr>
											<td>
										 <div class="col-sm-16">
										   <span class="font-weight-bold">From</span>
										   <input type="date" class="form-control" required name="from" max="<?php echo date("Y-m-d"); ?>" />
										</div>
										</td>
										<td>
										<div class="col-sm-16">
										   <span class="font-weight-bold">To</span>
										   <input type="date" class="form-control" required name="to" max="<?php echo date("Y-m-d"); ?>" />
									 </div>
									 </td>
									 <td>
									 <br>
									 <input type="submit"name="check_employee"  value="Check Report" class="font-weight-bold">
									 </td>
								 </table>
						 </form>
						 </center>
						 <br><br>
                
                </div>
            </div>
        </div>
    </div>
	
	
	
	
	
	
	
	
	
    <!-- Modal: Report Approved Services -->
    <div class="modal fade modal_cover_2" id="modalReportServ_APR" tabindex="-1" role="dialog" aria-hidden="true">
        <button type="button" class="close white-text btn-lg mt-5 mr-5" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="modal-dialog modal-lg" role="document">
            <div id="printThis_APR" class="modal-content">
                <div class="modal-header d-flex justify-content-between default-color-dark text-white">
                    <h4 class="my-0 pt-1 font-weight-bold ">APPROVED Services</h4>
                    <button class="btn btn-md btn-light m-0 px-3" id="btnPrint_APR" data-dismiss="modal"><b><i class="fa fa-print mr-3"></i>Print</b></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-muted text-center text-uppercase  font-weight-bold ">Report on Approved Services</h4>
                    <div class="divider-new mt-3"></div>
                    <table class="dt_table table table-striped table-bordered table-sm mb-0 pb-0" cellspacing="0" width="100%">
                        <thead class="text-muted">
                            <tr>
                                <th class="font-weight-bold">Service</th>
                                <th class="font-weight-bold">Price</th>
                                <th class="font-weight-bold" colspan="2">Approved</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $APR_serv = $conn->query("SELECT * FROM chadia_services WHERE serv_salon='$thisServiceSalon' ")or die('Konnection '.mysql_error());
                                while ($APR_serv_arr = $APR_serv->fetch()) {

                                    $APR_serv_id = $APR_serv_arr['id'];
                                    $APR_serv_name = $APR_serv_arr['serv_name'];
                                    $APR_serv_price = $APR_serv_arr['serv_price'];

                                    $APR_ORDERS = array();

                                    $APR_findOrders = $conn->query("SELECT * FROM chadia_orders WHERE o_service='$APR_serv_id' AND o_status='APPROVED' ")or die('Konnection error'.mysql_error());
                                    if ($APR_findOrders->rowcount() > 0){
                                        while ($APR_findOrders_arr = $APR_findOrders->fetch()){
                                            $APR_ORDERS[] = $APR_serv_price;
                                        }

                                        $APR_APPROVED = count($APR_ORDERS);
                                        $APR_APPROVED_TT = array_sum($APR_ORDERS);

                                        echo "<tr>".
                                            "<th class='align-middle' scope='row'><b>$APR_serv_name</br></th>".
                                            "<td class='align-middle'>$APR_serv_price</td>".
                                            "<td class='align-middle font-weight-bold text-muted'>$APR_APPROVED</td>".
                                            "<td class='align-middle font-weight-bold text-muted'>$APR_APPROVED_TT</td>".
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

    <!-- Modal: Report Pending Services -->
    <div class="modal fade modal_cover_2" id="modalReportServ_PND" tabindex="-1" role="dialog" aria-hidden="true">
        <button type="button" class="close white-text btn-lg mt-5 mr-5" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="modal-dialog modal-lg" role="document">
            <div id="printThis_PND" class="modal-content">
                <div class="modal-header d-flex justify-content-between unique-color-dark text-white">
                    <h4 class="my-0 pt-1 font-weight-bold ">PENDING Services</h4>
                    <button class="btn btn-md btn-light m-0 px-3" id="btnPrint_PND" data-dismiss="modal"><b><i class="fa fa-print mr-3"></i>Print</b></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-muted text-center text-uppercase  font-weight-bold ">Report on Pending Services</h4>
                    <div class="divider-new mt-3"></div>
                    <table class="dt_table table table-striped table-bordered table-sm mb-0 pb-0" cellspacing="0" width="100%">
                        <thead class="text-muted">
                            <tr>
                                <th class="font-weight-bold">Service</th>
                                <th class="font-weight-bold">Price</th>
                                <th class="font-weight-bold" colspan="2">Pending</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $PND_serv = $conn->query("SELECT * FROM chadia_services WHERE serv_salon='$thisServiceSalon' ")or die('Konnection '.mysql_error());
                                while ($PND_serv_arr = $PND_serv->fetch()) {

                                    $PND_serv_id = $PND_serv_arr['id'];
                                    $PND_serv_name = $PND_serv_arr['serv_name'];
                                    $PND_serv_price = $PND_serv_arr['serv_price'];

                                    $PND_ORDERS = array();

                                    $PND_findOrders = $conn->query("SELECT * FROM chadia_orders WHERE o_service='$PND_serv_id' AND o_status='PENDING' ")or die('Konnection error'.mysql_error());
                                    if ($PND_findOrders->rowcount() > 0){
                                        while ($PND_findOrders_arr = $PND_findOrders->fetch()){
                                            $PND_ORDERS[] = $PND_serv_price;
                                        }

                                        $PND_APPROVED = count($PND_ORDERS);
                                        $PND_APPROVED_TT = array_sum($PND_ORDERS);

                                        echo "<tr>".
                                            "<th class='align-middle' scope='row'><b>$PND_serv_name</br></th>".
                                            "<td class='align-middle'>$PND_serv_price</td>".
                                            "<td class='align-middle font-weight-bold text-muted'>$PND_APPROVED</td>".
                                            "<td class='align-middle font-weight-bold text-muted'>$PND_APPROVED_TT</td>".
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

    <!-- Modal: Report Canceled Services -->
    <div class="modal fade modal_cover_2" id="modalReportServ_CNL" tabindex="-1" role="dialog" aria-hidden="true">
        <button type="button" class="close white-text btn-lg mt-5 mr-5" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="modal-dialog modal-lg" role="document">
            <div id="printThis_CNL" class="modal-content">
                <div class="modal-header d-flex justify-content-between danger-color-dark text-white">
                    <h4 class="my-0 pt-1 font-weight-bold ">Cancelled Services</h4>
                    <button class="btn btn-md btn-light m-0 px-3" id="btnPrint_CNL" data-dismiss="modal"><b><i class="fa fa-print mr-3"></i>Print</b></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-muted text-center text-uppercase  font-weight-bold ">Report on Canceled Services</h4>
                    <div class="divider-new mt-3"></div>
                    <table class="dt_table table table-striped table-bordered table-sm mb-0 pb-0" cellspacing="0" width="100%">
                        <thead class="text-muted">
                            <tr>
                                <th class="font-weight-bold">Service</th>
                                <th class="font-weight-bold">Price</th>
                                <th class="font-weight-bold" colspan="2">Cancelled</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $CNL_serv = $conn->query("SELECT * FROM chadia_services WHERE serv_salon='$thisServiceSalon' ")or die('Konnection '.mysql_error());
                                while ($CNL_serv_arr = $CNL_serv->fetch()) {

                                    $CNL_serv_id = $CNL_serv_arr['id'];
                                    $CNL_serv_name = $CNL_serv_arr['serv_name'];
                                    $CNL_serv_price = $CNL_serv_arr['serv_price'];

                                    $CNL_ORDERS = array();

                                    $CNL_findOrders = $conn->query("SELECT * FROM chadia_orders WHERE o_service='$CNL_serv_id' AND o_status='CANCELED' ")or die('Konnection error'.mysql_error());
                                    if ($CNL_findOrders->rowcount() > 0){
                                        while ($CNL_findOrders_arr = $CNL_findOrders->fetch()){
                                            $CNL_ORDERS[] = $CNL_serv_price;
                                        }

                                        $CNL_APPROVED = count($CNL_ORDERS);
                                        $CNL_APPROVED_TT = array_sum($CNL_ORDERS);

                                        echo "<tr>".
                                            "<th class='align-middle' scope='row'><b>$CNL_serv_name</br></th>".
                                            "<td class='align-middle'>$CNL_serv_price</td>".
                                            "<td class='align-middle font-weight-bold text-muted'>$CNL_APPROVED</td>".
                                            "<td class='align-middle font-weight-bold text-muted'>$CNL_APPROVED_TT</td>".
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

    <?php

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
