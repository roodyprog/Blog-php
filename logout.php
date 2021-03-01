<?php
require "class/UserSession.class.php";
$userSession = new UserSession();

if ($userSession->isConnected()) {
    header('Location: login.php');
    exit();
}

$userSession->destroy();
//unset($_SESSION['login']);
header("location: index.php");
exit();
 