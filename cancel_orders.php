
<?php 
    session_start(); 
    include'bknd/db_con.php'; 
	
 if(!isset($_SESSION['client_name']) && !isset($_SESSION['client_id'])){ 
        session_destroy(); 
        echo'<meta http-equiv="refresh" content="0, url=bknd/logout.php">';
    }
$mail=$_SESSION['client_email'];
if(isset($_GET['cancel_order_id'])){
    $orders =$_GET['cancel_order_id'];

    $query = $conn->query("UPDATE chadia_orders SET 	client_status='CANCELED' AND mng_status='CANCELED' AND o_status='CANCELED' WHERE id ='$orders' ")or die(mysql_error());
  if($query){
	  $date= date("Y-m-d H:i:s");
	  $subject="Parlour beauty Client availability Cancelation on".$date;
	  	$message="You have CANCELED your booking Order No:$order in Parlour Beuty Salon For detail check on our website http://localhost/bpr ";
	  if(mail($mail,$subject,$message)){
	echo"<script>alert('your booking orderis CANCELED.keep visiting our website and your email for more information')</script>";
}
	
	  header("location:client_orders.php");
  }
}
 
if(isset($_GET['app_order_id'])){
    $order2 =$_GET['app_order_id'];

    $query = $conn->query("UPDATE chadia_orders SET client_status='APPROVED' WHERE id ='$order2' ")or die(mysql_error());
  if($query){
	  $date= date("Y-m-d H:i:s");
	  $subject="Parlour beauty Client availability Confirmation  on date".$date;
	  $message="You have approved your booking Order No:$order2 in Parlour Beauty Salon For detail check on our website http://localhost/bpr ";
	  if(mail($mail,$subject,$message)){
	echo"<script>alert('Thank you for confirming your booking order.keep visiting our website and your email for more information')</script>";
}
	  
	  
	 // echo "gjjgjgjgjg";
	  header("location:client_orders.php");
  }
}

?>
