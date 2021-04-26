<?php
require_once('../_config/config.php');
require_once(ROOT.DS.'_init'.DS.'initialize.php');

if(isset($_POST['action']) && $_POST['action'] == 'update_profile_customer_without_photos'){

    echo $dashbord ->Update_without_photos($_SESSION['customer']['cust_id']);

}

if(isset($_POST['action']) && $_POST['action'] == 'update_profile_customer_with_photos'){

    echo $dashbord ->Update_with_photos($_SESSION['customer']['cust_id']);

}

if(isset($_POST['action']) && $_POST['action'] == 'update_billing_shipping'){

    echo $dashbord ->Update_billing_shipping($_SESSION['customer']['cust_id']);

}

/*********************************/
if(isset($_POST['action']) && $_POST['action'] == 'check_old_pass'){

    echo $dashbord ->CheckIfPassCorrect_in_dashbord($_SESSION['customer']['cust_id']);

}

if(isset($_POST['action']) && $_POST['action'] == 'new_pasword_update'){

    echo $dashbord ->new_pasword_update($_SESSION['customer']['cust_id']);

}