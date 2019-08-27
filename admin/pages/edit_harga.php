<?php 
 flash( 'sukses' ); 
 flash( 'gagal' ); 
if (isset($_GET['id_harga'])) {
	
	$res = mysqli_query($conn,"SELECT * FROM harga h JOIN jenis_laundry j ON h.JENIS_LAUNDRY=j.ID_LAUNDRY WHERE h.ID_HARGA={$_GET['id_harga']}");
	
	if($res){
		while($h = $res->fetch_assoc()){  extract($h);
		
?>
  <div class="row">
        <div class='col-md-12'> 
          <div class="box">
	<div class="box-header with-border">
	  <h3 class="box-title">Edit  harga</h3>
	</div>
	<div class="box-body">

		<form method="post" enctype="multipart/form-data" action="admin/Model.php" style="max-width: 150px">
			<label>Jenis laundry</label>
			<select name="jenis_laundry" required class="form-control">
			 <?php $res=mysqli_query($conn, "SELECT * FROM jenis_laundry ORDER BY NAMA_LAUNDRY"); 
			 	  while($jenis = $res->fetch_assoc()){ 
			 	  	if($JENIS_LAUNDRY==$jenis['ID_LAUNDRY']){?>

			 	  	<option value="<?=$jenis['ID_LAUNDRY'] ?>" selected><?=$jenis['NAMA_LAUNDRY'] ?></option>
			<?php }else{ ?>
					<option value="<?=$jenis['ID_LAUNDRY'] ?>"><?=$jenis['NAMA_LAUNDRY'] ?></option>
			<?php } }?>
			</select>
			<label>Harga per kilo</label>
			<input type="number" name="harga" required class="form-control" value="<?=$HARGA ?>">
			<input type="hidden" name="id_harga" value="<?=$ID_HARGA  ?>">
			<div class="form-group">
				<input type="button" value="Kembali" onclick="batal()" class="btn">
				<input type="submit" value="Simpan perubahan" class="btn btn-primary" name="edit_harga">
			</div>
		</form>
	</div>
<?php
		}
 }else{echo "<h2>NRP {$_GET['nrp']} tidak terdaftar sebagai mente</h2>";} 
}else{echo "<p>404 Page not found</p>";} 
 ?>

<style>
	* {
		margin: 0; padding: 0
	}

	label, input{
		display: block;
	}

</style>
<script type="text/javascript">
function  batal(argument) {
	// body...
	window.location = "?page=daftar_harga";
}
</script>