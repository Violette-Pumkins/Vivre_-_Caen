<?php
$co=Database::getConnexion()
;setlocale(LC_TIME, "fr_FR");

// $queryrub = $connection->query("SELECT * FROM categorie WHERE id = '$_GET[id]'");
// $queryrub2 = $queryrub->fetch_array(MYSQLI_ASSOC);


$id_cat=$_GET['id'];
$request="SELECT * FROM categorie WHERE id = :id_cat";
$queryrub = $co->prepare($request);
$queryrub->execute(array(':id_cat'=>$id_cat));
$queryrub2 = $queryrub->fetch();


?>



	

							<div class="col-md-12 align-self-center order-1">


								<ul class="breadcrumb d-block text-center">
									<li><a href="./index.php">Accueil</a></li>
									<li class="active"><?php echo $queryrub2['categorie'];?></li>
								</ul>
							</div>
						
				
				

				<div class="container py-4">

					<div class="row">
						<div class="col-lg-3 order-lg-2">
							<aside class="sidebar">
								<form action="page-search-results.html" method="get">
									<div class="input-group mb-3 pb-1">
										<input class="form-control text-1" placeholder="Search..." name="s" id="s" type="text">
										<span class="input-group-append">
											<button type="submit" class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button>
										</span>
									</div>
								</form>
								<h5 class="font-weight-bold pt-4">Categories</h5>
								<ul class="nav nav-list flex-column mb-5">
									<li class="nav-item"><a class="nav-link" href="#">Design (2)</a></li>
									<li class="nav-item">
										<a class="nav-link active" href="#">Photos (4)</a>
										<ul>
											<li class="nav-item"><a class="nav-link" href="#">Animals</a></li>
											<li class="nav-item"><a class="nav-link active" href="#">Business</a></li>
											<li class="nav-item"><a class="nav-link" href="#">Sports</a></li>
											<li class="nav-item"><a class="nav-link" href="#">People</a></li>
										</ul>
									</li>
									<li class="nav-item"><a class="nav-link" href="#">Videos (3)</a></li>
									<li class="nav-item"><a class="nav-link" href="#">Lifestyle (2)</a></li>
									<li class="nav-item"><a class="nav-link" href="#">Technology (1)</a></li>
								</ul>
								<div class="tabs tabs-dark mb-4 pb-2">
									<ul class="nav nav-tabs">
										<li class="nav-item active"><a class="nav-link show active text-1 font-weight-bold text-uppercase" href="#popularPosts" data-toggle="tab">Popular</a></li>
										<li class="nav-item"><a class="nav-link text-1 font-weight-bold text-uppercase" href="#recentPosts" data-toggle="tab">Recent</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="popularPosts">
											<ul class="simple-post-list">
												<li>
													<div class="post-image">
														<div class="img-thumbnail img-thumbnail-no-borders d-block">
															<a href="blog-post.html">
																<img src="img/blog/square/blog-11.jpg" width="50" height="50" alt="">
															</a>
														</div>
													</div>
													<div class="post-info">
														<a href="blog-post.html">Nullam Vitae Nibh Un Odiosters</a>
														<div class="post-meta">
															 Nov 10, 2020
														</div>
													</div>
												</li>
												<li>
													<div class="post-image">
														<div class="img-thumbnail img-thumbnail-no-borders d-block">
															<a href="blog-post.html">
																<img src="img/blog/square/blog-24.jpg" width="50" height="50" alt="">
															</a>
														</div>
													</div>
													<div class="post-info">
														<a href="blog-post.html">Vitae Nibh Un Odiosters</a>
														<div class="post-meta">
															 Nov 10, 2020
														</div>
													</div>
												</li>
												<li>
													<div class="post-image">
														<div class="img-thumbnail img-thumbnail-no-borders d-block">
															<a href="blog-post.html">
																<img src="img/blog/square/blog-42.jpg" width="50" height="50" alt="">
															</a>
														</div>
													</div>
													<div class="post-info">
														<a href="blog-post.html">Odiosters Nullam Vitae</a>
														<div class="post-meta">
															 Nov 10, 2020
														</div>
													</div>
												</li>
											</ul>
										</div>
										<div class="tab-pane" id="recentPosts">
											<ul class="simple-post-list">
												<li>
													<div class="post-image">
														<div class="img-thumbnail img-thumbnail-no-borders d-block">
															<a href="blog-post.html">
																<img src="img/blog/square/blog-24.jpg" width="50" height="50" alt="">
															</a>
														</div>
													</div>
													<div class="post-info">
														<a href="blog-post.html">Vitae Nibh Un Odiosters</a>
														<div class="post-meta">
															 Nov 10, 2020
														</div>
													</div>
												</li>
												<li>
													<div class="post-image">
														<div class="img-thumbnail img-thumbnail-no-borders d-block">
															<a href="blog-post.html">
																<img src="img/blog/square/blog-42.jpg" width="50" height="50" alt="">
															</a>
														</div>
													</div>
													<div class="post-info">
														<a href="blog-post.html">Odiosters Nullam Vitae</a>
														<div class="post-meta">
															 Nov 10, 2020
														</div>
													</div>
												</li>
												<li>
													<div class="post-image">
														<div class="img-thumbnail img-thumbnail-no-borders d-block">
															<a href="blog-post.html">
																<img src="img/blog/square/blog-11.jpg" width="50" height="50" alt="">
															</a>
														</div>
													</div>
													<div class="post-info">
														<a href="blog-post.html">Nullam Vitae Nibh Un Odiosters</a>
														<div class="post-meta">
															 Nov 10, 2020
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<h5 class="font-weight-bold pt-4">About Us</h5>
								<p>Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. Nulla nunc dui, tristique in semper vel. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. </p>
							</aside>
						</div>
						
						
						<div class="col-lg-9 order-lg-1">
							<div class="blog-posts">

<?php
$query = $connection->query("SELECT * FROM article WHERE categorie = '$_GET[id]'");
while($row = $query->fetch_assoc()){ 
//DIMITRI
$media = $connection->query("SELECT * FROM media WHERE id_article = $row[id]");
$articlemedia = $media->fetch_array(MYSQLI_ASSOC);

$date1 = date($row['publication']); 
?>

									<article class="post post-medium">
									<div class="row mb-3">
										<div class="col-lg-5">
											<div class="post-image">
												<a href="/article-<?php echo $row['id'];?>-<?php echo caractereValideUrl($row['titre']); ?>.html">
													<img src="media/images/<?php echo $articlemedia['nom_media'];?>" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
												</a>
											</div>
										</div>
										<div class="col-lg-7">
											<div class="post-content">
												<h2 class="font-weight-semibold pt-4 pt-lg-0 text-5 line-height-4 mb-2"><a href="/article-<?php echo $row['id'];?>-<?php echo caractereValideUrl($row['titre']); ?>.html"><?php echo $row['titre']; ?></a></h2>
												<p class="mb-0"><?php echo html_entity_decode(substr($row['texte'], 0, 600));?> [...]</p>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="post-meta">

												<span><i class="far fa-calendar-alt"></i> <?php echo strftime("%A %d %B %G", strtotime($date1));  ?> </span>
												<span><i class="far fa-user"></i> Post?? par <a href="#"><?php echo $row['auteur']; ?></a> </span>
												<span><i class="far fa-folder"></i> <a href="#">Lifestyle</a>, <a href="#">Design</a> </span>
												<span><i class="far fa-comments"></i> <a href="#">0 commentaires</a></span>
												<span class="d-block d-sm-inline-block float-sm-right mt-3 mt-sm-0"><a href="/article-<?php echo $row['id'];?>-<?php echo caractereValideUrl($row['titre']); ?>.html" class="btn btn-xs btn-light text-1 text-uppercase">Lire l'article</a></span>
											</div>
										</div>
									</div>
								</article>

							
<?php
}
?>
								

								<ul class="pagination float-right">
									<li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
									<li class="page-item active"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>
								</ul>

							</div>
						</div>
					</div>

				</div>

			