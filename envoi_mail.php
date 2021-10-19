<!DOCTYPE html>
<html dir="ltr" lang="fr">
<head>
<meta h content="text/html; charset=utf-8" />
<title>Envoi du message()</title>

</head>
<body>

<div id="wrap">
	<div class="panel">

		

		<?php
		
			$headers  = "From: lemondeabibi<lemon444@lemondeabibi.com>\n";
			$headers .= "Reply-To:lemon444@lemondeabibi.com";
			$valeurs["nom"]         = $_POST["nom"]; 
			$valeurs["email"]         = $_POST["mail"]; 
			$valeurs["message"]        = $_POST["message"]; 
		
		if(isset($_POST['mail']))
		{
		$objet = "[lemondeabibi]: ".$_POST["objet"]." ".$valeurs["nom"]. "\r\n" ; 
        $message = "Nom : ".$valeurs["nom"]. "\r\n" ;  
        $message.= "Mail : ".$valeurs["email"]. "\r\n" ; 
        $message.= "Message envoy\351 : "."\r\n".$valeurs["message"]; 
		
		$destinataire = "alainlaribe@lemondeabibi.com";
	

		$envoi=mail($destinataire, $objet, $message,$headers);
		
			if($envoi == true)
			{
			echo "<p>Un courriel a été envoyé avec succès à l'adresse indiquée.</p>";
			}
			else
			{
			echo "<p Le message n'a pu etre envoyé ! :(</p>";
			}
		}

		?>

	</div> 
</div>

<div class="copyright">Merci de votre visite  &copy; <a href="/">lemondeabibi</a></div>

</body>
</html>