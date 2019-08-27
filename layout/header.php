<div class="header-main">
	<div class="logo-w3-agile">
			<h1><a href="index.html">Silau</a></h1>
						</div>
						<div class="profile_details w3l">		
									<ul>
										<li class="dropdown profile_details_drop">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
												<div class="profile_img">	
													<span class="prfil-img"><img src="images/akun.png" alt=""> </span> 
													<div class="user-name">
														<p><?php echo $_SESSION['user']?></p>
														<!--<span>Administrator</span>-->
													</div>
													<i class="fa fa-angle-down"></i>
													<i class="fa fa-angle-up"></i>
													<div class="clearfix"></div>	
												</div>	
											</a>
											<ul class="dropdown-menu drp-mnu">
												<!--<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
												<li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li>--> 
												<li> <a href="./logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
											</ul>
										</li>
									</ul>
							</div>
								
						<div class="w3layouts-right">
								<div class="profile_details_left"><!--notifications of menu start -->
									<ul class="nofitications-dropdown">
										<li class="dropdown head-dpdn">
											<?php 
		                            	    $query = mysqli_query($conn, "SELECT * FROM akun WHERE USERNAME='".$_SESSION['user']."'");
		                            		$row = $query -> fetch_assoc();
		                            		$sql = $conn -> query("SELECT * FROM cucian AS c JOIN akun a ON a.ID_AKUN = c.ID_AKUN 
		                            		JOIN harga h ON c.ID_HARGA=h.ID_HARGA JOIN jenis_laundry l 
		                            		ON l.ID_LAUNDRY=h.JENIS_LAUNDRY WHERE a.ID_AKUN = ".$row['ID_AKUN']." AND STATUS_BAYAR='0'");	
		                            		
	                            			?>
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											<i class="fa fa-bell"></i><span class="badge blue"><?php echo $sql->num_rows; ?></span></a>
											<ul class="dropdown-menu">
												<li>
													<div class="notification_header">
														<h3>Anda Punya <?php echo $sql->num_rows; ?> Notifikasi</h3>
													</div>
												</li>
												<?php
												if($sql -> num_rows > 0 ){
													while ($roww =$sql -> fetch_assoc()) {
												?>
												<li><a href="#">
													<div class="user_img"><img src="images/uang.png" alt=""></div>
												   <div class="notification_desc">
													<p>
													<?php
														if($roww['STATUS_BAYAR']==0){
															echo "Cucian belum terbayar";
														}else{
															echo "Cucian telah terbayar";	
														}
													?>
													</p>
													<p><span><?php echo $roww['TANGGAL'] ?></span></p>
													</div>
												  <div class="clearfix"></div>	
												 </a></li>	
												<?php
													}
												?>
												<?php } ?>
											</ul>
										</li>	
										<li class="dropdown head-dpdn">
											<!--<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i><span class="badge blue1"></span></a>-->
											<ul class="dropdown-menu">
												<!--<li>
													<div class="notification_header">
														<h3>You have 8 pending task</h3>
													</div>
												</li>
												<li><a href="#">
													<div class="task-info">
														<span class="task-desc">Database update</span><span class="percentage">40%</span>
														<div class="clearfix"></div>	
													</div>
													<div class="progress progress-striped active">
														<div class="bar yellow" style="width:40%;"></div>
													</div>
												</a></li>
												<li><a href="#">
													<div class="task-info">
														<span class="task-desc">Dashboard done</span><span class="percentage">90%</span>
													   <div class="clearfix"></div>	
													</div>
													<div class="progress progress-striped active">
														 <div class="bar green" style="width:90%;"></div>
													</div>
												</a></li>
												<li><a href="#">
													<div class="task-info">
														<span class="task-desc">Mobile App</span><span class="percentage">33%</span>
														<div class="clearfix"></div>	
													</div>
												   <div class="progress progress-striped active">
														 <div class="bar red" style="width: 33%;"></div>
													</div>
												</a></li>
												<li><a href="#">
													<div class="task-info">
														<span class="task-desc">Issues fixed</span><span class="percentage">80%</span>
													   <div class="clearfix"></div>	
													</div>
													<div class="progress progress-striped active">
														 <div class="bar  blue" style="width: 80%;"></div>
													</div>
												</a></li>
												<li>
													<div class="notification_bottom">
														<a href="#">See all pending tasks</a>
													</div> 
												</li>-->
											</ul>
										</li>	
										<div class="clearfix"> </div>
									</ul>
									<div class="clearfix"> </div>
								</div>
								<!--notification menu end -->
								
								<div class="clearfix"> </div>				
							</div>
							
						 <div class="clearfix"> </div>	
					</div>
	<!--heder end here-->