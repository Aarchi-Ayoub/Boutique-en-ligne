<!---=======================================================================================================-->
  		<aside class="main-sidebar">
    		<section class="sidebar">

      			<ul class="sidebar-menu">

			        <li class="treeview">
			          <a href="index.php">
			            <i class="fa fa-hand-o-right"></i> <span>Tableau de bord</span>
			          </a>
			        </li>
<!---======================================================================================================-->
					<li class="treeview ">
			          <a href="product.php">
			            <i class="fa fa-hand-o-right"></i> <span>Produit</span>
			          </a>
			        </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-hand-o-right"></i>
                            <span>Section boutique</span>
                            <span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="size.php"><i class="fa fa-circle-o"></i> Tailles</a></li>
                            <li><a href="color.php"><i class="fa fa-circle-o"></i> Coleurs</a></li>
                            <li><a href="top-category.php"><i class="fa fa-circle-o"></i> Catégories</a></li>
                            <li><a href="sous-category.php"><i class="fa fa-circle-o"></i> Sous Catégorie</a></li>
                        </ul>
                    </li>
                    <li class="treeview ">
                        <a href="customer.php">
                            <i class="fa fa-hand-o-right"></i> <span>Clients</span>
                        </a>
                    </li>
                    <li class="treeview ">
                        <a href="rating.php">
                            <i class="fa fa-hand-o-right"></i> <span>Évaluation des produits</span>
                        </a>
                    </li>
                    <li class="treeview ">
                        <a href="order.php">
                            <i class="fa fa-hand-o-right"></i> <span>Ordres</span>
                        </a>
                    </li>
                    <li class="treeview ">
                        <a href="blog.php">
                            <i class="fa fa-hand-o-right"></i> <span>Articles</span>
                        </a>
                    </li>
                    <li class="treeview ">
                        <a href="rating_blog.php">
                            <i class="fa fa-hand-o-right"></i> <span>Évaluation des Articles</span>
                        </a>
                    </li>

                    <li class="treeview ">
                        <a href="contact.php">
                            <i class="fa fa-hand-o-right"></i> <span>Contacts</span>
                        </a>
                    </li>

                    <?php
                       if($_SESSION['user']['role'] == 'super_admin'){
                           ?>
                           <li class="treeview ">
                               <a href="admin.php">
                                   <i class="fa fa-hand-o-right"></i> <span>Admin</span>
                               </a>
                           </li>

                     <?php  }

                    ?>


      			</ul>






    		</section>
  		</aside>