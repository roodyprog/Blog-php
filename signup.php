<?php
require 'autoloader.php';

$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$pseudo = $_POST['pseudo'];
$password = $_POST['password'];


$template = "views/signup.phtml";
require "views/layout.phtml";