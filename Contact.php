					<div class="clearfix"></div>
					<div class="container">
						<p class="t1"> Vous avez la possibilité de me joindre en remplissant ce forumulaire :</p>
						<div class="col-md-6">
							
							
							
							<form id="contact" method="post" action="envoi_mail.php" class="form-horizontal">
								<div class="form-group">
								<label class="t2">Nom </label>
								<input type="text" class="form-control" name="nom" placeholder="Nom"required>
								</div>
						
							<div class="form-group">
								<label class="t2"> Adress Mail</label>
								<input type="email" class="form-control" name="mail" placeholder="Email"required>
							</div>	
						
							<div class="form-group">
								<label class="t2">Objet</label>
								<input type="text" class="form-control" name="objet" placeholder="Objet"required>
							</div>
						
							<div class="form-group">
								<label class="t2" >Message</label><br>
								<textarea class="form-control" name="message" placeholder="Message" required ></textarea>
							</div>
					
								
								<input class="btn btn-primary" type="submit" name="envoi" value="Envoyer le formulaire !" />
								
							</form>

						
						</div>
					</div><!-- #content-wrapper -->	