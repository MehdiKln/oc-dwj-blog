
<?php 
	$title = "Bienvenue sur le site de Jean Forteroche"; 
 	ob_start(); 
 ?>

	<div class="container-fluid">
		<div class="row pt-4">
			<div class="col-12" id="title" align="center">
				Billet simple pour l'Alaska
			</div>
		</div>
		<div class="row">
			<div class="col-7">
			</div>
			<div class="col-5">
				Jean Forteroche
			</div>	
		</div>
	</div>


	<div class="container-fluid">
		<div class="row pt-5 mx-3 justify-content-between">
			<div class="col-lg-8 col-md-12 mb-3" id="body">
				Présentation du projet :  </br></br></br>
				
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc porttitor congue lacinia. Suspendisse lacinia, sem vitae gravida congue, enim sapien lobortis turpis, vel lacinia mauris quam et lorem. Fusce auctor enim mauris, suscipit dignissim tellus mollis ac. Suspendisse sed vehicula risus. Sed varius, ex nec tristique pulvinar, felis nisl lacinia dui, nec lacinia diam nisl ut tellus. Integer eleifend mattis aliquet. Sed erat velit, vulputate nec pretium sed, blandit in justo. Fusce fermentum pellentesque condimentum. Aliquam venenatis, diam vel rhoncus fringilla, neque libero varius ligula, non fermentum sapien velit nec justo. Morbi molestie, risus ut cursus molestie, felis lorem imperdiet magna, non gravida quam metus non ligula. Nunc sed nulla placerat, varius eros sed, interdum purus.</br></br>

				Sed ante nunc, dapibus id gravida sit amet, imperdiet quis odio. Maecenas suscipit fringilla erat, eu varius quam pellentesque eget. Donec purus leo, convallis eu dictum pretium, laoreet ac odio. Aliquam gravida, felis vitae fermentum rutrum, dolor tortor laoreet ipsum, vel elementum ligula tellus ac massa. Ut non leo volutpat, fringilla metus sed, imperdiet urna. Etiam imperdiet diam ut quam porta maximus. Curabitur ac pretium purus. Fusce a varius dolor. Nullam feugiat vitae ipsum sit amet eleifend. Donec elementum enim tincidunt, faucibus tortor non, hendrerit augue. Sed posuere nulla ac mi venenatis, et vestibulum urna egestas. In blandit lectus ex, ut porttitor risus tempus a. Ut euismod erat nec quam tincidunt, non rutrum elit consectetur. Mauris eleifend lobortis maximus. Suspendisse potenti. Phasellus eu nulla metus.</br></br>

				Aliquam vel egestas ante. Suspendisse aliquam enim eget libero aliquet fringilla. Nam malesuada ipsum vel purus pellentesque lacinia. Sed sed 	dictum nunc, quis interdum urna. Ut semper neque erat, sit amet cursus urna efficitur quis. Cras congue placerat turpis. Donec a ante ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi bibendum pulvinar nunc eget tincidunt. Donec vitae rutrum libero.</br></br>

				Donec nec nunc ligula. Cras in mauris et sapien eleifend hendrerit sed at nibh. Etiam non lorem ultricies lectus fringilla dictum non eget quam. Integer euismod rhoncus justo. Integer aliquam erat gravida, consequat purus eget, porttitor justo. Etiam sit amet sagittis dui, non condimentum erat. Nulla consectetur, massa vel faucibus lobortis, ligula dolor bibendum purus, ut interdum tortor leo sit amet lacus. Nullam venenatis, felis vel dapibus fermentum, nisi urna imperdiet lacus, sit amet accumsan libero purus a ipsum.

			</div>

			<div class="col-lg-3 col-md-12 mb-3" id="body">
				Présentation de l'auteur : </br></br></br>

				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc porttitor congue lacinia. Suspendisse lacinia, sem vitae gravida congue, enim sapien lobortis turpis, vel lacinia mauris quam et lorem. Fusce auctor enim mauris, suscipit dignissim tellus mollis ac. Suspendisse sed vehicula risus. Sed varius, ex nec tristique pulvinar, felis nisl lacinia dui, nec lacinia diam nisl ut tellus. Integer eleifend mattis aliquet. Sed erat velit, vulputate nec pretium sed, blandit in justo. Fusce fermentum pellentesque condimentum. Aliquam venenatis, diam vel rhoncus fringilla, neque libero varius ligula, non fermentum sapien velit nec justo. Morbi molestie, risus ut cursus molestie, felis lorem imperdiet magna, non gravida quam metus non ligula. Nunc sed nulla placerat, varius eros sed, interdum purus.</br></br>
			</div>

		</div>

		<div class="row mx-3 pt-5 mb-3" id="lastpost">
			<div class="col-12 py-2" align="center" id="body">
			 	
			<span id="lptitle"> <?= $lastPost["title"]; ?> </span> </br></br>
			 <?= $lastPost["content"];?></br></br>
			 <?=$lastPost["created_at"];?></br>

			  

			</div>
		</div>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require("AdminTemplate.php") ?>