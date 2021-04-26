<?php
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'_config'.DIRECTORY_SEPARATOR.'config.php');
require_once(ROOT.DS.'admin'.DS.'_init'.DS.'admin_initialize.php');

if(isset($_POST['action']) && $_POST['action'] == 'delete_comment'){
   $id = $_POST['id'];
    echo $Admincontact->delete_comment($id);
}
