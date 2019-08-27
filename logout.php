<?php
session_start(); 
echo $_SESSION['admin'];
unset($_SESSION['admin']);
unset($_SESSION['user']);
header("Location: index.php");
?>