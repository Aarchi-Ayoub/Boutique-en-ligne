<?php
require_once('..'.DIRECTORY_SEPARATOR. '_config'.DIRECTORY_SEPARATOR.'config.php');
require_once(ROOT.DS.'admin'.DS.'_init'.DS.'admin_initialize.php');
require_once(ROOT.DS.'admin'.DS.'includes'.DS.'header.php');
?>

<section class="content-header">
    <div class="content-header-left">
        <h1>Voir les notes</h1>
    </div>
</section>
<section class="content">

    <div class="row">
        <div class="col-md-12">


            <div class="box box-info">

                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Nom de l'article</th>
                            <th>Client</th>
                            <th>Evaluation</th>
                            <th>Commentaire</th>
                            <th>Statut</th>
                            <th>Changer Statut</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        echo  $Admin_RatingBlog->all_Rating_blog();
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>


</section>
<?php require_once(ROOT.DS.'admin'.DS.'includes'.DS.'footer.php'); ?>
