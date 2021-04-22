		

<div class="notice-top-bar bg-primary" data-sticky-start-at="180">
				<button class="hamburguer-btn hamburguer-btn-light notice-top-bar-close m-0 active" data-set-active="false">
					<span class="close">
						<span></span>
						<span></span>
					</span>
				</button>
				<div class="container">
					<div class="row justify-content-center py-2">
						<div class="col-9 col-md-12 text-center">
							<p class="text-color-light font-weight-semibold mb-0">Profitez de <strong>40% de réduction</strong> sur un article <a href="#" class="btn btn-primary-scale-2 btn-modern btn-px-2 btn-py-1 ml-2">J'en profite pas</a> <a href="#" class="btn btn-primary-scale-2 btn-modern btn-px-2 btn-py-1 ml-1 mr-2">j'en profite</a> <span class="opacity-6 text-1">* Seulement aujourd'hui</span></p>
						</div>
					</div> 
				</div>
			</div>

			<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 122, 'stickySetTop': '-122px', 'stickyChangeLogo': false}">
				<div class="header-body border-color-primary border-top-0 box-shadow-none">
					<div class="header-container container z-index-2" style="min-height: 122px;">
						<div class="header-row">
							<div class="header-column">
								<div class="header-row">
									<h1 class="header-logo">
										<a href="index.html">
											<img alt="Vivre à Caen - Le magazine" width="100" height="48" src="img/logo-default-slim.png">
											<span class="hide-text">Vivre à Caen - Le magazine</span>
										</a>
									</h1>
								</div>
							</div>
							<div class="header-column justify-content-end">
							
								<div class="header-row h-100">
									<a href="#" target="_blank" class="py-3 d-block">
										<img alt="Vivre à Caen - Le magazine" class="img-fluid pl-3" src="img/blog/blog-ad-2.jpg" />
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="header-nav-bar bg-primary">
						<div class="container">
							<div class="header-row p-relative">
								<div class="header-column">
									<div class="header-row">
										<div class="header-colum order-2 order-lg-1">
											<div class="header-row">
												<div class="header-nav header-nav-stripe header-nav-divisor header-nav-force-light-text justify-content-start">
													<div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1">
														<nav class="collapse">
															<ul class="nav nav-pills" id="mainNav">
																<li class="dropdown dropdown-full-color dropdown-light">
																	<a class="dropdown-item dropdown-toggle" href="./">
																		Acceuil
																</a>
																<ul class="dropdown-menu">
																	<li>
																		<a class="dropdown-item" href="index.html">
																			Articles
																		</a>
																	</li>
																	<li>
																		<a class="dropdown-item" href="index.html#demos">
																			Demos
																		</a>
																	</li>
																</ul>
															</li>
															<li class="dropdown dropdown-full-color dropdown-light">
																<a class="dropdown-item dropdown-toggle" href="#">
																	Articles
																</a>
																<ul class="dropdown-menu">
																

							<?php
//Get all country data
$query = $connection->query("SELECT * FROM categorie");
while($row = $query->fetch_assoc()){ 


$query2 = $connection->query("SELECT * FROM article WHERE categorie = '$row[id]'");
$row_cnt = mysqli_num_rows($query2);

$categorie = caractereValideUrl($row['categorie']);
//echo '<option value="'.$row['id'].'">'.$row['categorie'].'</option>';
echo "<li><a class=\"dropdown-item\" href=\"rubrique-$row[id]-$categorie.html\">$row[categorie] ($row_cnt)</a></li>";

}

?>
												
																	 																 
																</ul>
															</li>
															<li class="dropdown dropdown-full-color dropdown-light">
																<a class="dropdown-item dropdown-toggle" href="#">
																	Bons plans
																</a>
															</li>
															<li class="dropdown dropdown-full-color dropdown-light">
																	<a class="dropdown-item dropdown-toggle" href="#">
Les idées sorties																</a>
															</li>
															<li class="dropdown dropdown-full-color dropdown-light">
																<a class="dropdown-item dropdown-toggle" href="#">
																	Le magazine
																</a>
																<ul class="dropdown-menu">
																	<li><a class="dropdown-item" href="magazine.html">Lire le magazine</a></li>
																	<li><a class="dropdown-item" href="annonceurs.html">Annoncer dans le magazine</a></li>
																</ul>
															</li>
																	<li class="dropdown dropdown-full-color dropdown-light">
																<a class="dropdown-item dropdown-toggle" href="contact.html">
																	Contactez nous
																</a>
															</li>
																<?php
if (isset($_SESSION['email']) && $_SESSION['email'] == true && $_SESSION['rang'] == '2') {
?>
						<li class="dropdown dropdown-full-color dropdown-light">
																<a class="dropdown-item dropdown-toggle" href="#">
																	Admistration
																</a>
																<ul class="dropdown-menu">
																	<li><a class="dropdown-item" href="./?o=admin">Ajouter un article</a></li>
																	<li><a class="dropdown-item" href="page-careers.html">Ajouter un tag</a></li>
																</ul>
															</li>
							<?php
}
?>								


															</ul>
															
															
															
															
															
															



							
															
															
															
															
															
															
															
															
															
															
															
														</nav>
													</div>
									
												</div>
											</div>
										</div>
										
										
										
										<div class="header-column order-1 order-lg-2">
											<div class="header-row justify-content-end">
												
										<div class="header-nav-features header-nav-features-light header-nav-features-no-border header-nav-features-lg-show-border order-1 order-lg-2"> 

<div class="header-nav-feature header-nav-features-search d-inline-flex"> 
<a href="#" class="header-nav-features-toggle text-decoration-none" data-focus="headerSearch"><i class="fas fa-search header-nav-top-icon"></i></a> 
<div class="header-nav-features-dropdown header-nav-features-dropdown-mobile-fixed" id="headerTopSearchDropdown"> 
<form role="search" action="page-search-results.html" method="get"> <div class="simple-search input-group"> 
<input class="form-control text-1" id="headerSearch" name="q" type="search" value="" placeholder="recherche..."> 
<span class="input-group-append"> <button class="btn" type="submit"> <i class="fas fa-search header-nav-top-icon text-color-dark"></i> 
</button> </span> </div> </form> </div> </div>

 <div class="header-nav-feature header-nav-features-cart d-inline-flex ml-2"> 






                
                     
						
                                                      
                  
                   
         

<a href="?o=profil" class="header-nav-features-toggle"><button type="button" class="mb-1 mt-1 mr-1 btn btn-primary">Connectez vous <i class="fas fa-arrow-right ml-1"></i> </button>  </a> 




		

 <?php
if (isset($_SESSION['email']) && $_SESSION['email'] == true) {
?>

<a href="?o=profil" class="header-nav-features-toggle"> <img src="https://img.icons8.com/bubbles/100/000000/administrator-male.png"  width="40" alt="Connecté sous <?php echo $_SESSION['first_name']; ?>" class="header-nav-top-icon-img">  <!--<img src="img/icons/icon-cart-light.svg" width="14" alt="" class="header-nav-top-icon-img"> !-->
<span class="cart-info"> <span class="cart-qty">4</span> </span> </a> 

											
									
															
															
<div class="header-nav-features-dropdown" id="headerTopCartDropdown"> 
 
 

<h1 class="text-primary">Bonjour <strong class="font-weight-extra-bold"><?php echo $_SESSION['first_name']; ?> </strong></h1>
<div class="actions"> <a class="btn btn-blue" href="?o=profil">Mon compte</a></div>
<div class="actions"> <a class="btn btn-dark" href="logout.php">Se déconnecter</a></div>

</div>
<?php
} else {
?>
<div class="header-nav-features-dropdown" id="headerTopCartDropdown"> 
<div class="actions"> <a class="btn btn-dark" href="?o=login">Se connecter</a></div><a class="btn btn-primary" href="#">Créer un compte</a>
 </div>
<?php
}
?>		




 


 </div>

 </div>
												
												
											</div>
										</div>
										
										
										
										
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				
				



			</header>
