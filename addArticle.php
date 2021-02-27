<?php
require "models/ArticleModel.php";
session_start();

if (empty($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}
 
$title = $_POST['title'];
$content = $_POST['content'];
$categorie = $_POST['categorie'];
$date = $_POST['date'];

$uploaddir = 'img/uploads/';
$uploadfile = $uploaddir . basename($_FILES['image']['name']);
//var_dump($_FILES);
if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
    /* echo "Le fichier est valide, et a été téléchargé
           avec succès. Voici plus d'informations :\n";*/
}  
$articleModel = new ArticleModel();
$articleModel->createArticle($title, $content, $uploadfile, $categorie);

//notification pour l'ajoute d'un article
$_SESSION['notification'] = "article ajoute";
header('Location: admin.php');
exit();