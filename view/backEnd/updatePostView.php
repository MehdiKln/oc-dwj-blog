<?php 

$title = "Mise à jour du Post"; ?>

<?php ob_start(); ?>

<div class="udpatePost">
		<p class="returnLink"><a href="index.php?action=dashboard">Retour au menu</a></p>
		<div id="updateForm">
			<form method="post" action="index.php?action=submitUpdate&amp;id=<?= $post['id']; ?>">
				<label for="title" id="posttitle"> Titre du POST :  </label> </br> </br>
				<input type="text" name="title" id="title" value="<?= $post['title'];?>"/> </br></br>  
				<textarea class="tinymce" name="content"><?= nl2br($post['content']);?></textarea>
				<input type="submit" value="Publier">
			</form>
		</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('AdminTemplate.php'); ?>