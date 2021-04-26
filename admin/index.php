<?php
require_once('..'.DIRECTORY_SEPARATOR. '_config'.DIRECTORY_SEPARATOR.'config.php');
require_once(ROOT.DS.'admin'.DS.'_init'.DS.'admin_initialize.php');
require_once(ROOT.DS.'admin'.DS.'includes'.DS.'header.php');

?>

<section class="content-header">
	<h1>Tableau de bord</h1>

</section>


<section class="content text-center" >
	<div class="row">

		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-aqua"><i class="fa fa-hand-o-right"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">CATÉGORIES</span>
					<span class="info-box-number"><?php echo $Admindashbord->counting("SELECT * FROM tbl_category");  ?></span>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-aqua"><i class="fa fa-hand-o-right"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Sous-catégories</span>
					<span class="info-box-number"><?php echo $Admindashbord->counting("SELECT * FROM tbl_sous_category");  ?></span>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-aqua"><i class="fa fa-hand-o-right"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">produits</span>
					<span class="info-box-number"><?php echo $Admindashbord->counting("SELECT * FROM tbl_product");  ?></span>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-green"><i class="fa fa-hand-o-right"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Commandes terminées</span>
					<span class="info-box-number"><?php echo $Admindashbord->counting("SELECT * FROM tbl_payment WHERE payment_status='Completed'");  ?></span>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-green"><i class="fa fa-hand-o-right"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Livraison terminée</span>
					<span class="info-box-number"><?php echo $Admindashbord->counting("SELECT * FROM tbl_payment WHERE shipping_status='Completed'");  ?></span>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-red"><i class="fa fa-hand-o-right"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Les ordres en attente</span>
					<span class="info-box-number"><?php echo $Admindashbord->counting("SELECT * FROM tbl_payment WHERE payment_status='Pending'");  ?></span>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-red"><i class="fa fa-hand-o-right"></i></span>
				<div class="info-box-content">
                    <span class="info-box-text">Livraison en attente <span style="font-size: 10px">(Commande terminée)</span></span>
					<span class="info-box-number"><?php echo $Admindashbord->counting("SELECT * FROM tbl_payment WHERE payment_status='Completed' AND shipping_status = 'Pending' ");  ?></span>
				</div>
			</div>
		</div>
		
	</div>
</section>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Tasks'],
                ['clients',     <?php echo $Admindashbord->counting("SELECT * FROM tbl_customer");  ?>],
                ['clients (Bloqué)',      <?php echo $Admindashbord->counting("SELECT * FROM tbl_customer WHERE cust_status=0");  ?>],
                ['clients (Actif) ',  <?php echo $Admindashbord->counting("SELECT * FROM tbl_customer WHERE cust_status=1");  ?>],
                ['Contact ', <?php echo $Admindashbord->counting("SELECT * FROM tbl_contact");  ?>],
                ['Admin',     <?php echo $Admindashbord->counting("SELECT * FROM  tbl_user WHERE role = 'admin'");  ?>],
                ['Article',     <?php echo $Admindashbord->counting("SELECT * FROM  blog");  ?>],
                ['Article(Actif)',     <?php echo $Admindashbord->counting("SELECT * FROM  blog WHERE blog_active = 1");  ?>],
                ['Article(Bloqué)',     <?php echo $Admindashbord->counting("SELECT * FROM  blog WHERE blog_active = 0");  ?>]
            ]);

            var options = {
                title: 'Mes activités journalières'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
    <div id="piechart" style="width: auto; height: 500px;"></div>

<?php require_once(ROOT.DS.'admin'.DS.'includes'.DS.'footer.php'); ?>