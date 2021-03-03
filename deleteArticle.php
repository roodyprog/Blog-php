<?php
require 'autoloader.php';

$userSession = new UserSession();
 
if (!$userSession->isConnected()) {
    header('Location: index.php');
    exit();
}
$article = $_GET['article'];

$articleModel = new ArticleModel();
$articleModel->delete($article);
$_SESSION['notification'] = 'Article supprimée';
header('Location: index.php');
exit(); 

