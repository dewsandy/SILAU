<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Silau Admin Panel</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="pens.png">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="admin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="admin/dist/css/skins/skin-blue.min.css">
    <script src="admin/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="admin/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="admin/datatables/dataTables.bootstrap.css"/>
    <script src="admin/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <link type="text/css" href="admin/images/icons/css/font-awesome.css" rel="stylesheet">
    <script src="admin/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
	<header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>CORE Laundry</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>CORE Laundry</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          
        </nav>
      </header>



      <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

          <div class="user-panel">
            <div class="pull-left image">
              <img src="images/1.png" class="img-circle" alt="User Image">
            </div>
          </div>

        <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
          <!-- Sidebar user panel -->

      <ul class="sidebar-menu">
	
            <li class="header"> Data</li>
        	      
            <li><a href="daftar.php"><i class="fa fa-circle-o"></i> Daftar akun</a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
  </aside>

<div class="content-wrapper">
    <section class="content-header">
          <h1>
            <span>Daftar Akun</span>
          </h1>
    </section>

    <section class="content" style="min-height: 561px;">
  <div class="row">
        <div class='col-md-12'> 
          <div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Tambah Akun</h3>
          <div class="pull-right box-tools">
        <button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-plus"></i></button>
     </div>
  </div>
  <div class="box-body">
    <form method="post" enctype="multipart/form-data" action="pdaftar.php" >
      <label>Id Akun</label>
      <input type="number" name="idakun" required class="form-control">
      <label>Username</label>
      <input type="text" name="username" required class="form-control">
      <label>Nama</label>
      <input type="text" name="nama" required class="form-control">
      <label>Password</label>
      <input type="password" name="password" required class="form-control">
      <label>No telp</label>
      <input type="text" name="telp" required class="form-control">
      <label>Kode Verifikasi</label>
      <?php $ver=rand(000000, 999999);?>
      <input name="ver" type="hidden" id="ver1" value="<?php echo $ver ?>"  required class="form-control"/>
      <label><?php echo $ver ?></label>
      <input name="veri" type="text" placeholder="Input your verification code" id="ver2" size="5" required class="form-control">
      <input type="submit" value="Simpan" class="btn btn-primary" name="tambah_akun">
    </form>
  </div>
</div>  
    </div>
    </div>
    </div>
  </section>
</div>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    <strong>Copyright &copy; CORE Inc 
</footer><!--
<div class="control-sidebar-bg"></div> -->
</div>
<!-- /.content-wrapper -->
    <!-- AdminLTE App -->
    <script src="admin/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) --
    <script src="assets/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="admin/dist/js/demo.js"></script>

  </body>
</html>

      