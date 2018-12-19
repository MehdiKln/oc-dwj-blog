<?php $webSiteUrl = $_SERVER['REQUEST_URI']; 
// var_dump($webSiteUrl); ?>

<!DOCTYPE HTML> 
<html>
	<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">
    <link href="vendor/theme/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="public/css/main.css">
    <title> <?= $title ?> </title>
	</head>

<header>
	<?php require("Navbar.php") ?> 
</header>

<body>
 <?= $content ?>
</body>

<footer class="footer">
	<div class="container-fluid">
		<div class="row text-center">
			<div class="col-12 py-2" id="mycol">
				Copyright 2018 Jean Forteroche
			</div>
		</div>
	</div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script type="text/javascript" src="public/js/jquery.min.js"></script>
<script type="text/javascript" src="vendor/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="vendor/tinymce/init-tinymce.js"></script>
<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>

</html>