<?php
require_once('..'.DIRECTORY_SEPARATOR. '_config'.DIRECTORY_SEPARATOR.'config.php');
require_once(ROOT.DS.'admin'.DS.'_init'.DS.'admin_initialize.php');
require_once(ROOT.DS.'admin'.DS.'includes'.DS.'header.php');

?>

<section class="content-header">
     <div class="content-header-left">
        <h1>Ajouter une  sous catégorie</h1>
    </div>
    <div class="content-header-right">
        <a href="sous-category.php" class="btn btn-primary btn-sm">Voir tout</a>
    </div>
</section>
<section class="content">

    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" action="" method="post" id="form_sous_cat_add">

                <div class="box box-info">

                    <div class="box-body">
                        <div class="form-group has-feedback" id="top_cat_name_sous_cat_add">
                            <label for="" class="col-sm-3 control-label">Nom de catégorie <span>*</span></label>
                            <div class="col-sm-4">
                                <select name="tcat_id" class="form-control select2" id="tcat_in_souscat_add">
                                    <option value="">Select catégorie</option>
                                    <?php
                                    $stat = "SELECT * FROM `tbl_category` ORDER BY tcat_name";
                                    $result = $db->exec_query($stat);
                                    while ($row = mysqli_fetch_assoc($result)){
                                        ?>
                                        <option value="<?php echo $row['tcat_id']; ?>"><?php echo $row['tcat_name']; ?></option>

                                    <?php }
                                    ?>
                                </select>
                                <span class="glyphicon  form-control-feedback" aria-hidden="true" id="for_econ"></span>
                                <span id="inputSuccess1" class="sr-only">(success)</span>
                                <span class="msg_add text-danger">Vous devez avoir à sélectionner une catégorie</span>
                            </div>
                        </div>
                        <div class="form-group" id="sous_cats_add">
                            <label for="" class="col-sm-3 control-label">Nom de la sous-catégorie <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="scat_name_inSouscat_add">
                                <span class="msg_sous_add text-danger">Le nom de la sous  catégorie   ne peut pas être vide</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success pull-left" name="form2">Ajouter</button>
                            </div>
                        </div>

                    </div>

                </div>

            </form>



        </div>
    </div>

</section>
<?php require_once(ROOT.DS.'admin'.DS.'includes'.DS.'footer.php'); ?>
