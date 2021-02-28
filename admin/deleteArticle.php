<?php
require "../models/ArticleModel.php";
session_start();
 
if (empty($_SESSION['login'])) {
    header('Location: ./index.php');
    exit();
}
$article = $_GET['article'];

$articleModel = new ArticleModel();
$articleModel->delete($article);
$_SESSION['notification'] = 'Article supprimée';
header('Location: ./index.php');
exit(); 

