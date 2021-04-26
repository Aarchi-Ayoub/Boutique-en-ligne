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
                    <span>Article</span>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="blog-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1">
                <div class="blog-sidebar">
                    <div class="search-form">
                        <h4>Chercher</h4>
                        <form action="search_blog.php" method="get" role="search">
                            <input type="text" placeholder="Chercher . . .  " name="slug">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="blog-catagory">
                        <h4>Catégories</h4>
                        <ul>
                            <?php
                            echo $blog->get_Top_Category_inBlog();
                            ?>

                        </ul>
                    </div>
                    <div class="recent-post">
                        <h4>Article récent</h4>
                        <div class="recent-blog">
                            <?php
                             echo $blog->RecentBlog();
                            ?>

                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-9 order-1 order-lg-2">
                <div class="row">
                    <?php

                       if(isset($_REQUEST['id']) ){


                          echo Request::check_url_if_id_exist($_REQUEST['id'],'blog.php','blog','tcat_id');
                           //nb : check in the edit id url fe admin panel check all edit

                           // blog by cat
                           echo $blog->Blog_by_cat($_REQUEST['id']);
                           ?>
                       <?php }else{
                           //all blog
                           echo $blog->all_Blog();


                       }
                    ?>



                </div>
            </div>
        </div>
    </div>
</section>



<?php require_once(ROOT.DS.'includes'.DS.'footer.php');?>
