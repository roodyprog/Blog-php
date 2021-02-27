<?php

class DataBase
{

    public function __construct()
    {
        
    }
    public function loginDataBase()
    {
        try {
            $bdd = new PDO("mysql:host=localhost;dbname=blog;charset=utf8", 'root', '');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $bdd;
        } catch (Exception $e) {
            echo "Problème de connexion à la base de données.";
            exit(1);
        }
        /*$bdd = new PDO("mysql:host=localhost;dbname=$dbname_data_base;charset=utf8", $login_data_base, $password_data_base);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;*/  
    }
}
