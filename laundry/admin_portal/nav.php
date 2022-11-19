<?php

$file = $_SERVER["SCRIPT_NAME"];
$break = explode('/', $file);
$pfile = $break[count($break) - 1];

$pos = strpos($pfile, 'index');
if ($pos !== false) $is_Dashboard = true;

$pos = strpos($pfile, 'Register_Services');
if ($pos !== false) $is_Register_Services= true;

$pos = strpos($pfile, 'Services_record.php');
if ($pos !== false) $is_Services_record= true;

$pos = strpos($pfile, 'order_Detail');
if ($pos !== false) $is_order_Detail= true;

$pos = strpos($pfile, 'Register_user');
if ($pos !== false) $is_Register_user= true;

$pos = strpos($pfile, 'Message-Info');
if ($pos !== false) $is_Message_Info= true;

$pos = strpos($pfile, 'change_password');
if ($pos !== false) $is_password_cahnge= true;
?>

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php"> Portal Admin</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item  <?php echo(isset($is_Dashboard)?' active' : '')?>" data-toggle="tooltip" data-placement="right" title="Papan Pesanan"
         >
          <a class="nav-link " href="index.php" >
            <i class="fa fa-fw fa-window-maximize"></i>
            <span class="nav-link-text"> Papan Pesanan</span>
          </a>
        </li>

       <li class="nav-item  <?php echo(isset($is_Register_Services)?'active' : '')?>" data-toggle="tooltip" data-placement="right" title="Daftar Layanan">
          <a class="nav-link" href="Register_Services.php">
            <i class="fa fa-fw fa-book"></i>
            <span class="nav-link-text"> Daftar Layanan</span>
          </a>
        </li>

         <li class="nav-item <?php echo(isset($is_Services_record)?'active' : '')?>"  data-toggle="tooltip" data-placement="right" title="Daftar Item">
          <a class="nav-link" href="Services_record.php">
            <i class="fa fa-fw fa-shopping-bag"></i>
            <span class="nav-link-text"> Daftar Item</span>
          </a>
        </li>

        <li class="nav-item <?php echo(isset($is_Message_Info)?'active' : '')?>" data-toggle="tooltip" data-placement="right" title="Pesan Masuk">
          <a class="nav-link" href="Message-Info.php">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="nav-link-text">Pesan Masuk</span>
          </a>
        </li>

        <li class="nav-item <?php echo(isset($is_password_cahnge)?' active' : '')?>" data-toggle="tooltip" data-placement="right" title="Ganti Password">
          <a class="nav-link" href="change_password.php">
            <i class="fa fa-fw fa-lock"></i>
            <span class="nav-link-text">Ganti Password</span>
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
            <i class="fa fa-fw fa-sign-out"></i>Keluar</a>
        </li>
      </ul>
    </div>
  </nav>

