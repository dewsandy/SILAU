<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SILAU Laundry Login</title>

  <link href="css/login.css" rel="stylesheet">
  <link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">

  
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="images/favicon.ico">
</head><!--/head-->

<body style="background: url(images/laundry.jpg);background-size:cover;">
      
  <section>
        <div id="formlogin">
            <p style="text-align:center;font-size:200%;font-family:century gothic;font-weight:medium;color:#FFFFFF;">S I L A U<br>(SISTEM INFORMASI LAUNDRY)</p>
      
           <div class="form">
                    <form class="login-form" method="post" action="">
                        <input type="text" placeholder="username" id="user" name="user"/>
                        <input type="password" placeholder="password" id="pass" name="pass"/>
                        <button type="submit" id="submit" value="LOGIN" name="submit">LOGIN </button>
                        <span><?php echo $error; ?></span>
                    </form>
                    <p style="text-align:center;font-size:100%;font-family:century gothic;font-weight:medium;color:#FFFFFF;">Belum Terdaftar ? <a href="daftar.php"><button type="submit" id="submit" value="BARU" name="idsubmit">BUAT BARU</button></a></p>                

           </div>
        </div>
  </section><!--/#services-->
</body>
</html>
