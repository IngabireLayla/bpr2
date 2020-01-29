

<?php 
    session_start(); 
    include'bknd/db_con.php'; 
    if(!isset($_SESSION['MNGR_NM']) && !isset($_SESSION['MNGR_ID']) && !isset($_SESSION['MNGR_SLN'])){ 
        session_destroy(); 
        echo'<meta http-equiv="refresh" content="0, url=bknd/logout.php">';
    }
    else{

        $approved_order_no = $_GET['bill_no'];

        $qry_O = $conn->query("SELECT * FROM chadia_orders WHERE id='$approved_order_no' ")or die('Konnect_1'.mysql_error());
        $row_order = $qry_O->fetch();
        
        $selected_order_serv = $row_order['o_service'];

        $selected_order_cust_name = $row_order['o_cust_name'];
        $selected_order_cust_phone = $row_order['o_cust_phone'];
        $selected_order_emp_id = $row_order['o_employee'];
        
        $date_done = date_create($row_order['o_date']);
        $selected_order_date = date_format($date_done, 'd-M-Y');

        $qry_Emp = $conn->query("SELECT * FROM chadia_employees WHERE id='$selected_order_emp_id' ")or die('Konnect_2'.mysql_error());
        $row_employee = $qry_Emp->fetch();
        $selected_emp_nm = $row_employee['e_names'];
                
        $qry_S = $conn->query("SELECT * FROM chadia_services WHERE id='$selected_order_serv' ")or die('Konnect_3'.mysql_error());
        $row_service = $qry_S->fetch();
        $selected_serv_name = $row_service['serv_name'];
        $selected_serv_price = $row_service['serv_price'];

        $selected_serv_salon = $row_service['serv_salon'];

        $qry_Sln = $conn->query("SELECT * FROM chadia_salons WHERE id='$selected_serv_salon' ")or die('Konnect_4'.mysql_error());
        $row_salon = $qry_Sln->fetch();
        $selected_salon_nm = $row_salon['s_name'];
        $selected_salon_pic = $row_salon['s_logo'];

        $date_printed = date('d-M-Y');
    

        echo "<body>
            <center>
                <table border='1' width='25%' align='center'>
                    <tbody style='padding-left: 10px; padding-right: 10px;'>
                        <tr class='bg-white text-center'>
                            <td>
                                <img src='assets/pics/salon_logo/$selected_salon_pic' style='height:150px;' >
                            </td>
                        </tr>
                        <tr style='background-color: #fefefe;'>
                            <td style='padding-top: 10px; padding-bottom: 10px;'>
                                <h4 style='font-size: 32px;' >$selected_salon_nm</h4>
                            </td>
                        </tr>
                        <tr>
                            <td style='font-size: 16px; padding-top: 10px; padding-bottom: 10px;' >
                                Service : <span style='font-weight: bold;'>$selected_serv_name</span> <br>
                                ----------------------------------------------------------------<br/>
                                Price : $selected_serv_price <br>
                                ----------------------------------------------------------------<br/>
                                Date Done : $selected_order_date <br>
                                ----------------------------------------------------------------<br/>
                                Served by : $selected_emp_nm <br>
                                ----------------------------------------------------------------<br/>
                                Customer : <span style='font-weight: bold;'>$selected_order_cust_name</span> <br>
                                ----------------------------------------------------------------<br/>
                                Phone No. : $selected_order_cust_phone <br>
                                ----------------------------------------------------------------<br/>
                                Date Printed. : $date_printed
                            </td>
                        </tr>
                    </tbody>
                </table>
            </center>";

    
        include("mpdf60/mpdf.php");
        $mpdf=new mPDF('P','A3'); 
        $mpdf->SetDisplayMode('fullpage');
        $stylesheet = file_get_contents('mpdf60/mpdfstyletables.css');
        $mpdf->WriteHTML($stylesheet,1);    // The parameter 1 tells that this is css/style only and no body/html/text
        $report_content=ob_get_contents();
        ob_end_clean();
        $mpdf->WriteHTML($report_content,2);
        $mpdf->Output('Employees_report.pdf','I');
        exit;
        echo "</body>"; 
    }
?>