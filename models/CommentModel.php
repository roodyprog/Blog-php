<?php
require_once "authModel.php";
class CommentModel
{
    //login data base
    public function connexion()
    {

        $datebase = new DataBase();
        $bdd = $datebase->loginDataBase('blog', 'root', '');
        return $bdd;
    }
    
    //ajouter un commentaire
    public function addComment($pseudo, $article, $message)
    {
        $bdd = $this->connexion();

        $add_comment = $bdd->prepare("INSERT INTO comment (idComment, pseudo, idArticle, message, dateComment) VALUES (NULL,?,?,?,NOW())");
        $add_comment->execute([$pseudo, $article, $message]);
    }

    //show commentaire
    public function getComment()
    {
        $bdd = $this->connexion();

        $comments = $bdd->prepare('SELECT * FROM comment WHERE idArticle = ? ORDER BY message DESC LIMIT 3 ');
        $comments->execute([$_GET['article']]);
        $messages = $comments->fetchAll(PDO::FETCH_ASSOC);
        return $messages;
    }
}
