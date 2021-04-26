<?php

class Register
{
    private static  $tbl_customer = 'tbl_customer';
    private static  $tbl_settings = 'tbl_settings';
    private  $cust_name;
    private  $cust_companyname;
    private  $cust_email;
    private  $cust_phone;
    private  $cust_country;
    private  $cust_address;
    private  $cust_city;
    private  $cust_state;
    private  $cust_zip;
    private  $cust_password;
    private  $file;
    private  $file_tmp;
    private  $folder_tmp = ROOT.DS.'assets'.DS.'img'.DS.'img_customer';
    private  $contact_email;
    private  $receive_email_thank_you_message;
    private $ip;
    private $os;
    private $browser;
    private $device;



    public function  checkEmailOrUsernameIfExist($check,$value){
        global  $db;
        $statment = 'SELECT * FROM ' . self::$tbl_customer . " WHERE " . $check . " = '$value' ";
        $exec = $db->exec_query($statment);
        $total = mysqli_num_rows($exec);
        return $total;

    }
  public function check_email_if_exist($email){
    echo   $this->checkEmailOrUsernameIfExist("cust_email",$email);
  }

  public function  check_username_if_exist($username){
        echo $this->checkEmailOrUsernameIfExist("cust_name",$username);
  }
  public  function  add_customer(){
       global $db;
       $token = md5(time());
      $cust_datetime = date('Y-m-d h:i:s');
      $cust_timestamp = time();

  $tbl_seting_statement = "SELECT * FROM " . self::$tbl_settings . " WHERE id=1";
  $exec_tb_set = $db->exec_query($tbl_seting_statement);
    while($row_set = mysqli_fetch_assoc($exec_tb_set)){
        $this->contact_email = $row_set['contact_email'];
        $this->receive_email_thank_you_message = $row_set['receive_email_thank_you_message'];
    }


      $this->cust_name = strip_tags($_POST['username']);
      $this->cust_companyname = strip_tags($_POST['companyname']);
      $this->cust_email = strip_tags($_POST['email']);
      $this->cust_phone = strip_tags($_POST['telcust']);
      $this->cust_country= strip_tags($_POST['country']);
      $this->cust_address = strip_tags($_POST['custaddress']);
      $this->cust_city = strip_tags($_POST['city']);
      $this->cust_state = strip_tags($_POST['state']);
      $this->cust_zip = strip_tags($_POST['zipcode']);
      $this->cust_password = md5(trim($_POST['password']));
      $this->file=uniqid('user_',TRUE).$_FILES['file']['name'];
      $this->file_tmp=$_FILES['file']['tmp_name'];
      move_uploaded_file($this->file_tmp, "$this->folder_tmp".DS.$this->file);


      $this->ip = UserInfo::get_ip();
      $this->os = UserInfo::get_os();
      $this->browser = UserInfo::get_browser();
      $this->device = UserInfo::get_device();



$statement = "INSERT INTO  " . self::$tbl_customer . " (`cust_name`, `cust_cname`, `cust_email`, `cust_phone`, `cust_country`, `cust_address`, `cust_city`, `cust_state`, `cust_zip`, `cust_b_name`, `cust_b_cname`, `cust_b_phone`, `cust_b_country`, `cust_b_address`, `cust_b_city`, `cust_b_state`, `cust_b_zip`, `cust_s_name`, `cust_s_cname`, `cust_s_phone`, `cust_s_country`, `cust_s_address`, `cust_s_city`, `cust_s_state`, `cust_s_zip`, `cust_password`, `cust_token`, `cust_datetime`, `cust_timestamp`, `cust_status`, `cust_photo`, `ip`, `operating_system`, `browser`, `device`)" ;
$statement .= " VALUES ('$this->cust_name','$this->cust_companyname','$this->cust_email','$this->cust_phone','$this->cust_country','$this->cust_address','$this->cust_city',
                 '$this->cust_state','$this->cust_zip','','','','','','','','','','','','','','','','','$this->cust_password','$token','$cust_datetime','$cust_timestamp',1,'$this->file','$this->ip','$this->os','$this->browser','$this->device')";

 $db->exec_query($statement);





  }


}
$register = new Register();