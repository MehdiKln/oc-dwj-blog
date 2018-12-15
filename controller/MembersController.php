<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

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

function getMembers()
{
	$mailconnect = htmlspecialchars($_POST['mailconnect']);
   	$passconnect = password_hash($_POST['passconnect'], PASSWORD_DEFAULT);

   	$MembersManager = new MembersManager();
   	$requser = $MembersManager->getMembers($mailconnect, $passconnect, $getid);
   	$userexist = $requser->rowCount();

   	if($userexist == 1) {
                    $userinfo = $requser->fetch();
                    $_SESSION['id'] = $userinfo['id'];
                    $_SESSION['firstname'] = $userinfo['firstname'];
                    $_SESSION['mail'] = $userinfo['mail'];

                    header("Location: index.php");
	} else {
                    $erreur = "Mauvais mail ou mot de passe !";
                  }
}

function logout() {
	$_SESSION = array();
	session_destroy();

	header('Location: index.php');
}