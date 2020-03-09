<?php

abstract class Conexao{
    public $db_host = "localhost";
    public $db_name = "login";
    public $db_user = "root";
    public $db_password = "";

    public function Conectar(){
                
        try{
            $con = new PDO("mysql:dbname=$this->db_name;host=$this->db_host", $this->db_user, $this->db_password);
            return $con;
        } catch(PDOException $e){
            echo "[ ERRO ] " . $e->getMessage();
        }
    }

}