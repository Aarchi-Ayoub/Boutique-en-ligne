<?php
require_once('..'.DIRECTORY_SEPARATOR. '_config'.DIRECTORY_SEPARATOR.'config.php');
require_once(ROOT.DS.'admin'.DS.'_init'.DS.'admin_initialize.php');
require_once(ROOT.DS.'admin'.DS.'includes'.DS.'header.php');

?>
    <section class="content-header">
        <div class="content-header-left">
            <h1>Voir les couleurs</h1>
        </div>
        <div class="content-header-right">
            <a href="color-add.php" class="btn btn-primary btn-sm">Ajouter nouveau coleur</a>
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
                                <th>Nom de la couleur</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            echo  $color->getAllColor();
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>


    </section>
<?php require_once(ROOT.DS.'admin'.DS.'includes'.DS.'footer.php'); ?>