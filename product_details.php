<?php
require_once('_config/config.php');
require_once(ROOT.DS.'_init'.DS.'initialize.php');
require_once(ROOT.DS.'includes'.DS.'head.php');


echo $product_detail->add_to_cart($_REQUEST['id']);

?>

<body>

    <div id="preloder">
        <div class="loader"></div>
    </div>

    <?php  require_once('includes/nav.php'); ?>

    <div class="breacrumb-section">
        <div class="container">
            <input type='hidden' id="id_product" value="<?php echo $_REQUEST['id'] ?>">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="index.php"><i class="fa fa-home"></i> Accueil</a>
                        <a href="shop.php">Boutique</a>
                        <span>Détail</span>
                    </div>
                </div>
            </div>
            <input type="hidden" id="rating-value">
        </div>
    </div>

    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="row">

                        <?php
                        $product_detail->get_produit_by_id($_REQUEST['id']);
                        ?>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESCRIPTION</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-2" role="tab">CARACTÉRISTIQUES</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-3" role="tab">Avis des clients (<?php echo $product_detail->fetch_total_comments($_REQUEST['id'])?>)</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                               <?php echo $product_detail->description_section($_REQUEST['id'])  ?>
                                            </div>
                                            <div class="col-lg-5">
                                                <?php
                                                 echo $product_detail->description_section_image($_REQUEST['id']);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <?php
                                            echo  $product_detail->specification_section();
                                        ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4><?php echo $product_detail->fetch_total_comments($_REQUEST['id'])?> commentaires</h4>
                                        <div class="comment-option">
                                            <?php
                                           echo  $product_detail->fetch_comments($_REQUEST['id']);
                                            ?>

                                        </div>
                                        <?php
                                        if(isset($_SESSION['customer'])){
                                           echo  $product_detail->CheckcommentaireIfExist($_REQUEST['id'],$_SESSION['customer']['cust_id']);
                                           ?>
                                            <input type="hidden" id="cust_id" value="<?php echo $_SESSION['customer']['cust_id'] ?>">
                                       <?php }else{
                                            ?>
                                            <p class="text-danger">Vous devez être connecté pour donner un avis </p>
                                            <a class="text-danger" href="login.php" style="text-decoration: underline">s'identifier</a>
                                       <?php }

                                          ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="related-products spad">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 offset-lg-1">
                    <div class="section-title">
                        <h2>Produits liées</h2>
                    </div>
                    <div class="product-slider owl-carousel">
                        <?php
                            echo $product_detail->getRelated_Products($_REQUEST['id']);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php require_once(ROOT.DS.'includes'.DS.'footer.php');?>

