<?php
require 'autoloader.php';

 
//var_dump($_SESSION);
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
        $userSession = new UserSession();
        $userSession->createSession($user['idUser'], $user['login'],$user['password'], $user['firstname'], $user['lastname'], $user['role']);
        header('Location: admin.php');
        exit();
    }else{
        $alert = "le mot de passe ou le nom d'utilisateur est incorrect";
    }
} 
$template= "views/login.phtml";
require "views/layout.phtml";