<?php
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'_config'.DIRECTORY_SEPARATOR.'config.php');
require_once(ROOT.DS.'admin'.DS.'_init'.DS.'admin_initialize.php');
if(isset($_POST['action']) && $_POST['action'] == 'check_colorif_exist'){
    $color_name = $_POST['color_name'];
    echo $color->checkColor($color_name);
}
if(isset($_POST['action']) && $_POST['action'] == 'insert_color'){
    echo $color->insert_color();
}
if(isset($_POST['action']) && $_POST['action'] == 'check_color_Exist'){
    $id = $_REQUEST['id'];
    echo $color->Check_color_Exist($id);
}
if(isset($_POST['action']) && $_POST['action'] == 'update_color'){
    $id = $_REQUEST['id'];
    echo $color->Update_Color($id);
}
if(isset($_POST['action']) && $_POST['action'] == 'Delete_color'){
    $id = $_REQUEST['del_id_color'];
    echo $color->Delete_Color($id);
}
