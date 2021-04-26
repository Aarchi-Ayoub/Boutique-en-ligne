<?php
require_once('..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'_config'.DIRECTORY_SEPARATOR.'config.php');
require_once(ROOT.DS.'admin'.DS.'_init'.DS.'admin_initialize.php');

if(isset($_POST['action']) && $_POST['action'] == 'check_email_ifExist_admin'){
    $email = $_POST['email'];
    echo $admin->check_email_if_exist($email);
}
if(isset($_POST['action']) && $_POST['action'] == 'inscription_admin'){

    echo $admin->add_admin();
}
if(isset($_POST['action']) && $_POST['action'] == 'edit_admin'){
    $id = $_POST['id'];
    echo $admin->edit_admin($id);
}

if(isset($_POST['action']) && $_POST['action'] == 'switch_to_enabled_admin'){
    $id = $_POST['id'];
    echo $admin->switch_Enabled_admin($id);
}
if(isset($_POST['action']) && $_POST['action'] == 'switch_to_Disabled_admin'){
    $id = $_POST['id'];
    echo $admin->switch_Disabled_admin($id);
}

if(isset($_POST['action']) && $_POST['action'] == 'delete_admin'){
    $id = $_POST['id'];
    echo $admin->Delete_admin($id);
}

/*******************edit profile***************************/
if(isset($_POST['action']) && $_POST['action'] == 'edit_admin_profile'){
    $email= $_POST['email_edit_profile'];
    echo $admin->edit_profile_with_any_photo($email);
}
if(isset($_POST['action']) && $_POST['action'] == 'edit_admin_profile_with_photo'){
    $email= $_POST['email_edit_profile'];
    echo $admin->edit_profile_with_photo($email);
}
/*********************************/
if(isset($_POST['action']) && $_POST['action'] == 'check_old_pass_ad'){

    echo $admin->CheckIfPassCorrect_in_edit_pass_panel($_SESSION['user']['user_id']);

}

if(isset($_POST['action']) && $_POST['action'] == 'new_pasword_update_ad'){

    echo $admin->new_pasword_update_ad($_SESSION['user']['user_id']);

}