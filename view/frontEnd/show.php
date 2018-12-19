<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

$title = "Bienvenue sur le site de Jean Forteroche";
 ob_start(); 
 ?>

 <!-- AFFICHAGE POST + MODIFICATION / SUPPRESSION POST -->

	<div class="container-fluid">
		<div class="row">
			<div class="col-4 mt-3" id="report_msg">
				<?php 
					if (isset($_GET['remove-comment']) &&  $_GET['remove-comment'] == 'success') {
						echo $_SESSION["message"];
					} elseif (isset($_GET['new-comment']) &&  $_GET['new-comment'] == 'success') {
                       	echo "<p class='green'> Votre commentaire a bien été ajouté ! <p>";
                    }
 				?>
			</div>
		</div>

		<div class="row pt-4 mb-5">
			<div class="col ml-2" align="center" id="chapters_title">
			 	<?= $post["title"]; ?> 
			</div>
			<div class ="col-8">
			</div>
			<div class="col-1">
				<div class="float-right">
					<?php
						if(isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
					?>
							<form method="post" action="index.php?action=editPost&amp;id=<?= $post['id']; ?>">
						 		<button type="submit" class="btn btn-info btn-sm"> Modifier <i class="fas fa-edit"></i> </button>
						 	</form>
					<?php } ?>
				 </div>
			</div>
			<div class="col-1">
			 	<?php
					if(isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
				?>
			 	<form method="post" action="index.php?action=deletePost&amp;id=<?= $post['id']; ?>">
			 		<button type="submit" class="btn btn-danger btn-sm"> Supprimer <i class="fas fa-trash"></i> </button>
			 	</form>
			 	<?php } ?>
			</div>
		</div>

		<div class="row mt-4">
			<div class="col">
			 	<?= $post["content"];?>
			</div>
		</div>

<!-- POST COMMENTAIRE --> 

		<div class="row mb-3 mt-5" id="commentForm">
			<div class="col-2 ml-2" id="commentaires_titre" align="center">
			Commentaires
			</div>
		</div>

		<div>
			<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
				<label for="comment">N'hésitez pas à rédiger un commentaire si vous le souhaitez :</label></br>
				<textarea id="comment" name="content" row="15" cols="100"></textarea> 
				<br>
				<button type="submit" class="btn btn-success btn-sm"> Envoyer </button>
			</form>
		</div>

<!-- AFFICHAGE COMMENTAIRES / SUPPRESSION COMMENTAIRES-->

	<div class="row mt-5 mb-5 ml-1">
		<div class="col-4 ml-3">
			<?php
      			foreach ($listComments as $comment)
       		{
			?> 
			<div  id=comments_display>
				<div class="d-flex bd-highlight">
					<div class="p-2 flex-grow-1 bd-highlight">
						<p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
						<p id="name"><?= nl2br(htmlspecialchars($comment['firstname'])) ?></p> </div>
						<div class="d-flex justify-content-between mt-3 ml-1 mr-2">
							<?php if(isset($_SESSION['id']) && $_SESSION['id'] == $comment['user_id']) { ?>
						    <div class="bd-highlight">
						    	<form method="post" action="index.php?action=deleteComment&amp;id=<?= $comment['id']; ?>&post_id=<?= $_GET['id']; ?>">
				 			  		<button type="submit" class="btn btn-danger btn-sm"> Supprimer <i class="fas fa-trash"></i> </button>
				 				</form>
				 			</div>
				 			<?php } ?>
				 			<div class="bd-highlight">
				 				<?php if(isset($_SESSION['id'])) { ?>
				 				<form method="post" action="index.php?action=report&amp;id=<?= $comment['id']; ?>&post_id=<?= $_GET['id']; ?>">
				 			  		<button type="submit" class="btn btn-danger btn-sm"> Signaler <i class="fas fa-exclamation-triangle"></i> </button>
				 			  </form>
				 			  <?php } ?>
			 				</div>
			 			</div>
			 	</div>
			</div>
			<?php } ?>
		</div> <br>
	</div>

<?php 
$content = ob_get_clean(); 
?>

<?php require("/../backEnd/AdminTemplate.php") ?>