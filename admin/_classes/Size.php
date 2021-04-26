<?php


class Size extends Request
{
    private static  $tbl_size = 'tbl_size';
    private $size_id;
    private $size_name;
    public function  getAllSize(){
        global $db;
        $statement = "SELECT * FROM " . self::$tbl_size . " ORDER BY size_id ";
        $exec = $db->exec_query($statement);
        $i = 1;
        while($row = mysqli_fetch_assoc($exec)){

            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['size_name']; ?></td>
                <td>
                    <a href="size-edit.php?id=<?php echo $row['size_id']; ?>" class="btn btn-primary btn-xs">Éditer</a>
                    <a href="#" class="btn btn-danger btn-xs delete_size" id="<?php echo $row['size_id'] ?>">Supprimer</a>
                </td>
            </tr>
<?php
            $i++;

        }

    }

    public function  checkSize($size_name){
        global $db;
        $stat = "SELECT * FROM " . self::$tbl_size . " WHERE size_name = '$size_name'";
         $exec = $db->exec_query($stat);
         $total = mysqli_num_rows($exec);
         return $total;

    }
    public  function insert_size(){
        global $db;
        $this->size_name = $_POST['size_name'];
        $stat="INSERT INTO " . self::$tbl_size  .  " (`size_name`) VALUES ('$this->size_name') ";
        $db->exec_query($stat);
    }

    public function CheckIfIdExist($request){
        echo  Request::check_url_if_id_exist($request,'size.php',self::$tbl_size,'size_id');
    }

    public function  getSizeBy_Id($id){
        global $db;
        $stat = "SELECT * FROM " . self::$tbl_size . " WHERE size_id = " . $db->escape_string(intval($id));
        $execute = $db->exec_query($stat);
        while($row = mysqli_fetch_assoc($execute)){
            $this->size_name = $row['size_name'];
        }
        return $this->size_name;
    }
    public function Check_size_Exist($id){
        global $db;
        $te = '';

        $stat = "SELECT * FROM " . self::$tbl_size . " WHERE size_id = " . $db->escape_string(intval($id));
        $execute = $db->exec_query($stat);
        while($row = mysqli_fetch_assoc($execute)){
            $this->size_name = $row['size_name'];
        }
        $size_name = $_POST['size_name'];

       //Ex : SELECT * FROM `tbl_size` WHERE size_name='S' and size_name!='XS' ==  data
        //Ex : SELECT * FROM `tbl_size` WHERE size_name='XS' and size_name!='XS' == no data exist
        $query = "SELECT * FROM " . self::$tbl_size . " WHERE size_name = '$size_name' and size_name!='$this->size_name' ";
        $exec = $db->exec_query($query);

        $total = mysqli_num_rows($exec);

        if($total){
            // data exit
            $te =  "exist";
        }
        return $te;



    }
    public function  Update_Size($id){
      global $db;
        $this->size_name = $_POST['size_name'];
        $stat = "UPDATE " . self::$tbl_size . " SET size_name = '$this->size_name' WHERE size_id = " . $db->escape_string(intval($id));
        $db->exec_query($stat);
    }
    public function  Delete_Size($id){
        global $db;
        $stat = "DELETE FROM " . self::$tbl_size . " WHERE size_id = " . $db->escape_string(intval($id));
        $db->exec_query($stat);
    }

}
$size = new Size();