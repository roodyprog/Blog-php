<?php

class CommentModel extends Model
{
    public function __construct()
    {
        //appelle construct class model
        parent::__construct();
    }
 
    
    //ajouter un commentaire
    public function addComment($pseudo, $article, $message)
    {
        $sql = "INSERT INTO comment (idComment, pseudo, idArticle, message, dateComment) VALUES (NULL,?,?,?,NOW())";
        $this->database->executeSql($sql,array($pseudo, $article, $message));
    }

    //show commentaire
    public function getComment()
    {

        $sql = 'SELECT * FROM comment WHERE idArticle = ? ORDER BY message DESC LIMIT 3 ';
        $messages = $this->database->queryAll($sql,array($_GET['article']));
        return $messages;
    }
}
