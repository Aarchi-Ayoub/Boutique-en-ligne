<?php
require_once('..'.DIRECTORY_SEPARATOR. '_config'.DIRECTORY_SEPARATOR.'config.php');
require_once(ROOT.DS.'admin'.DS.'_init'.DS.'admin_initialize.php');
require_once(ROOT.DS.'admin'.DS.'includes'.DS.'header.php');
?>

    <section class="content-header">
        <div class="content-header-left">
            <h1>Ajouter un administrateur</h1>
        </div>
        <div class="content-header-right">
            <a href="admin.php" class="btn btn-primary btn-sm">Voir tout</a>
        </div>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <form class="form-horizontal" action="" method="post" id="form_add_admin">

                        <div class="box box-info">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Prénom <span>*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="name_admin">
                                        <span class="nameEmpty"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Nom (optionale)</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="cname_admin">
                                        <span class="cnameEmpty"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Email <span>*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="email_admin">
                                        <span class="emailEmpty"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Téléphone <span>*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="phone_admin">
                                        <span class="phoneEmpty"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Pays <span>*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="country_admin">
                                        <span class="countryEmpty"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Adresse <span>*</span></label>
                                    <div class="col-sm-4">
                                        <textarea type="text" class="form-control" id="adress_admin" cols="6" rows="6"></textarea>
                                        <span class="adressEmpty"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Ville <span>*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="city_admin">
                                        <span class="cityEmpty"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Province <span>*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="state_admin">
                                        <span class="stateEmpty"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Code postal <span>*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="zip_admin">
                                        <span class="zipEmpty"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Mot de passe <span>*</span></label>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control" id="pass_admin">
                                        <span class="passEmpty"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Retaper le mot de passe <span>*</span></label>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control" id="repass_admin">
                                        <span class="repassEmpty"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Photo <span>*</span></label>
                                    <div class="col-sm-4">
                                        <input type="file" class="form-control" id="photo_admin">
                                        <span id="photoEmpty"></span>
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
        </div>

    </section>
<?php require_once(ROOT.DS.'admin'.DS.'includes'.DS.'footer.php'); ?>