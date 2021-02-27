<?php
session_start();
if (empty($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}
unset($_SESSION['login']);
header("location:index.php");
exit();
 