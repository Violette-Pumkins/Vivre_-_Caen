  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){
 $(document).on('change', '#file', function(){


 var name = document.getElementById("file").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("file").files[0]);
  var f = document.getElementById("file").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 2000000)
  {
   alert("Image File Size is very big");
  }
  else
  {
   form_data.append("file", document.getElementById('file').files[0]);
   $.ajax({
    url:"uploadpic.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(data)
    {
     $('#uploaded_image').html(data);
    }
   });
  }
  
  
 });
});
</script>




<?php

if ($_SESSION['email'] == TRUE) {
$user = $connection->query("SELECT * FROM users WHERE email = '$_SESSION[email]'");
$userdata = $user->fetch_array(MYSQLI_ASSOC);
}





if(isset($_POST["file"]) && !empty($_POST["file"])){
$inputImage = $_FILES["file"];
//pour les images

// Count total files
 $countfiles = count($_FILES['file']['name']);
// Looping all files
 for($i=0;$i<$countfiles;$i++){
$typemedia = "image";
$filename = $_FILES['file']['name'][$i];
$inpuTitre ="test";
            $inputExtImg = pathinfo($filename, PATHINFO_EXTENSION);
            $inputNewName = preg_replace('/[\W]/', '', $inputTitre);
            $inputNewName = strtolower($inputNewName);
            $nameImgActu = "img_" . $inpuTitre . "_" . $i . "." . $inputExtImg;
			
			$query = $connection->query("UPDATE users SET picture = '$nameImgActu' WHERE email = '$_SESSION[email]'");
			
  // Upload file
  move_uploaded_file($_FILES['file']['tmp_name'][$i],'img/avatars/'.$nameImgActu);
 
 }
 
 
	
	

}
?>



				<section class="page-header page-header-classic">
					<div class="container">
						<div class="row">
							<div class="col">
								<ul class="breadcrumb">
									<li><a href="#">Home</a></li>
									<li class="active">Pages</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col p-static">
								<h1 data-title-border>User Profile</h1>

							</div>
						</div>
					</div>
				</section>

				<div class="container py-2">

					<div class="row">
						<div class="col-lg-3 mt-4 mt-lg-0">


							<div class="d-flex justify-content-center mb-4">
								<div class="profile-image-outer-container">
									<div class="profile-image-inner-container bg-color-primary">
										<img src="img/avatars/avatar.jpg">
										<span class="profile-image-button bg-color-dark">
											<i class="fas fa-camera text-light"></i>
										</span>
									</div>
									
									<input type="file" name="file" id="file"  class="profile-image-input">
									
								</div>
							</div>

							<aside class="sidebar mt-2" id="sidebar">
								<ul class="nav nav-list flex-column mb-5">
									<li class="nav-item"><a class="nav-link text-dark active" href="#">Mon profil</a></li>
									<li class="nav-item"><a class="nav-link" href="#">Vos parametres</a></li>
								</ul>
							</aside>

						</div>
						<div class="col-lg-9">

							<div class="overflow-hidden mb-1">
								<h2 class="font-weight-normal text-7 mb-0"><strong class="font-weight-extra-bold">Mon</strong> Profil</h2>
							</div>
							<div class="overflow-hidden mb-4 pb-3">
								<p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>

							<form role="form" class="needs-validation">
							    <div class="form-group row">
							        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Prénom</label>
							        <div class="col-lg-9">
							            <input class="form-control" type="text" name="firstName" value="<?php echo $userdata['first_name']; ?>" required>
							        </div>
							    </div>
							    <div class="form-group row">
							        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Nom</label>
							        <div class="col-lg-9">
							            <input class="form-control" type="text" name="lastName" value="<?php echo $userdata['last_name']; ?>" required>
							        </div>
							    </div>
							    <div class="form-group row">
							        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Email</label>
							        <div class="col-lg-9">
							            <input class="form-control" type="email" name="email" value="<?php echo $userdata['email']; ?>" required>
							        </div>
							    </div>
							    <div class="form-group row">
							        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Telephone</label>
							        <div class="col-lg-9">
							            <input class="form-control" type="text" name="mobilenumber" value="<?php echo $userdata['mobilenumber']; ?>">
							        </div>
							    </div>
							    <div class="form-group row">
							        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2">Website</label>
							        <div class="col-lg-9">
							            <input class="form-control" type="url" name="website" value="">
							        </div>
							    </div>
							    <div class="form-group row">
							        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2"></label>
							        <div class="col-lg-6">
							            <input class="form-control" type="text" name="city" value="" placeholder="City">
							        </div>
							        <div class="col-lg-3">
							            <input class="form-control" type="text" name="state" value="" placeholder="State">
							        </div>
							    </div>

							    <div class="form-group row">
							        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Pseudo</label>
							        <div class="col-lg-9">
							            <input class="form-control" type="text" name="username" value="" required>
							        </div>
							    </div>
							    <div class="form-group row">
							        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Password</label>
							        <div class="col-lg-9">
							            <input class="form-control" type="password" name="password" value="" required>
							        </div>
							    </div>
							    <div class="form-group row">
							        <label class="col-lg-3 font-weight-bold text-dark col-form-label form-control-label text-2 required">Confirm password</label>
							        <div class="col-lg-9">
							            <input class="form-control" type="password" name="confirmPassword" value="" required>
							        </div>
							    </div>
							    <div class="form-group row">
									<div class="form-group col-lg-9">

									</div>
									<div class="form-group col-lg-3">
										<input type="submit" value="Save" class="btn btn-primary btn-modern float-right" data-loading-text="Loading...">
									</div>
							    </div>
							</form>

						</div>
					</div>

				</div>

		
