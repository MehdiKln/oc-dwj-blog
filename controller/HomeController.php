<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
}

require_once('model/ChaptersManager.php');

function home()
{
	$ChaptersManager = new ChaptersManager();
	$lastPost = $ChaptersManager->getLastPost();
	saveChaptersTitlesOnSession();

	require('view/frontEnd/indexview.php');
}

function saveChaptersTitlesOnSession()
{
	$ChaptersManager = new ChaptersManager(); 
    $getPosts = $ChaptersManager->getPosts(); 
    $_SESSION["dropdown"] = $getPosts;
}		