<?php
require_once "authModel.php";

class ArticleModel
{
    //login data base
    public function connexion()
    {

        $datebase = new DataBase();
        $bdd = $datebase->loginDataBase('blog', 'root', '');
        return $bdd;
    }
    //ajouter un article
    public function createArticle($title, $content, $uploadfile, $categorie)
    {
        $bdd = $this->connexion();
        $add_article = $bdd->prepare("INSERT INTO `article` (title,content,image,idArticle,idUser,dateArticle,idCategorie) VALUES (?,?,?,null,1,NOW(),?)");
        $add_article->execute([$title, $content, $uploadfile, $categorie]);

    }
    //show tous les articles
    public function getAllArticles()
    {
        $bdd = $this->connexion();

        $reponse = $bdd->prepare('SELECT article.*, categorie.name, user.lastname,user.firstname FROM `article`, categorie, user WHERE article.idCategorie = categorie.idCategorie AND article.idUser = user.idUser ORDER BY dateArticle DESC');
        $reponse->execute();
        $articles = $reponse->fetchAll(PDO::FETCH_ASSOC);
        return $articles;
    }
    
    //show un article selectionnée
    public function getArticle($article){
        $bdd = $this->connexion();

        $reponse = $bdd->prepare('SELECT article.*, categorie.name, user.lastname,user.firstname FROM `article`,categorie, user WHERE article.idCategorie = categorie.idCategorie AND article.idUser = user.idUser AND idArticle = ?');
        $reponse->execute([$article]);
        $article = $reponse->fetch(PDO::FETCH_ASSOC);

        return $article;
    }
    //show article update 
    public function getUpdateArticle($article){
        $bdd = $this->connexion(); 

        $reponse = $bdd->prepare('SELECT article.*, categorie.name, user.lastname,user.firstname FROM `article`,categorie, user WHERE article.idCategorie = categorie.idCategorie AND article.idUser = user.idUser AND idArticle = ?');
        $reponse->execute([$article]);
        $article = $reponse->fetch(PDO::FETCH_ASSOC);
        return $article;
    }
    //delete article
    public function delete($article){
        $bdd = $this->connexion(); 

        $delete = $bdd->prepare('DELETE FROM `article` WHERE `article`.`idArticle` = ?');
        $delete->execute([$article]);
    }
    //mise a jour article
    public function update($title, $content, $categorie, $article){
        $bdd = $this->connexion();
        $update = $bdd->prepare('UPDATE article SET title = ?, content =?, dateArticle = NOW(), idCategorie = ? WHERE article.idArticle = ?');
        $update->execute([$title, $content, $categorie, $article]);
    }
    public function updateImage($uploadfile,$article)
    {
        $bdd = $this->connexion();
        $update = $bdd->prepare('UPDATE article SET image = ? WHERE article.idArticle = ?');
        $update->execute([$uploadfile, $article]);
    }
}
