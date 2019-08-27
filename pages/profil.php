<?php 
	$query = mysqli_query($conn, "SELECT * FROM akun WHERE USERNAME='".$_SESSION['user']."'");
	$row = $query -> fetch_assoc();
?>
<div class="inbox-mail">
	<div class="col-md-4 compose w3layouts">
		
    <h2>Profil <?php echo $_SESSION['user'];?></h2>
    <nav class="nav-sidebar">
		<ul class="nav tabs">
          <li class="active">
          	<a href="#tab1" data-toggle="tab" aria-expanded="true"><i class="fa fa-user"></i> Lihat Profil
          		<div class="clearfix"></div></a>
          </li>

		</ul>
	</nav>
	</div>
	<div class="col-md-8 tab-content tab-content-in w3">
		<div class="tab-pane text-style active" id="tab1">
  			<div class="inbox-right">
	            <div class="mailbox-content">
	            	<div class="mail-toolbar clearfix">
			     
			    <div class="float-right">
					<form method="post" enctype="multipart/form-data" action="?p=ubahprofil" >
						<input type="submit" class="btn btn-hover btn-dark btn-block" value="Ubah Profil">
						<input type="hidden" name="idakun" value="<?php echo $row['ID_AKUN'];?>">
					</form>
			    </div>
				
               </div>
	                <table class="table">
	                    <tbody>
	                        <tr class="table-row">
	                            <td class="table-img">
	                               <img src="images/akun.png" alt="">
	                            </td>
	                            <td class="table-text">
	                            	
	                            	<h6> <?php echo $row['NAMA'];?></h6>
	                                <p>Username : <?php echo $row['USERNAME'];?>
	                                </br>
	                                	No Telpon : <?php echo $row['TELP']?>
	                                </p>
	                            </td>
	                            <td>
	                            	<?php
	                            		$sql = $conn -> query("SELECT * FROM cucian AS c JOIN akun a ON a.ID_AKUN = c.ID_AKUN 
	                            		JOIN harga h ON c.ID_HARGA=h.ID_HARGA JOIN jenis_laundry l 
	                            		ON l.ID_LAUNDRY=h.JENIS_LAUNDRY WHERE a.ID_AKUN = ".$row['ID_AKUN']."");	
	                            		$res = $sql -> fetch_assoc();
	                            		if(($res['ID_AKUN'] > 2) && ($res['ID_AKUN'] <= 10)){
	                            			echo '<span class="fam">Pelanggan</span>';
	                            		}
	                            		else if($res['ID_AKUN'] > 10){
	                            			echo '<span class="fam">Pelanggan Senior</span>';
	                            		}else{
	                            			echo '<span class="fam">Pelanggan Baru</span>';
	                            		}
	                            	?>
	                            	
	                            </td>
	                        </tr>
	                    </tbody>
	                </table>
	               </div>
            </div>
		</div>
		
		</div>
		<div class="clearfix"> </div>
	</div>
<div class="clearfix"> </div>
</div>