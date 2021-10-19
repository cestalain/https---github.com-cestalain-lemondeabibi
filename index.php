<?php
session_start(); // On démarre la session AVANT toute chose
?>
<!-- 
localhost/TestGalerieImage/index01.php?%20XDEBUG_SESSION_START%20=%20nom_session 
-->
<html lang="fr-FR">
	<?php include("header.php"); ?>
	<!--<body class="home page page-id-34 page-template-default siteorigin-panels siteorigin-panels-home">-->
	<body class="">
		<div id="page" class="hfeed">	
			<!-- #branding -->
			<?php include("menus.php"); ?>
			<?php include("accueil.php"); ?>
			<!-- Le pied de page -->
 			<?php include("pied_de_page.php"); ?>
		</div>
			<script type='text/javascript' src='./themes/bouquet/js/navigation.js?ver=20120206'></script>
			
	</body>
</html>
<!--

-->