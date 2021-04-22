<?php
include('config/db.php');

// Recupere l'ID
    $id = isset($_GET['id']) ? $_GET['id'] : '';

    // Detection de l'ID
    if (isset($id) && is_numeric($id)) {
    // mise à jour de la table
    $connection->query("UPDATE media SET nbvu = nbvu + 1 WHERE id_media = $id");
    // vas chercher l'url
    $q = $connection->query("SELECT * FROM media WHERE id_media = $id");
    $r = mysqli_fetch_array($q);
    // redirection vers la page d'origine
    header("Location: media/pdf/".$r["nom_media"]);
    }
?>