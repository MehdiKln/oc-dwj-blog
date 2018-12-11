<?php

    require_once("controller/HomeController.php");
    require_once("controller/ChaptersController.php");
    require_once("controller/AuthorController.php");
    require_once("controller/AdminController.php");

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
            deletePost();
        }
        elseif ($_GET['action'] == 'editPost') {
            displayUpdate();
        }
        elseif ($_GET['action'] == 'submitUpdate') {
            submitUpdate($_POST['title'], $_POST['content'], $_GET['id']);
        }
        elseif (isset($_GET['new-post']) &&  $_GET['new-post'] == 'success') {
            echo '<p id="success">L\'article a bien été posté !<p>';
        }
    }
    else {
        home();
    }

?> 