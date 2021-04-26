<?php


class Admin_Rating
{
    private static $tbl_rating = 'tbl_rating';
    private static $tbl_product = 'tbl_product';
    private static $tbl_customer = 'tbl_customer';

    public function all_Rating(){
        global $db;
        $stat = "SELECT *  	FROM " .self::$tbl_rating . " t1
            						JOIN " . self::$tbl_product . " t2
            						ON t1.p_id = t2.p_id
            						JOIN " . self::$tbl_customer. " t3
            						ON t1.cust_id = t3.cust_id
            						ORDER BY t1.rt_id DESC";
        $exec = $db->exec_query($stat);
        $i = 0;
        while ($row = mysqli_fetch_assoc($exec)){
            $i++;
            ?>
            <tr class="<?php if($row['status']==1) {echo 'bg-g';}else {echo 'bg-r';} ?>">
                <td><?php echo $i; ?></td>
                <td><?php echo $row['p_name']; ?></td>
                <td>
                    Nom: <?php echo $row['cust_name']; ?><br>
                    Email: <?php echo $row['cust_email']; ?>
                </td>
                <td><?php echo $row['rating']; ?></td>
                <td><?php echo $row['comment']; ?></td>
                <td><?php if($row['status']==1) {echo 'Actif';} else {echo 'Inactif';} ?></td>
                <td>
                    <?php
                      if($row['status'] == 0){
                          ?>
                          <a href="#" class="btn btn-success btn-xs enabled_rating" id="<?php echo $row['rt_id'] ?>">Activé</a>
                     <?php }else{
                          ?>
                          <a href="#" class="btn btn-warning btn-xs disabled_rating" id="<?php echo $row['rt_id'] ?>">désactivé</a>
                    <?php  }
                    ?>

                </td>
                <td> <a href="#" class="btn btn-danger btn-xs delete_rating" id="<?php echo $row['rt_id'] ?>">Supprimer</a></td>

            </tr>


       <?php }


    }

    public  function switch_Disabled($id){
        global $db;
        $stat = "UPDATE tbl_rating SET status = 0   WHERE rt_id = " . $db->escape_string(intval($id));
        $db->exec_query($stat);

    }
    public  function switch_Enabled($id){
        global $db;
        $stat = "UPDATE tbl_rating SET status = 1   WHERE rt_id = " . $db->escape_string(intval($id));
        $db->exec_query($stat);

    }

    public  function  Delete_rating($id){
        global $db;
        $stat = "DELETE FROM  " . self::$tbl_rating . "  WHERE rt_id = " . $db->escape_string(intval($id));
        $db->exec_query($stat);

    }
}
$admin_rating = new Admin_Rating();