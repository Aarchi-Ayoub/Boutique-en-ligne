<?php
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'_config'.DIRECTORY_SEPARATOR.'config.php');
require_once(ROOT.DS.'admin'.DS.'_init'.DS.'admin_initialize.php');
if(isset($_POST['action']) && $_POST['action'] == 'check_order'){
    $id = $_POST['id'];
    echo $Admin_order->Check_order($id);
}

if(isset($_POST['action']) && $_POST['action'] == 'check_payment_status'){
    $id = $_POST['id'];
    echo $Admin_order->completed_payment_status($id);
}

if(isset($_POST['action']) && $_POST['action'] == 'check_order_shipping'){
    $id = $_POST['id'];
    echo $Admin_order->Check_order_shipping($id);
}

if(isset($_POST['action']) && $_POST['action'] == 'check_shipping_status'){
    $id = $_POST['id'];
    echo $Admin_order->completed_shipping_status($id);
}

/**************Delete**************************/
if(isset($_POST['action']) && $_POST['action'] == 'delete_order_check'){
    $id = $_POST['id'];
    echo $Admin_order->Check_order_Delete($id);
}
if(isset($_POST['action']) && $_POST['action'] == 'delete_order'){
    $id = $_POST['id'];
    echo $Admin_order->Delete_order($id);
}
