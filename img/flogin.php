<section class="page-header page-header-classic">
					<div class="container">
						<div class="row">
							<div class="col">
								<ul class="breadcrumb">
									<li><a href="#">Accueil</a></li>
									<li class="active">Page</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col p-static">
								<h1 data-title-border>Se connecter</h1>
							</div>
						</div>
					</div>
				</section>

				<div class="container py-4">

 

                    

		 <?php echo $email_already_verified; ?>
         <?php echo $email_verified; ?>
         <?php echo $activation_error; ?>
				
				
				
	<?php

	
//parametrage site
	$AdresseSite = "http://vac.happypromo.fr/"; // avec le / a la fin !
	
// Swiftmailer lib
//   require_once './lib/vendor/autoload.php';
	
	
	
	           
	
	
	//Validation de l'email

	global $email_verified, $email_already_verified, $activation_error;

    // GET the token = ?token
    if(!empty($_GET['token'])){
       $token = $_GET['token'];
    } else {
        $token = "";
    }
	    if($token != "") {

        $sqlQuery = mysqli_query($connection, "SELECT * FROM users WHERE token = '$token' ");
        $countRow = mysqli_num_rows($sqlQuery);

        if($countRow == 1){
            while($rowData = mysqli_fetch_array($sqlQuery)){
                $is_active = $rowData['is_active'];
                  if($is_active == 0) {
                     $update = mysqli_query($connection, "UPDATE users SET is_active = '1' WHERE token = '$token' ");
                       if($update){
                           $email_verified = '<div class="alert alert-success">
                                  Votre email a été vérifiée
                                </div>
                           ';
                       }
                  } else {
                        $email_already_verified = '<div class="alert alert-danger">
                               Votre email est déjà vérifiée
                            </div>
                        ';
                  }
            }
        } else {
            $activation_error = '<div class="alert alert-danger">
                    Une erreur est intervenue pendant l\'activation
                </div>
            ';
        }
    }
	
	
	
	
	//Login de l'utilisation
	
global $wrongPwdErr, $accountNotExistErr, $emailPwdErr, $verificationRequiredErr, $email_empty_err, $pass_empty_err;

    if(isset($_POST['login'])) {
        $email_signin        = $_POST['email_signin'];
        $password_signin     = $_POST['password_signin'];

        // clean data 
        $user_email = filter_var($email_signin, FILTER_SANITIZE_EMAIL);
        $pswd = mysqli_real_escape_string($connection, $password_signin);

        // Query if email exists in db
        $sql = "SELECT * From users WHERE email = '{$email_signin}' ";
        $query = mysqli_query($connection, $sql);
        $rowCount = mysqli_num_rows($query);

        // If query fails, show the reason 
        if(!$query){
           die("La requête SQL a échoué: " . mysqli_error($connection));
        }

        if(!empty($email_signin) && !empty($password_signin)){
            if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/", $pswd)) {
                $wrongPwdErr = '<div class="alert alert-danger">
Le mot de passe doit comporter entre 6 et 20 caractères, contenir au moins un caractère spécial, des minuscules, des majuscules et un chiffre.
                    </div>';
            }
            // Check if email exist
            if($rowCount <= 0) {
                $accountNotExistErr = '<div class="alert alert-danger">
                        Le compte utilisateur n\'existe pas.
                    </div>';
            } else {
                // Fetch user data and store in php session
                while($row = mysqli_fetch_array($query)) {
                    $id            = $row['id'];
                    $firstname     = $row['firstname'];
                    $lastname      = $row['lastname'];
                    $email         = $row['email'];
                    $mobilenumber   = $row['mobilenumber'];
                    $pass_word     = $row['password'];
                    $token         = $row['token'];
                    $is_active     = $row['is_active'];
					$rang     = $row['rang'];
                }

                // Verify password
                $password = password_verify($password_signin, $pass_word);

                // Allow only verified user
                if($is_active == '1') {
                    if($email_signin == $email && $password_signin == $password) {
                       header("Location: ./?o=login");
                       
                       $_SESSION['id'] = $id;
                       $_SESSION['firstname'] = $firstname;
                       $_SESSION['lastname'] = $lastname;
                       $_SESSION['email'] = $email;
                       $_SESSION['mobilenumber'] = $mobilenumber;
                       $_SESSION['token'] = $token;
					   $_SESSION['rang'] = $rang;

                    } else {
                        $emailPwdErr = '<div class="alert alert-danger">
                                L\'e-mail ou le mot de passe sont incorrects.
                            </div>';
                    }
                } else {
                    $verificationRequiredErr = '<div class="alert alert-danger">
                            La vérification du compte est requise pour la connexion.
                        </div>';
                }

            }

        } else {
            if(empty($email_signin)){
                $email_empty_err = "<div class='alert alert-danger email_alert'>
                            Courriel non renseigné.
                    </div>";
            }
            
            if(empty($password_signin)){
                $pass_empty_err = "<div class='alert alert-danger email_alert'>
                            Mot de passe non renseigné.
                        </div>";
            }            
        }

    }
	
	
	
	
	//Enregistrement du membre
    
    // Error & success messages
    global $success_msg, $email_exist, $f_NameErr, $l_NameErr, $_emailErr, $_mobileErr, $_passwordErr;
    global $fNameEmptyErr, $lNameEmptyErr, $emailEmptyErr, $mobileEmptyErr, $passwordEmptyErr, $email_verify_err, $email_verify_success;
    
    // Set empty form vars for validation mapping
    $_first_name = $_last_name = $_email = $_mobile_number = $_password = "";

    if(isset($_POST["submit"])) {
		
        $firstname     = $_POST["firstname"];
        $lastname      = $_POST["lastname"];
        $email         = $_POST["email"];
        $mobilenumber  = $_POST["mobilenumber"];
        $password      = $_POST["password"];

        // check if email already exist
        $email_check_query = mysqli_query($connection, "SELECT * FROM users WHERE email = '{$email}' ");
        $rowCount = mysqli_num_rows($email_check_query);


        // PHP validation
        // Verify if form values are not empty
        if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($mobilenumber) && !empty($password)){
            
            // check if user email already exist
            if($rowCount > 0) {
                $email_exist = '
                    <div class="alert alert-danger" role="alert">
                        Un compte avec cet e-mail existe déjà!
                    </div>
                ';
            } else {
                // clean the form data before sending to database
                $_first_name = mysqli_real_escape_string($connection, $firstname);
                $_last_name = mysqli_real_escape_string($connection, $lastname);
                $_email = mysqli_real_escape_string($connection, $email);
                $_mobile_number = mysqli_real_escape_string($connection, $mobilenumber);
                $_password = mysqli_real_escape_string($connection, $password);

                // perform validation
                if(!preg_match("/^[a-zA-Z ]*$/", $_first_name)) {
                    $f_NameErr = '<div class="alert alert-danger">
                            Seuls les lettres et les espaces sont autorisés.
                        </div>';
                }
                if(!preg_match("/^[a-zA-Z ]*$/", $_last_name)) {
                    $l_NameErr = '<div class="alert alert-danger">
                            Seuls les lettres et les espaces sont autorisés.
                        </div>';
                }
                if(!filter_var($_email, FILTER_VALIDATE_EMAIL)) {
                    $_emailErr = '<div class="alert alert-danger">
                            Le format de l\'e-mail n\'est pas valide.
                        </div>';
                }
                if(!preg_match("/^[0-9]{10}+$/", $_mobile_number)) {
                    $_mobileErr = '<div class="alert alert-danger">
                            Seuls les numéros mobiles à 10 chiffres sont autorisés.
                        </div>';
                }
                if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/", $_password)) {
                    $_passwordErr = '<div class="alert alert-danger">
Le mot de passe doit comporter entre 6 et 20 caractères, contenir au moins un caractère spécial, des minuscules, des majuscules et un chiffre.
                        </div>';
                }
                
                // Store the data in db, if all the preg_match condition met
                if((preg_match("/^[a-zA-Z ]*$/", $_first_name)) && (preg_match("/^[a-zA-Z ]*$/", $_last_name)) &&
                 (filter_var($_email, FILTER_VALIDATE_EMAIL)) && (preg_match("/^[0-9]{10}+$/", $_mobile_number)) && 
                 (preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/", $_password))){

                    // Generate random activation token
                    $token = md5(rand().time());

                    // Password hash
                    $password_hash = password_hash($password, PASSWORD_BCRYPT);

                    // Query
                    $sql = "INSERT INTO users (firstname, lastname, email, mobilenumber, password, token, is_active,
                    date_time) VALUES ('{$firstname}', '{$lastname}', '{$email}', '{$mobilenumber}', '{$password_hash}', 
                    '{$token}', '0', now())";
                    
                    // Create mysql query
                    $sqlQuery = mysqli_query($connection, $sql);
                    
                    if(!$sqlQuery){
                        die("La requête MySQL a échoué: " . mysqli_error($connection));
                    } 

                    // Send verification email
                    if($sqlQuery) {
                        $msg = 'Bonjour,<br>Pour activer votre compte sur le site "Vivre à Caen", Merci de cliquer ci dessous. <br><br>
                          <a href="'.$AdresseSite.'user_verificaiton.php?token='.$token.'"> Cliquez ici pour activer le compte</a><br>Cordialement
                        ';

                        // Create the Transport
                       // $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
                       // ->setUsername('rezozone@gmail.com')
                      //  ->setPassword('Tourville1!');

                        // Create the Mailer using your created Transport
                       // $mailer = new Swift_Mailer($transport);

                        // Create a message
//$message = (new Swift_Message('Please Verify Email Address!'))
                       // ->setFrom([$email => $firstname . ' ' . $lastname])
                       // ->setTo($email)
                       // ->addPart($msg, "text/html")
                       // ->setBody('Hello! User');

                        // Send the message
                        //$result = $mailer->send($message);
						
						
						
$from = "rezozone@gmail.com";
$to =$email;
$subject = "Activation du compte - Vivre à Caen";
$message = $msg;
$headers = "From:" . $from;


        if(mail($to,$subject,$message, $headers)){
            echo '<div class="alert alert-success">Votre message a bien été envoyé.</div>';
        } else{
            // echo $messagenonenvoi;
            echo 'Erreur lors de l\'envoi de l\'email d\'activation.';
        }

                          
                        // if(!$result){
                            // $email_verify_err = '<div class="alert alert-danger">
                                    // Verification email coud not be sent!
                            // </div>';
                        // } else {
                            // $email_verify_success = '<div class="alert alert-success">
                                // Verification email has been sent!
                            // </div>';
                        // }
                    }
                }
            }
        } else {
            if(empty($firstname)){
                $fNameEmptyErr = '<div class="alert alert-danger">
                    Merci de renseigner votre prénom.
                </div>';
            }
            if(empty($lastname)){
                $lNameEmptyErr = '<div class="alert alert-danger">
                    Merci de renseigner votre nom.
                </div>';
            }
            if(empty($email)){
                $emailEmptyErr = '<div class="alert alert-danger">
                    Merci de renseigner votre email.
                </div>';
            }
            if(empty($mobilenumber)){
                $mobileEmptyErr = '<div class="alert alert-danger">
                    Merci de renseigner votre téléphone portable.
                </div>';
            }
            if(empty($password)){
                $passwordEmptyErr = '<div class="alert alert-danger">
                    Merci de renseigner votre mot de passe.
                </div>';
            }            
        }
    }
?>
					
					
					<div class="row justify-content-center">
						<div class="col-md-6 col-lg-5 mb-5 mb-lg-0">
							<h2 class="font-weight-bold text-5 mb-0">Connectez vous</h2>
							
						
					<?php echo $accountNotExistErr; ?>
                    <?php echo $emailPwdErr; ?>
                    <?php echo $verificationRequiredErr; ?>
                    <?php echo $email_empty_err; ?>
                    <?php echo $pass_empty_err; ?>
					
				
							<form id="frmSignIn" method="post" class="needs-validation">
								<div class="form-row">
									<div class="form-group col">
										<label class="text-color-dark text-3">Votre adresse email <span class="text-color-danger">*</span></label>
										<input type="email" name="email_signin" id="email_signin" class="form-control form-control-lg text-4" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col">
										<label class="text-color-dark text-3">Mot de passe <span class="text-color-danger">*</span></label>
										<input type="password" name="password_signin" id="password_signin" class="form-control form-control-lg text-4" required>
									</div>
								</div>
								<div class="form-row justify-content-between">
									<div class="form-group col-md-auto">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="rememberme">
											<label class="custom-control-label cur-pointer text-2" for="rememberme">Se souvenir de moi</label>
										</div>
									</div>
									<div class="form-group col-md-auto">
										<a class="text-decoration-none text-color-dark text-color-hover-primary font-weight-semibold text-2" href="#">Mot de passe oublié?</a>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col">
									
				
						
										<button type="submit"  name="login" id="sign_in" class="btn btn-dark btn-modern btn-block text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading...">Login</button>
										<div class="divider">
											<span class="bg-light px-4 position-absolute left-50pct top-50pct transform3dxy-n50">or</span>
										</div>
										<a href="#" class="btn btn-primary-scale-2 btn-modern btn-block text-transform-none rounded-0 font-weight-bold align-items-center d-inline-flex justify-content-center text-3 py-3" data-loading-text="Loading..."><i class="fab fa-facebook text-5 mr-2"></i> Connectez vous avec Facebook</a>
									</div>
								</div>
							</form>
						</div>
						<div class="col-md-6 col-lg-5">
							<h2 class="font-weight-bold text-5 mb-0">Enregistrez vous</h2>
							
					<?php echo $success_msg; ?>
                    <?php echo $email_exist; ?>
                    <?php echo $email_verify_err; ?>
                    <?php echo $email_verify_success; ?>
					
							<form id="frmSignUp" method="post">
							
							
								<div class="form-row">
									<div class="form-group col">
                        <label class="text-color-dark text-3">Votre prénom <span class="text-color-danger">*</span></label>
                        <input type="text" class="form-control" name="firstname" id="firstName" />
								</div>
								</div>
								
								            <div class="form-row">
									<div class="form-group col">
                        <label class="text-color-dark text-3">Votre nom <span class="text-color-danger">*</span></label>
                        <input type="text" class="form-control" name="lastname" id="lastName" />
								</div>
								</div>


								<div class="form-row">
									<div class="form-group col">
                        <label class="text-color-dark text-3">Votre Numéro de Téléphone <span class="text-color-danger">*</span></label>
                        <input type="text" class="form-control" name="mobilenumber" id="mobilenumber" />
								</div>
								</div>
					
					
								<div class="form-row">
									<div class="form-group col">
										<label class="text-color-dark text-3">Votre adresse email <span class="text-color-danger">*</span></label>
										<input type="email" name="email" id="email" value="" class="form-control form-control-lg text-4" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col">
										<label class="text-color-dark text-3">Votre mot de passe <span class="text-color-danger">*</span></label>
										<input type="password" name="password" id="password" value="" class="form-control form-control-lg text-4" required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col">
										<p class="text-2 mb-2">Vos données personnelles seront utilisées pour vous rendre accesible toutes les fonctions du site, pour gérer votre compte, vous pouvez consulter notre <a href="#" class="text-decoration-none">politique de confidentialité.</a></p>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col">
										<button type="submit" name="submit" id="submit" class="btn btn-dark btn-modern btn-block text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading...">Enregistrez vous</button>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>