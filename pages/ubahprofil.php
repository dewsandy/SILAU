<?php
	if(isset($_POST['idakun'])){
	$query = mysqli_query($conn, "SELECT * FROM akun WHERE USERNAME='".$_SESSION['user']."'");
	$row = $query -> fetch_assoc();
?>
	<div class="grid-form1">
		<div class="float-right">
					<form method="post" enctype="multipart/form-data" action="?p=ubahprofil">
						<input type="submit" name="passw" class="btn btn-hover btn-dark btn-block" value="Ubah Password">
						<input type="hidden" name="idakun" value="<?php echo $row['ID_AKUN']?>">
					</form>
			    </div>
		<h3 id="forms-horizontal">Edit Profil</h3>
			<form class="form-horizontal" action="?p=ubahprofil" enctype="multipart/form-data" method="post">
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label hor-form">Email</label>
			    <div class="col-sm-10">
			      <input type="text" value="<?php echo $row['USERNAME']?>" class="form-control" name="username" placeholder="">
			    </div>
			  </div>
			  <input type="hidden" name="iakun" value="<?php echo $row['ID_AKUN'];?>"/>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label hor-form">Nama</label>
			    <div class="col-sm-10">
			      <input type="text" value="<?php echo $row['NAMA']?>" class="form-control" name="nama" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label hor-form">No Telpon</label>
			    <div class="col-sm-10">
			      <input type="text" value="<?php echo $row['TELP']?>" class="form-control" name="notelp" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label hor-form">Verifikasi Password Anda</label>
			    <div class="col-sm-10">
			      <input type="password" value="" class="form-control" name="password" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-default" name="ubah">Ubah Profil</button>
			      
			    </div>
			  </div>
			</form>
	</div>
<?php
	}
	if(isset($_POST['iakun'])){
		$query = mysqli_query($conn, "SELECT * FROM akun WHERE ID_AKUN='".$_POST['iakun']."'");
		$row = $query -> fetch_assoc();

		if($row['PASSWORD'] == $_POST['password']){
			$up = $conn -> query("UPDATE akun SET USERNAME='".$_POST['username']."',NAMA ='".$_POST['nama']."'
				, TELP = '".$_POST['notelp']."' WHERE ID_AKUN=".$_POST['iakun']."
				");
			if($up){
				echo "<script>window.alert('Profil Anda Telah di update');window.location='index.php?p=profil'</script>";
			}
		}else{
			echo "<script>window.alert('Verifikasi Password Anda Salah');history.back(); </script>";
		}
	}
	if(isset($_POST['passw'])){
?>
	<div class="grid-form1">
		<h3 id="forms-horizontal">Edit Password</h3>
			<form class="form-horizontal" action="?p=ubahprofil" enctype="multipart/form-data" method="post">
			  <input type="hidden" name="iakunn" value="<?php echo $row['ID_AKUN'];?>"/>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label hor-form">Password Lama</label>
			    <div class="col-sm-10">
			      <input type="password" class="form-control" name="passw" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label hor-form">Password Baru</label>
			    <div class="col-sm-10">
			      <input type="password" class="form-control" name="passww" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-default" name="ubahpasw">Ubah Password</button>
			    </div>
			  </div>
			</form>
	</div>
<?php } 
	if(isset($_POST['ubahpasw'])){
		$selpass = $conn -> query("SELECT * FROM akun WHERE ID_AKUN=".$_POST['iakunn']);
		if($selpass -> num_rows != 0){
			//$row = $selpass -> fetch_assoc();
			$inpas = $conn -> query("UPDATE akun SET PASSWORD='".sha1($_POST['passww'])."' WHERE ID_AKUN=".$_POST['iakunn']);	
			if($inpas){
				echo "<script>window.alert('Password Anda Telah di update');window.location='index.php?p=profil'</script>";
			}
		}
		
	}
?>