<?php

class Database
{
    private $bdd;//COMPOSITION

    public function __construct()
    {
        try {
            $this->bdd = new PDO("mysql:host=localhost;dbname=blog;charset=utf8", 'root', '');
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //return $bdd;
        } catch (Exception $e) {
            echo "Problème de connexion à la base de données.";
            exit(1);
        }
    }
    public function loginDataBase()
    {
       
        /*$bdd = new PDO("mysql:host=localhost;dbname=$dbname_data_base;charset=utf8", $login_data_base, $password_data_base);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;*/  
    }
    //fonction qui va recupére une seul ligne dans la base de donnée
    public function queryOne($sql, $criterias = array()){

        $requete = $this->bdd->prepare($sql);
        $requete->execute($criterias);
        $data = $requete->fetch(PDO::FETCH_ASSOC);
        return $data;

    }
    //fonction qui recupère tout les champs d'une table dans la base de donnée
    public function queryAll($sql,$criterias = array())
    {
        $requete = $this->bdd->prepare($sql);
        $requete->execute($criterias);
        $data = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    //fonction qui execute une requete sql
    public function executeSql($sql,$criterias = array())
    {
        $requete = $this->bdd->prepare($sql);
        $requete->execute($criterias);
        //
        return $this->bdd->lastInsertId();
    }

   



}
