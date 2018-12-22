<?php

require_once('model/CommentsManager.php');

function comments()
{
      $CommentsManager = new CommentsManager();
      $listComments = $CommentsManager->getComments();

      require('view/frontEnd/Show.php');
}

function addComment($post_id, $content, $user_id)
{
      if(empty(trim($content)))
      {
    // Its empty so throw a validation error
            Header('Location: index.php?action=show&id= ' . $post_id . '&new-comment=empty'); 
      }
      else
      {  $CommentsManager = new CommentsManager();
         $newComment = $CommentsManager->postComment($post_id, $content, $user_id);

         Header('Location: index.php?action=show&id= ' . $post_id . '&new-comment=success');
    // Input has some text and is not empty.. process accordingly.. 
      }
}

function deleteComment($id, $post_id)
{
      $CommentsManager = new CommentsManager();
      $CommentsManager->deleteComment($id);

      if ($post_id == 'admin') {
            Header('Location: index.php?action=dashboard&admin-delete-comment=success');
      } else {
            Header('Location: index.php?action=show&id=' . $post_id);
      }
}