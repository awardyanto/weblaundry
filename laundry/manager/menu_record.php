<?php
 $title='Daftar Layanan';
  include('header.php');
   include('include/db.php');
   include('include/function.php');

include('_secure.php');
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

  <?php  include('nav.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Daftar Semua Layanan</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th width="1%">No</th>
                  <th>Jenis Layanan</th>
                </tr>
              </thead>

              <tbody>
                <?php
                 $Show=Serv_typ_record();
                $count='0';
                 while ($row=$Show->fetch_object()) {
                   $count++;
                ?>
                <tr>
                  <td><?php echo $count; ?></td>
                  <td style="text-align: left"><?php echo $row->Services_Name; ?></td>
                </tr>
                <?php
                 };?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
   <?php include('footer.php');?>
  </div>
</body>
</html>
