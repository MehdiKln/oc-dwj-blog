<?php 

require_once("ManagerConnect.php");

class CommentsManager extends Manager {

    public function getComments($post_id)
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT comment.id, content, user_id, firstname, STR_TO_DATE(created_at, "%d/%m/%Y à %H%i%s") AS creation_date_fr FROM comment INNER JOIN user ON comment.user_id=user.id ORDER BY creation_date_fr DESC');

        return $req->fetchAll();
    }

    public function postComment($content)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('INSERT INTO comment(content, post_id, user_id, created_at) VALUES(?, ?, 2, NOW())');
        $newComment = $comment->execute(array($content));

        return $newComment;
    }

    public function deleteComment($id) {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comment WHERE id = ?');
        $deletedComment = $req->execute(array($commentId));

        return $deletedComment;
    }

}

?>