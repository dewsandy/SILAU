<?php 
 flash( 'sukses' ); 
 flash( 'gagal' ); 
if (isset($_GET['id_jenis'])) {
	$res = mysqli_query($conn,"SELECT * FROM jenis_laundry WHERE ID_LAUNDRY={$_GET['id_jenis']}");
	
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

		<form method="get" enctype="multipart/form-data" action="admin/Model.php" style="max-width: 150px">
			<label>Jenis laundry</label>
			<input type="text" name="nama_laundry" required class="form-control" value="<?=$NAMA_LAUNDRY?>">
			<input type="hidden" name="id_laundry" value="<?=$ID_LAUNDRY?>">
			<div class="form-group">
				<input type="button" value="Kembali" onclick="batal()" class="btn">
				<input type="submit" class="btn btn-primary" name="edit_laundry">
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