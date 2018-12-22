<?php 

// Connexion à la BDD

class Manager  
{
    private $db;

    protected function dbConnect()
    {
        try
        { if(is_null($this->db)) {
        $this->db = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            return $this->db;
        }

        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}

?>