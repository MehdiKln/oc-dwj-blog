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

    public function checkMail($mail)
    {
        $db = $this->dbConnect();
        $reqmail = $db->prepare("SELECT * FROM user WHERE mail = ?");
        $reqmail->execute(array($mail));

        return $reqmail;
    }

    public function getMembers($mailconnect, $passconnect)
    {
      $db = $this->dbConnect();

      $user = array();
      $req = $db->prepare("SELECT * FROM user WHERE mail = ?");
      $req->execute(array($mailconnect));

      $result = $req->fetch();

        if ($result && password_verify($passconnect, $result['password'])) {
            $user = array(
                  "id" => $result['id'],
                  "firstname" => $result['firstname'],
                  "name" => $result['name'],
                  "mail" => $result['mail']
            );
        }

      return $user;
    }

}

?>

