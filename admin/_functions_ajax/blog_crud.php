<?php
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'_config'.DIRECTORY_SEPARATOR.'config.php');
require_once(ROOT.DS.'admin'.DS.'_init'.DS.'admin_initialize.php');

if(isset($_POST['action']) && $_POST['action'] == 'add_blog'){

    echo $Adminblog->add_blog();
}
if(isset($_POST['action']) && $_POST['action'] == 'edit_blog'){
$id = $_POST['id_edit_blog'];
    echo $Adminblog->edit_blog_without_photo($id);

}
if(isset($_POST['action']) && $_POST['action'] == 'edit_blog_with_photo'){
    $id = $_POST['id_edit_blog'];
    echo $Adminblog->edit_blog_with_photo($id);
}
if(isset($_POST['action']) && $_POST['action'] == 'delete_blog'){
    $id = $_POST['id'];
    echo $Adminblog->Delete_blog($id);
}
