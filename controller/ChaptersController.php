<?php

require_once('model/ChaptersManagerModel.php');

function chapters()
{ 
    $ChaptersManager = new ChaptersManager(); 
    $listPosts = $ChaptersManager->getPosts(); 

   require('view/frontEnd/chaptersView.php');
}

function show()
{   
    $ChaptersManager = new ChaptersManager(); 
    $post = $ChaptersManager->findWithId($_GET['id']); 
        
    if ($post === null) {
        throw new \Exception("Pas de Post");
    }

    require("view/frontEnd/show.php");

}

   ?>