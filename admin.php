<?php
require "models/CategorieModel.php";
require "class/UserSession.class.php";
$userSession = new UserSession();
// si un  utilisateur c'est connecté
if ($userSession->isConnected()) {
    header('Location: login.php');
    exit();
}
$categorieModel = new CategorieModel() ;
$categories = $categorieModel->getCategorie();

$template = 'views/admin.phtml';
require "views/layout.phtml";
