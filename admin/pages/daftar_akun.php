
<?php flash( 'sukses' ); ?>
<?php flash( 'gagal' ); ?>
	<div class="row">
        <div class='col-md-12'> 
          <div class="box">
	<div class="box-header with-border">
	  <h3 class="box-title">Tambah Akun</h3>
          <div class="pull-right box-tools">
				<button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-plus"></i></button>
		 </div>
	</div>
	<div class="box-body">
		<form method="post" enctype="multipart/form-data" action="admin/Model.php" >
			<label>Id Akun</label>
			<input type="number" name="idakun" required class="form-control">
			<label>Username</label>
			<input type="text" name="username" required class="form-control">
			<label>Nama</label>
			<input type="text" name="nama" required class="form-control">
			<label>Password</label>
			<input type="password" name="password" required class="form-control">
			<label>No telp</label>
			<input type="text" name="telp" required class="form-control">
			<label>Kode Verifikasi</label>
			<?php $ver=rand(000000, 999999);?>
			<input name="ver" type="hidden" id="ver1" value="<?php echo $ver ?>"  required class="form-control"/>
			<label><?php echo $ver ?></label>
			<input name="veri" type="text" placeholder="Input your verification code" id="ver2" size="5" required class="form-control">
			<input type="submit" value="Simpan" class="btn btn-primary" name="tambah_akun">
		</form>
	</div>
</div>	
<?php flash( 'sukseshapus' ); ?>
<?php flash( 'gagalhapus' ); ?>     
          <div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title">Data akun</h3>
                  <div class="pull-right box-tools">
				
		 		<a class="btn btn-warning" href="admin/rdaftarakun.php">Cetak Laporan</a>
		 </div>
			</div>
			<div class="box-body table-responsive">
				<table id="lookup" class="table table-bordered table-responsive table-hover">  
                    <thead bgcolor="#eeeeee" align="center">
                        <tr>
                          	<th>No</th>
							<th>Username</th>
							<th>Nama</th>
							<th>Telepon</th>
							<th>Aksi</th>
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
                        url :"admin/pages/akundata.php", // json datasource
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


