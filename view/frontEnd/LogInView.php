<?php $title = "Jean Forteroche" ?>

<?php ob_start(); ?>

<div class="container-fluid" id="login_section">
	<div class="row" align="center">
		<div class="col mt-5 mb-5">
			<form action="index.php?action=loginSubmit" method="post">
			<label for="mail">Adresse email</label><br />
			<input type="email" name="mailconnect" id="mailconnect" required /><br><br>
			<label for="pass">Mot de passe</label><br />
			<input type="password" name="passconnect" id="passconnect" required /><br></br>
			<input type="submit" value="Se connecter" />
			</form><br>
			<a href="index.php?action=display_addMember">Pas encore inscrit? C'est par ici ;)</a>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require("/../backEnd/AdminTemplate.php") ?>