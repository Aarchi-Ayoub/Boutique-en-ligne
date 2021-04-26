<?php


class Admin
{
    private  static $tbluser = 'tbl_user';
    private $cust_name;
    private $cust_companyname;
    private $cust_email;
    private $cust_phone;
    private $cust_country;
    private $cust_address;
    private $cust_city;
    private $cust_state;
    private $cust_zip;
    private $cust_password;
    private $password_db;
    private $file;
    private $file_tmp;
    private  $folder_tmp = ROOT.DS.'assets'.DS.'img'.DS.'img_user';

    public static function check_session(){
      if(!isset($_SESSION['user'])){
            header('location: logout.php');
        }
    }

    public function image_admin($sesion_email){
        global $db;
        $stat = " SELECT * FROM " .self::$tbluser . " WHERE cust_email = '$sesion_email' ";
        $exec = $db->exec_query($stat);
        while ($row = mysqli_fetch_assoc($exec)){
            $this->file = $row['cust_photo'];
        }

        return $this->file;

    }


    public function  checkEmailOrUsernameIfExist($check,$value){
        global  $db;
        $statment = 'SELECT * FROM ' . self::$tbluser . " WHERE " . $check . " = '$value' ";
        $exec = $db->exec_query($statment);
        $total = mysqli_num_rows($exec);
        return $total;

    }

    public function check_email_if_exist($email){
        echo   $this->checkEmailOrUsernameIfExist("cust_email",$email);
    }
    public  function  add_admin(){
        global $db;
        $cust_datetime = date('Y-m-d h:i:s');
        $cust_timestamp = time();

        $this->cust_name = strip_tags($_POST['name']);
        $this->cust_companyname = strip_tags($_POST['companyname']);
        $this->cust_email = strip_tags($_POST['email']);
        $this->cust_phone = strip_tags($_POST['telcust']);
        $this->cust_country= strip_tags($_POST['country']);
        $this->cust_address = strip_tags($_POST['custaddress']);
        $this->cust_city = strip_tags($_POST['city']);
        $this->cust_state = strip_tags($_POST['state']);
        $this->cust_zip = strip_tags($_POST['zipcode']);
        $this->cust_password = md5(trim($_POST['password']));
        $this->file=uniqid('user_admin',TRUE).$_FILES['file']['name'];
        $this->file_tmp=$_FILES['file']['tmp_name'];
        move_uploaded_file($this->file_tmp, "$this->folder_tmp".DS.$this->file);

  $statement = " INSERT INTO `tbl_user`(`cust_name`, `cust_cname`, `cust_email`, `cust_phone`, `cust_country`, `cust_address`, `cust_city`, `cust_state`, `cust_zip`, `cust_password`, `cust_datetime`, `cust_timestamp`, `cust_status`, `cust_photo`,`role`) ";
  $statement .= " VALUES ('$this->cust_name','$this->cust_companyname','$this->cust_email','$this->cust_phone','$this->cust_country','$this->cust_address','$this->cust_city','$this->cust_state','$this->cust_zip','$this->cust_password','$cust_datetime','$cust_timestamp',0,'$this->file','admin') ";
         $db->exec_query($statement);





    }
    public function AllAdmins(){
        global $db;
        $stat = "SELECT * FROM " . self::$tbluser . " WHERE role = 'admin'";
        $exec= $db->exec_query($stat);
        $i = 0;
        while ($row = mysqli_fetch_assoc($exec)){
            $i++;
            ?>
            <tr class="<?php if($row['cust_status']==1) {echo 'bg-g';}else {echo 'bg-r';} ?>">
                <td><?php echo $i; ?></td>
                <td><?php echo $row['cust_name']; ?></td>
                <td><?php echo $row['cust_email']; ?></td>
                <td>
                    <?php echo $row['cust_country']; ?><br>
                    <?php echo $row['cust_city']; ?><br>
                    <?php echo $row['cust_state']; ?>
                </td>
                <td><?php if($row['cust_status']==1) {echo 'Actif';} else {echo 'Inactif';} ?></td>

                <td>
                    <?php
                    if($row['cust_status'] == 0){
                        ?>
                        <a href="#" class="btn btn-success btn-xs enabled_admin" id="<?php echo $row['user_id'] ?>">Activé</a>
                    <?php }else{
                        ?>
                        <a href="#" class="btn btn-warning btn-xs disabled_admin" id="<?php echo $row['user_id'] ?>">désactivé</a>
                    <?php  }
                    ?>

                </td>
                <td>
                    <a href="#" class="btn btn-danger btn-xs delete_admin" id="<?php echo $row['user_id'] ?>">Supprimer</a>
                    <a href="admin-edit.php?id=<?php echo $row['user_id'] ?>" class="btn btn-primary btn-xs update_admin" id="<?php echo $row['user_id'] ?>">Éditer</a>
                </td>


            </tr>


        <?php }





    }

    public  function switch_Disabled_admin($id){
        global $db;
        $stat = " UPDATE " . self::$tbluser . " SET cust_status = 0   WHERE user_id = " . $db->escape_string(intval($id));
        $db->exec_query($stat);

    }
    public  function switch_Enabled_admin($id){
        global $db;
        $stat = "UPDATE " . self::$tbluser . " SET cust_status = 1   WHERE user_id = " . $db->escape_string(intval($id));
        $db->exec_query($stat);

    }

    public  function  Delete_admin($id){
        global $db;
        $sel = " SELECT * FROM " .self::$tbluser . " WHERE user_id =  " . $db->escape_string(intval($id));
        $exec = $db->exec_query($sel);
        while($row = mysqli_fetch_assoc($exec)){
            $this->file = $row['cust_photo'];
            unlink($this->folder_tmp.DS.$this->file);
        }


        $stat = "DELETE FROM  " . self::$tbluser . "  WHERE user_id = " . $db->escape_string(intval($id));
        $db->exec_query($stat);


    }

    public function fetch_after_edit_admin($request){
        global $db;
        $stat = " SELECT * FROM " .self::$tbluser . " WHERE user_id = " . $db->escape_string(intval($request));
        $exec = $db->exec_query($stat);

        while($row = mysqli_fetch_assoc($exec)){
               $this->cust_name = $row['cust_name'];
               $this->cust_companyname = $row['cust_cname'];
               $this->cust_email = $row['cust_email'];
               $this->cust_phone = $row['cust_phone'];
               $this->cust_country = $row['cust_country'];
               $this->cust_address = $row['cust_address'];
               $this->cust_city = $row['cust_city'];
               $this->cust_state = $row['cust_state'];
               $this->cust_zip = $row['cust_zip'];
               $this->file = $row['cust_photo'];
            $fetch =<<<DELIMETER

 <div class="box box-info">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Prénom <span>*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="name_admin_edit" value="{$this->cust_name}">
                                    <span class="nameEmpty_edit"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Nom(optional)</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="cname_admin_edit"  value="{$this->cust_companyname}">
                                    <span class="cnameEmpty_edit"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Email <span>*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="" value="{$this->cust_email}" disabled="disabled">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Téléphone <span>*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="phone_admin_edit" value="{$this->cust_phone}">
                                    <span class="phoneEmpty_edit"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Pays <span>*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="country_admin_edit" value="{$this->cust_country}">
                                    <span class="countryEmpty_edit"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Adresse <span>*</span></label>
                                <div class="col-sm-4">
                                    <textarea type="text" class="form-control" id="adress_admin_edit" cols="6" rows="6">{$this->cust_address}</textarea>
                                    <span class="adressEmpty_edit"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Ville <span>*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="city_admin_edit" value="{$this->cust_city}">
                                    <span class="cityEmpty_edit"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Province <span>*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="state_admin_edit" value="{$this->cust_state}">
                                    <span class="stateEmpty_edit"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Code postal <span>*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="zip_admin_edit" value="{$this->cust_zip}">
                                    <span class="zipEmpty_edit"></span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label"></label>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-success pull-left" name="form2">Modifier</button>
                                </div>
                            </div>
                        </div>
                    </div>




DELIMETER;

echo $fetch;





        }



    }

    public function edit_admin($request){
        global $db;
        $this->cust_name = strip_tags($_POST['name_edit']);
        $this->cust_companyname = strip_tags($_POST['companyname_edit']);
        $this->cust_phone = strip_tags($_POST['telcust_edit']);
        $this->cust_country= strip_tags($_POST['country_edit']);
        $this->cust_address = strip_tags($_POST['custaddress_edit']);
        $this->cust_city = strip_tags($_POST['city_edit']);
        $this->cust_state = strip_tags($_POST['state_edit']);
        $this->cust_zip = strip_tags($_POST['zipcode_edit']);

        $stat = " UPDATE `tbl_user` SET `cust_name`='$this->cust_name',`cust_cname`='$this->cust_companyname',`cust_phone`='$this->cust_phone',`cust_country`='$this->cust_country',`cust_address`='$this->cust_address',`cust_city`='$this->cust_city',`cust_state`='$this->cust_state',`cust_zip`='$this->cust_zip' ";
        $stat .= " WHERE user_id = " . $request;
       $ex =  $db->exec_query($stat);
 if(!$ex) echo 'error' . mysqli_error($db->getConnection());

    }

    public function fetch_after_edit_profile($email){
        global $db;
        $stat = " SELECT * FROM " .self::$tbluser . " WHERE cust_email = '$email' ";
        $exec = $db->exec_query($stat);

        while($row = mysqli_fetch_assoc($exec)){
            $this->cust_name = $row['cust_name'];
            $this->cust_companyname = $row['cust_cname'];
            $this->cust_email = $row['cust_email'];
            $this->cust_phone = $row['cust_phone'];
            $this->cust_country = $row['cust_country'];
            $this->cust_address = $row['cust_address'];
            $this->cust_city = $row['cust_city'];
            $this->cust_state = $row['cust_state'];
            $this->cust_zip = $row['cust_zip'];
            $this->file = $row['cust_photo'];
            $fetch =<<<DELIMETER

 <div class="box box-info">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Prénom <span>*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="name_admin_edit_profile" value="{$this->cust_name}">
                                    <span class="nameEmpty_edit_profile"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Nom(optionale)</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="cname_admin_edit_profile"  value="{$this->cust_companyname}">
                                   
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Email <span>*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="email_admin_edit_profile" value="{$this->cust_email}" disabled="disabled">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Téléphone <span>*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="phone_admin_edit_profile" value="{$this->cust_phone}">
                                    <span class="phoneEmpty_edit_profile"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Pays <span>*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="country_admin_edit_profile" value="{$this->cust_country}">
                                    <span class="countryEmpty_edit_profile"></span>
                                </div>
                            </div>
                             <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Photo <span></span></label>
                                <div class="col-sm-4">
                                    <input type="file" class="form-control" id="photo_admin_new_profile" value="{$this->cust_country}">
                                    <span class="photoEmpty_edit_profile"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Adresse <span>*</span></label>
                                <div class="col-sm-4">
                                    <textarea type="text" class="form-control" id="adress_admin_edit_profile" cols="6" rows="6">{$this->cust_address}</textarea>
                                    <span class="adressEmpty_edit_profile"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Ville <span>*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="city_admin_edit_profile" value="{$this->cust_city}">
                                    <span class="cityEmpty_edit_profile"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Province <span>*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="state_admin_edit_profile" value="{$this->cust_state}">
                                    <span class="stateEmpty_edit_profile"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Code postal <span>*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="zip_admin_edit_profile" value="{$this->cust_zip}">
                                    <span class="zipEmpty_edit_profile"></span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label"></label>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-success pull-left" name="form2">modifier</button>
                                </div>
                            </div>
                        </div>
                    </div>




DELIMETER;

            echo $fetch;





        }



    }

    public function edit_profile_with_any_photo($request){
    global $db;
    $this->cust_name = strip_tags($_POST['name_edit_profile']);
    $this->cust_companyname = strip_tags($_POST['companyname_edit_profile']);
    $this->cust_phone = strip_tags($_POST['telcust_edit_profile']);
    $this->cust_country= strip_tags($_POST['country_edit_profile']);
    $this->cust_address = strip_tags($_POST['custaddress_edit_profile']);
    $this->cust_city = strip_tags($_POST['city_edit_profile']);
    $this->cust_state = strip_tags($_POST['state_edit_profile']);
    $this->cust_zip = strip_tags($_POST['zipcode_edit_profile']);

    $stat = " UPDATE `tbl_user` SET `cust_name`='$this->cust_name',`cust_cname`='$this->cust_companyname',`cust_phone`='$this->cust_phone',`cust_country`='$this->cust_country',`cust_address`='$this->cust_address',`cust_city`='$this->cust_city',`cust_state`='$this->cust_state',`cust_zip`='$this->cust_zip' ";
    $stat .= " WHERE cust_email = '$request' ";
    $db->exec_query($stat);


}
    public function edit_profile_with_photo($request){
        global $db;
        $stat1 = "SELECT * FROM " . self::$tbluser . " WHERE cust_email = '$request'";
        $exec1 = $db->exec_query($stat1);
        while ($row = mysqli_fetch_assoc($exec1)){
            $this->file = $row['cust_photo'];
            unlink($this->folder_tmp.DS.$this->file);
        }

        $this->file = uniqid('user_admin',TRUE).$_FILES['photo_edit_profile']['name'];
        $this->file_tmp=$_FILES['photo_edit_profile']['tmp_name'];

        $this->cust_name = strip_tags($_POST['name_edit_profile']);
        $this->cust_companyname = strip_tags($_POST['companyname_edit_profile']);
        $this->cust_phone = strip_tags($_POST['telcust_edit_profile']);
        $this->cust_country= strip_tags($_POST['country_edit_profile']);
        $this->cust_address = strip_tags($_POST['custaddress_edit_profile']);
        $this->cust_city = strip_tags($_POST['city_edit_profile']);
        $this->cust_state = strip_tags($_POST['state_edit_profile']);
        $this->cust_zip = strip_tags($_POST['zipcode_edit_profile']);

        move_uploaded_file($this->file_tmp, "$this->folder_tmp".DS.$this->file);

        $stat = " UPDATE `tbl_user` SET `cust_name`='$this->cust_name',`cust_cname`='$this->cust_companyname',`cust_phone`='$this->cust_phone',`cust_country`='$this->cust_country',`cust_address`='$this->cust_address',`cust_city`='$this->cust_city',`cust_state`='$this->cust_state',`cust_zip`='$this->cust_zip',`cust_photo`='$this->file' ";
        $stat .= " WHERE cust_email = '$request' ";
        $db->exec_query($stat);



        $_SESSION['user']['cust_name'] = $this->cust_name;
        $_SESSION['user']['cust_cname'] = $this->cust_companyname;
        $_SESSION['user']['cust_phone'] = $this->cust_phone;
        $_SESSION['user']['cust_country'] = $this->cust_country;
        $_SESSION['user']['cust_address'] = $this->cust_address;
        $_SESSION['user']['cust_city'] = $this->cust_city;
        $_SESSION['user']['cust_state'] = $this->cust_state;
        $_SESSION['user']['cust_zip'] = $this->cust_zip;
        $_SESSION['user']['cust_photo'] = $this->file;


    }

    public function edit_pass_profile($email){

        global $db;
        $stat = " SELECT * FROM " .self::$tbluser . " WHERE cust_email = '$email' ";
        $exec = $db->exec_query($stat);

        while($row = mysqli_fetch_assoc($exec)){

            $fetch =<<<DELIMETER

 <div class="box box-info">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">Ancien mot de passe <span>*</span></label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control" id="ad_passwords">
                                    <span class="password_feesbackss"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">New Password</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control" id="new_passwords_ad">
                                    <span class="new_passwordfeesbackss"></span>
                                   
                                </div>
                            </div>
                              <div class="form-group">
                                <label for="" class="col-sm-2 control-label"></label>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-success pull-left" name="form3">modifier</button>
                                </div>
                            </div>
                     
                       
                        </div>
                    </div>




DELIMETER;

            echo $fetch;





        }



    }

    public function CheckIfPassCorrect_in_edit_pass_panel($user_id){
        global $db;
        $old_passsword = strip_tags($_POST['pass']);

        $statement = "SELECT * FROM " . self::$tbluser . " WHERE user_id =  $user_id ";
        $exec = $db->exec_query($statement);

        while($row = mysqli_fetch_assoc($exec)){
            $this->password_db = $row['cust_password'];
        }
        if($this->password_db != md5($old_passsword)){
            return "not the seem";
        }

    }
    public function new_pasword_update_ad($user_id){
        global  $db;
        $cust_password = md5(trim($_POST['newPass']));

        $stat = " UPDATE " . self::$tbluser . " SET cust_password = '$cust_password' WHERE user_id = $user_id ";
        $db->exec_query($stat);
        $_SESSION['user']['cust_password'] = $cust_password;


    }



}
$admin = new Admin();