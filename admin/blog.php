
<?php
require_once('..'.DIRECTORY_SEPARATOR. '_config'.DIRECTORY_SEPARATOR.'config.php');
require_once(ROOT.DS.'admin'.DS.'_init'.DS.'admin_initialize.php');
require_once(ROOT.DS.'admin'.DS.'includes'.DS.'header.php');
?>
<section class="content-header">
    <div class="content-header-left">
        <h1>Voir les articles</h1>
    </div>
    <div class="content-header-right">
        <a href="blog-add.php" class="btn btn-primary btn-sm">Ajouter nouveau Article</a>
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
                            <th width="30">SL</th>
                            <th width="180">Photo</th>
                            <th width="180">Titre</th>
                            <th >Description</th>
                            <th width="100">Statut</th>
                            <th width="100">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        echo $Adminblog->AllBlog();
                        ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</section>

<?php require_once(ROOT.DS.'admin'.DS.'includes'.DS.'footer.php'); ?>