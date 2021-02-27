<?php
require "models/ArticleModel.php";
session_start(); //on commence une session

$articleModel = new ArticleModel();
$articles = $articleModel->getAllArticles();

//substr($articles['content'], 0, 100);
$template = "views/index.phtml";
require "views/layout.phtml";