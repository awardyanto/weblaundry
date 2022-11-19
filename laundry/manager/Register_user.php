<?php
 $title='Register User Record';

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
     
      <!-- Area Chart Example-->
     
      
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-users"></i> Register User</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Password</th>
                  <th>No. Telpon</th>
                  <th>Alamat</th>
                  <th>Saldo</th>
                  
                </tr>
              </thead>
              
              <tbody>
                <?php $USer=User_reg_fetch();
                $count='0';
                 while ($row=$USer->fetch_object()) {
                   $count++;
                ?>
                <tr>
                  <th><?php echo $count; ?></th>
                  <td><?php echo $row->User_Name; ?></td>
                  <td><?php echo $row->Password; ?></td>
                  <td><?php echo $row->telefon; ?></td>
                  <td><?php echo $row->alamat; ?></td>
                  <td><?php echo $row->saldo; ?></td>
                <?php  # code...
                 };?>
                
               
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
   <?php include('footer.php');?>
  </div>
</body>

</html>
