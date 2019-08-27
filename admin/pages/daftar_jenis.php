<?php flash( 'sukses' ); ?>
<?php flash( 'gagal' ); ?>
    <div class="row">
        <div class='col-md-12'> 
          <div class="box">
	<div class="box-header with-border">
	  <h3 class="box-title">Tambah jenis  laundry</h3>
          <div class="pull-right box-tools">
				<button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-plus"></i></button>
				
		</div>
	</div>
	<div class="box-body">

		<form method="post" enctype="multipart/form-data" action="admin/Model.php">
			<label>Nama laundry</label>
			<input type="text" name="nama_laundry" required class="form-control">
			<input type="submit" value="Simpan" class="btn btn-primary" name="tambah_jenis">
		</form>
	</div>
</div>	
<?php flash( 'sukseshapus' ); ?>
<?php flash( 'gagalhapus' ); ?>
          <div class="box">
			<div class="box-header with-border">
			  <h3 class="box-title">Data jenis laundry</h3>
			  <div class="pull-right box-tools">
					<a class="btn btn-warning" href="admin/rdaftarjenis.php">Cetak Laporan</a>
				</div>
			</div>
			<div class="box-body table-responsive">
				<table id="lookup" class="table table-bordered table-responsive table-hover">  
                    <thead bgcolor="#eeeeee" align="center">
                        <tr>
                           	<th>No</th>
							<th>Nama</th>
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
                        url :"admin/pages/jenisdata.php", // json datasource
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
