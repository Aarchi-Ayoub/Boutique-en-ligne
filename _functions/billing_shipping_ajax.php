<?php
require_once('../_config/config.php');
require_once(ROOT.DS.'_init'.DS.'initialize.php');
if(isset($_POST['action']) && $_POST['action'] == 'add_billing_shipping'){
$cust_id = $_POST['cust_id'];
    echo $Billing_shipping->addBilling_shipping($cust_id);
}
