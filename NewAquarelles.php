<!-- 
localhost/Galerie/NewAquarelles.php?%20XDEBUG_SESSION_START%20=%20nom_session 
-->
<?php
				//$liste=array();
/* CONFIGURATION (valeurs a personnaliser) */
// Chemin d'acces du dossier des images originales et des miniatures
$originalesPath = dirname(__FILE__).'/'; // Images originales
$originalesUrl = rtrim(dirname($_SERVER['PHP_SELF']), '/\\')."/"; // Images originales


$miniaturesPath = $originalesPath.'Images/'; // Miniatures
$miniaturesUrl = $originalesUrl.'Images/'; // Miniatures
// Liste d'extensions autorisees (ajouter celles de votre choix)
$extensions = array('jpg','jpeg','png','gif');
// Nombre d'images par ligne pour les images originales et les miniatures
$nbrOrigLigne = 1; // Images originales
$nbrMiniLigne = 24; // Miniatures
// Liens JavaScript sur les miniatures pour afficher les images originales
$jsOk = 1; // 1 = oui ; 0 (zero) = non.
// Tri par ordre decroissant
$triOk = 1; // 1 = oui ; 0 (zero) = non.
// Affichage des liens "Miniatures" et "Originales"
$lienOrigOk = 0; // 1 = oui ; 0 (zero) = non.
$lienMiniOk = 0; // 1 = oui ; 0 (zero) = non.
// On affiche du titre avec le nom de la galerie
$titreOk = 1; // 1 = oui ; 0 (zero) = non.

/* EXECUTION (ne modifier qu'au besoin) */
$repertoiresPath = array($originalesPath, $miniaturesPath);
$repertoiresUrl = array($originalesUrl, $miniaturesUrl);
$galerie = basename($originalesUrl);
// Si le dossier des '$miniatures' existe, alors on affiche les miniatures, 
// sinon on affiche les images originales
if (is_dir($miniaturesPath)) { $source = 1; } else { list($source, $lienMiniOk) = array(0, 0); } 
// Si varialge "mode" presente dans l'Url, alors on adapte le fonctionnement
if (isset($_GET['mode'])) { 
	list($lienOrig, $lienMini) = array('orig_d', 'mini_c'); 
	if ($_GET['mode'] == 'orig_c') { list($source, $triOk, $lienOrig) = array(0, 0, 'orig_d'); }
	if ($_GET['mode'] == 'orig_d') { list($source, $triOk, $lienOrig) = array(0, 1, 'orig_c'); }
	if ($_GET['mode'] == 'mini_c') { list($source, $triOk, $lienMini) = array(1, 0, 'mini_d'); }
	if ($_GET['mode'] == 'mini_d') { list($source, $triOk, $lienMini) = array(1, 1, 'mini_c'); }
} else {
	list($lienOrig, $lienMini) = array('orig_d', 'mini_c'); 
}
// Nombre d'images a afficher par ligne, a personnaliser
if ($source) { $nombre = $nbrMiniLigne; } else { $nombre = $nbrOrigLigne; } 
$liste = array(); // Tableau pour la liste d'images a afficher
$table = array(); // Tableau pour le code Html a publier

//$theme = "P";
//$_SESSION['theme']="M";
if ($_SESSION['theme']) {
	$OK=true; 
			
switch ($_SESSION['theme']) {
    case "M":
        $miniaturesPath = $originalesPath.'Images/marine/';
		$miniaturesUrl = $originalesUrl.'Images/marine/';
		$repertoiresPath = array($originalesPath, $miniaturesPath);
		$repertoiresUrl = array($originalesUrl, $miniaturesUrl);
		$img = glob("./Images/marine/*.jpg");
        break;
    case "P":
		$miniaturesPath = $originalesPath.'Images/paysage/';
		$miniaturesUrl = $originalesUrl.'Images/paysage/';
		$repertoiresPath = array($originalesPath, $miniaturesPath);
		$repertoiresUrl = array($originalesUrl, $miniaturesUrl);
        $img =glob("./Images/paysage/*.jpg");
        break;
    case "D":
		$miniaturesPath = $originalesPath.'Images/divers/';
		$miniaturesUrl = $originalesUrl.'Images/divers/';
		$repertoiresPath = array($originalesPath, $miniaturesPath);
		$repertoiresUrl = array($originalesUrl, $miniaturesUrl);
        $img =glob("./Images/divers/*.jpg");
        break;
		 case "A":
		$miniaturesPath = $originalesPath.'Images/chinoiseries/';
		$miniaturesUrl = $originalesUrl.'Images/chinoiseries/';
		$repertoiresPath = array($originalesPath, $miniaturesPath);
		$repertoiresUrl = array($originalesUrl, $miniaturesUrl);
        $img =glob("./Images/chinoiseries/*.jpg");
        break;
}
$fic=array();
foreach ($img as $value) {
// decoupage de la chaine	
	$test = explode("/",$value);
// Recupère non du fichier 	
	$fic[] = $test[3];}
	$liste=$fic;


// On debute le travail avec le contenu du repertoire (ouverture)
if ($dossier = opendir($repertoiresPath[$source])) { 
		
	// On recupere le nom de chaque image presente dans le repertoire
 	/*while (($item = readdir($dossier)) !== false) { 
		if ($item[0] == '.') { continue; } 
		//if (!in_array(end(explode('.', $item)), $extensions)) { continue; } 
		$liste[] = $item; 
	} 
	closedir($dossier); // On fini de travailler avec le reperoire (fermeture)
	*/

	
	if ($triOk) { rsort($liste); } // On tri la liste d'images par ordre decroissant
	// On construit le tableau Html pour l'affichage
	$table[] = '<table align="center" cellspacing="10"><tr>'; 
	// On affiche les images selon l'existence des miniatures
	if ($source) {
		for ($i = 0; $i < count($liste); $i++) {
			$imageMiniUrl = $repertoiresUrl[$source].$liste[$i]; // Chemin de l'image miniature
			$imageOrigPath= dirname($repertoiresPath[$source]).'/'.$liste[$i]; // Chemin de l'image originale
			$imageOrigUrl = dirname($repertoiresUrl[$source]).'/'.$liste[$i]; // Chemin de l'image originale
			// Si l'image originale existe, alors on contruit le lien, sinon on affiche juste la miniature
			if (file_exists($imageOrigPath)) { 
				$image = '<td class = "lolo"><a href="'.$imageOrigUrl.'" title="'.$liste[$i].'" target="_blank"';
				if ($jsOk) {
					list($largeur, $heuteur) = getimagesize($imageOrigPath); 
					$image .= ' onClick="imgPop(this.href,'.$largeur.','.$heuteur.',this.title); return false;"';
				}
				$image .= '><img src="'.$imageMiniUrl.'" alt="'.$liste[$i].'" /></a></td>';
			} else {
				$image = '<td class = "lolo"><img src="'.$imageMiniUrl.'" alt="'.$liste[$i].'" title="'.$liste[$i].'" /></td>';
			}
			// Si le numero d'image a ajouter est multiple du nombre 
			// d'images par ligne, alors on ajoute une nouvelle rangee
			if ((($i + 1) % $nombre) == 0) { $image .= "\n".'</tr><tr>'; }
			$table[] = $image;
		}
	} else {
		for ($i = 0; $i < count($liste); $i++) {
			$image = '<td><img src="'.$repertoiresUrl[$source].$liste[$i].'" alt="'.$liste[$i].'" title="'.$liste[$i].'" /></td>';
			// Si le numero d'image a ajouter est multiple du nombre 
			// d'images par ligne, alors on ajoute une nouvelle rangee
			if ((($i + 1) % $nombre) == 0) { $image .= "\n".'</tr><tr>'; }
			$table[] = $image;
		}
	}
	$table[] = '</tr></table>'; 
} 
} else { 
	$OK=false; 
	} 	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Galerie - <?php echo $galerie; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="author" content="FredoMkb - http://fredomkb.free.fr/">
<style type="text/css">
<!--
a, a:link, a:hover, a:active, a:visited { border: none; outline: none; text-decoration: none; }
body { background-color: #eeeeee; }
div { width: 100%; overflow: auto; }
h2 { text-align: center; color: #fff; background-color: #999; padding: 4px 6px; margin: 8px; }
p { text-align: center; }
table { text-align: center; }
table td { padding: 10px; background-color: #ffffff; }
img { border: none; }
-->
</style>
<script type='text/javascript'><!--
// <![CDATA[
// Fonction pour afficher les images dans une fenetre popup centree
function imgPop(theImage, theWidth, theHeight, theTitle) {
	// Dimensions de la nouvelle fenetre popup
	var theWidthWin = theWidth + 20; var theHeightWin = theHeight + 20;
	// Dimensions de l'ecran
	var theWidthScreen = screen.width; var theHeightScreen = screen.height;
	// Position de la nouvelle fenetre popup
	var leftPosition = (theWidthScreen - theWidthWin) / 2; var topPosition = (theHeightScreen - theHeightWin) / 2;
	// Correction des valeurs selon les dimensions de l'ecran
	if(theWidthWin > theWidthScreen) { theWidthWin = theWidthScreen; theHeightWin = theHeightWin + 15; leftPosition = 0; }
	if(theHeightWin > theHeightScreen) { theHeightWin = theHeightScreen; theWidthWin = theWidthWin + 15; topPosition = 0; }
	// Construction du contenu de la nouvelle fenetre popup
	var theCode = '<!DOCTYPE HTML PUBLIC "-\/\/W3C\/\/DTD HTML 4.01 TRANSITIONAL\/\/EN">'+"\n";
	theCode = theCode+'<html><head><title>'+theTitle+'<\/title>'+"\n";
	theCode = theCode+'<style type="text\/css"><'+'!--'+"\n";
	theCode = theCode+'* { text-decoration: none; outline: none; }'+"\n";
	theCode = theCode+'body { background-color:#ffffff; }'+"\n";
	theCode = theCode+'div.img { background-image:url('+theImage+'); margin:auto; width:'+theWidth+'px; height:'+theHeight+'px; border:1px solid gray; overflow:hidden; }'+"\n";
	theCode = theCode+'--'+'><\/style>'+"\n";
	theCode = theCode+'<\/head><body>'+"\n";
	theCode = theCode+'<div class="img" title="'+theTitle+'" onClick="window.close();">'+"\n";
	theCode = theCode+'<\/div><\/body><\/html>'+"\n";
	// Attributs de la nouvelle fenetre popup
	var popAttributs = "width="+theWidthWin+", height="+theHeightWin+", top="+topPosition+", left="+leftPosition+", location=no, menubar=no, toolbar=no, directories=no, scrollbars=yes, resizable=yes, status=no";
	// Creation de la nouvelle fentre popup et integration du contenu
	var newPopup = window.open('', theTitle, popAttributs);
	newPopup.document.write(theCode);
	newPopup.document.close();
}

// ]]>
--></script>
</head> 
<body>
<div>
<?php

// On affiche le titre
//if ($titreOk) { echo '<h2>'.$galerie.'</h2>'."\n"; }
// On affiche les liens
if ($lienMiniOk || $lienOrigOk) {
	echo '<p>';
	if ($lienMiniOk) { echo '-&nbsp;<a href="?mode='.$lienMini.'" title="Affichage des miniatures">Miniatures</a>&nbsp;-'; }
	if ($lienOrigOk) { echo '-&nbsp;<a href="?mode='.$lienOrig.'" title="Affichage des images originales">Originales</a>&nbsp;-'; }
	echo '</p>'."\n";
}
// On affiche le tableau avec les images
echo implode("\n", $table)."\n"; 
?>
</div>
</body> 
</html>