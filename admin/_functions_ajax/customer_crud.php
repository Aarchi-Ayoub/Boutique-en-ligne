<?php
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'_config'.DIRECTORY_SEPARATOR.'config.php');
require_once(ROOT.DS.'admin'.DS.'_init'.DS.'admin_initialize.php');
if(isset($_POST['action']) && $_POST['action'] == 'switch_to_enabled'){
    $id = $_POST['id'];
    echo $Admin_customer->switch_Enabled($id);
}
if(isset($_POST['action']) && $_POST['action'] == 'switch_to_Disabled'){
    $id = $_POST['id'];
    echo $Admin_customer->switch_Disabled($id);
}

if(isset($_POST['action']) && $_POST['action'] == 'delete_customer'){
    $id = $_POST['id'];
    echo $Admin_customer->Delete_customer($id);
}
