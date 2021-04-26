<?php
require_once('..' . DIRECTORY_SEPARATOR . '_config' . DIRECTORY_SEPARATOR . 'config.php');
require_once(ROOT . DS . 'admin' . DS . '_init' . DS . 'admin_initialize.php');
require_once(ROOT . DS . 'admin' . DS . 'includes' . DS . 'header.php');

if(!isset($_REQUEST['id'])){
    header('location: size.php');
}else{

  echo $size->CheckIfIdExist($_REQUEST['id']);


}


$size_name =   $size->getSizeBy_Id($_REQUEST['id']);
?>
    <section class="content-header">
        <input type="hidden"  id="id_edit" value="<?php echo $_REQUEST['id'] ?>">
        <div class="content-header-left">
            <h1>Modifier la taille</h1>
        </div>
        <div class="content-header-right">
            <a href="size.php" class="btn btn-primary btn-sm">Voir tout</a>
        </div>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-md-12">



                <form class="form-horizontal" action="" method="post" id="form_size_edit">

                    <div class="box box-info">

                        <div class="box-body">
                            <div class="form-group">

                                <label for="" class="col-sm-2 control-label">Nom de la taille <span>*</span></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="size_name_edit" value="<?php echo $size_name ?>">
                                    <span class="sizeEmptyEdit"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label"></label>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-success pull-left" name="form1">Modifier</button>
                                </div>
                            </div>

                        </div>

                    </div>

                </form>



            </div>
        </div>

    </section>


<?php
require_once(ROOT . DS . 'admin' . DS . 'includes' . DS . 'footer.php');
?>