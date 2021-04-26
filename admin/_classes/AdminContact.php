<?php


class AdminContact
{
private  static $tbl_contact = 'tbl_contact';
    public function all_comments(){
        global $db;
        $stat = "SELECT *  	FROM " .self::$tbl_contact . " ORDER BY id DESC";

        $exec = $db->exec_query($stat);
        $i = 0;
        while ($row = mysqli_fetch_assoc($exec)){
            $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td>
                    Email: <?php echo $row['email']; ?>
                </td>
               <td><?php echo $row['messsage']; ?></td>

                <td> <a href="#" class="btn btn-danger btn-xs delete_comment" id="<?php echo $row['id'] ?>">Supprimer</a></td>

            </tr>


        <?php }


    }
    public function delete_comment($id){
        global $db;
        $stat = "DELETE FROM  " . self::$tbl_contact . "  WHERE id = " . $db->escape_string(intval($id));
        $db->exec_query($stat);

    }

}
$Admincontact = new AdminContact();