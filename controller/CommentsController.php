<?php

require_once('model/CommentsManagerModel.php');

function comments()
{
    $CommentsManager = new CommentsManager(); 
    $listComments = $CommentsManager->getComments(); 

   require('view/frontEnd/Show.php');
}

function addComment($post_id, $content, $user_id)
{
    $CommentsManager = new CommentsManager();
    $newComment = $CommentsManager->postComment($post_id, $content, $user_id);

    if ($newComment === false) {
        throw new Exception("Impossible d'ajouter le commentaire !");
    }
    else {
        Header('Location: index.php?action=show&id= ' . $post_id . '');
    }
}

function deleteComment($id, $post_id) 
{    
    $CommentsManager = new CommentsManager(); 
    $CommentsManager->deleteComment($id);

    Header('Location: index.php?action=show&id='. $post_id);
}

?>