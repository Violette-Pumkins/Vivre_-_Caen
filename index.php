<?php
	include('config/db.php');
	include('config/Database.class.php');
	$connection->set_charset('utf8');

	function fDate($d)
	{
		$y=substr($d, 0, 4);
		$m=substr($d, 5, 2);
		$c=substr($d, 8, 2);
		$date=$c."-".$m."-".$y;
		return $date;
	}

    function caractereValideUrl( $string, $charset='utf-8')
    {
        $string = html_entity_decode($string);
        $string = htmlentities($string, ENT_NOQUOTES, $charset);
        $string = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $string);
        $string = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $string);
        $string = preg_replace('#&[^;]+;#', '', $string);


        // $string= strtr($string,
        // "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ",
        // "aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn");
        // Mettez ici les caractères spéciaux qui seraient susceptibles d'apparaître dans les titres. La liste ci-dessous est indicative.
        $speciaux = array("?","!","@","#","%","&amp;","*","(",")","[","]","=","+"," ",";",":","'",".","_",",");
        $string = str_replace($speciaux, "-", $string); // Les caractères spéciaux dont les espaces, sont remplacés par un tiret.
        // $string = preg_replace('`[^a-z0-9-]+`', '-', $string);
        $string = preg_replace('`-{2,}`', '-', $string);
        $string = trim($string, '-');
        $string = strtolower(strip_tags($string));

        return $string;
    }
    
    

?>



<!DOCTYPE html>
<html>
	<head>

	<script data-ad-client="ca-pub-1618154492203516" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>Vivre à Caen</title>	

		<meta name="keywords" content="Vivre à Caen - Au coeur du Calvados" />
		<meta name="description" content="Vivre à Caen - Au coeur du Calvados">
		<meta name="author" content="Fabien Poulain">

		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400&display=swap" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">
		<link rel="stylesheet" href="vendor/animate/animate.compat.css">
		<link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.min.css">
		<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.min.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="css/theme.css">
		<link rel="stylesheet" href="css/theme-elements.css">
		<link rel="stylesheet" href="css/theme-blog.css">
		<link rel="stylesheet" href="css/theme-shop.css">


		<!-- Skin CSS -->
		<link rel="stylesheet" href="css/skins/default.css"> 

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="css/custom.css">

		<!-- Head Libs -->
		<script src="vendor/modernizr/modernizr.min.js"></script>

	</head>
	<body class="alternative-font-4 loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 500}">
		<div class="loading-overlay">
			<div class="bounce-loader">
				<div class="bounce1"></div>
				<div class="bounce2"></div>
				<div class="bounce3"></div>
			</div>
		</div>

		<div class="body">


<?php
	include_once "c/header.php";
?>

			<div role="main" class="main pt-3 mt-3">
				
<?php
	$o = isset($_GET['o']) ? $_GET['o'] : "default";
	switch ($o) {
		
	case "login":
	include('content/flogin.php');
	break;
	case "article":
	include('content/farticle.php');
	break;
	case "admin":
	include('content/fadmin.php');
	break;
	case "mag":
	include('content/fmag.php');
	break;
	case "profil":
	include('content/fprofil.php');
	break;
	case "contact":
	include('content/fcontact.php');
	break;
	case "rub":
	include('content/frub.php');
	break;
	case "annonceur":
	include('content/fannonceur.php');
	break;

	default:
	include('findex_copy.php');
	// include('content/findex.php');
	break;
	}
?>

				
				

				
			</div>

		
<?php
include_once "c/footer.php";
?>


		</div>

		<!-- Vendor -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/jquery.appear/jquery.appear.min.js"></script>
		<script src="vendor/jquery.easing/jquery.easing.min.js"></script>
		<script src="vendor/jquery.cookie/jquery.cookie.min.js"></script>
		<script src="vendor/popper/umd/popper.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/common/common.min.js"></script>
		<script src="vendor/jquery.validation/jquery.validate.min.js"></script>
		<script src="vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
		<script src="vendor/jquery.gmap/jquery.gmap.min.js"></script>
		<script src="vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
		<script src="vendor/isotope/jquery.isotope.min.js"></script>
		<script src="vendor/owl.carousel/owl.carousel.min.js"></script>
		<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="vendor/vide/jquery.vide.min.js"></script>
		<script src="vendor/vivus/vivus.min.js"></script>
		<!-- <script src="vendor/jquery.instagramfeed/jquery.instagramFeed.min.js"></script> -->

		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>

		<!-- Theme Custom -->
		<script src="js/custom.js"></script>


		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

		<!-- Examples -->
		<!-- <script src="js/examples/examples.instagramFeed.js"></script> -->

		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-12345678-1', 'auto');
			ga('send', 'pageview');
		</script>
		-->

	</body>
</html>
