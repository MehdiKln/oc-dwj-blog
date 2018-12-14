<?php

require_once("model/MembersManager.php");

function display_addMember()
{   

    require("view/frontEnd/SubscribeView.php");

}

function display_loginView()
{   

    require("view/frontEnd/LoginView.php");

}

function checkMail()
{
	$MembersManager = new MembersManager(); 
	
	$MailValidity = $MembersManager->checkMail($mail);
    
}

function addMember()
{		

		$firstname = htmlspecialchars($_POST['firstname']);
        $name = htmlspecialchars($_POST['name']);
        $mail = htmlspecialchars($_POST['mail']);
        $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $pass_confirm = password_hash($_POST['pass_confirm'], PASSWORD_DEFAULT);

		$MembersManager = new MembersManager(); 
		$reqmail = $MembersManager->checkMail($mail);
		$mailexist = $reqmail->rowCount();
    if($mailexist == 0) {
    	$newMember = $MembersManager->createMember($firstname, $name, $pass, $mail);

    	Header('Location: index.php?action=display_addMember');
    }
    else {
    	$erreur = "Adresse mail déjà utilisée !";
    }




    
}