		<div class="col-md-12 align-self-center order-1">


								<ul class="breadcrumb d-block text-center">
									<li><a href="./index.php">Accueil</a></li>
									<li class="active">Contactez nous</li>
								</ul>
							</div>
							
							
							
				<section class="section section-default mb-0">
					<div class="container">
						<div class="row">
							<div class="col-lg-4">
								<div class="row">
									<div class="col-md-6 col-lg-12">
										<h5 class="mb-1 mt-4">Téléphonez nous </h5>
										<p><i class="fas fa-phone"></i> 07 49 96 05 27</p>
		
										<!-- <h5 class="mb-1 mt-4">Pour venir au restaurant</h5>
										<p><i class="fas fa-map-marker-alt"></i> 5 rue de la miséricorde - 14000 Caen</p> -->
									</div>
									<div class="col-md-6 col-lg-12">
										<!-- Google Maps - Go to the bottom of the page to change settings and map location. 
										<div id="googlemaps" class="google-map small mt-md-4 mt-lg-0"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1303.9618327512546!2d-0.3581369938660668!3d49.183035092486186!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf998bfd809fcf1a8!2sLe%20Libanais!5e0!3m2!1sfr!2sfr!4v1613325838677!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
-->
									</div>
								</div>
							</div>
							<!--<div class="col-lg-4">
								<div class="row">
									<div class="col-md-6 col-lg-12">
										<h5 class="mb-1 mt-4">Déjeuner et Diner</h5>
	
											<ul class="list list-icons list-dark mt-3">
											<li><i class="far fa-clock"></i> Lundi : 19h - 22h30</li>
											<li><i class="far fa-clock"></i> Mardi au Samedi : 12h - 22h30</li>
											<li><i class="far fa-clock"></i> Fermé le dimanche</li>
										</ul>
									</div>
								</div>
							</div>-->
							<div class="col-lg-4">
								<h5 class="mb-3 mt-4">Envoyez nous un message</h5>

								<form class="contact-form" action="php/contact-form.php" method="POST">
									<div class="form-row">
										<div class="form-group col">
											<label>Votre prénom *</label>
											<input type="text" value="" data-msg-required="Votre prénom" maxlength="100" class="form-control" name="name" required>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col">
											<label>Votre adresse email *</label>
											<input type="email" value="" data-msg-required="Votre adresse email" data-msg-email="Merci de noter une adresse email valide" maxlength="100" class="form-control" name="email" required>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col">
											<label>Sujet de votre message</label>
											<input type="text" value="" data-msg-required="Ecrivez ici le sujet de votre message" maxlength="100" class="form-control" name="subject" required>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col">
											<label>Message *</label>
											<textarea maxlength="5000" data-msg-required="Ecrivez ici votre message" rows="3" class="form-control" name="message" required></textarea>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col">
											<input type="submit" value="Envoyer le message" class="btn btn-lg btn-primary" data-loading-text="Chargement...">

											<div class="contact-form-success alert alert-success d-none">
												Merci. Votre message a bien été envoyé. Nous vous répondrons rapidement.
											</div>

											<div class="contact-form-error alert alert-danger d-none">
												Un problème est survenu lors de l'envoi
												<span class="mail-error-message text-1 d-block"></span>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>