<?php
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'_config'.DIRECTORY_SEPARATOR.'config.php');
require_once(ROOT.DS.'admin'.DS.'_init'.DS.'admin_initialize.php');

if(isset($_POST['action']) && $_POST['action'] == 'check_email_bef_dash'){
    echo $adminlogin->CheckIfEmailCorrect_log();
}
if(isset($_POST['action']) && $_POST['action'] == 'check_password_bef_dash'){
    echo $adminlogin->CheckIfPassCorrect_log();
}
if(isset($_POST['action']) && $_POST['action'] == 'check_Status_bef_dash'){
    echo $adminlogin->CheckStatus_log();
}