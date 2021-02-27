<?php
require "authModel.php";
class CategorieModel
{
    //login data base
    public function connexion()
    {

        $datebase = new DataBase();
        $bdd = $datebase->loginDataBase('blog', 'root', '');
        return $bdd;
    }

    //show categorie
    public function getCategorie()
    {
        $bdd = $this->connexion();

        $reponse = $bdd->prepare("SELECT * FROM categorie"); //execution de notre requete
        $reponse->execute(); //execute la requete
        $categories = $reponse->fetchAll(PDO::FETCH_ASSOC); // on parcour dans un tableu 
        return $categories;
    }
}
