<script src='https://www.google.com/recaptcha/api.js'></script>
<?php
include('include/Connection.php');
if(isset($_POST['login']))
{
   extract($_POST);
     $sel="SELECT * from user_login where User_Name='".$username."' and Password='".$psw."'";
    $info=$db->query($sel);
     $row=$info->fetch_object();
          if($info->num_rows>0) {
            $valid = true;
            session_start();
            $_SESSION['USER_Portal'] = true;
            $_SESSION['User_id'] = $row->ID;
             $_SESSION['User_NAME'] = $row->User_Name;
            $_SESSION['Password'] = $row->Password;
            $_SESSION['alamat'] = $row->alamat;
            $_SESSION['saldo'] = $row->saldo;
            $_SESSION['telefon'] = $row->telefon;
            header("location:User/index.php");
          } else {
            $valid = false;
          }
        }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Laundry Kita - Login</title>
  <link rel="icon" href="icon.png">
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

          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <?php if(isset($valid) && $valid == false) { ?>
            <?php $secret_key = "6LcoIgEVAAAAAN6_awS0wbxXuY2ntZh3pHRZbWT8";
                  $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);?>
        <div class="alert alert-danger">
                Username atau Password tidak Valid
                </div>
                <?php } ?>
          <form  role="form" method="post" action="">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" name="username" required="" placeholder="Masukan Username">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input  type="Password" class="form-control form-password" name="psw"  required="" placeholder="Masukan Password">
               <input type="checkbox" value="" name="show" id="show" class="form-checkbox"> Show Password
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked> Ingat Password</label>
            </div>
              <div class="g-recaptcha" data-sitekey="6LcoIgEVAAAAAPvnSbLmK7eFEDB5k3E6FooHeZZ3"></div>
              <button type="submit" name="login" class="form-control btn btn-primary">Masuk</button>
          </form>
        </div>
        <div class="modal-footer">
          <p align="center"><a href="index.php" class="btn btn-primary" role="button">Home</a>
          <a class="btn btn-primary" href="Registration.php" role="button">Daftar</a></p>
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
  $(document).ready(function(){   
    $('.form-checkbox').click(function(){
      if($(this).is(':checked')){
        $('.form-password').attr('type','text');
      }else{
        $('.form-password').attr('type','password');
      }
    });
  });
</script>
</body>
</html>
