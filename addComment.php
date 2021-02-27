<?php
require "models/CommentModel.php";
session_start();

//requete SQL
/*var_dump($_GET);
var_dump($_POST);*/
$pseudo = $_POST['pseudo'];
$article=$_GET['article'];
$message = $_POST['comment'];

$commentModel = new CommentModel();
$commentModel->addComment($pseudo, $article, $message);
if (!empty($pseudo) && !empty($pseudo)) {
    header("Location: article.php?article=$article");
    exit();
}
