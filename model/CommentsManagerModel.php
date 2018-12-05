<?php 

require_once("Manager.php");

class CommentsManager extends Manager {

    public function getComments()
    {
        $db = dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

     private function dbConnect()
        {
            try
            {
                $db = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
                return $db;
            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }
        }

}

?>