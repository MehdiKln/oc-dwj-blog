<?php $title = "Administration" ?>

<?php ob_start(); ?>



<div class="container-fluid">
	<div class="row mt-3 mr-2">
			<!--------------------------- SIDEBAR ------------------------------->
			  <div class="col-2">
			    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Admin Home</a>
			      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Nouveau Post</a>
			      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Posts</a>
			      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Commentaires signalés</a>
			    </div>
			  </div>
	  		<!------------------------ CONTENU (à droite de la SIDEBAR) ------------------------------------> 
	 	<div class="col-10">
		    <div class="tab-content" id="v-pills-tabContent">
		      	<div class="tab-pane fade show active admin_home" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">Accueil & Statistiques</div>
			    <div class="tab-pane fade mt-3 ml-2 admin_newpost" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
			    	<h3><span class="h3"> Nouveau Post </span></h3><br>
			    		<div id="formbg">
						    <form method="post" action="index.php?action=submitPost">
						        <p> <label for="title" id="posttitle"> Titre :  </label><br>
						            <input type="text" name="title" id="title" placeholder="Titre de votre post" size="30" maxlength="50" /> </br></br>
						        </p>
						        <label for="title" id="posttitle"> Contenu :  </label><br>
							 <textarea class="tinymce" name="content"></textarea><br>
							 <input type="submit" value="Publier">
						    </form>
						</div>
			     </div>
			     <div class="tab-pane fade admin_post" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
			     	<?php 
		        		$listTitles = $_SESSION["dropdown"];
							foreach ($listTitles as $listTitle)
							{ ?> 	
						<a class="dropdown-item" href="index.php?action=show&amp;id=<?= $listTitle['id']; ?>"> <?= nl2br(htmlspecialchars($listTitle['title'])) ?></a>
					<?php  }  ?> 
			     </div>
			     <div class="tab-pane fade admin_signaled" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">Ici se trouveront les commentaires signalés.</div>
	    	</div>
	  	</div>
	  		
		</div>
	</div>
</div>



<?php $content = ob_get_clean(); ?>

<?php require("AdminTemplate.php") ?>