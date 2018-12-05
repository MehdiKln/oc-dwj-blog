<?php $title = "Billet simple pour l'Alaska" ?>

<?php ob_start(); ?>



	<div class="row mx-3 pt-5 mb-3" id="lastpost">
			
		<div class="col-12 py-2" align="center" id="body">
			 	
<?php
      foreach ($listPosts as $listPost)
        { 
        	
?>
      <p><?= nl2br(htmlspecialchars($listPost['title'])) ?></p>
      <p><?= nl2br(htmlspecialchars($listPost['content'])) ?></p>
      <p><?= nl2br(htmlspecialchars($listPost['creation_date_fr'])) ?></p>
<?php
        }

?>
			

			  
		</div>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require("AdminTemplate.php") ?>