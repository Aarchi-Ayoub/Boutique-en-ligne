<?php
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'_config'.DIRECTORY_SEPARATOR.'config.php');
require_once(ROOT.DS.'admin'.DS.'_init'.DS.'admin_initialize.php');


if(isset($_POST['action']) && $_POST['action'] == 'charge_sous_cat'){

    $tcat_id = $_REQUEST['id'];
    echo $admin_product->get_sous_Category($tcat_id);

}

if(isset($_POST['action']) && $_POST['action'] == 'add_product'){

   echo $admin_product->add_product();

}

if(isset($_POST['action']) && $_POST['action'] == 'update_product'){

    $id =  $_REQUEST['id'];
    echo $admin_product->update_product($id);

}

if(isset($_POST['action']) && $_POST['action'] == 'delete_product'){

    $id =  $_REQUEST['del_id'];
    echo $admin_product->delete_product($id);

}
