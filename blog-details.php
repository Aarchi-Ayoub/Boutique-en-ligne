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

    <section class="blog-details spad">
        <input type="hidden" id="id_blog" value="<?php echo $_REQUEST['id'] ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-inner">
                        <?php
                         if (!isset($_REQUEST['id']) || $_REQUEST['id'] == '' ){
                             header('location: blog.php');
                             exit;
                         }else{
                             echo $blog->blog_Details($_REQUEST['id']);
                         }
                        ?>

                        <?php
                          echo $blog->fetch_comments_blog($_REQUEST['id']);
                        ?>
                        <?php
                        if(isset($_SESSION['customer'])){
                            echo  $blog->CheckcommentaireIfExistBlog($_REQUEST['id'],$_SESSION['customer']['cust_id']);
                            ?>
                            <input type="hidden" id="cust_id" value="<?php echo $_SESSION['customer']['cust_id'] ?>">
                        <?php }else{
                            ?>
                            <p class="text-danger">Vous devez être connecté pour donner un avis </p>
                            <a class="text-danger" href="login.php" style="text-decoration: underline">s'identifier</a>
                        <?php }

                        ?>

                    </div>
                    <input type="hidden" id="rating-value_blog">
                </div>
            </div>
        </div>
    </section>

<?php require_once(ROOT.DS.'includes'.DS.'footer.php');?>
