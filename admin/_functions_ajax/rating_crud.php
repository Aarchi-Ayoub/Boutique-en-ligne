<?php
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'_config'.DIRECTORY_SEPARATOR.'config.php');
require_once(ROOT.DS.'admin'.DS.'_init'.DS.'admin_initialize.php');
if(isset($_POST['action']) && $_POST['action'] == 'switch_to_enabled'){
    $id = $_POST['id'];
    echo $admin_rating->switch_Enabled($id);
}
if(isset($_POST['action']) && $_POST['action'] == 'switch_to_Disabled'){
    $id = $_POST['id'];
    echo $admin_rating->switch_Disabled($id);
}

if(isset($_POST['action']) && $_POST['action'] == 'delete_rating'){
    $id = $_POST['id'];
    echo $admin_rating->Delete_rating($id);
}
/**************************blog rat*********************/
if(isset($_POST['action']) && $_POST['action'] == 'switch_to_enabled_blog'){
    $id = $_POST['id'];
    echo $Admin_RatingBlog->switch_Enabled_blog($id);
}
if(isset($_POST['action']) && $_POST['action'] == 'switch_to_Disabled_blog'){
    $id = $_POST['id'];
    echo $Admin_RatingBlog->switch_Disabled_blog($id);
}
if(isset($_POST['action']) && $_POST['action'] == 'delete_rating_blog'){
    $id = $_POST['id'];
    echo $Admin_RatingBlog->Delete_rating_blog($id);
}
