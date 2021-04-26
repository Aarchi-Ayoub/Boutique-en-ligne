<?php


class Customer
{
    private static $tbl_customer = 'tbl_customer';
    private static $tbl_rating = 'tbl_rating';
    private  $folder_tmp = ROOT.DS.'assets'.DS.'img'.DS.'img_customer';
    private $file;

    public function AllCustomer(){
        global $db;
        $stat = "SELECT * FROM " . self::$tbl_customer;
        $exec= $db->exec_query($stat);
        $i = 0;
        while ($row = mysqli_fetch_assoc($exec)){
            $i++;
            ?>
            <tr class="<?php if($row['cust_status']==1) {echo 'bg-g';}else {echo 'bg-r';} ?>">
                <td><?php echo $i; ?></td>
                <td><?php echo $row['cust_name']; ?></td>
                <td><?php echo $row['cust_email']; ?></td>
                <td>
                    <?php echo $row['cust_country']; ?><br>
                    <?php echo $row['cust_city']; ?><br>
                    <?php echo $row['cust_state']; ?>
                </td>
                <td><?php if($row['cust_status']==1) {echo 'Actif';} else {echo 'Inactif';} ?></td>

                <td>
                    <?php
                    if($row['cust_status'] == 0){
                        ?>
                        <a href="#" class="btn btn-success btn-xs enabled_customer" id="<?php echo $row['cust_id'] ?>">Activé</a>
                    <?php }else{
                        ?>
                        <a href="#" class="btn btn-warning btn-xs disabled_customer" id="<?php echo $row['cust_id'] ?>">désactivé</a>
                    <?php  }
                    ?>

                </td>
                <td> <a href="#" class="btn btn-danger btn-xs delete_customer" id="<?php echo $row['cust_id'] ?>">Supprimer</a></td>

            </tr>


        <?php }





    }
    public  function switch_Disabled($id){
        global $db;
        $stat = " UPDATE " . self::$tbl_customer . " SET cust_status = 0   WHERE cust_id = " . $db->escape_string(intval($id));
        $db->exec_query($stat);

    }
    public  function switch_Enabled($id){
        global $db;
        $stat = "UPDATE " . self::$tbl_customer . " SET cust_status = 1   WHERE cust_id = " . $db->escape_string(intval($id));
        $db->exec_query($stat);

    }

    public  function  Delete_customer($id){
        global $db;
          $sel = " SELECT * FROM " . self::$tbl_customer . " WHERE cust_id =  " . $db->escape_string(intval($id));
          $exec = $db->exec_query($sel);
          while($row = mysqli_fetch_assoc($exec)){
              $this->file = $row['cust_photo'];
              unlink($this->folder_tmp.DS.$this->file);
          }


        $stat = "DELETE FROM  " . self::$tbl_customer . "  WHERE cust_id = " . $db->escape_string(intval($id));
        $db->exec_query($stat);


        $stat2 = "DELETE FROM  " . self::$tbl_rating . "  WHERE cust_id = " . $db->escape_string(intval($id));
        $db->exec_query($stat2);

    }

}
$Admin_customer = new Customer();