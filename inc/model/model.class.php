<?php
    class Model{
        public static $dbh;
        public static $dsn;

        //...............................//
        public function __construct(){
            Model::$dbh=new PDO(Model::$dsn,'root','toor');
        }
        public function query($sql,$arg=null){
            $result=Model::$dbh->prepare($sql);
            $result->execute($arg);
            return $result;
        }
        //...............................//
        
        public function addStudent($arg){
            $sql="INSERT INTO eleves(CNE,Nom,Prenom,Adresse,Ville,email,Photo,etat)
                values(?,?,?,?,?,?,?,?)";
            return $this->query($sql,$arg);
        }
        public function getTable(){
            $result=Model::$dbh->query("select * from eleves");
            return $result;
        }
        public function getStudent($cne){
            $sql="select * from eleves where cne=?";
            return $this->query($sql,$cne);
        }
        public function obliterate($cne){
            $sql="delete from eleves where CNE=?";
            $this->query($sql,$cne);
        }
        public function modify($arg){
            $sql="update eleves set $arg[0]='$arg[1]' where cne='$arg[2]'";
            $this->query($sql);
        }
    };
    Model::$dsn="mysql:host=127.0.0.1;port=3306;dbname=ensat";
    Model::$dbh=new PDO(Model::$dsn,'root','toor');
?>