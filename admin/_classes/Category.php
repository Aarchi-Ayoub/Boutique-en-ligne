<?php


class Category extends Request
{
    private static  $tbl_top_category = 'tbl_category';
    private static  $tbl_sous_category = 'tbl_sous_category';
    private static  $tbl_product = 'tbl_product';
    private static  $tbl_product_size = 'tbl_product_size';
    private static  $tbl_product_color = 'tbl_product_color';
    private static  $tbl_rating = 'tbl_rating';
    private static  $tbl_order = 'tbl_order';
    private static  $tbl_payment = 'tbl_payment';
    private  $top_catname;
    private  $show_menu;
    private  $tcat_id;
    private  $scat_name;
    private  $folder_tmp = ROOT.DS.'assets'.DS.'img'.DS.'img_product';
    public function  getTopCategory(){
        global $db;
        $statement = "SELECT * FROM " . self::$tbl_top_category . " ORDER BY tcat_id ";
        $exec = $db->exec_query($statement);
        $i = 1;
        while($row = mysqli_fetch_assoc($exec)){

            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['tcat_name']; ?></td>
                <td>
                    <?php
                      if($row['show_on_menu'] == 1){
                          echo 'Oui';
                      }else{
                          echo 'Non';
                      }
                    ?>

                </td>
                <td>
                    <a href="top-category-edit.php?id=<?php echo $row['tcat_id']; ?>" class="btn btn-primary btn-xs">Éditer</a>
                    <a href="#" class="btn btn-danger btn-xs delete_top_cat" id="<?php echo $row['tcat_id']; ?>">Supprimer</a>
                </td>
            </tr>
            <?php
            $i++;

        }

    }
    public function  checkTopCat($top_cat_name){
        global $db;
        $stat = "SELECT * FROM " . self::$tbl_top_category . " WHERE tcat_name = '$top_cat_name'";
        $exec = $db->exec_query($stat);
        $total = mysqli_num_rows($exec);
        return $total;

    }
    public  function insert_TopCat(){
        global $db;
        $this->top_catname = $_POST['top_cat_name'];
        $this->show_menu = $_POST['show_menu'];
        $stat="INSERT INTO " . self::$tbl_top_category  .  " (`tcat_name`,`show_on_menu`) VALUES ('$this->top_catname',$this->show_menu) ";
        $db->exec_query($stat);
    }
    public function CheckIfIdExist($request){
        echo  Request::check_url_if_id_exist($request,'top-category.php',self::$tbl_top_category,'tcat_id');
    }

    public function  gettopCatBy_Id($id){
        global $db;
        $tableau = array();
        $stat = "SELECT * FROM " . self::$tbl_top_category . " WHERE tcat_id = " . $db->escape_string(intval($id));
        $execute = $db->exec_query($stat);
        while($row = mysqli_fetch_assoc($execute)){
            $this->top_catname = $row['tcat_name'];
            $this->show_menu = $row['show_on_menu'];
        }
        $tableau = [$this->top_catname,$this->show_menu];
        return $tableau;
    }
    public function Check_topcat_Exist($id){
        global $db;
        $te = '';

        $stat = "SELECT * FROM " . self::$tbl_top_category . " WHERE tcat_id = " . $db->escape_string(intval($id));
        $execute = $db->exec_query($stat);
        while($row = mysqli_fetch_assoc($execute)){
            $this->top_catname = $row['tcat_name'];
        }
        $tcname = $_POST['top_cat_name'];

        //Ex : SELECT * FROM `tbl_top cat` WHERE tcat_name='S' and tcat_name!='XS' ==  data
        //Ex : SELECT * FROM `tbl_top cat` WHERE tcat_name='XS' and tcat_name!='XS' == no data exist
        $query = "SELECT * FROM " . self::$tbl_top_category . " WHERE tcat_name = '$tcname' and tcat_name!='$this->top_catname' ";
        $exec = $db->exec_query($query);

        $total = mysqli_num_rows($exec);

        if($total){
            // data exit
            $te =  "exist";
        }
        return $te;



    }
    public function  Update_TopCat($id){
        global $db;
        $this->top_catname = $_POST['top_cat_name'];
        $this->show_menu = $_POST['show_on_menu'];
        $stat = "UPDATE " . self::$tbl_top_category . " SET tcat_name = '$this->top_catname' , `show_on_menu` = '$this->show_menu' WHERE tcat_id = " . $db->escape_string(intval($id));
        $db->exec_query($stat);
    }
    public function  Delete_TopCat($id){
        global $db;
        $statement1 = "SELECT * FROM " . self::$tbl_top_category. " t1 
                        JOIN " . self::$tbl_sous_category  . " t2
                        ON t1.tcat_id = t2.tcat_id
                        WHERE t1.tcat_id = " . $db->escape_string(intval($id));

        $res = $db->exec_query($statement1);
        while($row = mysqli_fetch_assoc($res)){
            $scat_ids[] = $row['scat_id'];
        }
        if(isset($scat_ids)){
            for($i = 0;$i<count($scat_ids);$i++){
             $get_p_id = "SELECT * FROM " . self::$tbl_product . " WHERE scat_id = " . $scat_ids[$i];
             $res_p_id = $db->exec_query($get_p_id);
             while($row_p_id = mysqli_fetch_assoc($res_p_id)){
                 $p_ids[] = $row_p_id['p_id'];
             }
            }

          for($i = 0;$i<count($p_ids);$i++){
         // Getting photo ID to unlink from folder
            $unlink_photos ="SELECT * FROM " . self::$tbl_product . " WHERE p_id = " . $p_ids[$i];
            $re_un_photos = $db->exec_query($unlink_photos);
            while($row_u_ph = mysqli_fetch_assoc($re_un_photos)){
                $p_photo = $row_u_ph['p_photo'];
                unlink($this->folder_tmp.DS.$p_photo);

            }
// Delete from tbl_product
              $stat1 = "DELETE FROM " . self::$tbl_product . " WHERE p_id = " . $p_ids[$i];
              $db->exec_query($stat1);
              // Delete from tbl_product_size
              $stat2 = "DELETE FROM " . self::$tbl_product_size . " WHERE p_id = " . $p_ids[$i];
              $db->exec_query($stat2);
              // Delete from tbl_product_color
              $stat3 = "DELETE FROM " . self::$tbl_product_color . " WHERE p_id = " . $p_ids[$i];
              $db->exec_query($stat3);

              // Delete from tbl_rating
              $stat4 = "DELETE FROM " . self::$tbl_rating . " WHERE p_id = " . $p_ids[$i];
              $db->exec_query($stat4);

              // Delete from tbl_payment
              $stat5 = "SELECT * FROM " . self::$tbl_order . " WHERE product_id = " . $p_ids[$i];
              $exec5 =  $db->exec_query($stat5);
              while ($row_st = mysqli_fetch_assoc($exec5)){
                  $statement5 = "DELETE FROM " . self::$tbl_payment . " WHERE payment_id =  " . $row_st['payment_id'];
                   $db->exec_query($statement5);
              }
              // Delete from order
              $statement6 = "DELETE FROM " . self::$tbl_order . " WHERE product_id = " . $p_ids[$i];
              $db->exec_query($statement6);

          }


        }

        // Delete from tbl_top category
              $stat = "DELETE FROM " . self::$tbl_top_category . " WHERE tcat_id = " . $db->escape_string(intval($id));
              $db->exec_query($stat);

        // Delete from tbl_sous category
        $stat_s = "DELETE FROM " . self::$tbl_sous_category . " WHERE tcat_id = " . $db->escape_string(intval($id));
        $db->exec_query($stat_s);







    }


    /*********************************sous cate edit.php***************************************************************/
    public function  getAllSousCategory(){
        global $db;
        $statement = "SELECT * FROM " . self::$tbl_sous_category . " t1 JOIN " . self::$tbl_top_category . " t2 ";
        $statement .= " ON  t1.tcat_id = t2.tcat_id ORDER BY t1.scat_id DESC ";
        $exec = $db->exec_query($statement);
        $i = 1;
        while($row = mysqli_fetch_assoc($exec)){

            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['scat_name']; ?></td>
                <td><?php echo $row['tcat_name']; ?></td>
                <td>
                    <a href="sous-category-edit.php?id=<?php echo $row['scat_id']; ?>" class="btn btn-primary btn-xs">Éditer</a>
                    <a href="#" class="btn btn-danger btn-xs delete_sous_cate" id="<?php echo $row['scat_id']; ?>">Supprimer</a>
                </td>
            </tr>
            <?php
            $i++;

        }

    }

    public function CheckIfIdExistsousCat($request){
        echo  Request::check_url_if_id_exist($request,'sous-category.php',self::$tbl_sous_category,'scat_id');
    }

    public function getSousCategoryByid($id){
      global $db;
      $stat = "SELECT * FROM " . self::$tbl_sous_category . " WHERE scat_id = " . $db->escape_string(intval($id));
      $exec = $db->exec_query($stat);
      return mysqli_fetch_assoc($exec);
    }

    public function addSousCat(){
        global $db;
        $this->tcat_id = $_POST['tcatinsous_cat_add'];
        $this->scat_name = $_POST['scatinsous_cat_add'];
        $stat = "INSERT INTO " . self::$tbl_sous_category . " (scat_name,tcat_id) VALUES ('$this->scat_name','$this->tcat_id')";
         $db->exec_query($stat);

    }

    public function UpdateSousCat($id){
        global $db;
      $this->tcat_id = $_POST['tcatinsous_cat'];
     $this->scat_name = $_POST['scatinsous_cat'];
        $upd = "UPDATE " . self::$tbl_sous_category . " SET scat_name='$this->scat_name',tcat_id='$this->tcat_id' WHERE scat_id = " . $db->escape_string(intval($id));
        $db->exec_query($upd);

    }

    public function  DeleteSous_Cat($id){
        global $db;
        $statement1 = "SELECT * FROM " . self::$tbl_sous_category . " WHERE scat_id = " . $db->escape_string(intval($id));

        $res = $db->exec_query($statement1);
        while($row = mysqli_fetch_assoc($res)){
            $scat_ids[] = $row['scat_id'];
        }
        if(isset($scat_ids)){
            for($i = 0;$i<count($scat_ids);$i++){
                $get_p_id = "SELECT * FROM " . self::$tbl_product . " WHERE scat_id = " . $scat_ids[$i];
                $res_p_id = $db->exec_query($get_p_id);
                while($row_p_id = mysqli_fetch_assoc($res_p_id)){
                    $p_ids[] = $row_p_id['p_id'];
                }
            }

            for($i = 0;$i<count($p_ids);$i++){
                // Getting photo ID to unlink from folder
                $unlink_photos ="SELECT * FROM " . self::$tbl_product . " WHERE p_id = " . $p_ids[$i];
                $re_un_photos = $db->exec_query($unlink_photos);
                while($row_u_ph = mysqli_fetch_assoc($re_un_photos)){
                    $p_photo = $row_u_ph['p_photo'];
                    unlink($this->folder_tmp.DS.$p_photo);

                }
// Delete from tbl_product
                $stat1 = "DELETE FROM " . self::$tbl_product . " WHERE p_id = " . $p_ids[$i];
                $db->exec_query($stat1);
                // Delete from tbl_product_size
                $stat2 = "DELETE FROM " . self::$tbl_product_size . " WHERE p_id = " . $p_ids[$i];
                $db->exec_query($stat2);
                // Delete from tbl_product_color
                $stat3 = "DELETE FROM " . self::$tbl_product_color . " WHERE p_id = " . $p_ids[$i];
                $db->exec_query($stat3);

              // Delete from tbl_rating
              $stat4 = "DELETE FROM " . self::$tbl_rating . " WHERE p_id = " . $p_ids[$i];
              $db->exec_query($stat4);

              // Delete from tbl_payment
              $stat5 = "SELECT * FROM " . self::$tbl_order . " WHERE product_id = " . $p_ids[$i];
              $exec5 =  $db->exec_query($stat5);
              while ($row_st = mysqli_fetch_assoc($exec5)){
                  $statement5 = "DELETE FROM " . self::$tbl_payment . " WHERE payment_id =  " . $row_st['payment_id'];
                   $db->exec_query($statement5);
              }
              // Delete from order
              $statement6 = "DELETE FROM " . self::$tbl_order . " WHERE product_id = " . $p_ids[$i];
              $db->exec_query($statement6);

            }


        }


        // Delete from tbl_sous category
        $stat_s = "DELETE FROM " . self::$tbl_sous_category . " WHERE scat_id = " . $db->escape_string(intval($id));
        $db->exec_query($stat_s);




    }



}
$category = new Category();