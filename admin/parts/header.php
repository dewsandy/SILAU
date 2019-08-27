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
    <script>
      function loadtype(x){
        $('#jenis').load('admin/Model.php?cucianload='+x);
      }
    </script>
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
        <a href="index.php" class="logo">
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
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="images/1.png"class="user-image" alt="User Image">
                  <span class="hidden-xs">SILAU</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  
                  <li class="user-header">
                    <img src="images/1.png" class="img-circle" alt="User Image">
                    <p>
                      SILAU
                      <!-- <small>Member since Nov. 2012</small> -->
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <!-- <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div> -->
                    <div class="pull-right">
                      <a href="<?='logout.php' ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>
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
        	      
                <li><a href="?page=daftar_akun"><i class="fa fa-circle-o"></i> Daftar akun</a></li>
                <li><a href="?page=daftar_jenis"><i class="fa fa-circle-o"></i> Daftar jenis laundry</a></li>
                <li><a href="?page=daftar_harga"><i class="fa fa-circle-o"></i> Daftar harga</a></li>
                <li><a href="?page=daftar_cucian"><i class="fa fa-circle-o"></i> Daftar cucian</a></li>
            
    <?php// } ?>
          </ul>
        </section>
        <!-- /.sidebar -->
  </aside>

<div class="content-wrapper">
    <section class="content-header">
          <h1>
            <span>Admin Laundry</span>
            <!--<small><?php echo (isset($_GET['title'])) ? $_GET['title'] : 'Dashboard' ?></small>-->
          </h1>
    </section>

    <section class="content" style="min-height: 561px;">
      