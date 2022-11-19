<?php

 $title='Papan Pesanan';
   include('header.php');
   include('_secure.php');
   include('include/db.php');
    include('include/function.php');?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

  <?php  include('nav.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">

      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-archive"></i> Riwayat Pemesanan</div>
        <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="row">
             <div class="form-group col-lg-12">
                <div class="table-responsive">
                    <table id="table" class="table table-bordered text-center" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th width="1%">No</th>
                          <th>Kode Pesanan </th>
                          <th>Total Item</th>
                          <th>Total Harga</th>
                          <th>Pembayaran</th>
                          <th>Status Pesanan</th>
                          <th>Konfirmasi Penerima</th>
                        </tr>
                      </thead>
          <?php   $Get_Order_dtail=get_order_status_Count();
                $count=0;
             if($Get_Order_dtail->num_rows>0)
                {
                 while($row=$Get_Order_dtail->fetch_object())
                    { $count++;
                ?>
             <tr>
                  <td><?php echo $count; ?></td>
                  <td> <?php echo $row->Order_Code?></td>
                  <td><?php echo $row->Total_Item; ?></td>
                  <td>Rp. <?php echo number_format($row->Total_Price,2,',','.') ; ?></td>
                  <td>
                    <?php if ($row->pembayaran != 0) { ?>
                     - Rp. <?php echo number_format($row->pembayaran,2,',','.') ; ?>
                    <?php } else { ?>
                      <img src="images/cod.jpg" width="70px" height="30px">
                    <?php } ?>
                  </td>
                  <td><?php
                   if($row->Delivery_status=='Dikirim'){ ?>
                       <img src="images/deliver.png" width="100px" >
                     <?php }else{
                      echo $row->Delivery_status;
                     } ?>
                </td>
                <td>
                  <?php
                    if($row->Delivery_status == 'Dikirim'){ ?>
                       <a onclick="return confirm('Klik Oke, untuk konfirmasi bahwa pesanan anda sudah sampai')" href="simpan.php?status&&id=<?php echo $row->Order_Code  ?>" class="btn btn-primary btn-xs">Konfirmasi</a>
                     <?php } 
                  ?>
                </td>
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
  </div>
    </div>
    <?php include('footer.php');?>
  </div>
</body>
</html>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
        //datatables
        table = $('#table').DataTable({
            "language": {
                "paginate": {
                    "previous": "<",
                    "next": ">"
                }
            }
        });
    });
</script>
