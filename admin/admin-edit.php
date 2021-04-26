<?php
require_once('..'.DIRECTORY_SEPARATOR. '_config'.DIRECTORY_SEPARATOR.'config.php');
require_once(ROOT.DS.'admin'.DS.'_init'.DS.'admin_initialize.php');
require_once(ROOT.DS.'admin'.DS.'includes'.DS.'header.php');
?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Modifier l'administrateur</h1>
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
                <form class="form-horizontal" action="" method="post" id="form_edit_admin">

                    <?php
                    echo $admin->fetch_after_edit_admin($_REQUEST['id']);
                    ?>

                </form>



            </div>





        </div>
    </div>

</section>
<?php require_once(ROOT.DS.'admin'.DS.'includes'.DS.'footer.php'); ?>
