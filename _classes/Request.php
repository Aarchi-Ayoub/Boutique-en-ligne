<?php


abstract  class Request{

    public static  function check_url_if_id_exist($request,$location,$table,$id_table){
        global $db;
        $sql = "SELECT * FROM " . $table . " WHERE " . $id_table . " = " . $db->escape_string(intval($request));
        $exec = $db->exec_query($sql);
        $total = mysqli_num_rows($exec);
        /*
           total  =  product has no data in table
           request = id number
        */


        if(!isset($request)||  $total == 0){
            header('location: ' . $location);
            exit;
        }

    }
}