<?php
 $title='Pesan Masuk';

include('_secure.php');
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
          <i class="fa fa-users"></i> Kontak User</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>No. Telpon</th>
                  <th>Pesan</th>
                  <th>Hapus Pesan</th>
                </tr>
              </thead>

              <tbody>
                <?php $USer=User_message_fetch();
                $count='0';
                 while ($row=$USer->fetch_object()) {
                   $count++;
                ?>
                <tr>
                  <th><?php echo $count; ?></th>
                  <td><?php echo $row->Name; ?></td>
                  <td><?php echo $row->Phone_No; ?></td>
                  <td><?php echo $row->Message; ?></td>
                  <td><a onclick="return confirm('Anda yakin ingin menghapus entri ini?')"
                    href="Message-info.php?Comment&ID=<?php echo $row->ID; ?>" class=" btn btn-primary">Hapus</a></td>
                </tr>
                <?php
                 };?>

              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted"></div>
      </div>
    </div>

   <?php include('footer.php');?>
  </div>
</body>
</html>
