<?php
require_once('../_config/config.php');
require_once(ROOT.DS.'_init'.DS.'initialize.php');
if(isset($_POST['action']) && $_POST['action'] == 'add_comment'){

    echo $contact->add_comment();
}
