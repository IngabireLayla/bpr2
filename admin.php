<!DOCTYPE html>
<html lang="en">

<?php 
    session_start(); 
    include'bknd/db_con.php'; 
    if(!isset($_SESSION['DEV_NAME'])){ echo'<meta http-equiv="refresh" content="0, url=bknd/logout.php">';} 
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
    <link href="assets/css/addons/datatables.min.css" rel="stylesheet">
</head>

<body class="grey lighten-3">

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light primary-color-dark scrolling-navbar">
            <div class="container-fluid">
                <!-- Brand -->
                <a class="navbar-brand waves-effect" href="#" target="_self">
                    <strong class="blue-text"><span class="font-weight-bold">ADMIN</span><span class="mx-3">/</span>“Beauty Saloon Appointments System </strong>
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
                            <a class="primary-color-dark text-white list-group-item list-group-item-action active" data-toggle="list" href="#home_stats" role="tab"><i class="fa fa-home mr-3"></i>Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="primary-color-dark text-white list-group-item list-group-item-action" data-toggle="list" href="#home_salon_act" role="tab"><i class="fa fa-file-text mr-3"></i>Active Salons</a>
                        </li>
                        <li class="nav-item">
                            <a class="primary-color-dark text-white list-group-item list-group-item-action" data-toggle="list" href="#home_salon_del" role="tab"><i class="fa fa-times mr-3"></i>Deleted Salons</a>
                        </li>

                        <li class="nav-item">
                            <a class="primary-color-dark text-white list-group-item list-group-item-action" data-toggle="modal" data-target="#modalEditAdmin" role="tab"><i class="fa fa-cog mr-3"></i>Edit</a>
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

            <a class="logo-wrapper waves-effect text-white h3" target="_self" href=""><?php echo $_SESSION['DEV_NAME']; ?></a>

            <div class="list-group list-group-flush" id="myList" role="tablist">
                <a class="primary-color-dark text-white list-group-item list-group-item-action active" data-toggle="list" href="#home_stats" role="tab"><i class="fa fa-home mr-3"></i>Home</a>
                
                <a class="primary-color-dark text-white list-group-item list-group-item-action" data-toggle="list" href="#home_salon_act" role="tab"><i class="fa fa-file-text mr-3"></i>Active Salons</a>
                <a class="primary-color-dark text-white list-group-item list-group-item-action" data-toggle="list" href="#home_salon_del" role="tab"><i class="fa fa-times mr-3"></i>Deleted Salons</a>
                
                <a class="primary-color-dark text-white list-group-item list-group-item-action" data-toggle="modal" data-target="#modalEditAdmin" role="tab"><i class="fa fa-cog mr-3"></i>Edit</a>

                <a class="primary-color-dark text-white list-group-item list-group-item-action" target="_self" href="bknd/logout.php" role="tab"><i class="amber-text fa fa-lock mr-3"></i>Logout</a>
            </div>

        </div>
    </header>

    <!--Main layout-->
    <main class="pt-5 mx-lg-5">

        <!-- Tab panes -->
        <div class="tab-content">
            <!-- STATS -->
            <div class="tab-pane active" id="home_stats" role="tabpanel">
                <div class="row mt-5 wow fadeIn">
                    <!-- STATS - SALONS -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-header lead">Salons Province</div>
                            <div class="card-body"><canvas id="Salons_BY_address"></canvas></div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-header lead">Available Salons</div>
                            <div class="card-body"><canvas id="Salons_BY_available"></canvas></div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-header lead">Deleted Salons</div>
                            <div class="card-body"><canvas id="Salons_BY_status"></canvas></div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-header lead">Employees</div>
                            <div class="card-body"><canvas id="Employees_BY_address"></canvas></div>
                        </div>
                    </div>

                    <!-- STATS - SERVICES -->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-header lead">Service Prices</div>
                            <div class="card-body"><canvas id="Service_BY_price"></canvas></div>
                        </div>
                    </div>

                    <!--Card-->
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-header lead">Deleted Services</div>
                            <div class="card-body"><canvas id="Service_BY_status"></canvas></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SALON ACTIVE -->
            <div class="tab-pane" id="home_salon_act" role="tabpanel">
                <div class="row pt-5">
                    <div class="col-md-12">
                        <div class="card mb-4" >
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="mb-2 mb-sm-0 pt-1">
                                    <a class="font-weight-bold" href="" target="_self">Active</a>
                                    <span>/</span>
                                    <span>Salons</span>
                                </h4>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-unique btn-md my-0 mr-0 p" type="button" data-toggle="modal" data-target="#modalNewSalon" ><i class="fa fa-plus mr-3"></i>New Salon</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="dt_table table table-striped table-bordered table-sm mb-0 pb-0" cellspacing="0" width="100%">
                                    <thead class="text-muted">
                                        <tr>
                                            <th class="font-weight-bold">Name</th>
                                            <th class="font-weight-bold">Address</th>
                                            <th class="font-weight-bold">Hours</th>
                                            <th class="font-weight-bold">Available</th>
                                            <th class="font-weight-bold">Manager</th>
                                            <th class="font-weight-bold">Phone No.</th>
                                            <th class="font-weight-bold">Status</th>
                                            <th class="font-weight-bold">More</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                            
                                            $getSalons = $conn->query("SELECT * FROM chadia_salons WHERE s_status='ACTIVE' ORDER BY s_name")or die('Konnection '.mysql_error());
                                            while ($getSalons_arr = $getSalons->fetch()) {

                                                $sector_id = $getSalons_arr['s_address'];
                                                $getSalonAddress = $conn->query("SELECT * FROM chadia_sectors WHERE id = '$sector_id' ")or die('Konnection '.mysql_error());
                                                $getSalonAddress_arr = $getSalonAddress->fetch();
                                                $res_address = $getSalonAddress_arr['sector']." ".$getSalonAddress_arr['district'];


                                                $res_id = $getSalons_arr['id'];
                                                $res_name = $getSalons_arr['s_name'];
                                                $res_hours = $getSalons_arr['s_open_from']."<br>".$getSalons_arr['s_open_to'];
                                                $res_mngr = $getSalons_arr['mngr_names'];
                                                $res_phone = $getSalons_arr['mngr_phone'];
                                                $res_status = $getSalons_arr['s_status'];
                                                $res_availability = $getSalons_arr['s_availability'];

                                                $SALON_STATUS = "";
                                                $SALON_AVAILABILITY = "";

                                                if ($res_status == 'DELETED') {
                                                    $SALON_STATUS = "<td class='align-middle bg_danger text-white'>".$res_status."</td>";
                                                }
                                                else { 
                                                    $SALON_STATUS = "<td class='align-middle'>".$res_status."</td>";
                                                }
                                                
                                                if ($res_availability == 'OPEN') {
                                                    $SALON_AVAILABILITY = "<td class='align-middle font-weight-bold'>".$res_availability."</td>";
                                                }
                                                else { 
                                                    $SALON_AVAILABILITY = "<td class='align-middle text-danger font-weight-bold'>".$res_availability."</td>";
                                                }

                                                echo "<tr>".
                                                    "<th class='align-middle' scope='row'><b>$res_name</br></th>".
                                                    "<td class='align-middle'>$res_address</td>".
                                                    "<td class='align-middle'>$res_hours</td>".
                                                    $SALON_AVAILABILITY.
                                                    "<td class='align-middle'>$res_mngr</td>".
                                                    "<td class='align-middle'>$res_phone</td>".
                                                    $SALON_STATUS.
                                                    "<td class='align-middle p-1'>
                                                        <button type='button' salon_res_id='$res_id' class='btn btn-sm btn-block btn-success my-0 font-italic thisSalon' >Edit</button>
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

            <!-- SALON DELETED -->
            <div class="tab-pane" id="home_salon_del" role="tabpanel">
                <div class="row pt-5">
                    <div class="col-md-12">
                        <div class="card mb-4" >
                            <div class="card-header d-flex justify-content-between">
                                <h4 class="mb-2 mb-sm-0 pt-1">
                                    <a class="font-weight-bold" href="" target="_self">Deleted</a>
                                    <span>/</span>
                                    <span>Salons</span>
                                </h4>
                            </div>
                            <div class="card-body">
                                <table class="dt_table table table-striped table-bordered table-sm mb-0 pb-0" cellspacing="0" width="100%">
                                    <thead class="text-muted">
                                        <tr>
                                            <th class="font-weight-bold">Name</th>
                                            <th class="font-weight-bold">Address</th>
                                            <th class="font-weight-bold">Manager</th>
                                            <th class="font-weight-bold">Phone No.</th>
                                            <th class="font-weight-bold">Date Deleted</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php
                                            
                                            $getDELSalons = $conn->query("SELECT * FROM chadia_salons WHERE s_status='DELETED' ORDER BY s_name")or die('Konnection '.mysql_error());
                                            while ($getDELSalons_arr = $getDELSalons->fetch()) {

                                                $sector_id = $getDELSalons_arr['s_address'];
                                                $getSalonAddress = $conn->query("SELECT * FROM chadia_sectors WHERE id = '$sector_id' ")or die('Konnection '.mysql_error());
                                                $getSalonAddress_arr = $getSalonAddress->fetch();
                                                $res_address = $getSalonAddress_arr['sector']." ".$getSalonAddress_arr['district'];

                                                $res_id = $getDELSalons_arr['id'];
                                                $res_name = $getDELSalons_arr['s_name'];
                                                $res_mngr = $getDELSalons_arr['mngr_names'];
                                                $res_phone = $getDELSalons_arr['mngr_phone'];

                                                $date_done = date_create($getDELSalons_arr['s_date']);
                                                $fnd_0_date_done = date_format($date_done, 'd-M-Y');

                                                echo "<tr>".
                                                    "<th class='align-middle' scope='row'><b>$res_name</br></th>".
                                                    "<td class='align-middle'>$res_address</td>".
                                                    "<td class='align-middle font-weight-bold text-muted'>$res_mngr</td>".
                                                    "<td class='align-middle'>$res_phone</td>".
                                                    "<td class='align-middle'>$fnd_0_date_done</td>".
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

    <!-- Modal: New Salons -->
    <div class="modal fade modal_cover_2" id="modalNewSalon" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header text-center primary-color-dark white-text">
                    <h4 class="modal-title font-weight-bold white-text"><b>NEW SALON</b></h4>
                    <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="bknd/new_salon.php" enctype="multipart/form-data">
                        <div class="row mb-2">
                            <div class="col">
                                <span class="">Enter Salon Name</span>
                                <input type="text" class="form-control text-uppercase" required name="salon_name" placeholder="Enter Salon Name" />
                            </div>
                        </div>
                            
                        <div class="row mb-2">
                            <div class="col-sm-8">
                                <span class="">Salon Logo</span>
                                <input type="file" class="form-control" required name="salon_logo" />
                            </div>

                            <div class="col-sm-4">
                                <span class="">Open From</span>
                                <input type="time" class="form-control" required name="salon_start" />
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-sm-8">
                                <span class="">Salon Address</span>
                                <select class="form-control" required name="salon_address">
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
                            
                            <div class="col-sm-4">
                                <span class="">Open To</span>
                                <input type="time" class="form-control" required name="salon_end" />
                            </div>
                        </div>

                        <hr class="mb-2">

                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <span class="">Manager's Names</span>
                                <input type="text" class="form-control text-uppercase" required name="salon_mngr_name" placeholder="Manager's Names" />
                            </div>

                            <div class="col-sm-6">
                                <span class="">Manager's Phone No.</span>
                                <input type="tel" class="form-control" required name="salon_mngr_phone" placeholder="Manager's Phone No." pattern="[0]{1}[7]{1}[0-9]{8}" />
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <span class="">Manager's Email</span>
                                <input type="text" class="form-control" required name="salon_mngr_email" placeholder="Manager's Email" />
                            </div>

                            <div class="col-sm-6">
                                <span class="">Manager's Password</span>
                                <input type="text" class="form-control" required name="salon_mngr_pass" placeholder="Manager's Password" />
                            </div>
                        </div>

                        <hr class="mb-3">

                        <button type="submit" class="btn btn-block btn-unique"><b>Record New Salon</b></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Edit Salons -->
    <div class="modal fade modal_cover_2" id="modalEditSalon" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-center primary-color-dark white-text">
                    <h4 class="modal-title font-weight-bold white-text">
                        <b>Edit<span class="mx-3 font-italic" id="Old_S_name"></span>Salon</b>
                    </h4>
                    <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Old Salon Data -->
                        <div class="col-md-4">
                            <!-- Salon Logo -->
                            <div class="view overlay z-depth-1-half">
                                <img id="Old_S_logo" src="assets/pics/salon_logo/<?php echo $found_s_logo;?>" class="img-fluid mx-auto" style="height:150px;" >
                                <div class="mask rgba-white-slight"></div>
                            </div>

                            <!-- Salon Details -->
                            <div class="mt-3">
                                <table class="table table-striped table-bordered table-sm mb-0 pb-0 rounded view overlay z-depth-1-half" cellspacing="0" width="100%">
                                    <thead class="text-center bg-secondary text-white"><tr><td class="lead">Details</td></tr></thead>
                                    <tbody class="black-text font-weight-bold">
                                        <tr ><td class="text-muted font-weight-bold px-2" id="Old_S_address"></td></tr>
                                        <tr ><td class="text-muted font-weight-bold px-2" id="Old_S_availability"></td></tr>
                                        <tr ><td class="text-muted font-weight-bold px-2" id="Old_S_hours"></td></tr>
                                        <tr ><td class="text-muted font-weight-bold px-2" id="Old_S_manager"></td></tr>
                                        <tr ><td class="text-muted font-weight-bold px-2" id="Old_S_email"></td></tr>
                                        <tr ><td class="text-muted font-weight-bold px-2" id="Old_S_phone"></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- New Salon Data -->
                        <div class="col-md-8">
                            <div class="card p-3">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <span class="">Edit Salon Name</span>
                                            <input type="text" class="form-control text-uppercase" name="edt_salon_name" id="edt_salon_name" />
                                        </div>
                                    </div>
                                        
                                    <div class="form-row mb-2">
                                        <div class="col">
                                            <span class="">Edit Salon Logo</span>
                                            <input type="file" class="form-control" required name="edt_salon_logo" />
                                        </div>

                                        <div class="col-sm-2">
                                            <span class="">ID</span>
                                            <input type="text" class="form-control" required readonly name="edt_salon_ON_this_id" id="edt_salon_ON_this_id" />
                                        </div>
                                    </div>

                                    <div class="form-row mb-2">
                                        <div class="col-sm-6">
                                            <span class="">Salon Address</span>
                                            <select class="form-control" required name="edt_salon_address">
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

                                        <div class="col-sm-3">
                                            <span class="">Open From</span>
                                            <input type="time" class="form-control" required name="edt_salon_start" />
                                        </div>

                                        <div class="col-sm-3">
                                            <span class="">Open To</span>
                                            <input type="time" class="form-control" required name="edt_salon_end" />
                                        </div>
                                    </div>

                                    <div class="form-row mb-2">
                                        <div class="col-sm-6">
                                            <span class="">Manager's Names</span>
                                            <input type="text" class="form-control text-uppercase" name="edt_salon_mngr_name" id="edt_salon_mngr_name" />
                                        </div>
                                                                                
                                        <div class="col-sm-6">
                                            <span class="">Manager's Phone No.</span>
                                            <input type="tel" class="form-control" name="edt_salon_mngr_phone" id="edt_salon_mngr_phone" pattern="[0]{1}[7]{1}[0-9]{8}" />
                                        </div>
                                    </div>


                                    <div class="form-row mb-2">
                                        <div class="col-sm-6">
                                            <span class="">Manager's Email</span>
                                            <input type="email" class="form-control" name="edt_salon_mngr_email" id="edt_salon_mngr_email" />
                                        </div>

                                        <div class="col-sm-6">
                                            <span class="">Manager's Password</span>
                                            <input type="text" class="form-control" required name="edt_salon_mngr_pass" />
                                        </div>
                                    </div>
                                    
                                    <hr class="mb-2">

                                    <div class="row mt-3">
                                        <div class="col-sm-6">
                                            <button type="submit" formaction="bknd/del_salon.php" class="btn btn-block btn-dark"><b>DELETE</b></button>
                                        </div>

                                        <div class="col-sm-6">
                                            <button type="submit" formaction="bknd/edt_salon.php" class="btn btn-block btn-amber"><b>Save &nbsp&nbsp Changes</b></button>
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
    <div class="modal fade modal_cover_2" id="modalEditAdmin" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <span class="">Email</span>
                                <input type="email" class="form-control" required name="edt_admin_email" placeholder="Enter Email" />
                            </div>
                        </div>
                            
                        <div class="row mb-2">
                            <div class="col">
                                <span class="">Password</span>
                                <input type="password" class="form-control" required name="edt_admin_pswd" placeholder="Enter Password" />
                            </div>
                        </div>
                        
                        <hr class="mb-2">
                        
                        <button type="submit" class="btn mt-3 btn-block btn-amber"><b>Save &nbsp&nbsp Changes</b></button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php

        if (isset($_POST['edt_admin_email']) && isset($_POST['edt_admin_pswd'])) {
            
            $admin_id = $_SESSION['DEV_ID'];
            $admin_email = md5($_POST['edt_admin_email']);
            $admin_pswd = md5($_POST['edt_admin_pswd']);

            $edt_this_user = $conn->query("UPDATE chadia_users SET u_email='$admin_email', u_password='$admin_pswd' WHERE id='$admin_id' ")or die('Error!'.error());
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
    <script type="text/javascript" src="assets/js/addons/datatables.min.js"></script>

    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();

    </script>

    <script type="text/javascript">
        // Datatables

        $(document).ready(function () {

            var table = $('.dt_table').dataTable({
                paging: false,
                info: false,
                bFilter: false
            }).api();
        });
    </script>
    <script src="bknd/find_data.js"></script>
    <script src="bknd/admin_stats.js"></script>
</body>

</html>
