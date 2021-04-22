	<footer id="footer">
				<div class="container">
					<div class="footer-ribbon">
						<span>Gardons le contact</span>
					</div>
					<div class="row py-5 my-4">
						<div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
							<h5 class="text-3 mb-3">ABOUT THE BLOG</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu pulvinar magna semper scelerisque.</p>
							<p class="mb-0">Praesent venenatis turpis vitae purus semper, eget sagittis velit venenatis ptent taciti sociosqu ad litora...</p>
							<p class="mb-0"><a href="#" class="btn-flat btn-xs text-color-light p-relative top-5"><strong class="text-2">VIEW MORE</strong><i class="fas fa-angle-right p-relative top-1 pl-2"></i></a></p>
						</div>
						<div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
							<h5 class="text-3 mb-3">RECENT POSTS</h5>
							<ul class="list-unstyled mb-0">
								<li class="media mb-3 pb-1">
									<article class="d-flex">
										<a href="#">
											<img class="mr-3 rounded-circle" src="img/office/our-office-4-square.jpg" alt="" style="max-width: 70px;">
										</a>
										<div class="media-body">
											<a href="#">
												<h6 class="text-3 text-color-light opacity-8 ls-0 mb-1">Lorem ipsum dolor sit, consectetur adipiscing elit.</h6>
												<p class="text-2 mb-0">12:53 AM Dec 19th</p>
											</a>
										</div>
									</article>
								</li>
								<li class="media">
									<article class="d-flex">
										<a href="#">
											<img class="mr-3 rounded-circle" src="img/office/our-office-5-square.jpg" alt="" style="max-width: 70px;">
										</a>
										<div class="media-body">
											<a href="#">
												<h6 class="text-3 text-color-light opacity-8 ls-0 mb-1">Lorem ipsum dolor sit, consectetur adipiscing elit.</h6>
												<p class="text-2 mb-0">12:53 AM Dec 19th</p>
											</a>
										</div>
									</article>
								</li>
							</ul>
						</div>
						<div class="col-md-6 col-lg-3 mb-5 mb-md-0">
							<h5 class="text-3 mb-3">RECENT COMMENTS</h5>
							<ul class="list-unstyled mb-0">
								<li class="mb-3 pb-1">
									<a href="#">
										<p class="text-3 text-color-light opacity-8 mb-1"><i class="fas fa-angle-right text-color-primary"></i><strong class="ml-2">John Doe</strong> commented on <strong class="text-color-primary">lorem ipsum dolor sit amet.</strong></p>
										<p class="text-2 mb-0">12:55 AM Dec 19th</p>
									</a>
								</li>
								<li>
									<a href="#">
										<p class="text-3 text-color-light opacity-8 mb-1"><i class="fas fa-angle-right text-color-primary"></i><strong class="ml-2">John Doe</strong> commented on <strong class="text-color-primary">lorem ipsum dolor sit amet.</strong></p>
										<p class="text-2 mb-0">12:55 AM Dec 19th</p>
									</a>
								</li>
							</ul>
						</div>
						<div class="col-md-6 col-lg-2">
							<h5 class="text-3 mb-3">CATEGORIES</h5>
							<p>
							
							
							<?php
//Get all country data
$query = $connection->query("SELECT * FROM categorie");
while($row = $query->fetch_assoc()){ 
//echo '<option value="'.$row['id'].'">'.$row['categorie'].'</option>';
echo "<a href=\"#$row[id]\"><span class=\"badge badge-dark bg-color-black badge-sm py-2 mr-1 mb-2 text-uppercase\">$row[categorie]</span></a>";

}

?>
			</p>
						</div>
					</div>
				</div>
				<div class="footer-copyright">
					<div class="container py-2">
						<div class="row py-4">
							<div class="col-lg-1 d-flex align-items-center justify-content-center justify-content-lg-start mb-2 mb-lg-0">
								
								<!--   
								
								<a href="./" class="logo pr-0 pr-lg-3">
									<img alt="Vivre à Caen" src="img/logo-footer.png" class="opacity-5" height="33">
								</a>-->
							</div>
							<div class="col-lg-7 d-flex align-items-center justify-content-center justify-content-lg-start mb-4 mb-lg-0">
								<style>
/* Adding style to the wrapper*/
.wrapper{
  justify-content: center;
}

/*centering the Heart Animation and text*/
.myHeart{
  align-self: center;

}

/* Adding style to the Heart Animation*/
.heart {
  fill: #ffffff;
  top: 0.1em;
  width: 1.1em;
  animation: pulse 1s ease infinite;
}

/* Creating the heartbeat effect*/
@keyframes pulse {
    0% { 
        transform: scale(0.7); 
  }
    50% {
        transform: scale(1); 
  }
  100% { 
        transform: scale(0.7); 
  }
}
</style>			
<p>



<div class="wrapper"> 
  <div class="myHeart">© Copyright 2021. Tous droits réservés | "Vivre à Caen" est une marque déposée à l'INPI n°20 4 671 069 <br> Développé avec  
    <svg class="heart" viewBox="0 0 32 29.6">
     <path d="M23.6,0c-3.4,0-6.3,2.7-7.6,5.6C14.7,2.7,11.8,0,8.4,0C3.8,0,0,3.8,0,8.4c0,9.4,9.5,11.9,16,21.2
  c6.1-9.3,16-12.1,16-21.2C32,3.8,28.2,0,23.6,0z"/>
  </svg>  par Fabien Poulain  </div></div>




							</div>
							<div class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end">
								<nav id="sub-menu">
									<ul>
										<li><i class="fas fa-angle-right"></i><a href="#" class="ml-1 text-decoration-none"> Mentions légales</a></li>
										<li><i class="fas fa-angle-right"></i><a href="contact.html" class="ml-1 text-decoration-none"> Contactez nous</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</footer>