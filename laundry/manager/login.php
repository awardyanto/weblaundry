
<?php 
 $title='Login';
 // error_reporting(0);
  include('header.php');
include('include/db.php');
  include('include/function.php');
if(isset($_POST['login'])) 
{
  
   extract($_POST);
      $sel="SELECT * from manager_login where Mngr_Name='".$A_NAME."' and Mngr_Password='".$A_PASSWORD."'";
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
      <div class="card-header">Manager Login</div>
      <div class="card-body">
        <form action="" method="post"  >
          <?php if(isset($valid) && $valid == false) { ?>
                  
                         <div class="alert alert-warning alert-dismissible text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Invalid!</strong> Username or Password
                        </div>
                    
                    <?php } ?>
          <div class="form-group">
            <label for="exampleInputEmail1">User Name</label>
            <input class="form-control" id="exampleInputEmail1" name="A_NAME" type="text" aria-describedby="emailHelp" placeholder="Enter User name" required="">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control form-password" id="exampleInputPassword1" required="" name="A_PASSWORD" type="password" placeholder="Password">
            <input type="checkbox" value="" name="show" id="show" class="form-checkbox"> Show Password
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>
          <button type="submit" name="login" class="btn btn-primary btn-block">
                  Sign in
                </button>
           <div class="modal-footer">
            <a href="index.php" class="btn btn-primary" role="button">Home</a></div>
         
        </form>
        <div class="text-center"><!-- 
          <a class="d-block small mt-3" href="register.html">Register an Account</a> -->
          <br>
          <!-- <a class="d-block small" href="forgot-password.html">Forgot Password?</a> -->
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
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
