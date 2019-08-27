<!--four-grids here-->
			<div class="four-grids">
						<div class="col-md-3 four-grid">
							<div class="four-agileits">
								<div class="icon">
									 <img src="images/tanggal.png" style="width:40%;">
								</div>
								<div class="four-text">
									
									<?php 
						              $res=mysqli_query($conn, "SELECT TANGGAL FROM cucian WHERE ID_AKUN=(SELECT ID_AKUN FROM akun WHERE USERNAME='".$_SESSION['user']."') ORDER BY AMBIL ASC LIMIT 1"); 
						              $jm = mysqli_num_rows($res); 
						              echo "<h3>Tanggal Ambil</h3>";
						              if($jm > 0){
						                  while($tgl = $res->fetch_assoc()){
						              ?>
						                <h4 ><?=$tgl['TANGGAL']?></h4>
						              <?php 
						          			} 
						         		}else{
						         			echo"<h4>0</h4>";
						         		}
						          		?>
								</div>
								
							</div>
						</div>
						<div class="col-md-3 four-grid">
							<div class="four-agileinfo">
								<div class="icon">
									<img src="images/cuci.png" style="width:40%;">
								</div>
								<div class="four-text">
									<h3>Cuci</h3>
									<?php 
						              $res=mysqli_query($conn, "SELECT TANGGAL FROM cucian WHERE ID_AKUN=(SELECT ID_AKUN FROM akun WHERE USERNAME='".$_SESSION['user']."') ORDER BY AMBIL ASC"); 
						              $jm = mysqli_num_rows($res); 
						              echo "<h4>".$jm."</h4>";
						              ?> 
								</div>
							</div>
						</div>
						<div class="col-md-3 four-grid">
							<div class="four-wthree">
								<div class="icon">
									<img src="images/timbangan.png" style="width:40%;">
								</div>
								<div class="four-text">
									<h3>Total(KG)</h3>
									<?php
										 $res=mysqli_query($conn, "SELECT SUM(BERAT) AS BE FROM cucian WHERE ID_AKUN=(SELECT ID_AKUN FROM akun WHERE USERNAME='".$_SESSION['user']."')"); 
										 $jm = mysqli_num_rows($res); 
										 if($jm >= 1){
										 while($tgl = $res->fetch_assoc()){       
						              ?>
						                <h4 ><?=$tgl['BE']?></h4>
						              <?php 
						          			}
						          		}
						          		else{
						          			echo "<h4>0</h4>";
						          		} 
						              ?>
								</div>
								
							</div>
						</div>
						<div class="col-md-3 four-grid">
							<div class="four-w3ls">
								<div class="icon">
									<img src="images/uang.png" style="width:40%;">
								</div>
								<div class="four-text">
									<h3>Bayar</h3>
									 <?php 
									 	$r=mysqli_query($conn, "SELECT HARGA, BERAT FROM cucian c JOIN harga h ON c.ID_HARGA=h.ID_HARGA WHERE ID_AKUN=(SELECT ID_AKUN FROM akun WHERE USERNAME='".$_SESSION['user']."')"); 
						               	$sum=0;
						                while($tg = $r->fetch_assoc()){ 
						                	$sum += $tg['HARGA']; 
						                	$sum*=$tg['BERAT']; 
						               	}
						                ?>
						            	<h4 >Rp. <?php echo number_format($sum);?></h4>
								</div>
								
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
	<!--//four-grids here-->

	<!--photoday-section-->	
				
							
							<div class="col-sm-7 wthree-crd">
								<div class="card">
									<div class="card-body">
										<div class="widget widget-report-table">
											<header class="widget-header m-b-15">
											</header>
											
											<div class="row m-0 md-bg-grey-100 p-l-20 p-r-20">
												<div class="col-md-6 col-sm-6 col-xs-6 w3layouts-aug">
													<h3>Data Cucian</h3>
													<p>Anda</p>
												</div>
												<div class="col-md-6 col-sm-6 col-xs-6 ">
													<h2 class="text-right c-teal f-300 m-t-20"></h2>
												</div>
											</div>
											
											<div class="widget-body p-15">
												<table class="table table-bordered">
													<thead>
														<tr>
															<th>No</th>
															<th>Tanggal</th>
															<th>Jenis Laundry</th>
															<th>Biaya</th>
															<th>Status bayar</th>
															<th>Status Ambil</th>
														</tr>
													</thead>
													<tbody>
														<?php
															$no=1;
															$hasil=mysqli_query($conn,"SELECT * FROM cucian AS c JOIN akun a ON a.ID_AKUN = c.ID_AKUN JOIN harga h ON c.ID_HARGA=h.ID_HARGA JOIN jenis_laundry l ON l.ID_LAUNDRY=h.JENIS_LAUNDRY");
															$s = mysqli_query($conn,"SELECT ID_AKUN FROM akun WHERE USERNAME='".$_SESSION['user']."'");
															$res = $s -> fetch_assoc();
															while($h = $hasil->fetch_assoc()){ 	
																if($h['ID_AKUN'] == $res['ID_AKUN']){
																	if($h['STATUS_BAYAR']==0){
																		$a="Belum Bayar";
																	}else{
																		$a="Sudah Bayar";
																	}	
																	if($h['STATUS_AMBIL']==0){
																		$c="Belum Ambil";
																	}else{
																		$c="Sudah Ambil";
																	}
																	echo "
																		<tr>
																			<td>".$no++."</td>
																			<td>".$h['TANGGAL']."</td>
																			<td>".$h['NAMA_LAUNDRY']."</td>
																			<td>".$h['HARGA']*$h['BERAT']."</td>
																			<td>".$a."</td>
																			<td>".$c."</td>
																		</tr>
																	";
																}
															}
														?>
													</tbody>
												</table>    
											</div>
										</div>
									</div>
								</div>
							</div>
							
								<div class="col-sm-4 w3-agileits-crd">
							
								<div class="card card-contact-list">
								<div class="agileinfo-cdr">
									<div class="card-header">
										<h3>Kontak Silau</h3>
									</div>
									<div class="card-body p-b-20">
										<div class="list-group">
											<a class="list-group-item media" href="">
												 <div class="pull-left">
													<img class="lg-item-img" src="images/akun.png" alt="">
												</div>
												<div class="media-body">
													<div class="pull-left">
														<div class="lg-item-heading">Lorem</div>
														<small class="lg-item-text">lorem@gmail.com</small>
													</div>
													<div class="pull-right">
														<div class="lg-item-heading">Ceo</div>
													</div>
												</div>
											</a>
											<a class="list-group-item media" href="">
												<div class="pull-left">
													<img class="lg-item-img" src="images/akun.png" alt="">
												</div>
												<div class="media-body">
													<div class="pull-left">
														<div class="lg-item-heading">Ipsum</div>
														<small class="lg-item-text">ipsum@hotmail.com</small>
													</div>
													<div class="pull-right">
														<div class="lg-item-heading">Director</div>
													</div>
												</div>
											</a>
											<a class="list-group-item media" href="">
												<div class="pull-left">
													<img class="lg-item-img" src="images/akun.png" alt="">
												</div>
												<div class="media-body">
													<div class="pull-left">
														<div class="lg-item-heading">Unknown</div>
														<small class="lg-item-text">unknown@gmail.com</small>
													</div>
													<div class="pull-right">
														<div class="lg-item-heading">Manager</div>
													</div>
												</div>
											</a>
										</div>
									</div>
								</div>
								</div>
							</div>
							<div class="clearfix"></div>
							
		<!--//photoday-section-->