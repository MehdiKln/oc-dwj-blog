
<?php 
	$title = "Bienvenue sur le site de Jean Forteroche";
 	ob_start(); 
 ?>
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

			 <div class="row mt-4 mb-5">
			 	<div class="col">
			 		<form method="post" action="index.php?action=editPost&amp;id=<?= $post['id']; ?>">
			 			<input type="submit" value=" Modifier  ">
			 		</form> <br>
			 		<form method="post" action="index.php?action=deletePost&amp;id=<?= $post['id']; ?>">
			 			<input type="submit" value="Supprimer">
			 		</form>
			 	</div>
			 </div>
		</div>



			  


<?php 
$content = ob_get_clean(); 
?>

<?php require("AdminTemplate.php") ?>