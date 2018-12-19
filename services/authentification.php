<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

class authentification 
{
	public function adminCheck() {

		if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') { 
			Header('Location: index.php'); 
		} else { 
			viewDashboard();
		}
	}
}