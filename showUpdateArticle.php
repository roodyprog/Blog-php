<?php
require 'autoloader.php';

$userSession = new UserSession();
 
$article = $_GET['article'];

$articleModel = new ArticleModel();
$article = $articleModel->getUpdateArticle($article);
$template = "views/showUpdateArticle.phtml";
require "views/layout.phtml";
//