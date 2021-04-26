<?php


class Admindashbord
{
   public function counting($sql){
        global $db;
      $stat = $sql;
      $exec = $db->exec_query($stat);
      $total = mysqli_num_rows($exec);
      return $total;

    }

}
$Admindashbord = new Admindashbord();