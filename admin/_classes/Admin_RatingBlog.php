<?php


class Admin_RatingBlog
{
    private static $tbl_rating = 'tbl_rating_blog';
    private static $tbl_blog = 'blog';
    private static $tbl_customer = 'tbl_customer';

    public function all_Rating_blog(){
        global $db;
        $stat = "SELECT *  	FROM " .self::$tbl_rating . " t1
            						JOIN " . self::$tbl_blog . " t2
            						ON t1.blog_id = t2.id
            						JOIN " . self::$tbl_customer. " t3
            						ON t1.cust_id = t3.cust_id
            						ORDER BY t1.rt_b_id DESC";
        $exec = $db->exec_query($stat);
        $i = 0;
        while ($row = mysqli_fetch_assoc($exec)){
            $i++;
            ?>
            <tr class="<?php if($row['status']==1) {echo 'bg-g';}else {echo 'bg-r';} ?>">
                <td><?php echo $i; ?></td>
                <td><?php echo $row['title']; ?></td>
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
                        <a href="#" class="btn btn-success btn-xs enabled_rating_blog" id="<?php echo $row['rt_b_id'] ?>">Activé</a>
                    <?php }else{
                        ?>
                        <a href="#" class="btn btn-warning btn-xs disabled_rating_blog" id="<?php echo $row['rt_b_id'] ?>">désactivé</a>
                    <?php  }
                    ?>

                </td>
                <td> <a href="#" class="btn btn-danger btn-xs delete_rating_blog" id="<?php echo $row['rt_b_id'] ?>">Supprimer</a></td>

            </tr>


        <?php }


    }
    public  function switch_Disabled_blog($id){
        global $db;
        $stat = "UPDATE " . self::$tbl_rating . " SET status = 0   WHERE rt_b_id = " . $db->escape_string(intval($id));
        $db->exec_query($stat);

    }
    public  function switch_Enabled_blog($id){
        global $db;
        $stat = "UPDATE " . self::$tbl_rating . " SET status = 1   WHERE rt_b_id = " . $db->escape_string(intval($id));
        $db->exec_query($stat);

    }

    public  function  Delete_rating_blog($id){
        global $db;
        $stat = "DELETE FROM  " . self::$tbl_rating . "  WHERE rt_b_id = " . $db->escape_string(intval($id));
        $db->exec_query($stat);

    }
}
$Admin_RatingBlog = new Admin_RatingBlog();