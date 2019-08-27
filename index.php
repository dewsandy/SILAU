<?php
    include("loginserver.php");
    date_default_timezone_set('Asia/Jakarta');

?>
<!DOCTYPE html>
<html lang="en">
<?php 
	if (isset($_SESSION['admin'])){ 
	    include 'admin/index.php';
	  }else if (isset($_SESSION['user'])) {
	    // header("Location: user.php"); // Redirecting to other page
	    include 'pages/user.php';
	  }
	  else { 
	    // header("Location: login.php");
	    include 'login.php';
	}
?>
