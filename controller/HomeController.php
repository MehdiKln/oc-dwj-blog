<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
}

require_once('model/ChaptersManager.php');

function home() // affichage Accueil
{
	$ChaptersManager = new ChaptersManager();
	$lastPost = $ChaptersManager->getLastPost();
	saveChaptersTitlesOnSession(); // appel à la fonction de sauvegarde des chapitres en session dès l'ouverture de la page d'accueil

	require('view/frontEnd/indexview.php');
}

function saveChaptersTitlesOnSession() // sauvegarde des chapitres en session pour le dropdown
{
	$ChaptersManager = new ChaptersManager(); 
    $getPosts = $ChaptersManager->getPosts(); 
    $_SESSION["dropdown"] = $getPosts;
}		