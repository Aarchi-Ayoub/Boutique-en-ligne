<?php
require_once('../_config/config.php');
require_once(ROOT.DS.'_init'.DS.'initialize.php');

if(isset($_POST['action']) && $_POST['action'] == 'add_commentaire'){
    $request = $_POST['p_id'];
    echo $product_detail->add_commentaire($request);
}
if(isset($_POST['action']) && $_POST['action'] == 'add_commentaire_blog'){
    $request = $_POST['p_id'];
    echo $blog->add_commentaire_blog($request);
}
