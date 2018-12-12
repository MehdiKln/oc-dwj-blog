
<?php 
	$title = "Bienvenue sur le site de Jean Forteroche";
 	ob_start(); 
 ?>

 <!-- AFFICHAGE POST -->

		<div class="container-fluid">
			<div class="row pt-4">
				<div class="col-12" align="center" id="title">
			 		<?= $post["title"]; ?> 
			 	</div>
			 </div>

			 <div class="row mt-4">
			 	<div class="col">
			 		<?= $post["content"];?>
			 	</div>
			 </div>

			 <div class="row mt-4">
			 	<div class="col">
			 		<?=$post["creation_date_fr"];?>
			 	</div>
			 </div>

<!-- MODIFICATION / SUPPRESSION POST -->

			 <div class="row mt-4 mb-5">
			 	<div class="col-12">
			 		<form method="post" action="index.php?action=editPost&amp;id=<?= $post['id']; ?>">
			 			<button type="submit" class="btn-info"> Modifier <i class="fas fa-edit"></i> </button>
			 		</form>
			 		<form method="post" action="index.php?action=deletePost&amp;id=<?= $post['id']; ?>">
			 			<button type="submit" class="btn-danger pull-right"> Supprimer <i class="fas fa-trash"></i> </button>
			 		</form>
			 	</div>
			 </div>

<!-- POST COMMENTAIRE --> 

		<div id="commentForm">
			<p>N'hésitez pas à me laisser un commentaire ! ;)</p>
			<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
				<label for="comment">Commentaire :</label></br>
				<textarea id="comment" name="content" row="15" cols="100"></textarea> 
				<br>
				<button type="submit"> Envoyer </button>
			</form>
		</div>

<!-- AFFICHAGE COMMENTAIRES / SUPPRESSION COMMENTAIRES-->
			 <div class="row mt-4 mb-5">
			 	<div class="col">
			 		<?php
      					foreach ($listComments as $comment)
        				{
					?>
					      
					      <p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
					      <p><?= nl2br(htmlspecialchars($comment['firstname'])) ?></p>
					      <p><?= nl2br(htmlspecialchars($comment['creation_date_fr'])) ?></p>
					<?php
        				}
					?>
			 	</div>
			 </div>

		</div>



			  


<?php 
$content = ob_get_clean(); 
?>

<?php require("/../backEnd/AdminTemplate.php") ?>