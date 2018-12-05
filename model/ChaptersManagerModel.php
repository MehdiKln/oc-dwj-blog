<?php 

require_once("ManagerConnect.php");


class ChaptersManager extends Manager {

    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(created_at, "%d/%m/%Y %Hh%imin%ss") AS creation_date_fr FROM post ORDER BY creation_date_fr DESC');

        return $req->fetchAll();
    }

    public function findWithId($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(created_at, "%d/%m/%Y %Hh%imin%ss") AS creation_date_fr FROM post WHERE id = ? ORDER BY creation_date_fr DESC');
        $req->bindParam(1, $id, PDO::PARAM_INT);
        $req->execute();

        return $req->fetch();
    }

    public function getLastPost() {

        $db = $this->dbConnect();
        $lastpost = $db->query('SELECT title, content, created_at FROM post ORDER BY id DESC LIMIT 1');

        return $lastpost->fetch();
    }

    public function createPost($title, $content) {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO post(title, content, user_id, created_at) VALUES (?, ?, 1, NOW())');
        $newPost = $req->execute(array($title, $content));

        return $newPost;
    }

    public function updatePost($title, $content, $postId) {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE posts SET title = ?, content = ?, update_date = NOW() WHERE id = ?');
        $updated = $req->execute(array($title, $content, $postId));
        
        return $updated;
    }

    public function deletePost($postId) {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM posts WHERE id = ?');
        $deletedPost = $req->execute(array($postId));

        return $deletedPost;
    }
}

?>