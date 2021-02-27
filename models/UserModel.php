<?php
require "authModel.php";
class UserModel
{
    public function __construct()
    {

    }
    //login data base
    public function connexion()
    {

        $datebase = new DataBase();
        $bdd = $datebase->loginDataBase();
        return $bdd;
    }
    
    public function verifyLogin($login)
    {
        $bdd = $this->connexion();
        $requete = $bdd->prepare('SELECT * FROM user WHERE login = ?'); //execution de notre requete
        $requete->execute([$login]); //execute la requete
        $user = $requete->fetch(PDO::FETCH_ASSOC); // on parcour dans un tableu 6
        return $user;
    }

    public function signUp(){
        $bdd = $this->connexion();
        //requete prepare 
        $requete = $bdd->prepare('INSERT INTO user() VALUES()');
    }
}
