<?php
require "models/ArticleModel.php";
require_once "class/UserSession.class.php";

$articleModel = new ArticleModel();
$articles = $articleModel->getAllArticles();

$userSession = new UserSession();
//substr($articles['content'], 0, 100);
$template = "views/index.phtml";
require "views/layout.phtml";