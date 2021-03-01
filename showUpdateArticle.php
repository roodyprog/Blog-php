<?php
require "models/ArticleModel.php";
require "class/UserSession.class.php";

$userSession = new UserSession();
 
$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');//connexion base de donnée
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //affiche le log d'erruer

$article = $_GET['article'];

$articleModel = new ArticleModel();
$article = $articleModel->getUpdateArticle($article);
$template = "views/showUpdateArticle.phtml";
require "views/layout.phtml";
//