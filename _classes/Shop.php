<?php


class Shop
{
    private static $table_top_category = 'tbl_category';
    private static $table_sous_category = 'tbl_sous_category';
    private static $table_product = 'tbl_product';
    private $Tcat_id;
    private $Tcat_name;
    private $Scat_id;
    private $Scat_name;


    /**
     * @return string
     *  all category de top
     */

       public function get_Top_Category(){
        global $db;
        $get_cat = "SELECT * FROM " . self::$table_top_category  . " WHERE show_on_menu  = 1";
        $result_cat = $db->exec_query($get_cat);

        while($row = mysqli_fetch_assoc($result_cat)){
            $this->Tcat_id = $row['tcat_id'];
            $this->Tcat_name = $row['tcat_name'];

            echo   "<li><a href='shop.php?id=$this->Tcat_id'>$this->Tcat_name</a></li>";

        }

    }


    /**
     * @param null $id
     * fetch sous category par id if exist
     * if not exist fetch all sous category
     */
    public function  get_Sous_Category($id = null){
           global $db;
          if(isset($id)){
            $sql_sous_cat = "SELECT * FROM " .self::$table_sous_category . " WHERE tcat_id=".$db->escape_string(intval($id));
            $exec = $db->exec_query($sql_sous_cat);
           $i=1;
            while ($row = mysqli_fetch_assoc($exec)){
                $this->Scat_id= $row['scat_id'];
                $this->Scat_name = $row['scat_name'];

                $output =<<<DELIMETER

               
                                    <div class="fw-brand-check">
                
                                       <div class="bc-item">
                                            <label for="bc-calvin_{$i}">
                                               <a id="$this->Scat_id">{$this->Scat_name}({$this->count_product_by_sous_cat($this->Scat_id)})</a>  
                                                <input type="checkbox" id="bc-calvin_{$i}" class="common_selector sous_cate" value="{$this->Scat_id}">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        
                
                                    </div>
                            


DELIMETER;
                echo $output;
          $i++;
            }

          }else{
              $sql_sous_cat = "SELECT * FROM " .self::$table_sous_category;
              $exec = $db->exec_query($sql_sous_cat);
               $i=1;
              while ($row = mysqli_fetch_assoc($exec)){
                  $this->Scat_id= $row['scat_id'];
                  $this->Scat_name = $row['scat_name'];

                  $output =<<<DELIMETER

                     
                                    <div class="fw-brand-check">
                
                                       <div class="bc-item">
                                            <label for="bc-calvin_{$i}">
                                               <a id="$this->Scat_id">{$this->Scat_name}({$this->count_product_by_sous_cat($this->Scat_id)})</a>  
                                                <input type="checkbox" id="bc-calvin_{$i}" class="common_selector sous_cate" value="{$this->Scat_id}">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>                                      
                
                                    </div>
                                    
                                  
                                

DELIMETER;
                  echo $output;
                  $i++;

              }
          }
    }

    public function count_product_by_sous_cat($scat_id){
      global $db;

      $sel = " SELECT * FROM " . self::$table_product . " WHERE scat_id =  " . $scat_id ;
      $exec = $db->exec_query($sel);
      $total_count = mysqli_num_rows($exec);
      return $total_count;


    }




}
$shop = new Shop();