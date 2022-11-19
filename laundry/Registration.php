<script src='https://www.google.com/recaptcha/api.js'></script>
<?php include('include/Connection.php');
if(isset($_POST['submit'])){
   extract($_POST);

    $sql = "SELECT * from user_login where  User_Name='".$usrname."'";
      $info = $db->query($sql);
          if($info->num_rows>0)
          {
            $valid = 'Allready';
          }else{
            $insert = "insert into user_login(User_Name,Password,alamat,telefon)
             VALUES('".$usrname."','".$Password."','".$address."','".$Contact_No."')";
              $query1 = $db->query($insert);
              if ($query1) {
                $valid = 'true';
              }
              else
              {
                $valid = 'false';
              }
          }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title> Pendaftaran</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
  .modal-header, h4, .close {
      background-color: #009688;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #009688;
  }
  </style>
</head>
<body>
<div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">

          <h4><span class="glyphicon glyphicon-user"></span> Pendaftaran</h4>
        </div>
        <?php if(isset($valid) && $valid == 'false') { ?>
          <?php $secret_key = "6LcoIgEVAAAAAN6_awS0wbxXuY2ntZh3pHRZbWT8";
                $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);?>
        <div class="alert alert-danger">
        Username atau Password tidak Valid!
                </div>
                <?php };
                if(isset($valid) && $valid == 'true') { ?>
        <div class="alert alert-success">
         Pendaftaran Berhasil
                </div>
                <?php };
                if(isset($valid) && $valid == 'Allready') { ?>
        <div class="alert alert-danger">
         User telah Terdaftar!
                </div>
                <?php } ?>
        <div class="modal-body" style="padding:40px 50px;">
          <form  role="form" method="post" action="">
            <div class="form-group">
             <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control"
               id="usrname" required="" name="usrname" placeholder="Masukan Nama Lengkap">
            </div>

             <div class="form-group">
             <label for="psw"><span class="glyphicon glyphicon-phone"></span> No. Telpon</label>
              <input type="text" class="form-control" name="Contact_No" required="" placeholder="Masukan Nomor Telpon Aktif">
            </div>

             <div class="form-group">
             <label for="psw"><span class="glyphicon glyphicon-home"></span> Alamat Lengkap</label>
              <input type="text" class="form-control" name="address" required="" placeholder="Masukam Alamat Lengkap">
            </div>

            <div class="form-group">
             <label for="psw"><span class="glyphicon glyphicon-off"></span> Password</label>
              <input type="Password" class="form-control" name="Password" id="Password" required="" placeholder="Masukan Password">
            </div>
            <div class="form-group">
             <label for="psw"><span class="glyphicon glyphicon-off"></span> Konfirmasi Password</label>
              <input type="Password" class="form-control" name="Password1" id="Password1" required="" placeholder="Ulangi Password">
            </div>

            <div class="checkbox">
              <label><input type="checkbox" value="" checked> Ingat Password</label>
            </div>
            <div class="g-recaptcha" data-sitekey="6LcoIgEVAAAAAPvnSbLmK7eFEDB5k3E6FooHeZZ3"></div>
            <button type="submit" name="submit" id="btnSubmit" class="form-control btn btn-primary">Kirim</button>
          </form>
        </div>
        <div class="modal-footer">
          <p align="center"><a href="index.php" class="btn btn-primary" role="button">Home</a>
          <a class="btn btn-primary" href="Login.php" role="button">Masuk</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });

    $('#myModal').modal({
    backdrop: 'static',
    keyboard: true
})
</script>
<script type="text/javascript">
        $(function () {
            $("#btnSubmit").click(function () {
                var password = $("#Password").val();
                var confirmPassword = $("#Password1").val();
                if (password != confirmPassword) {
                    alert("Password yang anda masukan tidak sama.");
                    return false;
                }
                return true;
            });
        });
    </script>
</body>
</html>
