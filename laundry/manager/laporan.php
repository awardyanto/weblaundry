<?php
include('_secure.php');
 $title='Laporan';
   include('header.php');
   
   include('include/db.php');
    include('include/function.php');?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php  include('nav.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">
     
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-print"></i> Cetak Laporan Transaksi
      	</div>
	      <div class="card-body">
	      	<div class="form-inline">
	      		<form target="_blank" action="cetak.php" method="post">
	        		<input type="date" name="awal" class="form-control" style="width: 400px" required="">
	        		<input type="date" name="akhir" class="form-control" style="width: 400px" required="">
	        		<input type="submit" name="print" value="Print" class="btn btn-primary">
        		</form>
        	</div>
	      </div>         
      </div>
      <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-edit"></i> Detail Transaksi</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th width="1%">No</th>
                  <th>Kode Order</th>
                  <th>Tanggal</th>
                  <th>Total Harga</th>
                </tr>
              </thead>
              
              <tbody>
                <?php $Show=get_order_status_Count_complete();
                $count1='0';
                 while ($row=$Show->fetch_object()) {
                   $count1++;
                    $SID=$row->User_ID;
                    $USer_NAME=$row->User_Name;
                    $QR_code=$row->Order_Code;
                ?>
                <tr>
                  <td><?php echo $count1; ?></td>

                  <td ><?php echo $row->Order_Code; ?></td>
                  <td><?php echo date('d F Y',strtotime($row->Delivery_date)) ; ?></td>
                  <td>Rp. <?php echo number_format($row->Total_Price,2,',','.'); ?></td>

                  
                
                </tr>
                              <?php  # code...
                               }?>
                             
                            </tbody>
                          </table>
                        </div>
                      </div>
                     
                    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include('footer.php');?>
  </div>
</body>

</html>

