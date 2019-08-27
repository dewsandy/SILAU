<?php  
// include("../loginserver.php");
include 'Flash.php';
// echo $_SESSION['user'];
// if(!isset($_SESSION['user']) OR $_SESSION['user']!='admin')
//   header("Location: ../index.php");

require 'admin/parts/header.php'; 
if (isset($_GET['page'])) {
	include 'admin/pages/'.$_GET['page'].'.php';
}else{
	include 'admin/pages/home.php';
}
 require 'admin/parts/footer.php';
?>