<?php

require_once('model/ChaptersManagerModel.php');

function chapters()
{ 
    $ChaptersManager = new ChaptersManager(); 
    $listPosts = $ChaptersManager->getPosts(); 

   require('view/frontEnd/dashboard.php');
}

function show()
{   
    $ChaptersManager = new ChaptersManager(); 
    $post = $ChaptersManager->findWithId($_GET['id']);

    $CommentsManager = new CommentsManager(); 
    $listComments = $CommentsManager->getComments($post["id"]); 
        
    if ($post === null) {
        throw new \Exception("Pas de Post");
    }

    require("view/frontEnd/Show.php");

}

?>