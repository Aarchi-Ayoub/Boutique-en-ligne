<?php
require_once('..'.DIRECTORY_SEPARATOR. '_config'.DIRECTORY_SEPARATOR.'config.php');
require_once(ROOT.DS.'admin'.DS.'_init'.DS.'admin_initialize.php');
require_once(ROOT.DS.'admin'.DS.'includes'.DS.'header.php');
?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Voir les produits</h1>
		
	

	</div>
	<div class="content-header-right">
		<a href="product-add.php" class="btn btn-primary btn-sm">Ajouter un produit</a>
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
								<th>Photo</th>
								<th width="200">Nom du produit</th>
								<th width="60">Ancien prix</th>
								<th width="60">Prix ​actuel</th>
								<th >Quantité</th>
								<th>Produits populaires?</th>
								<th>C'est actif?</th>
								<th>Catégorie</th>
								<th width="80">Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$admin_product->all_products();
		                   ?>

										
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>





<?php require_once(ROOT.DS.'admin'.DS.'includes'.DS.'footer.php'); ?>