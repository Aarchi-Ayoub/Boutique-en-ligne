<?php
require_once('_config/config.php');
require_once(ROOT.DS.'_init'.DS.'initialize.php');
require_once(ROOT.DS.'includes'.DS.'head.php');
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
                    <span>Boutique</span>
                    <?php
                    if(isset($_REQUEST['id'])){
                        ?>
                        <input type="hidden" class="id_cats" value="<?php echo $_REQUEST['id']?>">
                   <?php  }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<section class="product-shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                <div class="filter-widget">
                    <h4 class="fw-title">Categories</h4>
                    <ul class="filter-catagories">
                        <?php
                        $shop->get_Top_Category();
                        ?>


                    </ul>
                </div>
                <div class="filter-widget">
                    <h4 class="fw-title">Filtrer par</h4>
                    <?php
                    if(isset($_REQUEST['id'])){

                        echo $shop->get_Sous_Category($_REQUEST['id']);

                    }else{
                        echo $shop->get_Sous_Category();
                    }

                    ?>
                </div>


            </div>
            <div class="col-lg-9 order-1 order-lg-2">

                <div class="product-list">
                    <?php
                       if(isset($_REQUEST['id'])){
                           ?>
                           <div class="row filter_data_by_sous_cate">
                           </div>

                     <?php  }else{
                           ?>
                           <div class="row filter_data">
                           </div>


                      <?php }

                    ?>

                </div>

            </div>
        </div>
    </div>
</section>

<?php require_once(ROOT.DS.'includes'.DS.'footer.php');?>