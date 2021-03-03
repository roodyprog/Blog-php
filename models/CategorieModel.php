<?php

class CategorieModel extends Model
{
    public function __construct()
    {
        //appelle construct class model
        parent::__construct();
    }
 

    //show categorie
    public function getCategorie()
    {

        $sql = "SELECT * FROM categorie"; //execution de notre requete
        $categories = $this->database->queryAll($sql,array());
        return $categories;
    }
}
