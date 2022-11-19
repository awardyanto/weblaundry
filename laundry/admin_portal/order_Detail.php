<?php
 $title='Detil Pesanan';

include('_secure.php');
   include('header.php');
   include('include/db.php');
    include('include/function.php');?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

  <?php  include('nav.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-archive"></i> Detil Pesanan</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Detail Pesanan</th>
                  <th>Status Pesanan</th>
                  <th>Konfirmasi Pesanan</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php $Show=get_order_status_Count_complete();
                $count1='0';
                 while ($row=$Show->fetch_object()) {
                   $count1++;
                    $SID=$row->User_ID;
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

                  <th>
                    <a href="#" data-toggle="modal" data-target="#exampleModalUser_Order<?php echo $count1;?>" class=" btn btn-primary">Lihat</a>
                <?php

                 include('view_User_Order_detail.php');?>
                  </th>
                </tr>
                              <?php
                               }?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
    </div>
    </div>
    </div>
    <?php include('footer.php');?>
  </div>
</body>
</html>
