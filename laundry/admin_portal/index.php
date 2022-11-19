<?php
 $title='Papan Pesanan';
   include('_secure.php');
   include('header.php');
   include('include/db.php');
    include('include/function.php');?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php  include('nav.php');?> 
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-check-square-o"></i>
              </div> 
              <div class="mr-5">
                <?php echo count_selesai();?> Pesanan Selesai!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="order_Detail.php">
              <span class="float-left">Selengkapnya</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-address-book-o"></i>
              </div>
              <div class="mr-5"><?php  echo Total_user_reg()?> Pelanggan Terdaftar!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="Register_user.php">
              <span class="float-left">Selengkapnya</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>

        <!-- <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-archive"></i>
              </div>
              <div class="mr-5"><?php
              $total=get_order_status_Count();
              echo $total->num_rows;
                  ?> Pesanan Menunggu!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="Pending_Order.php">
              <span class="float-left">Selengkapnya</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div> -->
      </div>

    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-pencil-square-o"></i> Daftar Pesanan</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th width="1%">No</th>
                  <th>Detail Pesanan</th>
                  <th>Pembayaran</th>
                  <th>Status Pesanan</th>
                  <th>Lihat Pesanan</th>
                  <th>Opsi</th>
                </tr>
              </thead>

              <tbody>
                <?php $Show=get_order_status_Count();
                $count1='0';
                 while ($row=$Show->fetch_object()) {
                   $count1++;

                    $SID=$row->User_ID;
                    $USer_NAME=$row->User_Name;
                    $QR_code=$row->Order_Code;
                ?>
                <tr>
                  <td><?php echo $count1; ?></td>
                    <td style="text-align: left">
                    Code Order : <b><?php echo $row->Order_Code; ?></b><br>
                    Nama : <b><?php echo $row->User_Name; ?></b><br>
                    Total Item : <b><?php echo $row->Total_Item; ?></b><br>
                    Total Price : <b>Rp. <?php echo number_format($row->Total_Price,2,',','.'); ?></b><br>
                    Tanggal Pengambilan : <b><?php echo $row->Pick_up_date; ?></b><br>
                    Tanggal Pengantaran : <b><?php echo $row->Delivery_date; ?></b>
                    
                  </td>
                   <td><?php if ($row->pembayaran != 0) { ?>
                     - Rp. <?php echo number_format($row->pembayaran,2,',','.') ; ?>
                    <?php } else { ?>
                      <img src="../User/images/cod.jpg" width="70px" >
                    <?php } ?></td>
                  <td><?php echo $row->Delivery_status; ?></td>
                  <th>  <a href="#" data-toggle="modal" data-target="#exampleModalUser_Order<?php echo $count1;?>" class=" btn btn-primary">Lihat</a>
                <?php

                 include('view_User_Order_detail.php');?>
                  </th>

                  <td>
                    
                      <a href="#" data-toggle="modal" data-target="#exampleModalchangestatus<?php echo $count1;?>" class=" btn btn-primary">Ubah Status</a>
                      <?php include('order_status_Update.php');?> 
                    
                  

                  </td>

                </tr>
                <?php } ?>

                            </tbody>
                          </table>
                        </div>
                      </div>

                    </div>

    <?php include('footer.php');?>
  </div>
</body>
</html>
