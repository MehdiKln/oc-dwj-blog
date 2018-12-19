<?php $title = "Jean Forteroche" ?>

<?php ob_start();

$erreur = isset($_GET['erreur']) ? $_GET['erreur'] : null;
?>

<div class="container-fluid" id="login_section">
	<div class="row" align="center">
		<div class="col mt-5 mb-5">
			<form action="index.php?action=loginSubmit" method="post">
			<label for="mail">Adresse email</label><br />
			<input type="email" name="mail" id="mail" required /><br><br>
			<label for="pass">Mot de passe</label><br />
			<input type="password" name="pass" id="pass" required /><br></br>
			<input type="submit" value="Se connecter" />
			</form><br>
			<a href="index.php?action=display_addMember">Pas encore inscrit? C'est par ici ;)</a>
                  <?php if ($erreur) {
                        echo '<br><br><span class="red">' . $erreur . '</span>';
                  } ?>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require("/../backEnd/AdminTemplate.php") ?>