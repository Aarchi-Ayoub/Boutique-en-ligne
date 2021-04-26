<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?php
    echo Admin::check_session();
    ?>
    <?php
     $page_url = substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],'/') +1);
     ?>
     <?php
     if($page_url == 'index.php'):?>
        <title>Tableau de bord</title>
    <?php  endif;?>

    <?php
    if($page_url == 'product.php' || $page_url == 'product-add.php' || $page_url == 'product-edit.php'):?>
        <title>Produit</title>
    <?php  endif;?>
    <?php
    if($page_url == 'size.php' || $page_url == 'size-edit.php' || $page_url == 'size-add.php'):?>
    <title>Tailles</title>
    <?php  endif;?>
    <?php
    if($page_url == 'color.php' || $page_url == 'color-edit.php' || $page_url == 'color-add.php'):?>
        <title>Coleurs</title>
    <?php  endif;?>

    <?php
    if($page_url == 'top-category.php' || $page_url == 'top-category-edit.php' || $page_url == 'top-category-add.php'):?>
        <title>Catégories</title>
    <?php  endif;?>
    <?php
    if($page_url == 'sous-category.php' || $page_url == 'sous-category-edit.php' || $page_url == 'sous-category-add.php'):?>
        <title>Sous Catégorie</title>
    <?php  endif;?>
    <?php
    if($page_url == 'customer.php'):?>
        <title>Clients</title>
    <?php  endif;?>
    <?php
    if($page_url == 'rating.php'):?>
        <title>Evaluation</title>
    <?php  endif;?>
    <?php
    if($page_url == 'order.php'):?>
    <title>Ordres</title>
    <?php  endif;?>
    <?php
    if($page_url == 'blog.php' | $page_url == 'blog-edit.php'  || $page_url == 'blog-add.php'):?>
        <title>Articles</title>
    <?php  endif;?>
    <?php
    if($page_url == 'rating_blog.php'):?>
        <title>Evaluation des Articles</title>
    <?php  endif;?>
    <?php
    if($page_url == 'contact.php'):?>
        <title>Contacts</title>
    <?php  endif;?>

    <?php
    if($page_url == 'admin.php' || $page_url == 'admin-edit.php'  || $page_url == 'admin-add.php'):?>
        <title>Admins</title>
    <?php  endif;?>

    <?php
    if($page_url == 'profile_edit.php' || $page_url == 'profile_edit_pass.php'):?>
        <title>Profile</title>
    <?php  endif;?>



	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<link rel="stylesheet" href="_assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="_assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="_assets/css/ionicons.min.css">
	<link rel="stylesheet" href="_assets/css/all.css">
	<link rel="stylesheet" href="_assets/css/select2.min.css">
	<link rel="stylesheet" href="_assets/css/dataTables.bootstrap.css">
	<link rel="stylesheet" href="_assets/css/jquery.fancybox.css">
	<link rel="stylesheet" href="_assets/css/pan.min.css">
	<link rel="stylesheet" href="_assets/css/_all-skins.min.css">
	<link rel="stylesheet" href="_assets/css/summernote.css">
	<link rel="stylesheet" href="_assets/css/sweetalert2.min.css">
	<link rel="stylesheet" href="_assets/css/style.css">

</head>

<body class="hold-transition fixed skin-blue sidebar-mini">

	<div class="wrapper">

		<header class="main-header">

			<a href="index.php" class="logo">
				<span class="logo-lg">Fitness land</span>
			</a>

			<nav class="navbar navbar-static-top">
				
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>


				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="../assets/img/img_user/<?php echo $_SESSION['user']['cust_photo'];?>" class="user-image" alt="User Image">
								<span class="hidden-xs"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-footer">
									<div>
                                        <a href="profile_edit.php?email=<?php echo $_SESSION['user']['cust_email']?>" class="btn btn-default btn-flat">Editer le profil</a>
                                    </div>
                                    <div>
                                        <a href="profile_edit_pass.php?email=<?php echo $_SESSION['user']['cust_email']?>" class="btn btn-default btn-flat">Edite le  clé</a>
                                    </div><br>
									<div>
										<a href="logout.php" class="btn btn-default btn-flat">Se déconnecter</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>

			</nav>
		</header>



        <?php
           require_once('includes'.DIRECTORY_SEPARATOR.'sidebar.php');
        ?>

  		<div class="content-wrapper">
<!---========================================================================================-->      
