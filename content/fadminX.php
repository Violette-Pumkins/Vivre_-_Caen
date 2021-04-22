

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

//$auteur = $_SESSION['firstname'];

// ajout article
if(isset($_POST["AddArticle"]) && !empty($_POST["AddArticle"])){
	

//if($_POST) {
	

$titre = fPost((!isset($_POST['titre']))?(''):($_POST['titre']));
$texte = fPost((!isset($_POST['texte']))?(''):($_POST['texte']));

//$query = $db->query("SELECT * FROM produit WHERE id = '$reference' ");
//$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
//$titre = $row['titre'];
//$referenceno = $row['reference'];
//$query2 = $db->query("SELECT * FROM ligne WHERE id = '$ligne' ");
//$row2=mysqli_fetch_array($query2,MYSQLI_ASSOC);
//$ligneNOM = $row2['nom'];
//$date2 = fDate2($date); 
   
$query = $connection->query("INSERT INTO article SET titre = '$titre',texte = '$texte'");


}




// Modification article
if(isset($_POST["actionX"]) && !empty($_POST["actionX"])){
$publication = date('Y/m/d H:i:s');
$titre = fPost((!isset($_POST['titre']))?(''):($_POST['titre']));
$texte = fPost((!isset($_POST['texte']))?(''):($_POST['texte']));
$sujet = fPost((!isset($_POST['sujet']))?(''):($_POST['sujet']));
$categorie = fPost((!isset($_POST['categorie']))?(''):($_POST['categorie']));

//$query = $db->query("SELECT * FROM produit WHERE id = '$reference' ");
//$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
//$titre = $row['titre'];
//$referenceno = $row['reference'];
//$query2 = $db->query("SELECT * FROM ligne WHERE id = '$ligne' ");
//$row2=mysqli_fetch_array($query2,MYSQLI_ASSOC);
//$ligneNOM = $row2['nom'];
//$date2 = fDate2($date); 
   
$query = $connection->query("UPDATE article SET auteur = '$auteur', titre = '$titre',date = '$date',texte = '$texte', sujet = '$sujet', categorie = '$categorie'");

?>
<div class="contact-form-success alert alert-success d-none mt-4">
<strong>C'est parfait!</strong> Article edité
</div>
<?php

}





?>

<div id="examples" class="container py-2">
<div class="row">
<?php echo $_SESSION['firstname']; ?>
<div class="col-lg-3 order-2 order-lg-1">
<aside class="sidebar mt-2 mb-5"> 
<h5 class="font-weight-semi-bold">Ajout ...</h5>
 <ul class="nav nav-list flex-column"> 
 <li class="nav-item"> <a class="nav-link active" href="?o=admin&add=1" >D'article</a> </li>
 <li class="nav-item"> <a class="nav-link" href="#formsStyleWithoutBorders" data-toggle="tab" data-hash data-hash-offset="120" data-hash-delay="500">de tag</a> </li>
 <li class="nav-item"> <a class="nav-link" href="#formsStyleColors" data-toggle="tab" data-hash data-hash-offset="120" data-hash-delay="500">Utilisateurs</a> </li> 
 </ul> </aside>

 <aside class="sidebar mt-2 mb-5">
 <h5 class="font-weight-semi-bold">Modifications</h5>
 <ul class="nav nav-list flex-column"> 
 <li class="nav-item"> <a class="nav-link" href="#formsExamplesFormControl" data-toggle="tab" data-hash data-hash-offset="120" data-hash-delay="500">D'article</a> </li> 
 <li class="nav-item"> <a class="nav-link" href="#formsExamplesSelect" data-toggle="tab" data-hash data-hash-offset="120" data-hash-delay="500">de tag</a> </li> 
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
<form class="contact-form form-style-3" method="post">

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
<select class="form-control bg-color-primary h-auto" data-msg-required="Selectionner la catégorie principale de l'article" name="categorie" required>
<option value="">Choisir...</option>
<option value="1">Bon plan</option>
<option value="2">Conseil</option>
<option value="3">Découverte</option>
<option value="3">idée sortie</option>
<option value="3">idée sortie</option>
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
<textarea maxlength="5000" data-msg-required="Rédiger l'article ici" rows="8" class="form-control bg-color-primary text-3 h-auto py-2" name="texte" required></textarea>
</div>
</div>
<div class="form-row">
<div class="form-group col">
<input type="submit" name="AddArticle"  id="AddArticle" value="Envoyez l'article" class="btn bg-color-primary btn-primary" data-loading-text="Loading...">
</div>
</div>

<input type="hidden" name="auteur">


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
<?php





$query2 = $connection->query("SELECT * FROM article WHERE id = '$ligne' ");
$ModifArticle=mysqli_fetch_array($query2,MYSQLI_ASSOC);

?>



<div id="examples" class="container py-2">
<div class="row">

<div class="col-lg-3 order-2 order-lg-1">
<aside class="sidebar mt-2 mb-5"> 
<h5 class="font-weight-semi-bold">Edition ...</h5>
 <ul class="nav nav-list flex-column"> 
 <li class="nav-item"> <a class="nav-link active" href="#formsStyleDefault" data-toggle="tab" data-hash data-hash-offset="120" data-hash-delay="500">D'article</a> </li>
 <li class="nav-item"> <a class="nav-link" href="#formsStyleWithoutBorders" data-toggle="tab" data-hash data-hash-offset="120" data-hash-delay="500">de tag</a> </li>
 <li class="nav-item"> <a class="nav-link" href="#formsStyleColors" data-toggle="tab" data-hash data-hash-offset="120" data-hash-delay="500">Utilisateurs</a> </li> 
 </ul> </aside>

 <aside class="sidebar mt-2 mb-5">
 <h5 class="font-weight-semi-bold">Modifications</h5>
 <ul class="nav nav-list flex-column"> 
 <li class="nav-item"> <a class="nav-link" href="#formsExamplesFormControl" data-toggle="tab" data-hash data-hash-offset="120" data-hash-delay="500">D'article</a> </li> 
 <li class="nav-item"> <a class="nav-link" href="#formsExamplesSelect" data-toggle="tab" data-hash data-hash-offset="120" data-hash-delay="500">de tag</a> </li> 
 </ul>  </aside>


 <aside class="sidebar mt-2"> 
 <h5 class="font-weight-semi-bold">vide</h5> 
 <ul class="nav nav-list flex-column">
 <li class="nav-item"><a class="nav-link" href="#">vide</a></li> 
 </ul> </aside>
</div>


<div class="col-lg-9 order-1 order-lg-2">


<div class="tab-pane tab-pane-navigation" id="formsStyleWithoutBorders">
<h4 class="mb-3">Modifier l'article</h4>
<div class="card bg-color-light-scale-1 mb-4">
<div class="card-body">
<div class="row">
<div class="col">
<form class="contact-form form-style-2" method="POST">
<div class="contact-form-success alert alert-success d-none mt-4">
<strong>C'est parfait!</strong> Article ajouté
</div>
<div class="contact-form-error alert alert-danger d-none mt-4">
<strong>Erreur</strong> Une erreur est survenue
<span class="mail-error-message text-1 d-block"></span>
</div>
<div class="form-row">
<div class="form-group col">
<label>Catégorie</label>
<div class="custom-select-1">
<select class="form-control h-auto" data-msg-required="Selectionner la catégorie principale de l'article" name="categorie" required>
<option value="">Choisir...</option>
<option value="1">Bon plan</option>
<option value="2">Conseil</option>
<option value="3">Découverte</option>
<option value="3">idée sortie</option>
<option value="3">idée sortie</option>
</select>
</div>
</div>
</div>
<div class="form-row">
<div class="form-group col">
<label class="mb-1 text-2">Titre de l'article</label>
<input type="text" value="<?php echo $ModifArticle['texte'];?>" data-msg-required="Merci de noter le titre de l'article" maxlength="100" class="form-control text-3 h-auto py-2" name="titre" required>
</div>
</div>
<div class="form-row">
<div class="form-group col">
<label class="mb-1 text-2">texte de l'article</label>
<textarea maxlength="5000" value="<?php echo $ModifArticle['texte'];?>" data-msg-required="Rédiger l'article ici" rows="8" class="form-control text-3 h-auto py-2" name="texte" required></textarea>
</div>
</div>
<div class="form-row">
<div class="form-group col">
<input type="submit" value="Modifier l'article" class="btn btn-primary" data-loading-text="Loading...">
</div>
</div>

<input type="hidden" name="auteur">


</form>
</div>
</div>
</div>
</div>
</div>


</div>
</div>
</div>

