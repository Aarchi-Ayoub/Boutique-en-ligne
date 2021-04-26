<?php


class Product_Details extends Product
{
    private  static  $table_product_size = "tbl_product_size";
    private  static  $table_size = "tbl_size";
    private  static  $table_product_color= "tbl_product_color";
    private  static  $table_color = "tbl_color";
    private  static  $table_rating = "tbl_rating";
    private  static  $tbl_customer = "tbl_customer";
    private $p_description;
    private $p_short_description;
    private $p_feature;
    private $p_total_view;
    private $scat_id;
    private $tcat_id;
    private $tcat_name;
    private $file;
    ////////
    private $size_name;
    private $color_name;
//////commentaire///////
private  $message;
private  $rating;
private  $cust_id;
private  $status;

    private  $folder_tmp = 'assets'.DS.'img'.DS.'img_customer';


    public function  get_produit_by_id($request)
    {
        global $db;
        $statement = "SELECT * FROM " . self::$table_product . "  WHERE p_id = " . $db->escape_string(intval($request)) . "  AND p_is_active = 1 ";
        $execute = $db->exec_query($statement);
        $total = mysqli_num_rows($execute);


//        id ne contient aucun produit
        if($total == 0){
            header('location: shop.php');
            exit;
        }else{

            while ($row = mysqli_fetch_assoc($execute)){
                $this->p_id = $row['p_id'];
                $this->p_name = $row['p_name'];
                $this->p_old_price = $row['p_old_price'];
                $this->p_current_price = $row['p_current_price'];
                $this->p_qty = $row['p_qty'];
                $this->p_photo= $row['p_photo'];
                $this->p_short_description = $row['p_short_description'];
                $this->p_total_view = $row['p_total_view'];
                $this->tcat_id = $row['tcat_id'];
                $this->scat_id = $row['scat_id'];

                $random  = md5(rand(0,9999));




                echo " <div class='col-lg-6'>
                                <img class='product-big-img' src='assets/img/img_product/{$this->p_photo}' alt=''>

                        </div>";

                echo "<div class='col-lg-6'>
                            <div class='product-details'>
                                <div class='pd-title'>
                                   <h3>{$this->p_name}</h3>
                                   
                                </div>
                                <div class='pd-rating'>
                                   ";
               echo  Rating::rating_of_product($_REQUEST['id']);

                echo "
                                    <span>("; echo Rating::$avg_rating; echo ")</span>
                                </div>
                                <div class='pd-desc'>
                                    <p>{$this->p_short_description}</p>
                                    <h4>{$this->p_current_price} MAD
                                 ";
                                      if($this->p_old_price != ''){
                                          ?>
                                          <span><?php echo $this->p_old_price; ?> MAD</span>
                                     <?php }
                                   echo " 
                                     
                                     </h4>
                                </div>
                                <form method='post' action=''>
                                ";


                                  if($this->tcat_id ==  2){
                                      ?>
                                      <div class='pd-color'>


                                          <div class='pd-color-choose'>

                                              <?php

                                              $query_product_color = "SELECT * FROM " . self::$table_product_color . " WHERE p_id = " . $db->escape_string(intval($request)) ;
                                              $exec_product_color = $db->exec_query($query_product_color);
                                              while($row_product_color = mysqli_fetch_assoc($exec_product_color)){

                                                  $color[] = $row_product_color['color_id'];

                                              }

                                              if(isset($color)){
                                                  ?>
                                                  <h6>Couleur :</h6>
                                                  <select name='color_id' class='form-control select2' style='width:auto;'>
                                                      <?php
                                                      $query_color = "SELECT * FROM  " . self::$table_color;
                                                      $execusion_color = $db->exec_query($query_color);

                                                      while($row_color = mysqli_fetch_assoc($execusion_color)){
                                                          if(in_array($row_color['color_id'],$color)){
                                                              ?>
                                                              <option value='<?php echo $row_color['color_id']?>'><?php echo $row_color['color_name']?></option>
                                                          <?php
                                                            $this->color_name[] = $row_color['color_name'];
                                                          }
                                                      }
                                                      ?>
                                                  </select>
                                              <?php  }

                                              ?>
                                          </div>
                                      </div>

                                      <div class='pd-color size'>

                                          <?php

                                          $query_product_size = "SELECT * FROM " . self::$table_product_size . " WHERE p_id = " . $db->escape_string(intval($request)) ;
                                         $exec_product_size = $db->exec_query($query_product_size);
                                         while($row_product_size = mysqli_fetch_assoc($exec_product_size)){

                                             $size[] = $row_product_size['size_id'];

                                         }


                                         if(isset($size)){
                                             ?>
                                             <h6>Taille :</h6>
                                             <select name='size_id' class='form-control select2' style='width:auto;'>
                                                 <?php
                                                   $query_size = "SELECT * FROM  " . self::$table_size;
                                                   $execusion = $db->exec_query($query_size);

                                                   while($row_size = mysqli_fetch_assoc($execusion)){
                                                       if(in_array($row_size['size_id'],$size)){
                                                           ?>
                                                           <option value='<?php echo $row_size['size_id']?>'><?php echo $row_size['size_name']?></option>

                                                       <?php
                                                        $this->size_name[] = $row_size['size_name'];

                                                       }
                                                   }


                                                    ?>

                                             </select>

                                         <?php }

                                          ?>
                                      </div>

                                 <?php }




                               echo " 
                                                             
                                
                                
                                <div class='quantity'>
                                    <div class='pro-qty'>
                         <input type='text' step='1' min='1'  max='' name='p_qty' value='1' title='Qty' size='4' pattern='[0-9]*'  inputmode='numeric'
                          onkeypress='isInputNumber(event)'
                         >
                                    </div>
                                     <input type='hidden' name='p_current_price' value='$this->p_current_price'>
                                            <input type='hidden' name='p_name' value='$this->p_name'>
                                            <input type='hidden' name='p_photo' value='$this->p_photo'>
                                   
                                   <input type='submit' class='primary-btn pd-cart ' name='form_add_to_cart' value='Ajouter au panier'>
                                </div>
                                </form>
                                
                                
                               
                                <ul class='pd-tags'>
                                    <li><span>CATEGORIES</span>: ";
                                     $sql_cat_by_id ="SELECT tbl_cat.tcat_id,tbl_cat.tcat_name FROM `tbl_product` as tbl_pro
                                                        JOIN tbl_category as tbl_cat
                                                        ON tbl_pro.tcat_id = tbl_cat.tcat_id
                                                        WHERE tbl_pro.tcat_id = '" . $db->escape_string(intval($this->tcat_id))  ."' LIMIT 1";
                                     $exec_cat_by_id = $db->exec_query($sql_cat_by_id);
                                     while($res = mysqli_fetch_assoc($exec_cat_by_id)){
                                         $this->tcat_name= $res['tcat_name'];

                                     }
                                      echo ucfirst($this->tcat_name);



                                  echo "</li>
                                  </ul>
                              
                            </div>
                        </div>";


            }
            $this->p_total_view =  $this->p_total_view + 1;
            $up = "UPDATE " . self::$table_product . " SET p_total_view  = $this->p_total_view WHERE p_id = " . $_REQUEST['id'];
            $db->exec_query($up);

        }

    }


    public  function  add_to_cart($request)
    {
        global $db;

        if (isset($_POST['form_add_to_cart'])) {
            //check stock
            $query_for_qty = "SELECT * FROM " . self::$table_product . " WHERE p_id = " . $db->escape_string(intval($request));
            $exec_qty = $db->exec_query($query_for_qty);

            while ($qty = mysqli_fetch_assoc($exec_qty)) {
                $current_p_qty = $qty['p_qty'];
            }

            //check if user insert a number > qty in table
            if ($_POST['p_qty'] > $current_p_qty) {
                $msg = ' Désolé! Il n\'y a que  '.$current_p_qty.'  en stock';

                ?>
                <script>
                   alert("<?php echo $msg; ?>");
                </script>

           <?php }else{
                // sinonn if qty inserer par user < qqty  in table

                if(isset($_SESSION['cart_p_id'])){
                    $arr_cart_p_id = array();
                    $arr_cart_size_id = array();
                    $arr_cart_color_id = array();
                    $arr_cart_p_qty = array();
                    $arr_cart_p_current_price = array();

                    //tous les : id && size&& color&& qty && prix
                    $i=0;
                    foreach ($_SESSION['cart_p_id'] as $value){
                        $i++;
                        $arr_cart_p_id[$i] = $value;
                    }

                    $i=0;
                    foreach ($_SESSION['cart_size_id'] as $value){
                        $i++;
                        $arr_cart_size_id[$i] = $value;

                    }

                    $i=0;
                    foreach ($_SESSION['cart_color_id'] as $value){
                        $i++;
                        $arr_cart_color_id[$i] = $value;

                    }
                    $i=0;
                    foreach ($_SESSION['cart_p_qty'] as $value){
                        $i++;
                        $arr_cart_p_qty[$i] = $value;
                    }
                    $i=0;
                    foreach ($_SESSION['cart_p_current_price'] as $value){
                        $i++;
                        $arr_cart_p_current_price[$i] = $value;
                    }
                    $added = 0;

                    if(!isset($_POST['size_id'])){
                        $size_id = 0;
                    }else{
                        $size_id=$_POST['size_id'];
                    }

                    if(!isset($_POST['color_id'])) {
                        $color_id = 0;
                    } else {
                        $color_id = $_POST['color_id'];
                    }
                    for($i=1;$i<=count($arr_cart_p_id);$i++) {
                        if( ($arr_cart_p_id[$i]==$_REQUEST['id']) && ($arr_cart_size_id[$i]==$size_id) && ($arr_cart_color_id[$i]==$color_id) ) {
                            $added = 1;
                            break;
                        }
                    }
                    //if added continue

                    if($added == 1){
                        $_SESSION['error_message'] = 'ce produit est déjà ajouté au panier';

                    }else{
                          //n'est pas ajoute dans le session and cart p _id exist deja

                         echo    $this->insert_new_product_in_session_exist();
                    }



                }else{
                    // not isset a session
                   echo  $this->insert_new_product_in_session();


                }





            }
            if(isset($_SESSION['success_message']) && $_SESSION['success_message'] != '' ){
                echo "<script>alert('" . $_SESSION['success_message'] . "');</script>";
                unset($_SESSION['success_message']);
            }
            if(isset($_SESSION['error_message']) && $_SESSION['error_message'] != '' ){
                echo "<script>alert('" . $_SESSION['error_message'] . "');</script>";
                unset($_SESSION['error_message']);
            }



        }


    }

private function  insert_new_product_in_session_exist(){
    //le produit n'est pas ajoute precedement
    // donner un new cle
    $i=0;
    foreach ($_SESSION['cart_p_id'] as $val){
        $i++;
    }
    $new_key = $i + 1;
    $this->get_size_and_color_and_affect($new_key);

}
 private function get_size_and_color_and_affect($new_key){
     global $db;

     //  if user click sur une size
       //user ajoute un size
     //affiche le size name a partir de size id données

     if(isset($_POST['size_id'])){
         $size_id = $_POST['size_id'];
         $statement = "SELECT * FROM " .self::$table_size . " WHERE size_id = " . $db->escape_string(intval($size_id));
         $exec_size  = $db->exec_query($statement);
         while ($result = mysqli_fetch_assoc($exec_size)){
             $size_name = $result['size_name'];
         }

     }else{
         $size_id = 0;
         $size_name = '';
     }

     //user ajoute un color
     //affiche le color name a partir de color id données

     if(isset($_POST['size_id'])){
         $color_id = $_POST['color_id'];
         $statement = "SELECT * FROM " .self::$table_color . " WHERE color_id = " . $db->escape_string(intval($color_id));
         $exec_color  = $db->exec_query($statement);
         while ($result = mysqli_fetch_assoc($exec_color)){
             $color_name = $result['color_name'];
         }

     }else{
         $color_id = 0;
         $color_name = '';
     }

     //affecter les valeur a les session (en ajoutant les valeur a les sessions)
     $_SESSION['cart_p_id'][$new_key] = $_REQUEST['id'];
     $_SESSION['cart_size_id'][$new_key] = $size_id;
     $_SESSION['cart_size_name'][$new_key] = $size_name;
     $_SESSION['cart_color_id'][$new_key] = $color_id;
     $_SESSION['cart_color_name'][$new_key] = $color_name;
     $_SESSION['cart_p_qty'][$new_key] = $_POST['p_qty'];
     $_SESSION['cart_p_current_price'][$new_key] = $_POST['p_current_price'];
     $_SESSION['cart_p_name'][$new_key] = $_POST['p_name'];
     $_SESSION['cart_p_photo'][$new_key] = $_POST['p_photo'];

     $_SESSION['success_message'] = 'Le produit a été ajouté au panier avec succès!';

 }


 private function insert_new_product_in_session(){

        $this->get_size_and_color_and_affect(1);
 }


 public function  description_section($request){
        global $db;
     $statement_section_desc = "SELECT * FROM " . self::$table_product . "  WHERE p_id = " . $db->escape_string(intval($request)) . "  AND p_is_active = 1 ";
     $execute_section = $db->exec_query($statement_section_desc);

     while($row = mysqli_fetch_assoc($execute_section)){
         $this->p_description = $row['p_description'];
         $this->p_feature = $row['p_feature'];


         echo " <h5>Introduction</h5>";
         echo "<p> "; echo $this->p_description; echo  "</p>";
         echo " <h5>Caractéristiques</h5>";
         echo "<p> "; echo $this->p_feature; echo  "</p>";
     }

 }
 public function description_section_image($request){

        global $db;
     $statement_section_img = "SELECT * FROM " . self::$table_product . "  WHERE p_id = " . $db->escape_string(intval($request)) . "  AND p_is_active = 1 ";
     $execute_section = $db->exec_query($statement_section_img);
     while ($row = mysqli_fetch_assoc($execute_section)){
      $this->file  = $row['p_photo'];
         echo " <img style='height: 70%;width: 70%' class='img-fluid' src='assets/img/img_product/{$this->file}' alt='img'>";



     }


 }

 public function  specification_section(){


        echo " <table>
                                            <tr>
                                                <td class='p-catagory'>Évaluation du client</td>
                                                <td>
                                                    <div class='pd-rating'>
                                                       ";
                                                      echo   Rating::rating_of_product($_REQUEST['id']);
        echo "
                                                        <span>("; echo Rating::$avg_rating;  echo ")</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class='p-catagory'>Prix</td>
                                              <td>   
                                            ";
                                             if($this->p_current_price != '' ){
                                                 ?>
                                                 <div class='p-price'><?php echo  $this->p_current_price;  ?> MAD</div>
                                           <?php  }

                            echo "
                                                    
                                                </td>
                                            </tr>

                                            <tr>
                                            
                                                <td class='p-catagory'>Disponibilité</td>
                                                <td>";
                                                    if($this->p_qty!= ''){
                                                        ?>
                                                        <div class='p-stock'><?php  echo $this->p_qty ?> en stock</div>
                                                   <?php }

                                                echo "</td>
                                            </tr>
                                            ";
                                                    if($this->tcat_id == 2){
                                                        ?>
                                                        <tr>
                                                            <td class='p-catagory'>Tailles</td>
                                                            <td>
                                                                <?php
                                                                   if($this->size_name != ''){
                                                                       ?>
                                                                       <div class='p-size'><?php echo implode(',' , $this->size_name);   ?></div>
                                                                  <?php }
                                                                ?>



                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class='p-catagory'>Coleurs</td>

                                                            <?php
                                                              if($this->color_name != ''){
                                                                  ?>
                                                                  <td><?php echo implode(',' , $this->color_name);   ?></td>
                                                             <?php }
                                                            ?>

                                                        </tr>



                                                   <?php }

                                          echo "  
                                           
                                        </table>";
        
 }

public  function CheckcommentaireIfExist($id,$customer_id){
       global $db;
       //check if customer already have a review in this product if $total = 0 give first else (message)

           $statement = "SELECT * FROM " . self::$table_rating . " WHERE p_id = " . $id . " AND cust_id = " . $customer_id;
          $exec = $db->exec_query($statement);
          $total = mysqli_num_rows($exec);
            if($total == 0){
                ?>
                <div class="personal-rating">
                    <h6>Votre note</h6>
                    <style>

                        .ratings .fa{
                            font-size: 18px;
                            float: left;
                            color:#FF9800;
                            cursor: pointer;
                        }
                    </style>

                    <div class="ratings">
                        <span class="fa fa-star" checked></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>
                <div class="leave-comment">
                    <h4>Laissez un commentaire</h4>
                    <form action="#" class="comment-form" id="comment_product">
                        <div class="row">
                            <div class="col-lg-12">
                                <textarea id="message" placeholder="Messages"></textarea>
                                <span class="msg_commentaire text-danger"  style="line-height: 58px">Le message ne peut pas être vide</span><br>
                                <button type="submit" class="site-btn">Envoyer le message</button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php }else{
                ?>
                <span class="text-danger" style="line-height: 173px">Vous avez déjà donné une note!</span>
            <?php }



}

public function add_commentaire($id){
      global $db;
      $this->message = $_POST['message'];
      $this->rating = $_POST['rating'];
      $this->cust_id = $_POST['cust_id'];
      $this->status =0;
      $this->message =str_replace("'","\'",$this->message);
      $date = date('Y-m-d H:i:s');

    $stat ="INSERT INTO " .self::$table_rating . " (p_id,cust_id,comment,rating,status,time_rating) VALUES ($id,'$this->cust_id','$this->message','$this->rating','$this->status','$date') ";
    $db->exec_query($stat);


}

public  function  fetch_comments($request){
     global  $db;

    $stat = "SELECT *   FROM " . self::$table_rating . " t1  
              JOIN " . self::$tbl_customer . " t2 
              ON t1.cust_id = t2.cust_id 
              WHERE t1.p_id=" . $request . " AND status = 1";

   $exec  = $db->exec_query($stat);
   $total = mysqli_num_rows($exec);

   if($total > 0){
       while($row = mysqli_fetch_assoc($exec)){
           ?>
           <div class="co-item">
               <div class="avatar-pic">
                   <img src="<?php echo $this->folder_tmp.DS.$row['cust_photo'] ?>" alt="">
               </div>
               <div class="avatar-text">
                   <div class="at-rating">
                       <?php
                       for($i=1;$i<=5;$i++) {
                           ?>
                           <?php if($i>$row['rating']): ?>
                               <i class="fa fa-star-o"></i>
                           <?php else: ?>
                               <i class="fa fa-star"></i>
                           <?php endif; ?>
                           <?php
                       }
                       ?>
                   </div>
                   <h5><?php echo $row['cust_name']; ?><span><?php echo Time_ago::calc_time_ago($row['time_rating'])?></span></h5>
                   <div class="at-reply"><?php echo $row['comment']; ?></div>
               </div>
           </div>

       <?php  }



   }else{
       ?>
       <span style="color: #7b7b7b;
    font-weight: 500;
    font-family: sans-serif;">Aucun commentaire sur ce produit</span>

  <?php }



}

public function  fetch_total_comments($request){
      global $db;
      $stat="SELECT * FROM " .self::$table_rating . " WHERE p_id = " . $db->escape_string(intval($request));
      $exec = $db->exec_query($stat);
      $total = mysqli_num_rows($exec);
      return $total;

}


public function getRelated_Products($request){
        global $db;
    $statement = "SELECT * FROM " . self::$table_product . "  WHERE p_id = " . $db->escape_string(intval($request)) . "  AND p_is_active = 1  ";
    $execute = $db->exec_query($statement);
    while ($row = mysqli_fetch_assoc($execute)){
        $this->tcat_id = $row['tcat_id'];

    }


     echo $this->get_pro("SELECT * FROM " . self::$table_product . " WHERE  p_is_active = 1    AND  tcat_id = " . $this->tcat_id . " ORDER BY rand()");
}



}
$product_detail = new Product_Details();