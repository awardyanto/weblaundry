<?php
 $title='Daftar Item';

include('_secure.php');
   include('header.php');
   include('include/db.php');
    include('include/function.php');
if(isset($_POST['Add_ser']))
     {
        extract($_POST);
    $insert = "insert into services_uploade(Services_Name,Services_Type,Laundry_Price,Dry_Price)
     VALUES('".$Ser_Name."','".$Ser_Type."','".$Laundry_Price."','".$Dry_Price."')";

     $query = $db->query($insert);
   if($query){
   include('SMS/Successful_boy_upload.php');
   }

};
if(isset($_GET["SRVaction"]))
{

$sel="DELETE FROM services_uploade WHERE Id ='".$_GET["ID"]."' ";
$objExecute=$db->query($sel);
  if($objExecute)
   {
     include('SMS/Successful_Delete.php');
   }
    header("location:Services_record.php");
}
    ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

  <?php  include('nav.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">

      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-upload"></i> Tambahkan Item</div>
        <div class="card-body">
          <form action="" method="POST" >
          <div class="row">
            <div class="form-group col-lg-3">
            <label for="">Pilih Layanan</label>
            <select name="Ser_Type" class="form-control" required="" >
              <option hidden="" >Jenis Layanan</option>
               <?php $Show1=Serv_Type();
                $count='0';
                 while ($row=$Show1->fetch_object()) {
                   $count++;
                ?>
              <option value="<?php echo $row->Services_Name ?>"><?php echo $row->Services_Name ?></option>
                  <?php };?>
            </select>

          </div>
          <div class="form-group col-lg-3">
            <label for="">Nama Item</label>
            <input type="text"  class="form-control" name="Ser_Name" required=""  placeholder="Membuat Item">
          </div>
          <div class="form-group col-lg-3">
            <label for="exampleInputEmail1">Harga Cuci</label>
            <input type="text"  class="form-control" name="Laundry_Price" maxlength="25" minlength="0" placeholder="Masukan Harga" required="">
          </div>
          <div class="form-group col-lg-3">
            <label for="exampleInputEmail1">Harga Setrika</label>
            <input type="text"  class="form-control" name="Dry_Price" maxlength="25" minlength="0" placeholder="Masukan Harga" required="">
          </div>
           <div class="form-group col-lg-12">
            <input type="submit"  class="form-control btn btn-primary" name="Add_ser">
          </div>
        </div>
       </form>
        </div>

      </div>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Daftar Semua Item</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama item</th>
                  <th>Jenis Layanan</th>
                  <th>Harga Cuci</th>
                  <th>Harga Setrika</th>
                </tr>
              </thead>

              <tbody>
                <?php $Show=Serv_record();
                $count='0';
                 while ($row=$Show->fetch_object()) {
                   $count++;
                ?>
                <tr>
                  <th><?php echo $count; ?></th>
                  <th><?php echo $row->Services_Name; ?></th>
                  <td><?php echo $row->Services_Type; ?></td>
                  <td><?php echo $row->Laundry_Price; ?></td>
                  <td><?php echo $row->Dry_Price; ?></td>


                  <td><a
                   onclick="return confirm('Anda yakin ingin menghapus entri ini?')"
                    href="Services_record.php?SRVaction&ID=<?php echo $row->ID; ?>" class=" btn btn-primary">Hapus Item</a></td>
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
