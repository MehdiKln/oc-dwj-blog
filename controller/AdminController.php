<?php  if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

 require_once("model/ChaptersManagerModel.php");
 require_once("model/ReportManager.php");

function viewDashboard()
{	
	$reportManager = new ReportManager();
    $reports = $reportManager->getReports();

    $ChaptersManager = new ChaptersManager();
    $countPost = $ChaptersManager->countPost();

    $MembersManager = new MembersManager();
    $countUser = $MembersManager->countUser();

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

	Header('Location: index.php?action=dashboard&new-post=success');
		
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

    Header('Location: index.php?action=dashboard&update-post=success');
}


function deletePost($id)
{    
    $ChaptersManager = new ChaptersManager(); 
    $ChaptersManager->deletePost($id);

    Header('Location: index.php?action=dashboard&remove-post=success');
}

?>