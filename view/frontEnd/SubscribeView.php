<?php $title = "Jean Forteroche" ?>

<?php ob_start(); ?>

<div class="container-fluid" id="signup_section">
	<div class="row" align="center">
		<div class="col mt-5 mb-5">
			<form action="index.php?action=addMember" method="post">
				<label for="firstname">Prénom</label><br>
				<input type="text" name="firstname" id="firstname" required /><br><br>
				<label for="name">Nom</label><br>
				<input type="text" name="name" id="name" required /><br><br>
				<label for="mail">Adresse email</label><br />
				<input type="email" name="mail" id="mail" required /><br><br>
				<label for="pass">Mot de passe</label><br>
				<input type="password" name="pass" id="pass" required /><br><br>
				<label for="pass_confirm">Retapez votre mot de passe</label><br>
				<input type="password" name="pass_confirm" id="pass_confirm" required /><br><br>
				<input type="submit" value="S'inscrire" /><br>
			</form>
			<?php
		         if(isset($erreur)) {
		            echo '<font color="red">'.$erreur."</font>";
         		 }
         		 if(isset($reussite)) {
		            echo '<font color="green">'.$reussite."</font>";
         		 }
         	?>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require("/../backEnd/AdminTemplate.php") ?>