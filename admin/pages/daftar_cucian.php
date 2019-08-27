<div class="row">
        <div class='col-md-12'> 
    <?php
    	$ada = $conn ->query("SELECT * FROM cucian AS c JOIN akun a ON a.ID_AKUN = c.ID_AKUN 
    		JOIN harga h ON c.ID_HARGA=h.ID_HARGA JOIN jenis_laundry l ON l.ID_LAUNDRY=h.JENIS_LAUNDRY");
    	if($ada -> num_rows > 0){
    ?>
          <div class="box">
	<?php flash( 'sukseskirimsms' ); ?>
	<?php flash( 'gagalsms' ); ?>
	<div class="box-header with-border">
	  <h3 class="box-title">Kirim Notifikasi User</h3>
          <div class="pull-right box-tools">
				<button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-plus"></i></button>
		 </div>
	</div>
	<div class="box-body">

		<form method="GET" enctype="multipart/form-data" action="admin/Model.php" >
			<label>Nama User</label>
			<select name="kirimsms" onchange="loadtype(this.value)" required class="form-control">
			 <?php $res=mysqli_query($conn, "SELECT * FROM cucian AS c JOIN akun a ON a.ID_AKUN = c.ID_AKUN JOIN harga h
			  ON c.ID_HARGA=h.ID_HARGA JOIN jenis_laundry l ON
			   l.ID_LAUNDRY=h.JENIS_LAUNDRY WHERE STATUS_AMBIL = 0"); 
			 	  while($jenis = $res->fetch_assoc()){ ?>
				<option value="<?=$jenis['ID_AKUN'] ?>"><?=$jenis['NAMA'] ?></option>
			<?php } ?>
			</select>
			
			<div id="jenis"></div></br>
			<!--<input type="text" name="jenis" id="jenis" required class="form-control">-->
			<input type="submit" value="Kirim Notifikasi" class="btn btn-primary" name="kirimsms">
		</form>
	</div>
</div>
<?php
	}
	if(isset($_GET['detailcucian'])){ 
	$res=mysqli_query($conn, "SELECT * FROM cucian AS c JOIN akun a ON a.ID_AKUN = c.ID_AKUN JOIN harga h
			  ON c.ID_HARGA=h.ID_HARGA JOIN jenis_laundry l ON l.ID_LAUNDRY=h.JENIS_LAUNDRY 
			  WHERE ID_CUCIAN =".$_GET['detailcucian']);
	$row = $res -> fetch_assoc();
?> <div class="box">
	<?php flash( 'sukseskirimsms' ); ?>
	<?php flash( 'gagalsms' ); ?>
	<div class="box-header with-border">
	  <h3 class="box-title">Laundry Keluar <?php echo $row['NAMA']; ?>
	  </h3>
          <div class="pull-right box-tools">
			<button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-plus"></i></button>
		 </div>
	</div>
	<?php flash( 'suksesbayar' ); ?>
	<?php flash( 'gagalbayar' ); ?>
	<div class="box-body">
		<form method="post" enctype="multipart/form-data" action="admin/Model.php" >
			<label>Nama User</label>
			<input type="text" name="#" value="<?php echo $row['NAMA']?>" required class="form-control">
			<?php
			echo "<label>Jenis Laundry</label>";
			echo "<input type='text' name='namalaundry' value='".$row['NAMA_LAUNDRY']."'' class='form-control'>";
			echo "<input type='hidden' name='idcucian' value='".$row['ID_CUCIAN']."'' class='form-control'>";
			echo "<label>Status Ambil</label>";
				if($row['STATUS_AMBIL']==0){
						$a="Belum Ambil";
				}else{
						$a="Sudah Ambil";	
				}
				echo "<input type='text' name='ambil' value='".$a."'' class='form-control'>";
			echo "<label>Status Bayar</label>";
				if($row['STATUS_BAYAR']==0){
						$s="Belum Bayar";
						echo "<input type='text' name='bayar' value='".$s."'' class='form-control'>";
						echo "<input type='submit' value='Verifikasi Bayar' class='btn btn-warning' name='kirimbayar'>";
				}else{
						$s="Sudah Bayar";	
						echo "<input type='text' name='bayar' value='".$s."'' class='form-control'>";
				}

			?>
		</form>
	</div>
</div>		
<?php 
	}
flash( 'sukses' ); ?>
<?php flash( 'gagal' ); ?>
          <div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title">Data cucian</h3>
                <div class="pull-right box-tools">
					<a class="btn btn-warning" href="admin/rdaftarcucian.php">Cetak Laporan</a>
				</div>
                  
			</div>
<?php flash( 'sukseshapus' ); ?>
<?php flash( 'gagalhapus' ); ?>
			<div class="box-body table-responsive">
				<table id="lookup" class="table table-bordered table-responsive table-hover">  
                    <thead bgcolor="#eeeeee" align="center">
                        <tr>
                           <th>No</th>
							<th>Tanggal</th>
							<th>Nama</th>
							<th>Jenis Laundry</th>
							<th>Biaya</th>
							<th>Status bayar</th>
							<th>Status Ambil</th>
							<th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
			</div>
		
		<script src="admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="admin/datatables/jquery.dataTables.js"></script>
        <script src="admin/datatables/dataTables.bootstrap.js"></script>
        <script>
        $(document).ready(function() {
                var dataTable = $('#lookup').DataTable( {
                    "processing": true,
                    "serverSide": true,
                    "ajax":{
                        url :"admin/pages/cuciandata.php", // json datasource
                        type: "post",  // method  , by default get
                        error: function(){  // error handling
                            $(".lookup-error").html("");
                            $("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                            $("#lookup_processing").css("display","none");
                            
                        }
                    }
                } );
            } );
        </script>
