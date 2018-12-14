<?php

    require_once("controller/HomeController.php");
    require_once("controller/ChaptersController.php");
    require_once("controller/AuthorController.php");
    require_once("controller/AdminController.php");
    require_once("controller/CommentsController.php");
    require_once("controller/MembersController.php");

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'chapitres') {
            chapters();
        }
        elseif ($_GET['action'] == 'author') {
                author();
        }
        elseif ($_GET['action'] == 'dashboard') {
            viewDashboard();
        }
        elseif ($_GET['action'] == 'submitPost') {
            newPost();                
        }
        elseif ($_GET['action'] == 'show') {
            show();
        }
        elseif ($_GET['action'] == 'deletePost') {
            deletePost($_GET['id']);
        }
        elseif ($_GET['action'] == 'editPost') {
            displayUpdate();
        }
        elseif ($_GET['action'] == 'submitUpdate') {
            submitUpdate($_POST['title'], $_POST['content'], $_GET['id']);
        }
        elseif ($_GET['action'] == 'addComment') {
            addComment($_GET["id"], $_POST["content"]);
        }
        elseif ($_GET['action'] == 'deleteComment') {
            deleteComment($_GET['id']);
        }
        elseif ($_GET['action'] == 'display_addMember') {
            display_addMember();
        }
        elseif ($_GET['action'] == 'addMember') {
            if (!empty($_POST['firstname']) && !empty($_POST['name']) && !empty($_POST['pass']) && !empty($_POST['pass']) && !empty($_POST['mail'])) {
                    if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                          if($_POST['pass'] == $_POST['pass']) {
                             addMember();
                             $reussite = "Votre compte a bien été créé ! <a href=\"index.php/action=display_logIn\">Me connecter</a>";
                          } else {
                             $erreur = "Vos mots de passes ne correspondent pas !";
                          }
                    } else {
                       $erreur = "Votre adresse mail n'est pas valide !";
                    }
            } else {
              $erreur = "Tous les champs doivent être complétés !";
              }
        } 
        elseif ($_GET['action'] == 'display_logIn') {
            display_loginView();
        }
        elseif (isset($_GET['new-post']) &&  $_GET['new-post'] == 'success') {
            echo '<p id="success">L\'article a bien été posté !<p>';
        }
    }

    else {
        home();
    }

?> 