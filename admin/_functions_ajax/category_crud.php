<?php
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'_config'.DIRECTORY_SEPARATOR.'config.php');
require_once(ROOT.DS.'admin'.DS.'_init'.DS.'admin_initialize.php');
if(isset($_POST['action']) && $_POST['action'] == 'check_top_catif_exist'){
    $top_cat_name = $_POST['top_cat_name'];
    echo $category->checkTopCat($top_cat_name);
}
if(isset($_POST['action']) && $_POST['action'] == 'insert_top_cat'){
    echo $category->insert_TopCat();
}

if(isset($_POST['action']) && $_POST['action'] == 'check_topcat_Exist'){
    $id = $_REQUEST['id'];
    echo $category->Check_topcat_Exist($id);
}
if(isset($_POST['action']) && $_POST['action'] == 'update_topcat'){
    $id = $_REQUEST['id'];
    echo $category->Update_TopCat($id);
}
if(isset($_POST['action']) && $_POST['action'] == 'Delete_top_cat'){
    $id = $_REQUEST['del_id_top_cat'];
    echo $category->Delete_TopCat($id);
}
/********************************sous cat*******************************************/
if(isset($_POST['action']) && $_POST['action'] == 'add_in_souscat'){
  echo $category->addSousCat();
}
if(isset($_POST['action']) && $_POST['action'] == 'update_in_souscat'){
    $id = $_REQUEST['id'];
    echo $category->UpdateSousCat($id);
}

if(isset($_POST['action']) && $_POST['action'] == 'delete_id_sous_cate'){
    $id = $_REQUEST['delete_id_sous_cat'];
    echo $category->DeleteSous_Cat($id);
}