<?php flash( 'sukses' ); ?>
<?php flash( 'gagal' ); ?>
    <div class="row">
        <div class='col-md-12'> 
          <div class="box">
      <div class="box-header with-border">
      <h3 class="box-title">Tambah data harga</h3>
          <div class="pull-right box-tools">
                <button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-plus"></i></button>
               
            </div>
    </div>
    <div class="box-body">
        <form method="post" enctype="multipart/form-data" action="admin/Model.php" style="max-width: 150px">
            <label>Jenis laundry</label>
            <select name="jenis_laundry" required class="form-control">
             <?php $res=mysqli_query($conn, "SELECT * FROM jenis_laundry"); 
                  while($jenis = $res->fetch_assoc()){ ?>
                <option value="<?=$jenis['ID_LAUNDRY'] ?>"><?=$jenis['NAMA_LAUNDRY'] ?></option>
            <?php } ?>
            </select>
            <label>Harga per kilo</label>
            <input type="number" name="harga" required class="form-control">
            <input type="submit" value="Simpan" class="btn btn-primary" name="tambah_harga">
        </form>
    </div>
</div>  
<?php flash( 'sukseshapus' ); ?>
<?php flash( 'gagalhapus' ); ?>
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Harga Laundry</h3>
              <div class="pull-right box-tools">
                    <a class="btn btn-warning" href="admin/rdaftarharga.php">Cetak Laporan</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table id="lookup" class="table table-bordered table-responsive table-hover">  
                    <thead bgcolor="#eeeeee" align="center">
                        <tr>
                            <th>Id</th>
                            <th>Nama Laundry </th>
                            <th>Harga</th>
                            <th class="text-center"> Action </th> 
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
                        url :"admin/pages/hargadata.php", // json datasource
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