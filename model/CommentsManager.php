<?php

require_once("ManagerConnect.php");

class CommentsManager extends Manager {

    public function getComments($post_id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT comment.id, content, user_id, firstname, STR_TO_DATE(created_at, "%d/%m/%Y à %H%i%s") AS creation_date_fr FROM comment INNER JOIN user ON comment.user_id=user.id WHERE comment.post_id = ? ORDER BY creation_date_fr DESC');
        $req->execute(array($post_id));

        return $req->fetchAll();
    }

    public function postComment($post_id, $content, $user_id)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('INSERT INTO comment (post_id, content, user_id, created_at) VALUES(?, ?, ?, NOW())');
        $newComment = $comment->execute(array($post_id, $content, $user_id));

        return $newComment;
    }

    public function deleteComment($id) {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comment WHERE id = ?');
        $deletedComment = $req->execute(array($id));

        return $deletedComment;
    }
}

?>