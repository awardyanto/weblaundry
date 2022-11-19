<?php
session_start();
include('include/db.php');
   include('include/function.php');
if(isset($_POST['User_submit']))
{
  if ($_POST['pembayaran'] == 'cod') {
    $pembayaran = 0;
    $Order_Code=rand(10,1000000);
       $USER_ID = $_SESSION['User_id'];
       $USER_Name = $_SESSION['User_NAME'];
       $Phone_No = $_SESSION['telefon'];

        $sel1="UPDATE order_temp SET Order_status='active' , Order_code='".$Order_Code."' , Pick_Delivery_Status='2' where   User_ID='".$USER_ID."' and Pick_Delivery_Status='1'";
         $info1=$db->query($sel1);
          $sel="INSERT INTO order_detail
           (User_ID,Order_Code,User_Name,Total_Item,Total_Price,pembayaran,Pick_up_date,
           Delivery_date,Phone_No,Address,Pick_up_Status,Delivery_Status)
        VALUES ('".$USER_ID."','".$Order_Code."','".$USER_Name."','".$_POST['Total_Item']."','".$_POST['Toatl_Price']."','".$pembayaran."','".$_POST['Pickdate']."','".$_POST['deliverydate']."','".$Phone_No."','".$_POST['Address']."','No','Menunggu')";

          $info=$db->query($sel);
           if($info){
            echo "<script>alert('Berhasil')</script>";
            echo "<meta http-equiv = 'refresh' content='0; url = index.php'>";
           }
  }
  else
  {
    if ($_SESSION['saldo'] >= $_POST['Toatl_Price'] ) {
      $pembayaran = $_POST['Toatl_Price'];
    
       $Order_Code=rand(10,1000000);
       $USER_ID = $_SESSION['User_id'];
       $USER_Name = $_SESSION['User_NAME'];
       $Phone_No = $_SESSION['telefon'];
       $total_saldo = $_SESSION['saldo'] - $_POST['Toatl_Price'];
       $_SESSION['saldo'] = $total_saldo;
        $sel1="UPDATE order_temp SET Order_status='active' , Order_code='".$Order_Code."' , Pick_Delivery_Status='2' where   User_ID='".$USER_ID."' and Pick_Delivery_Status='1'";
         $info1=$db->query($sel1);
         $db->query("update user_login set saldo = '$total_saldo' where ID = '$USER_ID' ");
          $sel="INSERT INTO order_detail
           (User_ID,Order_Code,User_Name,Total_Item,Total_Price,pembayaran,Pick_up_date,
           Delivery_date,Phone_No,Address,Pick_up_Status,Delivery_Status)
        VALUES ('".$USER_ID."','".$Order_Code."','".$USER_Name."','".$_POST['Total_Item']."','".$_POST['Toatl_Price']."','".$pembayaran."','".$_POST['Pickdate']."','".$_POST['deliverydate']."','".$Phone_No."','".$_POST['Address']."','No','Menunggu')";
          $info=$db->query($sel);
           if($info){
            echo "<script>alert('Berhasil')</script>";
            echo "<meta http-equiv = 'refresh' content='0; url = index.php'>";
           }
    }
    else
    {
      echo "<script>alert('maaf saldo yang anda miliki tidak mencukupi untuk melakukan transaksi ini, silahkan isi ulang atau ubah metode pembayaran')</script>";
     echo "<meta http-equiv = 'refresh' content='0; url = confirmation_order.php'>"; 
    }
  }
}
if (isset($_GET['status'])) {
  $id = $_GET['id'];
  $db->query("update order_detail set Delivery_Status = 'Diterima' where Order_Code = '$id' ");
  echo "<script>alert('Berhasil, Orderan telah diselesaikan')</script>";
  echo "<meta http-equiv = 'refresh' content='0; url = index.php'>";
}