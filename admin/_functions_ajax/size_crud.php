<?php
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'_config'.DIRECTORY_SEPARATOR.'config.php');
require_once(ROOT.DS.'admin'.DS.'_init'.DS.'admin_initialize.php');
if(isset($_POST['action']) && $_POST['action'] == 'check_sizeif_exist'){
    $size_name = $_POST['size_name'];
    echo $size->checkSize($size_name);
}
if(isset($_POST['action']) && $_POST['action'] == 'insert_size'){
    echo $size->insert_size();
}
if(isset($_POST['action']) && $_POST['action'] == 'check_size_Exist'){
    $id = $_REQUEST['id'];
    echo $size->Check_size_Exist($id);
}
if(isset($_POST['action']) && $_POST['action'] == 'update_size'){
    $id = $_REQUEST['id'];
    echo $size->Update_Size($id);
}
if(isset($_POST['action']) && $_POST['action'] == 'Delete_size'){
    $id = $_REQUEST['del_id_size'];
    echo $size->Delete_Size($id);
}