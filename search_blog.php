<?php
require_once('_config/config.php');
require_once(ROOT.DS.'_init'.DS.'initialize.php');
require_once(ROOT.DS.'includes'.DS.'head.php');


if(!isset($_REQUEST['slug'])) {
    header('location: blog.php');
    exit;
} else {
    if($_REQUEST['slug']=='') {
        header('location: blog.php');
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
                    <span>Article</span>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="blog-section spad">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 order-1 order-lg-2">
                <div class="row">
                    <?php

                   echo $search->all_blog_by_cust_search($_REQUEST['slug']);

                   ?>



                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once(ROOT.DS.'includes'.DS.'footer.php');?>


