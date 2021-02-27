<?php
require "models/CategorieModel.php";
session_start(); // connexion session

 
// si un  utilisateur c'est connecté
if (empty($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}
$categorieModel = new CategorieModel() ;
$categories = $categorieModel->getCategorie();

$template = 'views/admin.phtml';
require "views/layout.phtml";
