<?php

 require_once("model/ChaptersManagerModel.php");

function viewDashboard()
{
 
	// if (isset($_POST["title"]) && isset($_POST["content"])) {
		// var_dump($_POST["title"]); die;


   require('view/backEnd/DashBoardView.php');
}

function newPost() {

	if (empty($_POST['title']) || empty($_POST['content'])) { 
		// Redirection de l'utilisateur (Leave early)
		Header('Location: index.php?action=dashboard'); 
		exit();
	}

	$chaptersManager = new ChaptersManager();
	$newPost = $chaptersManager->createPost($_POST['title'], $_POST['content']);

	Header('Location: index.php?action=admin&new-post=success');
		
}

function displayUpdate() {

    $ChaptersManager = new ChaptersManager();
    $post = $ChaptersManager->findWithId($_GET['id']);

    require('view/backend/updatePostView.php');
}

function submitUpdate($title, $content, $postId) 
{
    $ChaptersManager = new ChaptersManager();
    $updated = $ChaptersManager->updatePost($title, $content, $postId);

    Header('Location: index.php?action=admin&update-status=success');
}


function deletePost($id)
{    
    $ChaptersManager = new ChaptersManager(); 
    $ChaptersManager->deletePost($id);

    Header('Location: index.php?action=admin&remove-post=success');
}

?>