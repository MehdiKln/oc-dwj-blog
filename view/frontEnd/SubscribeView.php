<?php $title = "Jean Forteroche" ?>

<?php ob_start();

$firstname = isset($_GET['firstname']) ? $_GET['firstname'] : '';
$name = isset($_GET['name']) ? $_GET['name'] : '';
$mail = isset($_GET['mail']) ? $_GET['mail'] : '';
$add = isset($_GET['add']) ? $_GET['add'] : null;
$messages = isset($_GET['messages']) ? $_GET['messages'] : array();

if ($add == 1) {
      $color = 'green';
} else {
      $color = 'red';
}
?>

<div class="container-fluid" id="signup_section">
	<div class="row" align="center">
		<div class="col mt-5 mb-5">
			<form action="index.php?action=addMember" method="post">
				<label for="firstname">Prénom</label><br>
				<input type="text" name="firstname" id="firstname" value="<?php echo $firstname; ?>" required /><br><br>
				<label for="name">Nom</label><br>
				<input type="text" name="name" id="name" value="<?php echo $name; ?>" required /><br><br>
				<label for="mail">Adresse email</label><br />
				<input type="email" name="mail" id="mail" value="<?php echo $mail; ?>" required /><br><br>
				<label for="pass">Mot de passe</label><br>
				<input type="password" name="pass" id="pass" required /><br><br>
				<label for="pass_confirm">Retapez votre mot de passe</label><br>
				<input type="password" name="pass_confirm" id="pass_confirm" required /><br><br>
				<input type="submit" value="S'inscrire" /><br>
			</form>
                  <br><br>

			<?php foreach ($messages as $msg) {
                        echo '<span class="' . $color . '">' . $msg . '</span><br>';
                  } ?>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require("view/backEnd/AdminTemplate.php"); ?>