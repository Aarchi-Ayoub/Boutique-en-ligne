<?php
require_once('../_config/config.php');
require_once(ROOT.DS.'_init'.DS.'initialize.php');
if(isset($_POST['action']) && $_POST['action'] == 'check_email_ifExist'){
    $email = $_POST['email'];
    echo $register->check_email_if_exist($email);
}
if(isset($_POST['action']) && $_POST['action'] == 'check_username_ifExist'){
    $username = $_POST['username'];
    echo $register->check_username_if_exist($username);
}
if(isset($_POST['action']) && $_POST['action'] == 'inscription_customer'){
    echo $register->add_customer();
}
if(isset($_POST['action']) && $_POST['action'] == 'check_email'){
    echo $login->CheckIfEmailCorrect();
}
if(isset($_POST['action']) && $_POST['action'] == 'check_password'){
    echo $login->CheckIfPassCorrect();
}
if(isset($_POST['action']) && $_POST['action'] == 'check_Status'){
    echo $login->CheckStatus();
}