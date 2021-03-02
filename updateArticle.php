<?php
//////////////////////////////////////////////
//LES REQUIRES
require 'autoloader.php';

//////////////////////////////////////////
$userSession = new UserSession();

$article = $_GET['article'];
$title = $_POST['title'];
$content = $_POST['content'];
$categorie = $_POST['categorie'];
$date = $_POST['date'];
if(!empty($_FILES)){
    $uploaddir = 'img/uploads/';
    $uploadfile = $uploaddir . basename($_FILES['image']['name']);
    //var_dump($_FILES);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
        $articleModel = new ArticleModel();
        $articleModel->updateImage($uploadfile,$article);
    }
}

$articleModel = new ArticleModel();
$articleModel->update($title, $content, $categorie, $article);

//var_dump([$_FILES,$_POST]);

header('Location: admin.php');
exit();
//$update->execute();
