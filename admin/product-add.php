<?php
require_once('..'.DIRECTORY_SEPARATOR. '_config'.DIRECTORY_SEPARATOR.'config.php');
require_once(ROOT.DS.'admin'.DS.'_init'.DS.'admin_initialize.php');
require_once(ROOT.DS.'admin'.DS.'includes'.DS.'header.php');
?>





<section class="content-header">
	<div class="content-header-left">
		<h1>Ajouter un produit</h1>

	</div>
	<div class="content-header-right">
		<a href="product.php" class="btn btn-primary btn-sm">Voir tout</a>
	</div>
</section>


<section class="content">

	<div class="row">
		<div class="col-md-12">			


			<form class="form-horizontal" action="" id="form_add_product" method="post" enctype="multipart/form-data">

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group has-feedback" id="top_cat_name">
							<label for="" class="col-sm-3 control-label">Nom de catégorie<span>*</span></label>
							<div class="col-sm-4">
								<select name="tcat_id" class="form-control select2 top-cat" id="tcat_id" aria-describedby="inputSuccess1">
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
						<div class="form-group has-feedback" id="sous_cat_name">
							<label for="" class="col-sm-3 control-label" >Nom de la catégorie de sous <span>*</span></label>
							<div class="col-sm-4">
								<select name="scat_id" class="form-control select2 sous-cat" id="scat_id" aria-describedby="inputSuccess2">
									<option value="">Sélectionnez Sous Catégorie</option>

								</select>
                                <span class="glyphicon  form-control-feedback" aria-hidden="true" id="for_econ"></span>
                                <span id="inputSuccess2" class="sr-only">(success)</span>
                                <span class="msg">ne peux pas être vide</span>

							</div>
						</div>



                        <div class="form-group  has-feedback" id="product_name">
                            <label class="col-sm-3 control-label" for="p_name" >Nom du produit <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="p_name" aria-describedby="inputSuccess3">
                                <span class="glyphicon  form-control-feedback" aria-hidden="true" id="for_econ"></span>
                                <span id="inputSuccess3" class="sr-only">(success)</span>
                                <span class="msg">plus de 3 caractères</span>
                            </div>


                        </div>


						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Ancien prix <br><span style="font-size:10px;font-weight:normal;">(En MAD)</span></label>
							<div class="col-sm-4">
								<input type="text" name="p_old_price" class="form-control" id="p_old_price" pattern="[0-9]*" inputmode="numeric" onkeypress="isInputNumber(event)">
							</div>
						</div>
						<div class="form-group has-feedback" id="p_price">
							<label for="" class="col-sm-3 control-label" >Prix actuel <span>*</span><br><span style="font-size:10px;font-weight:normal;">(En MAD)</span></label>
							<div class="col-sm-4">
								<input type="text" name="p_current_price" class="form-control" id="p_current_price" aria-describedby="inputSuccess4" pattern="[0-9]*" inputmode="numeric" onkeypress="isInputNumber(event)">
                                <span class="glyphicon  form-control-feedback" aria-hidden="true" id="for_econ"></span>
                                <span id="inputSuccess4" class="sr-only">(success)</span>
                                <span class="msg">ne peux pas être vide</span>
							</div>
						</div>
						<div class="form-group has-feedback" id="quantity">
							<label for="" class="col-sm-3 control-label">Quantité <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" name="p_qty" class="form-control" id="qty" aria-describedby="inputSuccess5" pattern="[0-9]*" inputmode="numeric" onkeypress="isInputNumber(event)">
                                <span class="glyphicon  form-control-feedback" aria-hidden="true" id="for_econ"></span>
                                <span id="inputSuccess5" class="sr-only">(success)</span>
                                <span class="msg">ne peux pas être vide</span>
							</div>
						</div>
						<div class="form-group hidden_box has-feedback" id="size_top">
							<label for="" class="col-sm-3 control-label"> Taille <span>*</span></label>
							<div class="col-sm-4">
								<select name="size[]" class="form-control select2" multiple="multiple" id="size" aria-describedby="inputSuccess6">
                                    <?php
                                     $admin_product->get_all_size();
                                    ?>
								</select>
                                <span class="glyphicon  form-control-feedback" aria-hidden="true" id="for_econ"></span>
                                <span id="inputSuccess6" class="sr-only">(success)</span>
                                <span class="msg">La taille ne peut pas être vide</span>
							</div>
						</div>
						<div class="form-group hidden_box has-feedback" id="color_top">
							<label for="" class="col-sm-3 control-label"  > Coleur <span>*</span></label>
							<div class="col-sm-4">
								<select name="color[]" class="form-control select2" multiple="multiple" id="color" aria-describedby="inputSuccess7">
                                    <?php
                                    $admin_product->get_all_color();
                                    ?>

								</select>
                                <span class="glyphicon  form-control-feedback" aria-hidden="true" id="for_econ"></span>
                                <span id="inputSuccess7" class="sr-only">(success)</span>
                                <span class="msg">La coleur ne peut pas être vide</span>
							</div>
						</div>
						<div class="form-group has-feedback" id="image">
							<label for="" class="col-sm-3 control-label"> Photo <span>*</span></label>
							<div class="col-sm-4" style="padding-top:4px;">
								<input type="file" name="p_photo" id="p_photo" class="form-control" aria-describedby="inputSuccess8">
                                <span class="glyphicon  form-control-feedback" aria-hidden="true" id="for_econ"></span>
                                <span id="inputSuccess8" class="sr-only">(success)</span>
                                <span class="msg">La photo ne peut pas être vide</span>
							</div>
						</div>

						<div class="form-group has-feedback" id="desc_top">
							<label for="" class="col-sm-3 control-label">Description *<br>
                                <span style="font-size: 10px;line-height: 34px;"> (La description ne peut pas être inférieure à 20 caractères)</span></label>
							<div class="col-sm-8">
								<textarea name="p_description" class="form-control p_description" cols="30" rows="10" id=""  ></textarea>
                                <span class="msg_text" style="font-weight: bold;"></span>
                                <span class="glyphicon  form-control-feedback" aria-hidden="true" id="for_econ"></span>
                                <span id="inputSuccess9" class="sr-only">(success)</span>
							</div>


						</div>
						<div class="form-group has-feedback" id="desc_short_top">
							<label for="" class="col-sm-3 control-label">brève description *<br>
                                <span style="font-size: 10px;line-height: 20px;">(La description courte ne peut pas être inférieure à 10 caractères)</span></label>
							<div class="col-sm-8">
								<textarea name="p_short_description" class="form-control p_short_description" cols="30" rows="10" id="" aria-describedby="inputSuccess10"></textarea>
                                <span class="msg_text" style="font-weight: bold;"></span>
                                <span class="glyphicon  form-control-feedback" aria-hidden="true" id="for_econ"></span>
                                <span id="inputSuccess10" class="sr-only">(success)</span>
							</div>

						</div>

						<div class="form-group has-feedback" id="feature_top">
							<label for="" class="col-sm-3 control-label">Caractéristiques*<br>
                                <span style="font-size: 10px;line-height: 20px;"> (Caractéristiques  ne peut pas être inférieur à 10 caractères)</span></label></label>
							<div class="col-sm-8">
								<textarea name="p_feature" class="form-control p_feature" cols="30" rows="10" id="" aria-describedby="inputSuccess11"></textarea>
                                <span class="msg_text" style="font-weight: bold;"></span>
                                <span class="glyphicon  form-control-feedback" aria-hidden="true" id="for_econ"></span>
                                <span id="inputSuccess11" class="sr-only">(success)</span>
							</div>

						</div>


						<div class="form-group">
							<label for="" class="col-sm-3 control-label">C'est Populaire?</label>
							<div class="col-sm-8">
								<select name="p_is_featured " class="form-control" style="width:auto;" id="p_is_feature">
									<option value="1">Oui</option>
									<option value="0" selected>Non</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label">C'est Actif?</label>
							<div class="col-sm-8">
								<select name="p_is_active" class="form-control" style="width:auto;" id="p_is_active">
									<option value="1">Oui</option>
									<option value="0" selected>Non</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">ajouter</button>
							</div>
						</div>
					</div>
				</div>

			</form>


		</div>
	</div>

</section>

<?php require_once(ROOT.DS.'admin'.DS.'includes'.DS.'footer.php'); ?>