<?php

require_once('model/CommentsManagerModel.php');

function comments()
{
    $CommentsManager = new CommentsManager(); 
    $listComments = $CommentsManager->getComments(); 

   require('view/frontEnd/Show.php');
}

function addComment($post_id, $content) 
{
    $CommentsManager = new CommentsManager();
    $newComment = $CommentsManager->postComment($post_id, $content);

    if ($newComment === false) {
        throw new Exception("Impossible d'ajouter le commentaire !");
    }
    else {
        Header('Location: index.php?action=show&id= ' . $post_id . '');
    }
}

function deleteComment($id)
{    
    $CommentsManager = new CommentsManager(); 
    $CommentsManager->deleteComment($id);

    Header('Location: index.php?action=admin&remove-comment=success');
}

?>