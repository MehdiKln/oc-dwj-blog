<?php $title = "Bienvenue sur le template" ?>

<?php ob_start(); ?>

<!-- ici se trouve le contenu -->

<?php $content = ob_get_clean(); ?>

<?php require("template.php") ?>