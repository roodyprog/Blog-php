<?php
//
//class Enfant de model
class ArticleModel extends Model
{
    public function __construct()
    {
        //appelle construct class model
        parent::__construct();
    }
 
    //ajouter un article
    public function createArticle($title, $content, $uploadfile, $categorie)
    {
        //$bdd = $this->connexion();
        $sql = "INSERT INTO `article` (title,content,image,idArticle,idUser,dateArticle,idCategorie) VALUES (?,?,?,null,1,NOW(),?)";
        $id = $this->database->executeSql($sql,array($title,$content,$uploadfile,$categorie));
        return $id;

    }
    //show tous les articles
    public function getAllArticles()
    {
        $sql = 'SELECT article.*, categorie.name, user.lastname,user.firstname FROM `article`, categorie, user WHERE article.idCategorie = categorie.idCategorie AND article.idUser = user.idUser ORDER BY dateArticle DESC';
        $articles = $this->database->queryAll($sql, array());
        return $articles;
    }
    
    //show un article selectionnée
    public function getArticle($article){


        $sql = 'SELECT article.*, categorie.name, user.lastname,user.firstname FROM `article`,categorie, user WHERE article.idCategorie = categorie.idCategorie AND article.idUser = user.idUser AND idArticle = ?';
        $article = $this->database->queryOne($sql,array($article));
        return $article;
    }
    //show article update 
    public function getUpdateArticle($article){

        $sql = 'SELECT article.*, categorie.name, user.lastname,user.firstname FROM `article`,categorie, user WHERE article.idCategorie = categorie.idCategorie AND article.idUser = user.idUser AND idArticle = ?';
        $article = $this->database->queryOne($sql, array($article));
        return $article;
    }
    //delete article
    public function delete($article){

        $sql = 'DELETE FROM `article` WHERE `article`.`idArticle` = ?';
        $delete = $this->database->executeSql($sql,array($article));
    }
    //mise a jour article
    public function update($title, $content, $categorie, $article){

        $sql = 'UPDATE article SET title = ?, content =?, dateArticle = NOW(), idCategorie = ? WHERE article.idArticle = ?';
        $update = $this->database->executeSql($sql,array($title, $content, $categorie, $article));
    }
    public function updateImage($uploadfile,$article)
    {
        $sql = 'UPDATE article SET image = ? WHERE article.idArticle = ?';
        $update = $this->database->executeSql($sql,array($uploadfile, $article));
    }
}
