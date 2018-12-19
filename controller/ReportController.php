<?php

require_once('model/ReportManager.php');

function postReport($id, $post_id, $user_id) 
{
    $reportManager = new ReportManager();
    $reported = $reportManager->postReport($id, $user_id);
    $message = "Ce commentaire a bien été signalé ! ";
    $_SESSION["message"] = $message;

    Header('Location: index.php?action=show&id=' . $post_id . ' &remove-comment=success');
}
