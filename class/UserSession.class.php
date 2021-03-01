<?php
class UserSession{
    private $id;
    private $email;
    private $firstname;
    private  $lastname;
    private  $role;

   
    //construteur
    public  function __construct(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();     
        }
        if($this->isConnected()){//hydratation
            $this->id = $_SESSION['user']['id'];
            $this->email = $_SESSION['user']['email'];
            $this->firstname = $_SESSION['user']['firstname'];
            $this->lastname = $_SESSION['user']['lastname'];
            $this->role = $_SESSION['user']['role'];
        }
    }
     //création des accesseurs et mutateurs
    ///////////////////////////////////////////////////////
    public function setId(int $id):void//mutateur
    {
        $this->id = $id;
    }
    public function getId()//accesseur
    {
        return $this->id;
    }
    ///////////////////////////////////////////////////////
    public function setLogin( $login){
        $this->login =$login;
    }
    public function getLogin()
    {
        return $this->login;
    }
    ///////////////////////////////////////////////////////
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getPassword()
    {
        return $this->password;
    }
    ///////////////////////////////////////////////////////
    public function setFirstname( $firstname)
    {
        $this->firstname = $firstname;
    }
    public function getFirstname()
    {
        return $this->firstname;
    }
    ///////////////////////////////////////////////////////
    public function setLastname( $lastname)
    {
        $this->lastname = $lastname;
    }
    public function getLastname()
    {
        return $this->lastname;
    }
    ///////////////////////////////////////////////////////
    public function setRole( $role)
    {
        $this->role = $role;
    }
    public function getRole()
    {
        return $this->role;
    }

    //METHODE QUI RETOURNE SI OU NON L'USER EST CONNECTÉ
    public function isConnected()
    {
        if(empty($_SESSION)){
            return false;//est vide
        }
        else{//n'est pas vide
            return true;
        }
    }
    public function destroy(){
        unset($_SESSION['user']['login']);//detruit la variable session
    }
    public function createSession($id, $login, $firstname, $lastname, $role)
    {
        $this->id = $id;
        $this->email = $login;
        $this->firstname = $firstname;
        $this->lastname =$lastname;
        $this->role = $role;

        $_SESSION['user']=["id"=>$id, "login"=>$login, "firstname"=>$firstname, "lastname" => $lastname, "role" => $role];
    }
}
