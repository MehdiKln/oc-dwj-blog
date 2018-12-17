
<?php 
	$title = "Bienvenue sur le site de Jean Forteroche";
 	ob_start(); 
 ?>

 <!-- AFFICHAGE POST -->

		<div class="container-fluid">
			<div class="row pt-4">
				<div class="col-2 ml-2" align="center" id="chapters_title">
			 		<?= $post["title"]; ?> 
			 	</div>
			 </div>

			 <div class="row mt-4">
			 	<div class="col">
			 		<?= $post["content"];?>
			 	</div>
			 </div>


<!-- MODIFICATION / SUPPRESSION POST -->

			 <div class="row mt-4 mb-5 p-2">
			 	<div class="col d-inline-flex p-2">
			 		<form method="post" action="index.php?action=editPost&amp;id=<?= $post['id']; ?>">
			 			<button type="submit" class="btn btn-info btn-sm"> Modifier <i class="fas fa-edit"></i> </button>
			 		</form>
			 		<form method="post" action="index.php?action=deletePost&amp;id=<?= $post['id']; ?>">
			 			<button type="submit" class="btn btn-danger btn-sm"> Supprimer <i class="fas fa-trash"></i> </button>
			 		</form>
			 	</div>
			 </div>

<!-- POST COMMENTAIRE --> 

		<div class="row mb-3" id="commentForm">
			<div class="col-2 ml-2" id="commentaires_titre" align="center">
			Commentaires
			</div>
		</div>

			<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
				<label for="comment">N'hésitez pas à rédiger un commentaire si vous le souhaitez :</label></br>
				<textarea id="comment" name="content" row="15" cols="100"></textarea> 
				<br>
				<button type="submit" class="btn btn-success btn-sm"> Envoyer </button>
			</form>
		</div>

<!-- AFFICHAGE COMMENTAIRES / SUPPRESSION COMMENTAIRES-->
			 <div class="row mt-4 mb-5">
			 	<div class="col-4 ml-3">
			 		<?php
      					foreach ($listComments as $comment)
        				{
					?>
					    <div id=comments_display>
					      <p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
					      <p id="name"><?= nl2br(htmlspecialchars($comment['firstname'])) ?></p>
					      <form method="post" action="index.php?action=deleteComment&amp;id=<?= $comment['id']; ?>">
			 			  	<button type="submit" class="btn btn-danger btn-sm"> Supprimer <i class="fas fa-trash"></i> </button>
			 			  </form>
					  	</div>

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