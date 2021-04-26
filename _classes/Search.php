<?php


class Search
{
    protected static $table_product= 'tbl_product';
    protected static $table_blog= 'blog';
    protected static $tbl_category= 'tbl_category';
    protected $p_id;
    protected $p_name;
    protected $p_old_price;
    protected $p_current_price;
    protected $p_qty;
    protected $p_photo;
  public function all_products_by_cust_search($search){
      global $db;
      $sql = "SELECT * FROM " . self::$table_product . " WHERE p_is_active = 1 AND p_name LIKE '%$search%' ";
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


              echo "<div class='col-md-4 col-sm-12'>
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

                                        <li class='quick-view'><a href='product_details.php?id={$this->p_id}'><i class='icon_bag_alt'></i>+ Voir les détails</a></li>

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
  /*****************************blog search**************/
    public function all_blog_by_cust_search($search){
        global $db;
        $sql = "SELECT *  FROM " . self::$table_blog . " as bl JOIN " . self::$tbl_category  . " as cate 
                ON bl.tcat_id = cate.tcat_id  
                WHERE blog_active = 1 AND title LIKE '%$search%'
                ORDER BY bl.tcat_id ";
        $exec = $db->exec_query($sql);
        $total = mysqli_num_rows($exec);
        if($total > 0){
            while($row = mysqli_fetch_assoc($exec)){
                $this->id_blog = $row['id'];
                $this->title = $row['title'];
                $this->description = $row['description'];
                $this->file = $row['photo_blog'];
                $this->Tcat_name = $row['tcat_name'];
                $this->date_blog = $row['date_blog'];
                $this->blog_active = $row['blog_active'];

                if($this->blog_active == 1){

                    echo  "  <div class='col-lg-6 col-sm-6'>
                        <div class='blog-item'>
                            <div class='bi-pic'>
                                <img class='img-fluid' src='assets/img/img_blog/{$this->file}' alt='' style='background-repeat: no-repeat;background-size: cover;height: 342px !important;'>
                            </div>
                            <div class='bi-text'>
                                <a href='blog-details.php?id={$this->id_blog}'>
                                    <h4>{$this->title}</h4>
                                </a>
                                <p>{$this->Tcat_name} <span>-"; echo Time_ago::calc_time_ago($this->date_blog);  echo "</span></p>
                            </div>
                        </div>
                    </div>";


                }




            }

        }else{
            echo "<div class='col-md-12'>";


            echo '<h3 class="text-center" style="    margin-bottom: 35px;
                                                        font-size: 30px;
                                                        letter-spacing: 4px;
                                                        text-transform: uppercase;">aucun article trouvé</h3>';
            echo "<img width='900px' height='400px' src='assets/img/img_static_index/undraw_result_5583.svg'>";

            echo "</div>";
        }


    }

}
$search = new Search();