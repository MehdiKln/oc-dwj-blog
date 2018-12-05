
<?php 
	$title = "Bienvenue sur le site de Jean Forteroche";
 	ob_start(); 
 ?>
		<div>
		 	
			 <?= $post["title"]; ?> </span> </br></br>
			 <?= $post["content"];?></br></br>
			 <?=$post["creation_date_fr"];?></br>
		</div>

			  


<?php 
$content = ob_get_clean(); 
?>

<?php require("AdminTemplate.php") ?>