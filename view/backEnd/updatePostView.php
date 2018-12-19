<?php 

$title = "Mise à jour du Post"; ?>

<?php ob_start(); ?>

<div class="container-fluid" id="edit_section">
	<div class="row mt-3 mb-5 ml-2">
		<div class="col">
			<p class="returnLink"><a href="index.php?action=dashboard">Retour au menu d'administration</a></p>
			<div id="updateForm">
				<form method="post" action="index.php?action=submitUpdate&amp;id=<?= $post['id']; ?>">
					<label for="title" id="posttitle" class="fastpres"> Titre du Post :  </label> <br>
					<input type="text" name="title" id="title" value="<?= $post['title'];?>"/> <br><br>  
					<label for="title" id="posttitle" class="fastpres"> Contenu du Post :  </label> <br>
					<textarea class="tinymce" name="content"><?= nl2br($post['content']);?></textarea><br><br>
					<input type="submit" value="Publier">
				</form>
			</div>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('AdminTemplate.php'); ?>