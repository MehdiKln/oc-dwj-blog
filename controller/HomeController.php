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
    	 $listPosts = $ChaptersManager->getPosts(); 
    	 $_SESSION["title"] = $listPosts;
    	 

      	 /* foreach ($listPosts as $listPost)
         { 
        	
?>
	      <p><?= nl2br(htmlspecialchars($listPost['title'])) ?></p>
	      <p><?= nl2br(htmlspecialchars($listPost['id'])) ?></p>

			<?php
         }


	*/ }		?>