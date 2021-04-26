<?php


class Databases
{
    private $Connection;

    public function __construct()
    {
        $this->connection_with_db();
    }


    public function getConnection(){
        return $this->Connection;
    }
    public static function getConnectionStatic(){
        return self::getConnection();
    }


    public function  connection_with_db(){

        $this->Connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        if($this->Connection == true){
            return 'connected';
        }else{
            die('site web en maintenance');
            exit;
        }

    }

    /**
     * @param $string
     * @return mixed
     * execution de requete = mysqli_query()
     */
    public function exec_query($sql){
        return $this->Connection->query($sql);
    }

    public function escape_string($string){
        return $this->Connection->real_escape_string($string);

    }

}
$db = new Databases();