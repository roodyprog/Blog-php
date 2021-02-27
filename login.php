<?php
require "models/UserModel.php";
session_start(); //initaliser la session avec l'utilisateur

 
//var_dump($user);
$alert="";

//RECUPERER LES DONNÉES DU FORMULAIRES 
if (!empty($_POST['login']) && !empty($_POST['password'])){
    
    $userModel = new UserModel();
    $user = $userModel->verifyLogin($_POST['login']);

    $login = $user['login'];
    $password = $user['password'];
    //Si OK => $_SESSION["connexion"] = "OK"; => REDIRECTION VERS LA PAGE ADMIN.PHP
    if(password_verify($_POST['password'], $user['password'])){

        $_SESSION['login'] = $login;
        header('Location: admin/admin.php');
        exit();
    }else{
        $alert = "le mot de passe ou le nom d'utilisateur est incorrect";
    }
} 
$template= "views/login.phtml";
require "views/layout.phtml";