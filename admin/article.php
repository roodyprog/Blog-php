<?php
require ".../models/ArticleModel.php";
require "../models/CommentModel.php";
session_start(); //on commence une session
 
//show article
$articleModel = new ArticleModel();
$article = $articleModel->getArticle($_GET['article']);

//show commentaire article
$commentModel = new commentModel();
$messages = $commentModel->getComment();

//si la variable article est vide ou l'idArticle n'existe pas alors redirige vers index.php
if (empty($_GET['article']) || empty($article['idArticle'])) {
    header('Location: ./index.php');
    exit();
}
//var_dump([$articles,$comment]);
$template = "views/article.phtml";
require "../views/layout.phtml";