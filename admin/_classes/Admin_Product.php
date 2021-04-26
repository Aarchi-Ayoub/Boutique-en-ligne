<?php



class Admin_Product extends Request
{
    private static $table_top_category='tbl_category';
    private static $table_sous_category = 'tbl_sous_category';
    private static $table_size= 'tbl_size';
    private static $table_color= 'tbl_color';
    private static $table_product= 'tbl_product';
    private static $table_product_size= 'tbl_product_size';
    private static $table_product_color= 'tbl_product_color';
    private static $table_rating= 'tbl_rating';
    private static $table_order= 'tbl_order';
    private static $tbl_payment= 'tbl_payment';
    private $p_id;
    private $Tcat_id;
    private $Tcat_name;
    private $Scat_id;
    private $Scat_name;
   

    private $Size_id;
    private $Size_name;
    private $Color_id;
    private $Color_name;
    private $product_name;
    private $p_old_price;
    private $p_current_price;

    private $qty;
    private $file;
    private $tmp_name;
    private $p_description;
    private $p_short_description;
    private  $date;

    
    private $p_feature;//caracteristique
    private $p_feature_select;
    private $p_active_select;
    private  $folder_tmp = ROOT.DS.'assets'.DS.'img'.DS.'img_product';
    /**
     * @return string
     *  all category de top
     */

    public function get_Top_Category(){
        global $db;
        $get_cat = "SELECT * FROM " . self::$table_top_category . " ORDER BY tcat_name  ";
        $result_cat = $db->exec_query($get_cat);

        while($row = mysqli_fetch_assoc($result_cat)){
            $this->Tcat_id = $row['tcat_id'];
            $this->Tcat_name = $row['tcat_name'];
            echo "<option value='{$this->Tcat_id}'>{$this->Tcat_name}</option>";
        }

    }

    public function get_sous_Category($tcat_id){
        global $db;
        $get_sous_cat = "SELECT * FROM " . self::$table_sous_category . " WHERE tcat_id = " .$db->escape_string(intval($tcat_id));

        $result__sous_cat = $db->exec_query($get_sous_cat);
        echo "<option value=''>Select Sous  Category</option>";

        while($row = mysqli_fetch_assoc($result__sous_cat)){
            $this->Scat_id= $row['scat_id'];
            $this->Scat_name = $row['scat_name'];
            echo "<option value='{$this->Scat_id}'>{$this->Scat_name}</option>";
        }

    }

    public function get_all_size(){
        global $db;
        $get_size = "SELECT * FROM " . self::$table_size . " ORDER BY size_id  ";
        $result_size = $db->exec_query($get_size);


        while($row = mysqli_fetch_assoc($result_size)){
            $this->Size_id = $row['size_id'];
            $this->Size_name = $row['size_name'];
            echo "<option value='{$this->Size_id}'>{$this->Size_name}</option>";
        }

    }
    public function get_all_color(){
        global $db;
        $get_color = "SELECT * FROM " . self::$table_color . " ORDER BY color_id  ";
        $result_color = $db->exec_query($get_color);


        while($row = mysqli_fetch_assoc($result_color)){
            $this->Color_id = $row['color_id'];
            $this->Color_name = $row['color_name'];
            echo "<option value='{$this->Color_id}'>{$this->Color_name}</option>";
        }

    }

    public function add_product(){
        global $db;
       $this->Tcat_id = $_POST['tcat_id'];
       $this->Scat_id = $_POST['scat_id'];

       $this->product_name=$_POST['productname'];
       $this->product_name =    str_replace("'","\'",$this->product_name);

       $this->p_old_price=$_POST['p_old_price'];
       $this->p_current_price=$_POST['p_current_price'];
       $this->qty=$_POST['qty'];
       $this->Size_id=$_POST['size'];
       $this->Color_id=$_POST['color'];
       $this->file=uniqid('product_',TRUE).$_FILES['file']['name'];
       $this->tmp_name=$_FILES['file']['tmp_name'];

       $this->p_description=$_POST['p_description'];
        $this->p_description = str_replace("'","\'",$this->p_description);

       $this->p_short_description=$_POST['p_short_description'];
        $this->p_short_description =    str_replace("'","\'",$this->p_short_description);

        $this->p_feature=$_POST['p_feature'];
        $this->p_feature=   str_replace("'","\'",$this->p_feature);

       $this->p_feature_select=$_POST['p_feature_select'];
       $this->p_active_select=$_POST['p_active_select'];
       $this->date = date('Y/m/d H:i:s');



        move_uploaded_file($this->tmp_name, "$this->folder_tmp".DS.$this->file);

    $sql = "INSERT INTO " . self::$table_product  . "(`p_name`, `p_old_price`, `p_current_price`, `p_qty`, `p_photo`, `p_description`, `p_short_description`, `p_feature`, `p_total_view`, `p_in_featured`, `p_is_active`, `tcat_id`, `scat_id`, `date_inserted`) ";
    $sql .= " VALUES ('$this->product_name','$this->p_old_price','$this->p_current_price','$this->qty','$this->file','$this->p_description','$this->p_short_description','$this->p_feature',10,'$this->p_feature_select','$this->p_active_select','$this->Tcat_id','$this->Scat_id','$this->date')";
   $db->exec_query($sql);  
    //get the product  id  product ex : 7
  $ai_id =  mysqli_insert_id($db->getConnection());
   

        if(isset($this->Size_id)) {         


            foreach (array($this->Size_id) as  $all_size_id) {      

             $new_all_size_id = explode(',',$all_size_id);//eliminer les virgule
             foreach($new_all_size_id as  $val){
                                    
               $stat_size = "INSERT INTO " . self::$table_product_size . " (size_id,p_id) VALUES ($val,$ai_id) ";
                 $db->exec_query($stat_size);        

              }
         
            }

            foreach (array($this->Color_id) as  $all_color_id) {      

                $new_all_color_id = explode(',',$all_color_id);//eliminer les virgule
                foreach($new_all_color_id as  $val_color){
                                       
                  $stat_color = "INSERT INTO " . self::$table_product_color . " (color_id,p_id) VALUES ($val_color,$ai_id) ";
                    $db->exec_query($stat_color);       
   
                 }
            
               }

        }
    }

   public function all_products(){
       global $db;
      
       $statment = "SELECT 
                   	   t1.p_id,
                       t1.p_name,
                       t1.p_old_price,
                       t1.p_current_price,
                       t1.p_qty,
                       t1.p_photo,
                       t1.p_in_featured,
                       t1.p_is_active,
                       
                       t2.tcat_id,
                       t2.tcat_name

                       FROM  tbl_product t1
                       JOIN tbl_category t2
                       ON t1.tcat_id = t2.tcat_id
                       ORDER BY t1.p_id DESC
                  ";

        $exec = $db->exec_query($statment);
        $i = 0;
        while($row_product = mysqli_fetch_assoc($exec)){
            $this->p_id =$row_product['p_id']; 
            $this->product_name =$row_product['p_name']; 
            $this->p_old_price = $row_product['p_old_price'];
            $this->p_current_price = $row_product['p_current_price'];
            $this->qty = $row_product['p_qty'];
            $this->file = $row_product['p_photo'];
            $this->p_feature_select = $row_product['p_in_featured'];
            $this->p_active_select = $row_product['p_is_active'];
            $this->Tcat_name = $row_product['tcat_name'];
                $i++;
           
            
           
             echo "<tr>";
             echo "<td>{$i}</td>";
             echo "<td><img width='100px' height='100px' src='../assets/img/img_product/{$this->file}'></td>";
             echo "<td>{$this->product_name}</td>";            
             echo "<td>{$this->p_old_price}</td>";
             echo "<td>{$this->p_current_price}</td>";
             echo "<td>{$this->qty}</td>";
             echo "<td>";
               if($this->p_feature_select == 1){
                  echo "Oui";
               }else{
                   echo "Non";
               }
                         
             echo             
             "</td>";
             echo "<td>";
             if($this->p_active_select == 1){
                echo "Oui";
             }else{
                 echo "Non";
                 
             }
             
             echo "</td>";
             echo "<td>{$this->Tcat_name}</td>";
             echo "<td>
                      <a href='product-edit.php?id={$this->p_id}' class='btn btn-primary btn-xs'>Éditer</a>  
                      <a href='' id='{$this->p_id}' class='btn btn-danger delete_product btn-xs'>Supprimer</a>  
             
               </td>";
             echo "</tr>";




        }




   }

public function check_url_data_and_id_for_product($request){

  return self::check_url_if_id_exist($request,'product.php',self::$table_product,'p_id');
}

public function  get_product_by_id($id){
  global $db;
  if(isset($id)){
    $statment  = "SELECT 
                   	   t1.p_id,
                       t1.p_name,
                       t1.p_old_price,
                       t1.p_current_price,
                       t1.p_qty,
                       t1.p_photo,
                       t1.p_in_featured,
                       t1.p_is_active,
                       t1.p_description,
                       t1.p_short_description,
                       t1.p_feature,
                       
                       t2.tcat_id,
                       t2.tcat_name,
                       t1.scat_id,
                       t3.scat_name

                       FROM  tbl_product t1
                       JOIN tbl_category t2
                       ON t1.tcat_id = t2.tcat_id
                       JOIN tbl_sous_category t3
                       ON t2.tcat_id = t3.tcat_id
                       WHERE p_id = {$id}
                       ORDER BY t1.p_id DESC LIMIT 1";

    $exec = $db->exec_query($statment);
  while($row = mysqli_fetch_assoc($exec)){
        $this->p_id = $row['p_id'];
        $this->product_name = $row['p_name'];
        $this->p_old_price = $row['p_old_price'];
        $this->p_current_price = $row['p_current_price'];
        $this->qty = $row['p_qty'];
        $this->file = $row['p_photo'];
        $this->p_feature_select = $row['p_in_featured'];
        $this->p_active_select = $row['p_is_active'];
        $this->p_description = $row['p_description'];
        $this->p_short_description = $row['p_short_description'];
        $this->p_feature = $row['p_feature'];
        $this->Tcat_id = $row['tcat_id'];
        $this->Tcat_name = $row['tcat_name'];
        $this->Scat_id = $row['scat_id'];
        $this->Scat_name = $row['scat_name'];




        echo "<div class='box-body'>
<input type='hidden' id='product_id' value='{$this->p_id}'>
 
						<div class='form-group '>
							<label for='' class='col-sm-3 control-label'> Nom de catégorie <span>*</span></label>
							<div class='col-sm-4'>
								<select name='tcat_id' class='form-control select2 top-cat_edit  '  aria-describedby='inputSuccess1'>
                                    <option value=''>Choisir une catégorie</option>
                          ";
                         $top_cat = "SELECT * FROM " . self::$table_top_category . " ORDER BY tcat_name DESC";
                         $exec_cat = $db->exec_query($top_cat);
                         while($row_top_cat = mysqli_fetch_assoc($exec_cat)){
                           ?>
                             <option value="<?php echo $row_top_cat['tcat_id']; ?>" <?php if($row_top_cat['tcat_id'] == $this->Tcat_id){echo 'selected';} ?>><?php echo $row_top_cat['tcat_name']; ?></option>
                        <?php }
		echo "						
						</select>
                              
							</div>
						</div>
						<div class='form-group ' >
							<label for='' class='col-sm-3 control-label' >Nom de la catégorie de sous <span>*</span></label>
							<div class='col-sm-4'>
								<select name='scat_id' class='form-control select2 sous-cat'  aria-describedby='inputSuccess2'>
									<option value=''>Sélectionnez Sous Catégorie</option>
									";
                            $sous_cat = "SELECT * FROM " . self::$table_sous_category . " WHERE tcat_id = " . $db->escape_string(intval($this->Tcat_id)) ;
                            $result = $db->exec_query($sous_cat);
                                  foreach ($result as $row) {
                                      ?>
                                      <option value="<?php echo $row['scat_id']; ?>" <?php if($row['scat_id'] == $this->Scat_id){echo 'selected';} ?>><?php echo $row['scat_name']; ?></option>
                                      <?php
                                  }


						echo "		</select>
                                

							</div>
						</div>

                        <div class='form-group ' >
                            <label class='col-sm-3 control-label' for='p_name' >Nom du produit <span>*</span></label>
                            <div class='col-sm-4'>
                                <input type='text' class='form-control' name='p_name' aria-describedby='inputSuccess3' value='{$this->product_name}'>
                             
                            </div>


                        </div>


						<div class='form-group'>
							<label for='' class='col-sm-3 control-label'>Ancien prix <br><span style='font-size:10px;font-weight:normal;'>(En MAD)</span></label>
							<div class='col-sm-4'>
								<input type='text' name='p_old_price' class='form-control'   value='{$this->p_old_price}' pattern=\"[0-9]*\" inputmode=\"numeric\" onkeypress=\"isInputNumber(event)\">
							</div>
						</div>
						<div class='form-group '>
							<label for='' class='col-sm-3 control-label' >Prix actuel <span>*</span><br><span style='font-size:10px;font-weight:normal;'>(En MAD)</span></label>
							<div class='col-sm-4'>
								<input type='text' name='p_current_price' class='form-control'  aria-describedby='inputSuccess4'  value='{$this->p_current_price}' pattern=\"[0-9]*\" inputmode=\"numeric\" onkeypress=\"isInputNumber(event)\">
                               
							</div>
						</div>	
						<div class='form-group'>
							<label for='' class='col-sm-3 control-label'>Quantité <span>*</span></label>
							<div class='col-sm-4'>
								<input type='text' name='p_qty' class='form-control'  aria-describedby='inputSuccess5'  value='{$this->qty}' pattern=\"[0-9]*\" inputmode=\"numeric\" onkeypress=\"isInputNumber(event)\">
                               
							</div>
						</div>
						";

                            if($this->Tcat_id == 2 ||  isset($_GET['tcat_id']) == 2   ){
                               ?>
                                <div class='form-group hidden_box_edit ' >
                                    <label for='' class='col-sm-3 control-label'> Taille <span>*</span></label>
                                    <div class='col-sm-4'>
                                        <select name='size[]' class='form-control select2' id="size" multiple='multiple'  aria-describedby='inputSuccess6'>
                                        <?php
                                        $size_by_id ="SELECT * FROM " .self::$table_product_size . " WHERE p_id = " . $db->escape_string(intval($this->p_id));
                                        $exec_by_id = $db->exec_query($size_by_id);

                                        while($row_size_by_id = mysqli_fetch_assoc($exec_by_id)){
                                               $this->Size_id[] = $row_size_by_id['size_id'];// all size affected to product
                                        }
                                    $is_selected = '';
                                        $size_all = "SELECT * FROM " . self::$table_size . " ORDER BY size_id";
                                        $exec_all = $db->exec_query($size_all);
                                        while($row_size_all = mysqli_fetch_assoc($exec_all)){
                                              if(isset($this->Size_id)){
                                                  if(in_array($row_size_all['size_id'],$this->Size_id)){
                                                      $is_selected = 'selected';
                                                  }else{
                                                      $is_selected='';
                                                  }
                                              }
                                              ?>

                                                <option value="<?php echo $row_size_all['size_id']; ?>" <?php echo $is_selected; ?>><?php echo $row_size_all['size_name']; ?></option>

                                       <?php }
                                        ?>
                                        </select>

                                    </div>
                                </div>
                                <div class='form-group hidden_box_edit' >
                                    <label for='' class='col-sm-3 control-label'  > Coleur <span>*</span></label>
                                    <div class='col-sm-4'>

                                        <select name='color[]' class='form-control select2' multiple='multiple' id="color"  aria-describedby='inputSuccess7'>
                                            <?php
                                            $color_by_id ="SELECT * FROM " .self::$table_product_color . " WHERE p_id = " . $db->escape_string(intval($this->p_id));
                                            $exec_by_id = $db->exec_query($color_by_id);

                                            while($row_color_by_id = mysqli_fetch_assoc($exec_by_id)){
                                                $this->Color_id[] = $row_color_by_id['color_id'];// all size affected to product
                                            }
                                            $is_selected = '';
                                            $color_all = "SELECT * FROM " . self::$table_color . " ORDER BY color_id";
                                            $exec_all = $db->exec_query($color_all);
                                            while($row_color_all = mysqli_fetch_assoc($exec_all)){
                                                if(isset($this->Color_id)){
                                                    if(in_array($row_color_all['color_id'],$this->Color_id)){
                                                        $is_selected = 'selected';
                                                    }else{
                                                        $is_selected='';
                                                    }
                                                }
                                                ?>

                                                <option value="<?php echo $row_color_all['color_id']; ?>" <?php echo $is_selected; ?>><?php echo $row_color_all['color_name']; ?></option>

                                            <?php }
                                            ?>
                                        </select>

                                    </div>
                                </div>
                           <?php }
                            echo "
						
						<div class='form-group '>
							<label for='' class='col-sm-3 control-label'> Photo <span style='color: grey'>(optionale)</span></label>
							<div class='col-sm-4' style='padding-top:4px;'>
								<input type='file' name='photo_upload'  class='form-control' aria-describedby='inputSuccess8'>
                               
							</div>
						</div>
						<div class='form-group'>
						<label for='' class='col-sm-3 control-label'></label>
						
							<div class='col-sm-4' style='padding-top:4px;'>							
								<img src='../assets/img/img_product/{$this->file}'  alt='' style='width:150px;'>
								<input type='hidden' name='current_photo'  value='{$this->file}'>
							</div>
						</div>

						<div class='form-group'>
							<label for='' class='col-sm-3 control-label'>Description *<br>
                                <span style='font-size: 10px;line-height: 34px;'> (La description ne peut pas être inférieure à 20 caractères)</span></label>
							<div class='col-sm-8'>
								<textarea name='p_description' class='form-control' cols='30' rows='10'  >{$this->p_description}</textarea>
                               
							</div>


						</div>
						<div class='form-group '>
							<label for='' class='col-sm-3 control-label'>brève description *<br>
                                <span style='font-size: 10px;line-height: 20px;'>(La description courte ne peut pas être inférieure à 10 caractères)</span></label>
							<div class='col-sm-8'>
								<textarea name='p_short_description' class='form-control p_short_description' cols='30' rows='10' id='' aria-describedby='inputSuccess10'>{$this->p_short_description}</textarea>
                               
							</div>

						</div>

						<div class='form-group' >
							<label for='' class='col-sm-3 control-label'>Caractéristiques*<br>
                                <span style='font-size: 10px;line-height: 20px;'> (Caractéristiques  ne peut pas être inférieure à 10 caractères)</span></label></label>
							<div class='col-sm-8'>
								<textarea name='p_feature' class='form-control p_feature' cols='30' rows='10' id='' aria-describedby='inputSuccess11'>{$this->p_feature}</textarea>
                               
							</div>

						</div>


						<div class='form-group'>
							<label for='' class='col-sm-3 control-label'>C'est Populaire?</label>
							<div class='col-sm-8'>
								<select name='p_feature_select' class='form-control' style='width:auto;' >
									<option value='1' "; if($this->p_feature_select == '1' )echo 'selected';  echo ">Oui</option>
									<option value='0' "; if($this->p_feature_select == '0' )echo 'selected';  echo ">Non</option>
								</select> 
							</div>
						</div>
						<div class='form-group'>
							<label for='' class='col-sm-3 control-label'>C'est Actif?</label>
							<div class='col-sm-8'>
								<select name='p_is_active' class='form-control' style='width:auto;' >
									<option value='1' "; if($this->p_active_select == '1' )echo 'selected';  echo ">Oui</option>
									<option value='0' "; if($this->p_active_select == '0' )echo 'selected';  echo ">Non</option>
								</select> 
							</div>
						</div>
						<div class='form-group'>
							<label for='' class='col-sm-3 control-label'></label>
							<div class='col-sm-6'>
								<button type='submit' class='btn btn-success pull-left' name='form1'>éditer</button>
							</div>
						</div>

					</div> ";




    }





  }

}


public function  update_product($request){
  global $db;
    if(isset($_POST['form1'])){
        $valid = 1;
        if(empty($_POST['tcat_id'])) {
            $valid = 0;
          $_SESSION['error_message'] .= "Vous devez avoir à sélectionner une catégorie<br>";
        }
        if(empty($_POST['scat_id'])) {
            $valid = 0;
            $_SESSION['error_message'] .= "Vous devez avoir à sélectionner une catégorie sous<br>";
        }
        if(empty($_POST['p_name'])) {
            $valid = 0;
            $_SESSION['error_message'] .= "Le nom du produit ne peut pas être vide<br>";
        }

        if(empty($_POST['p_current_price'])) {
            $valid = 0;
            $_SESSION['error_message'] .= "Le prix actuel ne peut pas être vide<br>";
        }
        if(empty($_POST['p_qty'])) {
            $valid = 0;
            $_SESSION['error_message'] .= "La quantité ne peut pas être vide<br>";
        }

        if(empty($_POST['p_description'])) {
            $valid = 0;
            $_SESSION['error_message'] .= "La description ne peut pas être vide<br>";
        }
        if(empty($_POST['p_short_description'])) {
            $valid = 0;
            $_SESSION['error_message'] .= " la brève description ne peut pas être vide<br>";
        }
        if(empty($_POST['p_feature'])) {
            $valid = 0;
            $_SESSION['error_message'] .= " la fonction ne peut pas être vide<br>";
        }

        $path = $_FILES['photo_upload']['name'];
        $path_tmp = $_FILES['photo_upload']['tmp_name'];
        if($path!='') {
            $ext = pathinfo( $path, PATHINFO_EXTENSION );
            $file_name = basename( $path, '.' . $ext );
            if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
                $valid = 0;
                $_SESSION['error_message'] .= 'Vous devez avoir à télécharger sauf  jpg, jpeg, gif or png <br>';
            }
        }

        if($valid == 1){
            $p_name = $_POST['p_name'];
            $p_name = str_replace("'","\'", $p_name);

            $p_old_price = $_POST['p_old_price'];
            $p_current_price = $_POST['p_current_price'];
            $p_qty = $_POST['p_qty'];

            $p_description = $_POST['p_description'];
            $p_description = str_replace("'","\'",$p_description);

            $p_short_description = $_POST['p_short_description'];
            $p_short_description =  str_replace("'","\'", $p_short_description);

            $p_feature = $_POST['p_feature'];
            $p_feature =   str_replace("'","\'",$p_feature);

            $p_is_featured = $_POST['p_feature_select'];
            $p_is_active = $_POST['p_is_active'];
            $tcat_id = $_POST['tcat_id'];
            $scat_id = $_POST['scat_id'];


            if($path == ''){
                //update without image
                $stat = "UPDATE `tbl_product` SET `p_name`='$p_name',`p_old_price`='$p_old_price',`p_current_price`='$p_current_price',`p_qty`='$p_qty',`p_description`='$p_description',`p_short_description`='$p_short_description',`p_feature`='$p_feature',`p_in_featured`='$p_is_featured',`p_is_active`='$p_is_active',`tcat_id`='$tcat_id',`scat_id`='$scat_id' WHERE p_id = " . $request;
              $exe =   $db->exec_query($stat);
           if(!$exe) echo  mysqli_error($db->getConnection());
            }else{
                //with new image
                unlink($this->folder_tmp.DS.$_POST['current_photo']);
                $this->file=uniqid('product_',TRUE).$_FILES['photo_upload']['name'];

                move_uploaded_file($path_tmp,"$this->folder_tmp".DS.$this->file);

                $stat2 = "UPDATE `tbl_product` SET `p_name`='$p_name',`p_old_price`='$p_old_price',`p_current_price`='$p_current_price',`p_qty`='$p_qty',`p_photo`='$this->file',`p_description`='$p_description',`p_short_description`='$p_short_description',`p_feature`='$p_feature',`p_in_featured`='$p_is_featured',`p_is_active`='$p_is_active',`tcat_id`='$tcat_id',`scat_id`='$scat_id' WHERE p_id = " . $request;
                $db->exec_query($stat2);
            }

            if(isset($_POST['size'])){

                $stat_del = " DELETE FROM  " . self::$table_product_size . " WHERE p_id =  " . $request;
                $db->exec_query($stat_del);
                foreach ($_POST['size'] as $value){

                    $stat3 = " INSERT INTO  " . self::$table_product_size . " (size_id,p_id) VALUES ($value,$request) ";
                    $db->exec_query($stat3);

                }
            }else{

               $stat4 = " DELETE FROM " . self::$table_product_size . " WHERE p_id = " . $request;
                $db->exec_query($stat4);
            }

            if(isset($_POST['color'])){
                $stat_del_co = " DELETE FROM  " . self::$table_product_color . " WHERE p_id =  " . $request;
                $db->exec_query($stat_del_co);
                foreach ($_POST['color'] as $value){

                    $stat5 = " INSERT INTO  " . self::$table_product_color . " (color_id,p_id) VALUES ($value,$request) ";
                    $db->exec_query($stat5);

                }
            }else{

                $stat6 = " DELETE FROM " . self::$table_product_color . " WHERE p_id = " . $request;
                $db->exec_query($stat6);
            }


     $_SESSION['success_message'] = "Le produit a été mis à jour avec succès.";





        }












    }


}


public function delete_product($id){
        global $db;
//1 - unlink photo from folder

    $statment = "SELECT * FROM " . self::$table_product . " WHERE p_id = " . $db->escape_string(intval($id));
    $exec_statement = $db->exec_query($statment);
  while($result = mysqli_fetch_assoc($exec_statement)){
      $this->file = $result['p_photo'];

      unlink($this->folder_tmp.DS.$this->file);
   }
   // 2- delete product from tbl product
   $statment_del = "DELETE FROM " . self::$table_product . " WHERE p_id = " .$db->escape_string(intval($id));
    $db->exec_query($statment_del);

    // 2- delete product from tbl product size
    $statment_size = "DELETE FROM " . self::$table_product_size . " WHERE p_id = " .$db->escape_string(intval($id));
     $db->exec_query($statment_size);


    // 3- delete product from tbl product color
    $statment_color= "DELETE FROM " . self::$table_product_color . " WHERE p_id = " .$db->escape_string(intval($id));
    $db->exec_query($statment_color);

    // 4- delete product from tbl rating
    $statment_rating= "DELETE FROM " . self::$table_rating . " WHERE p_id = " .$db->escape_string(intval($id));
    $db->exec_query($statment_rating);

    //5 - delete from  tbl payment
   $statment_payment = " SELECT * FROM  " . self::$table_order . " WHERE product_id = " .$db->escape_string(intval($id));
   $exec_payment = $db->exec_query($statment_payment);
   while ($row_payment = mysqli_fetch_assoc($exec_payment)){
      $statment_5 = " DELETE FROM " . self::$tbl_payment . " WHERE payment_id = " . $row_payment['payment_id'];
       $db->exec_query($statment_5);
   }
    //6- delete from   tbl order

    $stat_order = " DELETE FROM " . self::$table_order . " WHERE product_id =  " . $db->escape_string(intval($id));
   $db->exec_query($stat_order);

}


}

$admin_product = new Admin_Product();