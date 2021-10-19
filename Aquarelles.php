<!DOCTYPE html>

<html>
    <head>
<!--	
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width" />
		<title>Le Monde de Alain dit &quot;Bibi&quot; | Aquarelle, Pétanque, Cuisine&#8230;&#8230;que du Bonheur</title>	
		<link rel="stylesheet" href="bootstrap/3.3.7/css/bootstrap-gallery.css">
		<link href="bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet" media="all" type="text/css">				
		<link rel="stylesheet"  href="MonTheme/styleperso.css" type="text/css" media="all" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="bootstrap/3.3.7/js/bootstrap-gallery.js"></script>
		<script src="script-onglets.js"></script>
-->		
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width" />
		<title>Le Monde de Alain dit &quot;Bibi&quot; | Aquarelle, Pétanque, Cuisine&#8230;&#8230;que du Bonheur</title>
		<!--<link rel='stylesheet' id='bouquet-css'  href='./themes/bouquet/style.css?ver=4.5.3' type='text/css' media='all' />-->
<!--		<link rel="stylesheet"  href="MonTheme/styleperso.css" type="text/css" media="all" /> -->
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap-gallery.css">	
		<link href="MonTheme/styleperso.css" rel="stylesheet" media="all" type="text/css">

		
		<link rel="stylesheet" href="monstyles.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="bootstrap/3.3.7/js/bootstrap-gallery.js"></script>
		<script src="script-onglets.js"></script>
		<script>
		$(document).ready(function() {
			$('a.custom-selector').bootstrapGallery();
		});
		</script>	
	</head>

	<div id="page" class"hfeed">
		<!-- Navigation -->
		<ul id="tab-nav">
			 <li><a href="#" data-tab="Paysage" class="tab-nav-active">Paysage</a></li>
			 <li><a href="#" data-tab="Marine">Marine</a></li>
			 <li><a href="#" data-tab="Divers">Divers</a></li>
			 <li><a href="#" data-tab="Asiatique">Asiatique</a></li>
		</ul>
	
		<!-- Contenu des onglets -->
		<div id="Paysage" class="tab tab-active">

			<div class="container">
				<div class="row">
				<?php
				$_SESSION['theme']="P";
				include("NewAquarelles.php");
				?>
				</div> 
			</div>
		</div>
		<div id="Marine" class="tab">
			 <div class="container">
				<div class="row">
				<?php				
				$_SESSION['theme']="M";
				include("NewAquarelles.php");
				?>
				</div>
			</div>
		</div>
		
		<div id="Divers" class="tab">
			<div class="container">
				<div class="row">
				<?php				
				$_SESSION['theme']="D";
				include("NewAquarelles.php");
				?>
				</div
				</div>
			</div>	
		</div>
		<div id="Asiatique" class="tab">
			<div class="container">
				<div class="row">
				<?php				
				$_SESSION['theme']="A";
				include("NewAquarelles.php");
				?>
				</div
				</div>
			</div>	
		</div>

</html>