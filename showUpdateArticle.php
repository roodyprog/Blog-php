<?php
require "models/ArticleModel.php";
session_start(); //on commence une session
 
$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');//connexion base de donnée
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //affiche le log d'erruer

$article = $_GET['article'];

$articleModel = new ArticleModel();
$article = $articleModel->getUpdateArticle($article);
$template = "views/showUpdateArticle.phtml";
require "views/layout.phtml";
//