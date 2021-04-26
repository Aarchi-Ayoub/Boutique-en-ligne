<?php
require_once('..'.DIRECTORY_SEPARATOR. '_config'.DIRECTORY_SEPARATOR.'config.php');
require_once(ROOT.DS.'admin'.DS.'_init'.DS.'admin_initialize.php');
require_once(ROOT.DS.'admin'.DS.'includes'.DS.'header.php');
?>

<section class="content-header">
    <div class="content-header-left">
        <h1>ajouter une catégorie</h1>
    </div>
    <div class="content-header-right">
        <a href="top-category.php" class="btn btn-primary btn-sm">Voir tout</a>
    </div>
</section>
<section class="content">

    <div class="row">
        <div class="col-md-12">


            <form class="form-horizontal" action="" method="post" id="form_add_top_cat">

                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Nom de catégorie <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="tcat_name">
                                <span class="top_catEmpty"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Afficher sur le menu? <span>*</span></label>
                            <div class="col-sm-4">
                                <select name="show_on_menu" class="form-control" style="width:auto;" id="show_menu">
                                    <option value="0">Non</option>
                                    <option value="1">Oui</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success pull-left" name="form1">Ajouter</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>


        </div>
    </div>

</section>
<?php require_once(ROOT.DS.'admin'.DS.'includes'.DS.'footer.php'); ?>