<?php
 $title='Dashboard';
   include('header.php');

   include('_secure.php');
   include('include/db.php');
   include('include/function.php');
      $Data=get_detail($_GET['ID']);
   if(isset($_POST['Confirm']))
{
   $_SESSION['User_NAME'];

};

    ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php  include('nav.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">

      <div class=" card card-login mx-auto mt-8">
        <div class="card-header">
          <i class="fa fa-cutlery"></i> Form Pesanan</div>

        <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="row">
             <div class="form-group col-lg-12">

       <form action="" method="POST">

           <div class="form-group col-lg-12">
              <div class="col-lg-12">
                 <label for="exampleInputEmail1">Jenis Layanan</label>
                 <input type="text" name="menu_type" disabled="" value="<?php echo $Data->Services_Type; ?>" class="form-control">

              </div>
              <div class="form-group col-lg-12" >
                 <label for="exampleInputEmail1">Nama Item</label>
                 <input type="text" name="menu" disabled="" value="<?php echo $Data->Services_Name; ?>" class="form-control">

              </div>

               <?php if($Data->Laundry_Price>0){?>
              <div class="form-group col-lg-12">
                <label for="exampleInputEmail1">Harga Cuci</label>
                <input type="text" name="menu" disabled="" value="<?php echo $Data->Laundry_Price; ?>" class="form-control">
              </div>
            <?php }?>

            <?php if($Data->Dry_Price>0){?>
            <div class="form-group col-lg-12">
              <label for="exampleInputEmail1">Harga Setrika(<?php echo $Data->Dry_Price; ?> Rs)</label>
              <select name="Dry_Price"class="form-control" >
                <option value="Yes">Yes</option>
                <option value="No">No</option>
              </select>
            </div>
            <?php }?>

              <div class="form-group col-lg-12">
                <label for="exampleInputEmail1">Total Item<?php echo $Data->Services_Name; ?></label>
                <select class="form-control" required  name="total_Order"  id="Menu_Type" >
                    <option value="" hidden="">Total Harga</option>
                    <?php for($a=1;$a<=12;$a++){?>
                      <option value="<?php echo $a;?>"  ><?php echo $a;?></option>
                    <?php };?>
                </select>
              </div>
              <div class="form-group col-lg-12">
                <input type="submit" name="Confirm" value="Order" class="btn btn-primary form-control">
              </div>
            </div>
           </form>
        </div>
       </form>
        </div>
      </div>
    </div>
    <br>
     <?php include('footer.php');?>
  </div>
</body>
</html>
