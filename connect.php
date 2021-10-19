<!-- localhost/TestGalerieImage/connect.php?%20XDEBUG_SESSION_START%20=%20nom_session -->
<html lang="fr-FR">
<?php include("header.php"); ?>

<body class="home page">
	<?php include("menus.php"); ?>
	<?php
	$test = $_GET['page'];
	if (($test > 0) and ($test < 8)) {
		switch ($test) {
			case 1:
				include("accueil.php");
				break;
			case 2:
				include("Aquarelles.php");
				break;
			case 3:
				include("Diaporama.php");
				break;
			case 4:
				include("mesclubs.php");
				break;
			case 5:
				include("Auvergne.php");
				break;
			case 6:
				include("Contact.php");
				break;
			case 7:
				include("Petanque.php");
				break;
		}
		include("pied_de_page.php");
	} else {
		include("accueil.php");
	}
	?>
	</div>

</body>

</html>