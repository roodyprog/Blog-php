<?php
//classe Mère de tous les models
class Model{
    protected $database;
    
    public function __construct(){
        $this->database = new Database();
    }
}