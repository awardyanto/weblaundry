<?php
$con = $GLOBALS['db'];
error_reporting(0);
$file = $_SERVER["SCRIPT_NAME"];
$break = explode('/', $file);
$pfile = $break[count($break) - 1];

$pos = strpos($pfile, 'index');
if ($pos !== false) $is_Dashboard = true;

$pos = strpos($pfile, 'menu_list');
if ($pos !== false) $is_menu_list= true;

$pos = strpos($pfile, 'user_order.php');
if ($pos !== false) $is_menu_list= true;

$pos = strpos($pfile, 'Confirmation_Order');
if ($pos !== false) $is_Confirmation_Order= true;

$pos = strpos($pfile, 'user_order_detail');
if ($pos !== false) $is_user_order_detail= true;

$pos = strpos($pfile, 'password_cahnge');
if ($pos !== false) $is_password_cahnge= true;
?>

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php"> Selamat Datang <?php echo $_SESSION['User_NAME'] ?></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

      <a class="navbar-brand" href=""> Saldo Anda : Rp. <?php echo number_format($_SESSION['saldo'],2,',','.')  ?></a>
       <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item <?php echo(isset($is_Dashboard)?' active' : '')?>" data-toggle="tooltip" data-placement="right" title="Papan Pesanan">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-window-maximize"></i>
            <span class="nav-link-text"> Papan Pesanan</span>
          </a>
        </li>

        <li class="nav-item <?php echo(isset($is_menu_list)?' active' : '')?>" data-toggle="tooltip" data-placement="right" title="Tambahkan Pesanan">
          <a class="nav-link" href="menu_list.php">
            <i class="fa fa-fw fa-shopping-basket"></i>
            <span class="nav-link-text"> Tambah Pesanan</span>

          </a>
        </li>
        <li class="nav-item  <?php echo(isset($is_Confirmation_Order)?' active' : '')?>" data-toggle="tooltip" data-placement="right" title="Konfirmasi Pesanan">
          <a class="nav-link" href="Confirmation_Order.php">
            <i class="fa fa-fw fa-edit"></i>
            <span class="nav-link-text"> Konfirmasi Pesanan</span>
            <span class="pull-right bg-color-greenLight" style="color: red">
              <i class="fa fa-fw fa-bell-o"></i>
              <?php
              $id = $_SESSION['User_id'];
              $data = mysqli_query($con,"SELECT * from order_temp where User_ID ='$id' and Order_Status = '' ");
              echo mysqli_num_rows($data); ?>

              </span>
          </a>
        </li>

        <li class="nav-item <?php echo(isset($is_password_cahnge)?' active' : '')?>" data-toggle="tooltip" data-placement="right" title="Pengaturan">
          <a class="nav-link" href="password_cahnge.php">
            <i class="fa fa-fw fa-gear"></i>
            <span class="nav-link-text"> Pengaturan</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link"  data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Keluar</a></li>
      </ul>
    </div>
  </nav>
