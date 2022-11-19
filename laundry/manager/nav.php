<?php $file = $_SERVER["SCRIPT_NAME"];
$break = explode('/', $file);
$pfile = $break[count($break) - 1];

$pos = strpos($pfile, 'index');
if ($pos !== false) $is_Dashboard = true;


$pos = strpos($pfile, 'order_Detail');
if ($pos !== false) $is_order_Detail= true;


$pos = strpos($pfile, 'Message-Info');
if ($pos !== false) $is_Message_Info= true;

$pos = strpos($pfile, 'laporan');
if ($pos !== false) $is_laporan_Info= true;

$pos = strpos($pfile, 'change_password');
if ($pos !== false) $is_password_cahnge= true;
?>


 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Portal Manager</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item  <?php echo(isset($is_Dashboard)?' active' : '')?>" data-toggle="tooltip" data-placement="right" title="Dashboard"
         > 
          <a class="nav-link " href="index.php" >
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Papan Pesanan</span>
          </a>
        </li>
        
        <!--
        <li class="nav-item <?php echo(isset($is_order_Detail)?'active' : '')?>" data-toggle="tooltip" data-placement="right" title="Delivery boy">
          <a class="nav-link" href="order_Detail.php">
            <i class="fa fa-fw fa-truck"></i>
            <span class="nav-link-text">Daftar Pesanan</span>
          </a>
        </li>
        <li class="nav-item <?php echo(isset($is_Message_Info)?'active' : '')?>" data-toggle="tooltip" data-placement="right" title="Delivery boy">
          <a class="nav-link" href="Message-Info.php">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="nav-link-text">Pesan Masuk</span>
          </a>
        </li>-->

        <li class="nav-item <?php echo(isset($is_laporan_Info)?'active' : '')?>" data-toggle="tooltip" data-placement="right" title="Delivery boy">
          <a class="nav-link" href="laporan.php">
            <i class="fa fa-fw fa-edit"></i>
            <span class="nav-link-text">Laporan</span>
          </a>
        </li>

        <li class="nav-item <?php echo(isset($is_password_cahnge)?' active' : '')?>" data-toggle="tooltip" data-placement="right" title="Change Password">
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
            <i class="fa fa-fw fa-sign-out"></i>Keluar</a></li>
        </li>
      </ul>
    </div>
  </nav>
