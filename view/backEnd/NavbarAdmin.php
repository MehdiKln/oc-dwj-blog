<?php  if(!isset($_SESSION)) 
    { 
        session_start(); 
    } ?>

<div "class= container-fluid">
	<div class="row">
		<div class="col">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	 			<a class="navbar-brand" href="#"></a>
	  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    		<span class="navbar-toggler-icon"></span>
	  			</button>
			  	<div class="collapse navbar-collapse" id="navbarNav">
			    	<ul class="navbar-nav mx-auto">
			      		<li class="nav-item active">
			        		<a class="nav-link" href="index.php"> Accueil </a>
			      		</li>
			     		<li class="nav-item dropdown">
        					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         					Chapitres
        				</a>
		        			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          			<?php 
		        				   $listTitles = $_SESSION["dropdown"];
							      foreach ($listTitles as $listTitle)
							        { ?> <a class="dropdown-item" href="index.php?action=show&amp;id=<?= $listTitle['id']; ?>"> <?= nl2br(htmlspecialchars($listTitle['title'])) ?></a>

							    <?php  }  ?> 
<!--
							    <a class="dropdown-item" href="index.php?action=show&id=2">Chapitre 1</a>
							    <a class="dropdown-item" href="index.php?action=show&id=3">Chapitre 2</a>
							    <a class="dropdown-item" href="index.php?action=show&id=4">Chapitre 3</a> -->
		          			<div class="dropdown-divider"></div>
		          				
		        			</div>
      					</li>
			      		<li class="nav-item">
			        		<a class="nav-link" href="index.php?action=author"> Auteur </a>
			      		</li>
			      		<li class="nav-item">
					       	 	<a class="nav-link" href="index.php?action=dashboard"> Admin </a>
					      	</li>
			    	</ul>
			  	</div>
			</nav>
		</div>
	</div>
</div>

