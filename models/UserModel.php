<?php
require './autoloader.php';
class UserModel extends Model
{
    public function __construct()
    {
        //appelle construct class model
        parent::__construct();
    }
  
    
    public function verifyLogin($login)
    {
        $sql = 'SELECT * FROM user WHERE login = ?'; //execution de notre requete
        $user = $this->database->queryOne($sql,array($login));// on parcour dans un tableu 6
        return $user;
    }

    public function signUp(){
      
        //requete prepare 
        $sql = 'INSERT INTO user() VALUES()';
    }
}
