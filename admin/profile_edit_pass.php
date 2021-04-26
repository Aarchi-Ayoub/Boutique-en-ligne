<?php
require_once('..'.DIRECTORY_SEPARATOR. '_config'.DIRECTORY_SEPARATOR.'config.php');
require_once(ROOT.DS.'admin'.DS.'_init'.DS.'admin_initialize.php');
require_once(ROOT.DS.'admin'.DS.'includes'.DS.'header.php');



if ($_REQUEST['email'] !=  $_SESSION['user']['cust_email']){
    header('location: index.php');
    exit;
}

?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Editer le profil</h1>
    </div>
    <div class="content-header-right">
        <a href="admin.php" class="btn btn-primary btn-sm">Voir tout</a>
    </div>
</section>
<section class="content">
    <input type="hidden" id="id_admin" value="<?php echo $_REQUEST['id'] ?>">

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <form class="form-horizontal" action="" method="post" id="form_edit_pass_admin_profile">

                    <?php
                    echo $admin->edit_pass_profile($_REQUEST['email']);
                    ?>

                </form>



            </div>





        </div>
    </div>

</section>
<?php require_once(ROOT.DS.'admin'.DS.'includes'.DS.'footer.php'); ?>


