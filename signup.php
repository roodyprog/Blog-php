<?php
require "models/UserModel.php";
session_start();

$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$pseudo = $_POST['pseudo'];
$password = $_POST['password'];


$template = "views/signup.phtml";
require "views/layout.phtml";