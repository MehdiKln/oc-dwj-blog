<?php
	
	session_start();

	require_once('model/ChaptersManagerModel.php');

	function home()
	{
	   $ChaptersManager = new ChaptersManager();
	   $lastPost = $ChaptersManager->getLastPost();
	   saveChaptersTitlesOnSession();

	   require('view/frontEnd/indexview.php');
	}

	function saveChaptersTitlesOnSession()
	{
		 $ChaptersManager = new ChaptersManager(); 
    	 $findWithId = $ChaptersManager->findWithId($id); 
    	 $_SESSION["dropdown"] = $findWithId;
    	 

      	 /* foreach ($listPosts as $listPost)
         { 
        	
?>
	      <p><?= nl2br(htmlspecialchars($listPost['title'])) ?></p>
	      <p><?= nl2br(htmlspecialchars($listPost['id'])) ?></p>

			<?php
         }


	*/ }		?>