<?php
$media = $connection->query("SELECT * FROM media WHERE id_media = '1'");
$nbvu = $media->fetch_array(MYSQLI_ASSOC);

?>

<div class="container py-2">

					<div class="row">
					

					
					<div class="col-lg-4">
											<h5 class="text-uppercase mt-4">Vivre à Caen Magazine N°1</h5>
											<a href="compteur.php?id=1">
											
											<span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-lighten thumb-info-centered-info thumb-info-block thumb-info-block-dark">
													<span class="thumb-info-wrapper">
														<img src="img/mag1.jpg" class="img-fluid" alt="">
														<span class="thumb-info-title">
															<span class="thumb-info-inner">Magazine Avril 2021</span>
															<span class="thumb-info-type">Lire en ligne le magazine<br><?php echo "$nbvu[nbvu]";?> lectures</span>
														</span>
														<span class="thumb-info-action">
															<span class="thumb-info-action-icon bg-transparent"><i class="fas fa-plus text-primary"></i></span>
														</span>
													</span>
												</span>
											</a>
										</div>
</div>

</div>

















