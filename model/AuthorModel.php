<?php 

/* function getLastPost()
{
    $db = dbConnect();
    $lastpost = $db->query('SELECT title, content, created_at FROM post ORDER BY id DESC LIMIT 1');

    return $lastpost->fetch();
}


// Connexion à la BDD

function dbConnect2()
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
} */

?>