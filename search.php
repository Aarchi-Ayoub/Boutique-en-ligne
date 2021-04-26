<?php
require_once('_config/config.php');
require_once(ROOT.DS.'_init'.DS.'initialize.php');
require_once(ROOT.DS.'includes'.DS.'head.php');


if(!isset($_REQUEST['search'])) {
    header('location: index.php');
    exit;
} else {
    if($_REQUEST['search']=='') {
        header('location: index.php');
        exit;
    }
}

?>

<body>

<div id="preloder">
    <div class="loader"></div>
</div>

<?php  require_once('includes/nav.php'); ?>

<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="index.php"><i class="fa fa-home"></i> Accueil</a>
                    <span>Chercher</span>


                </div>
            </div>
        </div>
    </div>
</div>

<section class="product-shop spad">
    <div class="container">
        <div class="row">
        <?php
          echo $search->all_products_by_cust_search($_REQUEST['search']);
        ?>



          </div>

    </div>
</section>

<?php require_once(ROOT.DS.'includes'.DS.'footer.php');?>
