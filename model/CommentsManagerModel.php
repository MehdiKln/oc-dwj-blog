<?php 

require_once("Manager.php");

class CommentsManager extends Manager {

    public function getComments()
    {
        $db = dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req->fetchAll();
    }

    public function postComment($postId, $author, $comment)
    {
        $bdd = $this->dbConnect();
        $comment = $db->prepare('INSERT INTO comment(title, content, user_id, created_at) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function deleteComment($commentId) {
        $bdd = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comment WHERE id = ?');
        $deletedComment = $req->execute(array($commentId));

        return $deletedComment;
    }

}

?>