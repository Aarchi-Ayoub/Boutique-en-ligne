<?php


class Contact
{
  private static  $tbl_contact = 'tbl_contact';
  private $name;
  private $email;
  private $message;
  public function add_comment(){
      global $db;
 $this->name = $_POST['name'];
 $this->email = $_POST['email'];
 $this->message = $_POST['message'];
 $date = date('Y/m/d H:i:s');
 $this->message =str_replace("'","\'",$this->message);

   $stat = " INSERT INTO " . self::$tbl_contact . "(`name`, `email`, `messsage`, `date_inserted`) ";
   $stat .= " VALUES ('$this->name','$this->email','$this->message','$date') ";
  $db->exec_query($stat);

  }

}
$contact = new Contact();