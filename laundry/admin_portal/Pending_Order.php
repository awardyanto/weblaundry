<?php
 $title='Dashboard';

include('_secure.php');
   include('header.php');
   include('include/db.php');
    include('include/function.php');?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php  include('nav.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Daftar Pesanan</a>
        </li>
        <li class="breadcrumb-item active">Menunggu</li>
      </ol>

      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-archive"></i>Menunggu</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>No. Telpon</th>
                  <th>Alamat</th>
                  <th>Jenis Layanan</th>
                  <th>Total Harga</th>
                  <th>Lihat Pesanan</th>
                  <th>Ambil</th>
                </tr>
              </thead>

              <tbody>
                <?php $Show=get_order_status_Count();
                $count1='0';
                 while ($row=$Show->fetch_object()) {
                   $count1++;
                   $Status=$row->status;
                   $Boy= $row->Dilvery_Boy_Name;
                   $ID=$row->Id;
                   $USer_NAME=$row->C_Name;
                   $code=$row->Order_Code;
                ?>
                <tr>
                  <th><?php echo $count1; ?></th>
                  <td><?php echo $row->C_Name; ?></td>
                  <td><?php echo $row->Phone_No; ?></td>
                  <td><?php echo $row->Address; ?></td>
                  <td><?php echo $row->Total_item; ?></td>
                  <td><?php echo $row->Total_bill; ?></td>
                  <th>  <a  data-toggle="modal" data-target="#exampleModalUser_Order<?php echo $count1;?>" class=" btn btn-primary">Selengkapnya</a>
                <?php

                 include('view_User_Order_detail.php');?>
                  </th>
                  <td>

                 <?php   if($Status=='Pending'){?>
                   <a  data-toggle="modal" data-target="#exampleModalboysend<?php echo $count1;?>" class=" btn btn-primary">Ambil</a>
                    <?php include('boy_send.php');?>
                    <?php }else {echo$Boy;}?>

                  </td>
                </tr>

                              <?php  # code...
                               }?>

                            </tbody>
                          </table>
                        </div>
                      </div>

                    </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   <?php include('footer.php');?>
  </div>
</body>

</html>
