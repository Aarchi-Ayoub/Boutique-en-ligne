<?php


class Login
{
    private static $tbl_customer = 'tbl_customer';
    private $cust_email;
    private $cust_passsword;
    private  $cust_status;
    private  $password_db;

    public function CheckIfEmailCorrect()
    {
        global $db;
        $this->cust_email = strip_tags($_POST['email']);
        $statement = "SELECT * FROM " . self::$tbl_customer . " WHERE cust_email = '$this->cust_email'";
        $exec = $db->exec_query($statement);
        $total = mysqli_num_rows($exec);
        return $total;

    }
    public function CheckIfPassCorrect(){
        global $db;
        $this->cust_passsword = strip_tags($_POST['pass']);
        $this->cust_email = strip_tags($_POST['email']);
        $statement = "SELECT * FROM " . self::$tbl_customer . " WHERE cust_email = '$this->cust_email'";
        $exec = $db->exec_query($statement);

        while($row = mysqli_fetch_assoc($exec)){
            $this->password_db = $row['cust_password'];
        }
        if($this->password_db != md5($this->cust_passsword)){
            return "not match";//not match
        }

    }

    public function  CheckStatus(){

        global $db;
        $tableau = array();
       $this->cust_email = strip_tags($_POST['email']);
        $statement = "SELECT * FROM " . self::$tbl_customer . " WHERE cust_email = '$this->cust_email'";
        $exec = $db->exec_query($statement);

        while($row = mysqli_fetch_assoc($exec)){
            $this->cust_status = $row['cust_status'];

            if($this->cust_status == 0  ){
                return "status 0";//not match
            }else{
                $_SESSION['customer'] = $row;
                $tableau =  $_SESSION['customer'];
                return   $tableau;
            }

        }



    }





}
$login = new Login();