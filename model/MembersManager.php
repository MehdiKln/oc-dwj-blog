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
}

?>

