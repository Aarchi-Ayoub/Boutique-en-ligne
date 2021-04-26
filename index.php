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

    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-banner">
                        <a href="shop.php?id=1">
                            <img src="assets/img/img_static_index/complement2.png" alt="">
                            <div class="inner-text">
                                <h4>PROTEINES</h4>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <a href="shop.php?id=2">
                        <img src="assets/img/img_static_index/clothing.jpg" alt="">
                        <div class="inner-text">
                            <h4>VÊTEMENTS</h4>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <a href="shop.php?id=3" >
                        <img src="assets/img/img_static_index/equipement.jpeg" alt="">
                        <div class="inner-text">
                            <h4>EQUIPEMENT</h4>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="women-banner spad">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <li class="active">Produits Populaires</li>

                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                        <?php
                          $products->get_Product_Featured();
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="women-banner man-banner  spad">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <li class="active">Nouveaux Produits </li>

                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                        <?php
                        echo $products->get_last_product();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Les articles</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                  echo $blog->all_Blog_index();
                ?>

            </div>
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="assets/img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>LIVRAISON  </h6>
                                <p>Pour toute commande de 20 MAD</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="assets/img/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>LIVRAISON À TEMPS</h6>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="assets/img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>PAIEMENT SÉCURISÉ</h6>
                                <p>Paiement 100% sécurisé</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="women-banner man-banner  spad">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <li class="active">Produits les plus consultés</li>

                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                        <?php
                          $products->get_popular_product();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php require_once(ROOT.DS.'includes'.DS.'footer.php');?>