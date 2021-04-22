  <script src="https://cdn.tiny.cloud/1/ckltc57i9gql9dclh8oe1vxxcp3dk8tilz79d6pcy603swvq/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


    <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
  </script>


<?php

function fPost($a) {
	$a=htmlentities($a);
	$a=strtolower($a);
	$a=trim($a);
	$a=ucfirst($a);
	$a=addslashes($a);
	return $a;
}

function fDate2($d) {
	$y=substr($d,0,4);
	$m=substr($d,5,2);
	$c=substr($d,8,2);
		$h=substr($d,11,2);
			$i=substr($d,14,2);
				$s=substr($d,17,2);
	
	$date=$c."-".$m."-".$y." at ".$h.":".$i.":".$s;
	return $date;
}


                    //$id            = $row['id'];
                    //$firstname     = $row['firstname'];
                   // $lastname      = $row['lastname'];
                   // $email         = $row['email'];
                    //$mobilenumber   = $row['mobilenumber'];
                    //$pass_word     = $row['password'];
                    //$token         = $row['token'];
                    //$is_active     = $row['is_active'];
					

//id
//titre
//texte
//auteur
//publication
//valide
	

// ajout article
if(isset($_POST["AddArticle"]) && !empty($_POST["AddArticle"])){
$titre = fPost((!isset($_POST['titre']))?(''):($_POST['titre']));
$texte = fPost((!isset($_POST['mytextarea']))?(''):($_POST['mytextarea']));
$auteur = $_SESSION['firstname'];
$date = date('Y/m/d H:i:s');
$valide = fPost((!isset($_POST['valide']))?(''):($_POST['valide']));
$categorie = fPost((!isset($_POST['categorie']))?(''):($_POST['categorie']));
$inputMedia = $_POST["mediaActualite"];
$inputImage = $_FILES["images"];
$inputVideo = $_FILES["videos"];
$inputPdf = $_FILES["fichiers"];

//$query = $db->query("SELECT * FROM produit WHERE id = '$reference' ");
//$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
//$titre = $row['titre'];
//$referenceno = $row['reference'];
//$query2 = $db->query("SELECT * FROM ligne WHERE id = '$ligne' ");
//$row2=mysqli_fetch_array($query2,MYSQLI_ASSOC);
//$ligneNOM = $row2['nom'];
//$date2 = fDate2($date); 
   
   
   
// if (strlen($inputMedia) == 0) {
    // $inputMedia = null;
// } else {

    // $lien = $inputMedia;
    // $mediaYoutube = explode(";", $lien, -1);
    // $inputMedia = "";
    // for ($i = 0; $i < sizeof($mediaYoutube); $i++) {
        // /*pour gerer les cas de youtube*/
        // if (strpos($mediaYoutube[$i], ".be/")) {
            // $inputMedia .= str_replace(".be/", "be.com/embed/", $mediaYoutube[$i]);
        // } else if (strpos($mediaYoutube[$i], "watch?v=")) {
            // $inputMedia .= str_replace("/watch?v=", "/embed/", $mediaYoutube[$i]);
        // } else if (strpos($mediaYoutube[$i], "embed")) {
            // $inputMedia .= str_replace("?controls=0", "", $mediaYoutube[$i]);
        // } /*pour gerer le cas de vimeo*/
        // else if (strpos($mediaYoutube[$i], "vimeo")) {
            // $inputMedia .= str_replace("vimeo.com/", "player.vimeo.com/video/", $mediaYoutube[$i]);
        // } /*pour gerer les cas de dailymotion*/
        // else if (strpos($mediaYoutube[$i], "/video/")) {
            // $inputMedia .= str_replace("/video/", "/embed/video/", $mediaYoutube[$i]);
        // } else if (strpos($mediaYoutube[$i], ".ly/")) {
            // $inputMedia .= str_replace("dai.ly/", "www.dailymotion.com/embed/video/", $mediaYoutube[$i]);
        // } else {
            // $inputMedia .= $inputMedia;
        // }
        // $inputMedia .= ";";
    // }
//}


$query = $connection->query("INSERT INTO article SET titre = '$titre',texte = '$texte',auteur = '$auteur',valide = '$valide',publication = '$date', media_article = '$inputMedia', categorie = '$categorie'");



    //Récupérer id new actu
$reqIdNewActu = $connection->query("SELECT id FROM article ORDER BY id DESC LIMIT 1");
$idActu = $reqIdNewActu->fetch_array(MYSQLI_ASSOC);


    //pour les images

 // Count total files
 $countfiles = count($_FILES['images']['name']);
 // Looping all files
 for($i=0;$i<$countfiles;$i++){
$typemedia = "image";
$filename = $_FILES['images']['name'][$i];
$inpuTitre ="test";
            $inputExtImg = pathinfo($filename, PATHINFO_EXTENSION);
            $inputNewName = preg_replace('/[\W]/', '', $inputTitre);
            $inputNewName = strtolower($inputNewName);
            $nameImgActu = "img_" . $inputNewName . "_" .$idActu["id"]. "_" . $i . "." . $inputExtImg;
			
			            //Insertion les donnees en bdd			
			$query = $connection->query("INSERT INTO media SET type_media = '$typemedia', nom_media = '$nameImgActu', id_article = '$idActu[id]'");
					
			//Récupérer id new image
            $reqIdNewMedia = $connection->query("SELECT id_media FROM media ORDER BY id_media DESC LIMIT 1");
            $idMedia = $reqIdNewMedia->fetch_array(MYSQLI_ASSOC);

			$query = $connection->query("INSERT INTO article_media SET id_article = '$idActu[id]', id_media = '$idMedia[id_media]'");
			
  // Upload file
  move_uploaded_file($_FILES['images']['tmp_name'][$i],'media/images/'.$nameImgActu);
 
 }
 
 


	
	
	
	 //pour les videos
    if (strlen($inputVideo['name'][0]) != 0) {
        for ($i = 0; $i < count($inputVideo['name']); $i++) {
            $typemedia = "video";

            // On récupère le nom du fichier importé
            $path = $inputVideo['name'][$i];
            // On récupère l'extension du fichier importé
            $inputExtImg = pathinfo($path, PATHINFO_EXTENSION);


            $inputNewName = preg_replace('/[\W]/', '', $inputTitre);
            $inputNewName = strtolower($inputNewName);
            $nameVideoActu = "video_" . $inputNewName . "_" .$idActu["id_article"]. "_" . $i . "." . $inputExtImg;

            //Insertion les donnees en bdd
			$query = $connection->query("INSERT INTO media SET type_media = '$typemedia',nom_media = '$nameVideoActu'");

            //Récupérer id new video
            $reqIdNewMedia = $connection->query("SELECT id FROM media ORDER BY id DESC LIMIT 1");
            $idMedia = $reqIdNewMedia->fetch_array(MYSQLI_ASSOC);
			
			$query = $connection->query("INSERT INTO article_media SET id_article = '$idActu[id_actualite]',id_media = '$idMedia[id_media]'");

            //On bouge le fichier importé vers le dossier indiqué
            move_uploaded_file($inputVideo['tmp_name'][$i], "../media/articles/videos/" . $nameVideoActu);
        }
    }
	
	
	
	
	
	
	//pour les pdf
 // Count total files
 $countfiles = count($_FILES['fichiers']['name']);
 // Looping all files
 for($i=0;$i<$countfiles;$i++){
	 
           $typemedia = "pdf";
$filename = $_FILES['fichiers']['name'][$i];
$inpuTitre ="test";
            $inputExtImg = pathinfo($filename, PATHINFO_EXTENSION);
			
            $inputNewName = preg_replace('/[\W]/', '', $inputTitre);
            $inputNewName = strtolower($inputNewName);
            $namePdfActu = "pdf_" . $inputNewName . "_" .$idActu["id"]. "_" . $i . "." . $inputExtImg;

			            //Insertion les donnees en bdd			
			$query = $connection->query("INSERT INTO media SET type_media = '$typemedia', nom_media = '$namePdfActu'");
			
			//Récupérer id new image
            $reqIdNewMedia = $connection->query("SELECT id_media FROM media ORDER BY id_media DESC LIMIT 1");
            $idMedia = $reqIdNewMedia->fetch_array(MYSQLI_ASSOC);

			$query = $connection->query("INSERT INTO article_media SET id_article = '$idActu[id]', id_media = '$idMedia[id_media]'");

            //On bouge le fichier importé vers le dossier indiqué
  move_uploaded_file($_FILES['fichiers']['tmp_name'][$i],'media/pdf/'.$namePdfActu);
     
	 }
	 
	 
    }
	
	





// Modification article
if(isset($_POST["updatearticle"]) && !empty($_POST["updatearticle"])){
$titre = fPost((!isset($_POST['titre']))?(''):($_POST['titre']));
$texte = fPost((!isset($_POST['texte']))?(''):($_POST['texte']));
$categorie = fPost((!isset($_POST['categorie']))?(''):($_POST['categorie']));
$valide = fPost((!isset($_POST['valide']))?(''):($_POST['valide']));
$maj = date('Y/m/d H:i:s');
$query = $connection->query("UPDATE article SET titre = '$titre',texte = '$texte',valide = '$valide',categorie = '$categorie',maj = '$maj' WHERE id =  $_GET[update] ");

}
?>

<div id="examples" class="container py-2">
<div class="row">
<div class="col-lg-3 order-2 order-lg-1">
<aside class="sidebar mt-2 mb-5"> 
<h5 class="font-weight-semi-bold">Ajout ...</h5>
 <ul class="nav nav-list flex-column"> 
 <li class="nav-item"> <a class="nav-link active" href="?o=admin&add=1" >D'article</a> </li>
 </ul> </aside>

 <aside class="sidebar mt-2 mb-5">
 <h5 class="font-weight-semi-bold">Modification</h5>
 <ul class="nav nav-list flex-column"> 
 <li class="nav-item"> <a class="nav-link" href="?o=admin&update=1">D'article</a> </li> 
 </ul>  </aside>


 <aside class="sidebar mt-2"> 
 <h5 class="font-weight-semi-bold">vide</h5> 
 <ul class="nav nav-list flex-column">
 <li class="nav-item"><a class="nav-link" href="#">vide</a></li> 
 </ul> </aside>
</div>





<?php
if ($_GET['add'] == TRUE) {
	
?>
<div class="col-lg-9 order-1 order-lg-2">
<h4 class="mb-3">Ajouter un article</h4>
<div class="card bg-color-light-scale-1 mb-4">
<div class="card-body">
<div class="row">
<div class="col">
<form enctype="multipart/form-data" class="contact-form form-style-3" method="post">

<?php
if(isset($_POST["AddArticle"]) && !empty($_POST["AddArticle"])){

?>
<div class="alert alert-success">
<strong>Bien joué</strong> Article ajouté.
</div>

<?php
} 
?>
	
<div class="contact-form-error alert alert-danger d-none mt-4">
<strong>Erreur</strong> Une erreur est survenue
<span class="mail-error-message text-1 d-block"></span>
</div>
<div class="form-row">
<div class="form-group col">
<label>Catégorie</label>
<div class="custom-select-1">
<select class="form-control bg-color-primary h-auto" data-msg-required="Selectionner la catégorie l'article" name="categorie" required>
<option value="">Choisir...</option>

<?php
 //Get all country data
$query = $connection->query("SELECT * FROM categorie");

//Count total number of rows
//$rowCount = $query->num_rows;

    //if($rowCount > 0){
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['id'].'">'.$row['categorie'].'</option>';
        }

?>

</select>
</div>
</div>
</div>
<div class="form-row">
<div class="form-group col">
<label class="mb-1 text-2">Titre de l'article</label>
<input type="text" value="" data-msg-required="Merci de noter le titre de l'article" maxlength="100" class="form-control bg-color-primary text-3 h-auto py-2" name="titre" required>
</div>
</div>
<div class="form-row">
<div class="form-group col">
<label class="mb-1 text-2">texte de l'article</label>

<textarea id="mytextarea" name="mytextarea" data-msg-required="Rédiger l'article ici" rows="8" class="form-control bg-color-primary text-3 h-auto py-2" ></textarea>
</div>
</div>

<div class="form-row">
<div class="form-group col">
<label>Statut</label>
<div class="custom-select-1">
<select class="form-control bg-color-primary h-auto" data-msg-required="Statut de l'article" name="valide" required>
<option value="">Choisir...</option>
<option value="1">Publié</option>
<option value="2">En attente de publication</option>
</select>
</div>
</div>
</div>



<div class="form-row"><div class="form-group col">
                    <label>Lien media de l'actualité (youtube, dailymotion, vimeo)</label>
                    <input type="text" class="form-control" name="mediaActualite" placeholder="Lien media de l'actualité (mettre lien1; ou lien1;lien2;...)">
                </div></div>
<div class="form-row"><div class="form-group col">
                    <label>Images* ** (si possible du 1900*1146)</label>
                    <input type="file" class="form-control" id="images" name="images[]" accept="image/*" multiple required>
                </div></div>
<div class="form-row"><div class="form-group col">
                    <label>Videos **</label>
                    <input type="file" class="form-control" id="videos" name="videos[]" accept="video/*" multiple>
                </div></div>
<div class="form-row"><div class="form-group col">
                    <label>PDF **</label>
                    <input multiple type="file" accept="application/pdf" class="form-control" id="pdf" name="fichiers[]">
                </div></div>
				
				

<div class="form-row">
<div class="form-group col">
<input type="submit" name="AddArticle"  id="AddArticle" value="Envoyez l'article" class="btn bg-color-primary btn-primary" data-loading-text="Loading...">
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<?php
}





if ($_GET['update'] == TRUE) {
//$query2 = $connection->query("SELECT * FROM article WHERE id = $_GET[update] ");
//$update=mysqli_fetch_array($query2,MYSQLI_ASSOC);

//$query = "SELECT * FROM article WHERE id = '8'";
//$update2 = mysqli_query($connection,$query) or die(mysql_error());
//$update=mysqli_fetch_array($update2,MYSQLI_ASSOC);

$query = "SELECT * FROM article WHERE id = $_GET[update]";
$result = $connection->query($query);
/* Tableau associatif */
$articledata = $result->fetch_array(MYSQLI_ASSOC);





?>
<div class="col-lg-9 order-1 order-lg-2">
<h4 class="mb-3">Modifier un article</h4>
<div class="card bg-color-light-scale-1 mb-4">
<div class="card-body">
<div class="row">
<div class="col">
<form class="contact-form form-style-3" method="post">
<?php
if(isset($_POST["updatearticle"]) && !empty($_POST["updatearticle"])){
?>
<div class="alert alert-success">
<strong>Bien joué</strong> Article modifié.
</div>
<?php
}
?>


<div class="contact-form-error alert alert-danger d-none mt-4">
<strong>Erreur</strong> Une erreur est survenue
<span class="mail-error-message text-1 d-block"></span>
</div>
<div class="form-row">
<div class="form-group col">
<label>Catégorie</label>
<div class="custom-select-1">
<select class="form-control bg-color-primary h-auto" data-msg-required="Selectionner la catégorie principale de l'article" name="categorie" required>
<option value="">Choisir...</option>

<?php
 //Get all country data
$query = $connection->query("SELECT * FROM categorie");

//Count total number of rows
//$rowCount = $query->num_rows;


    //if($rowCount > 0){
        while($row = $query->fetch_assoc()){ 
		
				if($articledata['categorie'] == $row['id'])
			{
			$select = 'selected';
			}

            echo '<option '.$select.' value="'.$row['id'].'">'.$row['categorie'].'</option>';
			$select = '';
        }

?>
</select>
</div>
</div>
</div>
<div class="form-row">
<div class="form-group col">
<label class="mb-1 text-2">Titre de l'article</label>
<input type="text" value="<?php echo $articledata['titre'];?>" maxlength="100" class="form-control bg-color-primary text-3 h-auto py-2" name="titre" required>
</div>
</div>
<div class="form-row">
<div class="form-group col">
<label class="mb-1 text-2">texte de l'article</label>
<textarea maxlength="5000" data-msg-required="Rédiger l'article ici" rows="8" class="form-control bg-color-primary text-3 h-auto py-2" name="texte" required>xxx<?php echo $articledata['texte'];?></textarea>
</div>
</div>

<div class="form-row">
<div class="form-group col">
<label>Statut</label>
<div class="custom-select-1">
<select class="form-control bg-color-primary bg-color-primary h-auto" data-msg-required="Statut de l'article" name="valide" required>
<option value="">Choisir...</option>
<option <?php if ('1' == $articledata['valide']){echo "selected";} ?> value="1">Publié</option>
<option <?php if ('2' == $articledata['valide']){echo "selected";} ?> value="2">En attente de publication</option>
</select>
</div>
</div>
</div>


<div class="form-row">
<div class="form-group col">
<input type="submit" name="updatearticle"  id="updatearticle" value="modifier l'article" class="btn bg-color-primary btn-primary" data-loading-text="Loading...">
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<?php
}
?>





</div>
</div>

