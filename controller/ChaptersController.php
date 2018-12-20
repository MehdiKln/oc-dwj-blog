<?php

require_once('model/ChaptersManager.php');

function show() // affichage vue chapitre + commentaires
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

