
<?php 
	$title = "Bienvenue sur le site de Jean Forteroche"; 
 	ob_start(); 
 ?>

	<div class="container-fluid">
		<div class="row pt-4 mt-3">
			<div class="col-12" id="title" align="center">
				<h1> <span class="home_title">Billet simple pour l'Alaska </span></h1>
			</div>
		</div>
		<div class="row mb-4">
			<div class="col-7">
			</div>
			<div class="col-5">
				par Jean Forteroche
			</div>	
		</div>
	</div>


	<div class="container-fluid">
		<div class="row pt-5 mx-3 justify-content-between">
			<div class="col-lg-8 col-md-12 mb-3 home_windows" id="body">
				<br>
				<span class="fastpres"> Présentation du projet  </span>  </br></br>
				
				Depuis quelques temps maintenant, j'ai commencé l'écriture de mon nouveau roman "Billet simple pour l'Alaska".
				Cependant, j'ai voulu innover en publiant mon roman sur mon blog. <br>
				Le fonctionnement est très simple, je publie régulièrement par "épisode", des petits chapitres de mon roman.
				<br><br>
				"Toujours aussi proche de ses lecteurs et à leur écoute, Jean Forteroche a décidé cette année de publier son livre directement en ligne, en offrant à ses fans un nouveau chapitre par semaine. Ne manquez donc pas le fil des aventures de ses personnages, et plongez dès à présent dans le monde du mystère et des découvertes !"
				<br><br>
				<span class="fastpres"> Description du Roman </span>
				<br><br>
				Une île sauvage du sud de l'Alaska, accessible uniquement par bateau ou par hydravion, tout en forêts humides et montagnes escarpées.<br>
				C'est dans ce décor que Jim décide d'emmener son fils de treize ans pour y vivre dans une cabane isolée, une année durant. 
				Après une succession d'échecs personnels, il voit là l'occasion de prendre un nouveau départ et de renouer avec ce garçon qu'il connaît si mal.<br>
				<br><br>
				Mais la rigueur de cette vie et les défaillances du père ne tardent pas à transformer ce séjour en cauchemar, et la situation devient vite incontrôlable. <br>
				Jusqu'au drame violent et imprévisible qui scellera leur destin. 

			</div>

			<div class="col-lg-3 col-md-12 mb-3" id="author_presentation">
				<br>
				<span class="fastpres"> Présentation de l'auteur  </span></br></br>

				Jean Forteroche est né en 1966 sur l'île Adak, en Alaska, et y a passé une partie de son enfance avant de s'installer en France avec sa mère et sa sœur. 
				Il a rédigé son premier roman LES NAUFRAGES lors d'un voyage en mer.
				Après avoir parcouru plus de 40 000 milles sur les océans, il échoue lors de sa tentative de tour du monde en solitaire sur un trimaran qu'il a dessiné et construit lui-même.
				En 2013, il publie LE DERNIER MILE récit de son propre naufrage dans les Caraïbes lors de son voyage de noces quelques années plus tôt. 
				Ce livre fait partie de la liste des best-sellers du Figaro. Publié en France en janvier 2010, LES NAUFRAGES remporte immédiatement un immense succès. Il remporte le prix Médicis et s'est vendu à plus de 300 000 exemplaires.
				</br></br>
				Porté par son succès, Jean Forteroche est aujourd'hui traduit en dix-huit langues dans plus de soixante pays. Une adaptation cinématographique par une société de production française est en cours.
			</div>

		</div>

		<div class="row mx-3 pt-5 mb-5" id="lastpost">
			<div class="col-12 py-2 pt-3 home_windows" id="body">
				<span class="fastpres"> Dernier chapitre publié </span> </br></br>
				<span class="fastpres"> <?= $lastPost["title"]; ?> </span> </br></br>
				<?= $lastPost["content"];?></br></br>
			 	<span id="datetime"> <?=$lastPost["created_at"];?> </span> </br>
			</div>
		</div>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require("/../backEnd/AdminTemplate.php") ?>