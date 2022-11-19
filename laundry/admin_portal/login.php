<script src='https://www.google.com/recaptcha/api.js'></script>
<?php
 $title='Masuk';
 // error_reporting(0);
include('header.php');
include('include/db.php');
include('include/function.php');

if(isset($_POST['login'])){

   extract($_POST);
    $sel="SELECT * from admin_login where Adm_Name='".$A_NAME."' and Adm_Password='".$A_PASSWORD."'";
    $info=$db->query($sel);
     $row=$info->fetch_object();
          if($info->num_rows>0) {
            $valid = true;
            session_start();
            $_SESSION['Admin_Portal'] = true;
            $_SESSION['ID'] = $row->ID;
            $_SESSION['Password'] = $row->Password;
            header("location:index.php");
          } else {
            $valid = false;
          }
        }
?>

<body class="bg-green">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Admin Login</div>
      <div class="card-body">
        <form action="" method="post"  >
          <?php if(isset($valid) && $valid == false) { ?>
            <?php $secret_key = "6LcoIgEVAAAAAN6_awS0wbxXuY2ntZh3pHRZbWT8";
                  $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);?>
                         <div class="alert alert-warning alert-dismissible text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Salah!</strong> Username atau Password tidak Valid
                        </div>
                    <?php } ?>

          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input class="form-control" id="exampleInputEmail1" name="A_NAME" type="text" aria-describedby="emailHelp" placeholder="Masukan Username" required="">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control form-password" id="exampleInputPassword1" required="" name="A_PASSWORD" type="password" placeholder="Masukan Password">
            <input type="checkbox" value="" name="show" id="show" class="form-checkbox"> Show Password
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Ingat Password</label>
            </div>
          </div>
          <div class="g-recaptcha" data-sitekey="6LcoIgEVAAAAAPvnSbLmK7eFEDB5k3E6FooHeZZ3"></div>
          <button type="submit" name="login" class="btn btn-primary btn-block">
                  Masuk
                </button>
           <div class="modal-footer">
          <a href="index.php" class="btn btn-primary" role="button">Home</a></div>
        </form>
        <div class="text-center">
        <br>
        </div>
      </div>
    </div>
  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
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
