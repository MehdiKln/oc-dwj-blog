<?php
if (!isset($_SESSION)) {
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
      $pass = $_POST['pass'];
      $pass_confirm = $_POST['pass_confirm'];
      $pass_hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);

      $add = true;
      $messages = array();

      if (empty($firstname) || empty($name) || empty($pass) || empty($pass_confirm) || empty($mail)) {
            $messages[] = "Tous les champs doivent être complétés !";
            $add = false;
      }

      if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $messages[] = "Votre adresse mail n'est pas valide !";
            $add = false;
      }

      if ($pass != $pass_confirm) {
            $messages[] = "Vos mots de passes ne correspondent pas !";
            $add = false;
      }

      if ($add) {
            $MembersManager = new MembersManager();
            $reqmail = $MembersManager->checkMail($mail);
            $mailexist = $reqmail->rowCount();

            if ($mailexist == 0) {
                  $newMember = $MembersManager->createMember($firstname, $name, $pass, $mail);
                  $messages[] = "Votre compte a bien été créé ! <a href='index.php?action=display_logIn'>Me connecter</a>";
            } else {
                  $messages[] = "Adresse mail déjà utilisée !";
            }
      }

      $redirect = "index.php?action=display_addMember";
      $redirect .= "&firstname=" . $firstname;
      $redirect .= "&name=" . $name;
      $redirect .= "&mail=" . $mail;
      $redirect .= "&add=" . ($add ? 1 : 0);

      foreach ($messages as $msg) {
            $redirect .= "&messages[]=" . urlencode($msg);
      }

      Header('Location: ' . $redirect);
}

function getMembers()
{
      $mailconnect = htmlspecialchars($_POST['mailconnect']);
      $passconnect = password_hash($_POST['passconnect']);

      $MembersManager = new MembersManager();
      $userinfo = $MembersManager->getMembers($mailconnect, $passconnect);
      $userexist = $userinfo->rowCount();

      if ($userexist == 1) {
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['firstname'] = $userinfo['firstname'];
            $_SESSION['mail'] = $userinfo['mail'];

            header("Location: index.php");
      } else {
            $erreur = "Mauvais mail ou mot de passe !";
      }
}

function logout()
{
      $_SESSION = array();
      session_destroy();

      header('Location: index.php');
}