<?php 

require_once("ManagerConnect.php");


class ChaptersManager extends Manager {

    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, STR_TO_DATE(created_at, "%d/%m/%Y %H%i%s") AS creation_date_fr FROM post ORDER BY creation_date_fr DESC');

        return $req->fetchAll();
    }

    public function findWithId($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, STR_TO_DATE(created_at, "%d/%m/%Y %H%i%s") AS creation_date_fr FROM post WHERE id = ? ORDER BY creation_date_fr DESC');
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

    public function updatePost($title, $content, $id) {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE post SET title = ?, content = ?, updated_at = NOW() WHERE id = ?');
        $updated = $req->execute(array($title, $content, $id));
        
        return $updated;
    }

    public function deletePost($id) {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM post WHERE id = ?');
        $deletedPost = $req->execute(array($id));

        return $deletedPost;
    }

    public function countPost()
    {   
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(*) AS nbr_posts FROM post');
        $results = $req->fetch();
        $nbr_posts = $results['nbr_posts'];
        return $nbr_posts;
    }


}

?>