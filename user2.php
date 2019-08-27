<?php 
  include "config/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SILAU Laundry</title>

  <link href="css/animate.min.css" rel="stylesheet"> 
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/lightbox.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link href="css/login.css" rel="stylesheet">
  <link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">
  <link href="admin/bootstrap/css/bootstrap.css" rel="stylesheet"> 
  <link rel="stylesheet" href="admin/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="admin/dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    
<script src="admin/jQuery/jQuery-2.1.4.min.js"></script>
  
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="images/favicon.ico">
</head><!--/head-->

<body>
  <section id="reporting">   
    <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms">
                    
          <h2 style="color:white;">Riwayat Order</h2>
          <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>-->
        </div>
      </div>
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
           <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdowntoggle" data-toggle="dropdown">
                  <span class="hidden-xs">                   
                      <?php 
                        $res=mysqli_query($conn, "SELECT USERNAME FROM akun WHERE USERNAME='".$_SESSION['user']."'"); 
                        while($usr = $res->fetch_assoc()){ 
                            $name=$usr['USERNAME']
                     ?>
                        <p style="font-size:100%;">Selamat Datang ,<?=$usr['USERNAME'] ?></p>
                    <?php } ?>
                </span>
                </a>
                
                  <ul class="userfooter">
                    <div class="pull-right">
                      <a href="<?='logout.php' ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </ul>

              </li>
            </ul>
          </div>
        </nav>
    </nav>
      <div class="TabelOrderan">
        <div class="row">
          <div class="col-sm-3">
            <div class="single-table wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
              <div id="tagdata">
                <img src="images/tanggal.png" style="width:40%;margin-left:30%;">
              </div>
              <ul>
              <?php 
              $res=mysqli_query($conn, "SELECT TANGGAL FROM cucian WHERE ID_AKUN=(SELECT ID_AKUN FROM akun WHERE USERNAME='".$_SESSION['user']."')"); 
                    while($tgl = $res->fetch_assoc()){ 
              ?>
                <p style="text-align:center;color:white;"><?=$tgl['TANGGAL'] ?></p>
              <?php } ?>
              </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="single-table wow flipInY" data-wow-duration="1000ms" data-wow-delay="500ms">
              <div id="tagdata">
                <img src="images/cuci.png" style="width:40%;margin-left:30%;">
              </div>
              <ul>
              <?php $rs=mysqli_query($conn, "SELECT NAMA_LAUNDRY FROM cucian c JOIN harga h ON h.ID_HARGA=c.ID_HARGA JOIN jenis_laundry j ON h.JENIS_LAUNDRY=j.ID_LAUNDRY
                WHERE ID_AKUN=(SELECT ID_AKUN FROM akun WHERE USERNAME='".$_SESSION['user']."') "); 
                while($j = $rs->fetch_assoc()){ 
              ?>
                <p style="text-align:center;color:white;"><?=$j['NAMA_LAUNDRY'] ?></p>
              <?php } ?>
              </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="single-table wow flipInY" data-wow-duration="1000ms" data-wow-delay="800ms">
               <div id="tagdata">
                <img src="images/timbangan.png" style="width:40%;margin-left:30%;">
              </div>
              <ul>
              <?php $re=mysqli_query($conn, "SELECT BERAT FROM cucian WHERE ID_AKUN=(SELECT ID_AKUN FROM akun WHERE USERNAME='".$_SESSION['user']."')"); 
                while($tl = $re->fetch_assoc()){ 
              ?>
                <p style="text-align:center;color:white;"><?=$tl['BERAT'] ?> Kg</p>
              <?php } ?>
              </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="single-table wow flipInY" data-wow-duration="1000ms" data-wow-delay="1100ms">
              <div id="tagdata">
                <img src="images/uang.png" style="width:40%;margin-left:30%;">
              </div>
              <ul>
              <?php $r=mysqli_query($conn, "SELECT HARGA, BERAT FROM cucian c JOIN harga h ON c.ID_HARGA=h.ID_HARGA WHERE ID_AKUN=(SELECT ID_AKUN FROM akun WHERE USERNAME='".$_SESSION['user']."')"); 
                while($tg = $r->fetch_assoc()){ 
              ?>
                <p style="text-align:center;color:white;"><?=$tg['HARGA']*$tg['BERAT'] ?></p>
              <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!--/#pricing-->


  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script type="text/javascript" src="js/jquery.inview.min.js"></script>
  <script type="text/javascript" src="js/wow.min.js"></script>
  <script type="text/javascript" src="js/mousescroll.js"></script>
  <script type="text/javascript" src="js/smoothscroll.js"></script>
  <script type="text/javascript" src="js/jquery.countTo.js"></script>
  <script type="text/javascript" src="js/lightbox.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>

</body>
</html>