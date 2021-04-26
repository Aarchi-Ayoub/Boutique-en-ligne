<?php
require_once('..'.DIRECTORY_SEPARATOR. '_config'.DIRECTORY_SEPARATOR.'config.php');
require_once(ROOT.DS.'admin'.DS.'_init'.DS.'admin_initialize.php');
require_once(ROOT.DS.'admin'.DS.'includes'.DS.'header.php');
$_SESSION['error_message'] = '';
$_SESSION['success_message'] = '';
?>
<?php

echo $admin_product->check_url_data_and_id_for_product($_REQUEST['id']);

echo $admin_product->update_product($_REQUEST['id']);


?>


<section class="content-header">
	<div class="content-header-left">
		<h1>Modifier le produit</h1>

	</div>
	<div class="content-header-right">
		<a href="product.php" class="btn btn-primary btn-sm">Voir tout</a>
	</div>
</section>


<section class="content">

	<div class="row">
		<div class="col-md-12">
            <?php if(isset( $_SESSION['error_message'])): ?>
                <div class="callout callout-danger">

                    <p>
                        <?php echo  $_SESSION['error_message'];
                        unset($_SESSION['error_message']);

                        ?>
                    </p>
                </div>
            <?php endif; ?>

            <?php if(isset( $_SESSION['success_message'])): ?>
                <div class="callout callout-success">

                    <p><?php echo $_SESSION['success_message'];
                      unset($_SESSION['success_message']);

                    ?>

                    </p>

                </div>
            <?php endif; ?>

			<form class="form-horizontal" action="" id="form_update_product" method="post" enctype="multipart/form-data">

				<div class="box box-info">

                    <?php
                    echo $admin_product->get_product_by_id($_REQUEST['id']);
                    ?>







				</div>

			</form>


		</div>
	</div>

</section>

<?php require_once(ROOT.DS.'admin'.DS.'includes'.DS.'footer.php'); ?>

