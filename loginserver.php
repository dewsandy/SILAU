<?php
session_start();
include "config/config.php";
    $error=''; //Variable to Store error message;
    if(isset($_POST['submit']))
    {
        if(empty($_POST['user']) || empty($_POST['pass']))
        {
            $error = "Username or Password is Invalid";
        }
        else
        {
            //Define $user and $pass
            $user=$_POST['user'];
            $pass=sha1($_POST['pass']);
            //Establishing Connection with server by passing server_name, user_id and pass as a patameter
            
            //sql query to fetch information of registerd user and finds user match.
            $query = mysqli_query($conn, "SELECT * FROM akun WHERE password='$pass' AND username='$user'");
 
            $rows = mysqli_num_rows($query);
            $row = $query -> fetch_assoc();
                if($rows == 1 )
                {
                    if($row['HAKAKSES']==1){
                        $_SESSION['admin']=$row['ID_AKUN'];
                     //   header("Location: admin.php"); // Redirecting to other page
                    }
                    else if($row['HAKAKSES']==0){
                       // $row = $query -> fetch_assoc();
                       // $_SESSION['iduser'] = $row['ID_AKUN'];
                        $_SESSION['user']=$user;
                        
                       // header("Location: user.php"); // Redirecting to other page
                    }else{
                        echo "<script>window.alert('Akun Anda Belum Terverifikasi Oleh Admin');
                            window.location = 'login.php'
                            </script>";
                    }
                    
                }
                else
                {
                    $error = "Username of Password is Invalid";
                }
  //          mysqli_close($conn); // Closing connection
        }
    }
?>