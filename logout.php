<?php
require 'autoloader.php';
//session_start();
$userSession = new UserSession();

 
//destruction de la session quand on se deconnecte 
$userSession->destroy();
//unset($_SESSION['user']);
header("Location: index.php");
exit();
 