<?php


class Color extends  Request
{
    private static  $tbl_color = 'tbl_color';
    private $color_name;
    public function  getAllColor(){
        global $db;
        $statement = "SELECT * FROM " . self::$tbl_color . " ORDER BY color_id ";
        $exec = $db->exec_query($statement);
        $i = 1;
        while($row = mysqli_fetch_assoc($exec)){

            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['color_name']; ?></td>
                <td>
                    <a href="color-edit.php?id=<?php echo $row['color_id']; ?>" class="btn btn-primary btn-xs">Éditer</a>
                    <a href="#" class="btn btn-danger btn-xs delete_color" id="<?php echo $row['color_id'] ?>">Supprimer</a>
                </td>
            </tr>
            <?php
            $i++;

        }

    }
    public function CheckIfIdExist($request){
        echo  Request::check_url_if_id_exist($request,'color.php',self::$tbl_color,'color_id');
    }
    public function  getColorBy_Id($id){
        global $db;
        $stat = "SELECT * FROM " . self::$tbl_color . " WHERE color_id = " . $db->escape_string(intval($id));
        $execute = $db->exec_query($stat);
        while($row = mysqli_fetch_assoc($execute)){
            $this->color_name = $row['color_name'];
        }
        return $this->color_name;
    }
    public function  checkColor($color_name){
        global $db;
        $stat = "SELECT * FROM " . self::$tbl_color . " WHERE color_name = '$color_name'";
        $exec = $db->exec_query($stat);
        $total = mysqli_num_rows($exec);
        return $total;

    }
    public  function insert_color(){
        global $db;
        $this->color_name = $_POST['color_name'];
        $stat="INSERT INTO " . self::$tbl_color  .  " (`color_name`) VALUES ('$this->color_name') ";
        $db->exec_query($stat);
    }
    public function Check_color_Exist($id){
        global $db;
        $te = '';

        $stat = "SELECT * FROM " . self::$tbl_color . " WHERE color_id = " . $db->escape_string(intval($id));
        $execute = $db->exec_query($stat);
        while($row = mysqli_fetch_assoc($execute)){
            $this->color_name = $row['color_name'];
        }
        $color_name = $_POST['color_name'];

        //Ex : SELECT * FROM `tbl_color` WHERE color_name='S' and color_name!='XS' ==  data
        //Ex : SELECT * FROM `tbl_color` WHERE color_name='XS' and color_name!='XS' == no data exist
        $query = "SELECT * FROM " . self::$tbl_color . " WHERE color_name = '$color_name' and color_name!='$this->color_name' ";
        $exec = $db->exec_query($query);

        $total = mysqli_num_rows($exec);

        if($total){
            // data exit
            $te =  "exist";
        }
        return $te;



    }
    public function  Update_Color($id){
        global $db;
        $this->color_name = $_POST['color_name'];
        $stat = "UPDATE " . self::$tbl_color . " SET color_name = '$this->color_name' WHERE color_id = " . $db->escape_string(intval($id));
        $db->exec_query($stat);
    }
    public function  Delete_Color($id){
        global $db;
        $stat = "DELETE FROM " . self::$tbl_color . " WHERE color_id = " . $db->escape_string(intval($id));
        $db->exec_query($stat);
    }
}
$color = new Color();