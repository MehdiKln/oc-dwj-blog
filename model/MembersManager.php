<?php

require_once("ManagerConnect.php");

class MembersManager extends Manager {

    public function createMember($firstname, $name, $pass, $mail)
    {
        $db = $this->dbConnect();
        $newMember = $db->prepare('INSERT INTO user(firstname, name, password, mail, role) VALUES (?, ?, ?, ?, "user")');
        $newMember->execute(array($firstname, $name, $pass, $mail));

        return $newMember;
    }

    public function checkMail($mail) // vérification pour qu'il n'y ai pas 2x le même mail dans la base de données (puisque mail = id de login)
    {
        $db = $this->dbConnect();
        $reqmail = $db->prepare("SELECT * FROM user WHERE mail = ?");
        $reqmail->execute(array($mail));

        return $reqmail;
    }

    public function getMembers($mailconnect, $passconnect) // récupération des informations de l'utilisateur 
    {
      $db = $this->dbConnect();

      $user = array();
      $req = $db->prepare("SELECT * FROM user WHERE mail = ?");
      $req->execute(array($mailconnect));

      $result = $req->fetch();

        if ($result && password_verify($passconnect, $result['password'])) {
            $user = $result;
        }

      return $user;
    }

    public function countUser()
    {   
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(*) AS nbr_users FROM user');
        $results = $req->fetch();
        $nbr_users = $results['nbr_users'];
        return $nbr_users;
    }
}
?>

