<?php
require_once('..'.DIRECTORY_SEPARATOR. '_config'.DIRECTORY_SEPARATOR.'config.php');
require_once(ROOT.DS.'admin'.DS.'_init'.DS.'admin_initialize.php');
require_once(ROOT.DS.'admin'.DS.'includes'.DS.'header.php');

echo $Adminblog->check_url_data_and_id_for_blog($_REQUEST['id']);
?>





<section class="content-header">
    <div class="content-header-left">
        <h1>Editer Article</h1>

    </div>
    <div class="content-header-right">
        <a href="blog.php" class="btn btn-primary btn-sm">Voir tout</a>
    </div>
</section>


<section class="content">

    <div class="row">
        <div class="col-md-12">




            <form class="form-horizontal" action="" id="form_edit_blog" method="post" enctype="multipart/form-data">
                <input type='hidden' id='id_edit_blog' value="<?php echo  $_REQUEST['id'] ?>">
                <?php
                echo $Adminblog->Blog_by_id($_REQUEST['id']);
                ?>

            </form>


        </div>
    </div>

</section>

<?php require_once(ROOT.DS.'admin'.DS.'includes'.DS.'footer.php'); ?>

