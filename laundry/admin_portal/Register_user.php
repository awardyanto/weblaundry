<?php
 $title='Daftar Member';

include('_secure.php');
include('header.php');
include('include/db.php');
include('include/function.php');

if(isset($_POST["upsaldo"]))
{
  $tot_saldo = $_POST['saldo'] + $_POST['amount'];
  $id = $_POST['id'];
  $objExecute = $db->query("update user_login set saldo = '$tot_saldo' where ID = '$id' ");
   if($objExecute)
   {

    header("location:Register_user.php");
    include('SMS/saldo_success.php');
   }
   else{
    header("location:Register_user.php");
     include('SMS/saldo_failed.php');
        }
}
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php  include('nav.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">

      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-address-card-o"></i> Daftar Member</div>
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
                  <th>Tambahkan Saldo</th>
                  <th>Hapus Member</th>
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
                  <td><form action="" method="POST">
                  <div class="row">
                  <div class="form-group col-lg-6">
                    <input type="text" style="width:150px" class="form-control" name="amount" required=""  placeholder="">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $row->ID ?>">
                    <input type="hidden" class="form-control" name="saldo" value="<?php echo $row->saldo ?>">
                  </div>

                   <div class="form-group col-lg-9">
                    <input type="submit" name="upsaldo" class="btn btn-primary" value="Submit">
                  </div>
                </div>
               </form></td>
                  <td><a onclick="return confirm('Anda yakin ingin menghapus ini?')"
                    href="Register_user.php?Register&ID=<?php echo $row->ID; ?>" class=" btn btn-primary">Hapus</a></td>
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
