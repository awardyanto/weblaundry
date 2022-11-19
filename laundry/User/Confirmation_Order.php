<?php
error_reporting(0);
 $title='Konfirmasi Pesanan';
   include('header.php');
   include('_secure.php');
   include('include/db.php');
   include('include/function.php');

  //hapus data
  if(isset($_GET["action"]))
  {

  $sel="DELETE FROM order_temp WHERE ID ='".$_GET["ID"]."' ";
  $objExecute=$db->query($sel);
    // if($info){
     if($objExecute)
     {
       header("Location:Confirmation_Order.php");
     }
     else{
       $sms= 'Error Save' ;
          }
  };
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

  <?php  include('nav.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">

          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-edit"></i> Mengkonfirmasi Pesanan</div>

        <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="row">
             <div class="form-group col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Item</th>
                          <th>Jenis Layanan</th>
                          <th>Harga Cuci</th>
                          <th>Harga Setrika</th>
                          <th>Jumlah Item</th>
                          <th>Jumlah Harga</th>
                        </tr>
                      </thead>
          <?php   $Get_Order=get_order_detail($USER_ID=$_SESSION['User_id']);
                $Toatl_Price='0';
                $count='0';
                $Total_Item_Overall='0';

             if($Get_Order->num_rows>0)
                {

                 while($row=$Get_Order->fetch_object())
                    { $count++;
                    $Total_Item_Overall+=$row->Total_Item;
                    $Toatl_Laundry_Price=$row->Laundry_Price * $row->Total_Item;
                    $Toatl_Dry_Price=$row->Dry_Price * $row->Total_Item;
                    $Toatl_Price+=$Toatl_Laundry_Price+$Toatl_Dry_Price;
                ?>
             <tr>
                  <th><?php echo $count; ?></th>
                  <td><?php echo $row->Services_Name; ?></td>
                  <td><?php echo $row->Services_Type; ?></td>
                  <td><?php echo $row->Laundry_Price; ?></td>
                  <td><?php echo $row->Dry_Price; ?></td>
                  <td><?php echo $row->Total_Item; ?></td>
                  <td><?php echo $Toatl_Laundry_Price+$Toatl_Dry_Price; ?></td>
                  <td><a onclick="return confirm('Apa anda yakin ingin menghapus entri ini?')"  href="Confirmation_Order.php?action&ID=<?php echo $row->ID; ?>" class=" btn btn-primary">Hapus Item</a></td>
                </tr>
             <?php  }
                }?>
                      <tbody>
                      </tbody>
                    </table>
                </div>
              </div>
        </div>
       </form>
        </div>
    </div>
<div class="row col-lg-12">

    <div class="card col-lg-6" style="padding: 0px">
        <div class="card-header">
          <i class="fa fa-"></i>Detil Harga</div>
        <div class="card-body">
        <form action="simpan.php" method="POST" enctype="multipart/form-data">
          <div class="row">
             <div class="col-lg-12">
              <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Total Item</th>
                          <th>Total Harga</th>
                        </tr>
                      </thead>
                      <tr>
                        <td>1</td>
                        <td><?php echo $Total_Item_Overall;?></td>
                        <td><?php echo $Toatl_Price; ?></td>
                      </tr>
                      <tbody>
                      </tbody>
                    </table>
                </div>
                </div>
          </div>
       </form>
      </div>
    </div>

    <div class="card col-lg-6" style="padding: 0px;float: right;">
        <div class="card-header">
          <i class="fa fa-"></i>Isi Formulir</div>
        <div class="card-body">
          <form action="simpan.php" method="POST" enctype="multipart/form-data">
          <div class="row">
               <div class="form-group col-lg-6">
                  <input type="text" name="Toatl_Price" hidden="" required="" class="form-control" value="<?php echo $Toatl_Price?>" >
                  <input type="text" name="Total_Item" hidden="" required="" class="form-control" value="<?php echo $Total_Item_Overall?>" >
                 <label><label>Jadwal Ambil:</label>
                  <input type="date" name="Pickdate" required="" class="form-control" value="<?php echo date('Y-m-d') ?>" readonly>
              </div>

              <div class="form-group col-lg-6">
                <label>Jadwal Antar:</label>
                <input type="date" name="deliverydate" required="" min="<?php echo date('Y-m-d') ?>" class="form-control" placeholder="Kapan Diantar">
              </div>
              <div class="form-group col-lg-12">
                <label>Masukan alamat dengan lengkap:</label>
                <textarea class="form-control" name="Address" required="" placeholder="Isi alamat anda dengan tepat"><?php echo $_SESSION['alamat']?></textarea>
              </div>
              <?php if($Get_Order->num_rows>0) { ?>
             <div class="form-group col-lg-12">
               <a data-toggle="modal" data-target="#exampleModalUser_Order<?php echo $count1;?>" class="form-control btn btn-primary">Kirim</a>
               <?php include('user_payment.php');?>
             </div>
           <?php } ?>
          </div>
       </form>
        </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php');?>
</body>
</html>
