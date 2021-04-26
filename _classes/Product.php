<?php


class Product
{
    protected static $table_product= 'tbl_product';
    protected $p_id;
    protected $p_name;
    protected $p_old_price;
    protected $p_current_price;
    protected $p_qty;
    protected $p_photo;

    public function all_products(){
    global $db;
    $sql = 'SELECT * FROM ' . self::$table_product . ' WHERE p_is_active = 1  ';
    if(isset($_POST['minimum_price'],$_POST['maximum_price'] )&& !empty($_POST['minimum_price'])  && !empty($_POST['maximum_price'])  ){

        $sql .= "AND p_current_price BETWEEN '". $_POST['minimum_price'] . "' AND '".$_POST['maximum_price']."'";


    }
    if(isset($_POST['sous_cat'])){

        $cat_filter = implode("','",$_POST['sous_cat']);
        $sql .="AND scat_id IN('".$cat_filter."')";


    }
    $exec = $db->exec_query($sql);
    $total = mysqli_num_rows($exec);
    if($total > 0){
        while ($row = mysqli_fetch_assoc($exec)){
            $this->p_id = $row['p_id'];
            $this->p_name = $row['p_name'];
            $this->p_old_price = $row['p_old_price'];
            $this->p_current_price = $row['p_current_price'];
            $this->p_qty = $row['p_qty'];
            $this->p_photo= $row['p_photo'];


            echo "<div class='col-lg-4 col-sm-6'>
                            <div class='product-item'>
                                <div class='pi-pic'>
                                    <img src='assets/img/img_product/{$this->p_photo}' alt=''>
                                  ";
            if($this->p_old_price !=''){
                ?>
                <div class='sale pp-sale'>VENTE</div>

            <?php }
            echo  "

                                  
                                    <ul>

                                        <li class='quick-view'><a href='product_details.php?id={$this->p_id}'><i class='icon_bag_alt'></i>+ voir les détails</a></li>

                                    </ul>
                                </div>
                                <div class='pi-text'>
                                    <a href='#'>
                                        <h5>{$this->p_name}</h5>
                                    </a>
                                      <div class=\"rating\">
                                 ";
            echo Rating::rating_of_product($this->p_id);
            echo "

                                </div>
                                    <div class='product-price'>
                                       {$this->p_current_price} MAD

                                      ";
            if($this->p_old_price != ''){
                ?>
                <span>
                                        <?php echo $this->p_old_price ?> MAD</span>
            <?php }
            echo   "

                                    </div>
                                </div>
                            </div>
                        </div>
                        ";





        }

    }else{
        echo "<div class='col-md-12'>";


        echo '<h3 class="text-center" style="    margin-bottom: 35px;
                                                        font-size: 30px;
                                                        letter-spacing: 4px;
                                                        text-transform: uppercase;">aucun produit trouvé</h3>';
        echo "<img width='900px' height='400px' src='assets/img/img_static_index/undraw_result_5583.svg'>";

        echo "</div>";
    }

}

    public function get_Product_by_cat($id){
        global $db;

        $query= "SELECT * FROM " . self::$table_product . " WHERE tcat_id = " . $db->escape_string(intval($id)) . " " ;
                if(isset($_POST['sous_cat'])){

            $cat_filter = implode("','",$_POST['sous_cat']);
            $query .="AND scat_id IN('".$cat_filter."')";


        }
        $exec_prod_by_cat  = $db->exec_query($query);
        $total = mysqli_num_rows($exec_prod_by_cat);
        if($total > 0){
            while ($row = mysqli_fetch_assoc($exec_prod_by_cat)){
                $this->p_id = $row['p_id'];
                $this->p_name = $row['p_name'];
                $this->p_old_price = $row['p_old_price'];
                $this->p_current_price = $row['p_current_price'];
                $this->p_qty = $row['p_qty'];
                $this->p_photo= $row['p_photo'];


                echo "<div class='col-lg-4 col-sm-6'>
                            <div class='product-item'>
                                <div class='pi-pic'>
                                    <img src='assets/img/img_product/{$this->p_photo}' alt=''>
                                  ";
                if($this->p_old_price !=''){
                    ?>
                    <div class='sale pp-sale'>VENTE</div>

                <?php }
                echo  "

                                   
                                    <ul>

                                        <li class='quick-view'><a href='product_details.php?id={$this->p_id}'><i class='icon_bag_alt'></i>+ voir les détails</a></li>

                                    </ul>
                                </div>
                                <div class='pi-text'>
                                    <a href='#'>
                                        <h5>{$this->p_name}</h5>
                                    </a>
                                    <div class='product-price'>
                                       {$this->p_current_price} MAD

                                      ";
                if($this->p_old_price != ''){
                    ?>
                    <span>
                                        <?php echo $this->p_old_price ?> MAD</span>
                <?php }
                echo   "

                                    </div>
                                </div>
                            </div>
                        </div>
                        ";





            }

        }else{
            echo '<h3>aucun produit trouvé</h3>';
        }

    }


    public function get_Product_Featured(){
        $this->get_pro("SELECT * FROM " . self::$table_product . "  WHERE p_in_featured = 1 AND p_is_active = 1");
    }


    protected function  get_pro($sql){
        global $db;
        $sql_featured = $sql;
        $exec_featured = $db->exec_query($sql_featured);
        $total_featured = mysqli_num_rows($exec_featured);
        if($total_featured > 0){


            while ($row = mysqli_fetch_assoc($exec_featured)){
                $this->p_id = $row['p_id'];
                $this->p_name = $row['p_name'];
                $this->p_old_price = $row['p_old_price'];
                $this->p_current_price = $row['p_current_price'];
                $this->p_qty = $row['p_qty'];
                $this->p_photo= $row['p_photo'];


                echo "    <div class=\"product-item\">
                            <div class=\"pi-pic\">
                                <img src=\"assets/img/img_product/{$this->p_photo}\" alt=\"\">
                          ";
                if($this->p_old_price !=''){
                    ?>
                    <div class="sale">VENTE</div>
                <?php }
                echo "           

                               
                                <ul>
                                    <li class='quick-view'><a href='product_details.php?id={$this->p_id}'><i class='icon_bag_alt'></i>+ Voir les détails</a></li>
                                </ul>
                            </div>
                            <div class=\"pi-text\">
                                <a href=\"#\">
                                    <h5>{$this->p_name}</h5>
                                </a>
                                <div class=\"rating\">
                                   ";
                               echo Rating::rating_of_product($this->p_id);
         echo        "


                                </div>
                                <div class=\"product-price\">
                                   {$this->p_current_price} MAD
                                     
                               ";
                if($this->p_old_price !=''){
                    ?>
                    <span><?php echo $this->p_old_price ?> MAD</span>
                <?php }
                echo "
                                   
                                   
                                            
                                </div>
                            </div>
                        </div>
 ";




            }


        }


    }

    public function  get_last_product(){
       $this->get_pro("SELECT * FROM ". self::$table_product . " WHERE  p_is_active = 1 ORDER BY p_id DESC LIMIT 3 ");

    }

    public function  get_popular_product(){
        $this->get_pro("SELECT * FROM " . self::$table_product . " WHERE p_is_active = 1 ORDER BY p_total_view DESC  LIMIT 3");

    }













}//end class
$products = new Product();