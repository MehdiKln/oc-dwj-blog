<?php

require_once('model/CommentsManagerModel.php');

function comments()
{
    $CommentsManager = new CommentsManager(); 
    $listComments = $CommentsManager->getComments(); 

   require('view/frontEnd/Show.php');
}

function addComment() 
{
    $CommentsManager = new CommentsManager();
    $newComment = $CommentsManager->postComment($_POST["content"]);

    if ($newComment === false) {
        throw new Exception("Impossible d'ajouter le commentaire !");
    }
    else {
        Header('Location: index.php?action=admin&new-comment=success');
    }
}

?>