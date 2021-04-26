<?php
require_once('..'.DIRECTORY_SEPARATOR. '_config'.DIRECTORY_SEPARATOR.'config.php');
require_once(ROOT.DS.'admin'.DS.'_init'.DS.'admin_initialize.php');
require_once(ROOT.DS.'admin'.DS.'includes'.DS.'header.php');
?>





<section class="content-header">
    <div class="content-header-left">
        <h1>Ajouter un Article</h1>

    </div>
    <div class="content-header-right">
        <a href="blog.php" class="btn btn-primary btn-sm">Voir tout</a>
    </div>
</section>


<section class="content">

    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal" action="" id="form_add_blog" method="post" enctype="multipart/form-data">

                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group has-feedback" id="top_cat_name_blog">
                            <label for="" class="col-sm-3 control-label">Nom de catégorie <span>*</span></label>
                            <div class="col-sm-4">
                                <select name="tcat_id" class="form-control select2 top-cat" id="tcat_id_blog" aria-describedby="inputSuccess1">
                                    <option value="">Choisir une catégorie</option>
                                    <?php
                                    $admin_product->get_Top_Category();
                                    ?>
                                </select>
                                <span class="glyphicon  form-control-feedback" aria-hidden="true" id="for_econ"></span>
                                <span id="inputSuccess1" class="sr-only">(success)</span>
                                <span class="msg">ne peux pas être vide</span>
                            </div>
                        </div>
                       <div class="form-group  has-feedback" id="title_blog">
                            <label class="col-sm-3 control-label" for="tit_blog" >Titre <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="tit_blog" aria-describedby="inputSuccess3">
                                <span class="glyphicon  form-control-feedback" aria-hidden="true" id="for_econ"></span>
                                <span id="inputSuccess3" class="sr-only">(success)</span>
                                <span class="msg">plus de 7 caractères</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback" id="image_blog">
                            <label for="" class="col-sm-3 control-label"> Photo <span>*</span></label>
                            <div class="col-sm-4" style="padding-top:4px;">
                                <input type="file" name="p_photo" id="blog_photo" class="form-control" aria-describedby="inputSuccess8">
                                <span class="glyphicon  form-control-feedback" aria-hidden="true" id="for_econ"></span>
                                <span id="inputSuccess8" class="sr-only">(success)</span>
                                <span class="msg">La photo ne peut pas être vide</span>
                            </div>
                        </div>

                        <div class="form-group has-feedback " id="desc_blog">
                            <label for="" class="col-sm-3 control-label">Description *<br>
                                <span style="font-size: 10px;line-height: 34px;"> (La description ne peut pas être inférieure à 20 caractères)</span></label>
                            <div class="col-sm-8">
                                <textarea name="p_description" class="form-control blog_description" cols="30" rows="10" id=""  ></textarea>
                                <span class="msg_text" style="font-weight: bold;"></span>
                                <span class="glyphicon  form-control-feedback" aria-hidden="true" id="for_econ"></span>
                                <span id="inputSuccess9" class="sr-only">(success)</span>
                            </div>


                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">C'est Actif?</label>
                            <div class="col-sm-8">
                                <select name="p_is_active" class="form-control" style="width:auto;" id="p_is_active_blog">
                                    <option value="1">Oui</option>
                                    <option value="0" selected>Non</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label"></label>
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
