<?php

 $title='Pengaturan';
   include('header.php');
   include('_secure.php');
   include('include/db.php');
    include('include/function.php');
     if(isset($_POST['Change']))
{

    $USER_ID=$_SESSION['User_id'];
   $Password=$_POST['Password'];

    $sel="UPDATE user_login SET Password='".$Password."' where ID='".$USER_ID."'";
     $info=$db->query($sel);


   if($info){
   include('SMS/Change_password.php');
   }
};?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php  include('nav.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="card mb-3">
      <div class="card-header">
      <li class="fa fa-lock"></i> Ganti Password</div>

            <div class="container">
          <div class="card card-login mx-auto mt-5">
            <div class="card-header">
              <div class="text-center mt-4 mb-5">
                <h4>Yakin Ingin Mengganti Password?</h4></div>
              </div>
              <form action="" method="POST">
                <div class="card-body">
                <div class="form-group">
                  <input class="form-control"  type="text" name="Password"  placeholder="Masukan Password Baru">
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="Ganti" name="Change">
                </div>
              </form>
      </div>
        <div class="card mx-auto mt-5 mb-5"></div>
    </div>
  </div>
      <!-- Area Chart Example-->


      <!-- Example DataTables Card-->

    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
        <!-- Bootstrap core JavaScript-->
     <?php include('footer.php');?>
  </div>
</body>

</html>
