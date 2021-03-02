<?php
//
spl_autoload_register(function($class_name){
    if(file_exists('models/'.$class_name.'.php')){//verifier si le fichier exist
        require 'models/'.$class_name.'.php';
    }
    if (file_exists('class/' . $class_name . '.class.php')) {
        require 'class/' . $class_name . '.class.php';
    }
});