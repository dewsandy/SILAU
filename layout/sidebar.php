<div class="sidebar-menu">
						<header class="logo1">
							<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
						</header>
							<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
							   <div class="menu">
										<ul id="menu" >
											<li><a href="index.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span><div class="clearfix"></div></a></li>
											<li id="menu-academico"><a href="#"><i class="fa fa-cogs" aria-hidden="true"></i><span> Pengaturan</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
											   <ul id="menu-academico-sub">
											   	<li id="menu-academico-avaliacoes"><a href="?p=profil">Profil</a></li>
												
											  </ul>
											</li>
											<li><a href="./logout.php"><i class="fa fa-sign-out"></i> <span>Keluar</span><div class="clearfix"></div></a></li>
									 	</ul>
									</div>
								  </div>
								  <div class="clearfix"></div>		
								</div>
								<script>
								var toggle = true;
											
								$(".sidebar-icon").click(function() {                
								  if (toggle)
								  {
									$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
									$("#menu span").css({"position":"absolute"});
								  }
								  else
								  {
									$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
									setTimeout(function() {
									  $("#menu span").css({"position":"relative"});
									}, 400);
								  }
												
												toggle = !toggle;
											});
								</script>