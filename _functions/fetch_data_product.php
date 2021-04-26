<?php
require_once('../_config/config.php');
require_once(ROOT.DS.'_init'.DS.'initialize.php');

if(isset($_POST['action']) && $_POST['action'] == 'fetch_data'){
    echo $products->all_products();
}

if(isset($_POST['action']) && $_POST['action'] == 'fetch_data_by_sous_cat'){
    $id =  $_POST['id'];
    echo $products->get_Product_by_cat($id);
}