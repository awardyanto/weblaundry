<?php
include('_secure.php');
   include('include/db.php');
$sel="UPDATE order_detail SET Pick_Up_status = 'Pikcup', Delivery_status='".$_GET['Status']."' where
 Order_Code='".$_GET['CODE']."'";

     $info=$db->query($sel);
   if($info){
   	  header("location:index.php"); 
   // include('SMS/Change_password.php');
}
   ?>