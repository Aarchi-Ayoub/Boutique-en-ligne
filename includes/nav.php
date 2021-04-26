<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class=" fa fa-envelope"></i>
                    FitnessLand@gmail.com
                </div>
                <div class="phone-service">
                    <i class=" fa fa-phone"></i>
                    +30.25.13.14
                </div>
            </div>
            <div class="ht-right">
                <?php
                  if(isset($_SESSION['customer']['cust_email'])){
                      ?>
                      <a style="padding: 10px;
    background: linear-gradient(to bottom,#2d2d2d,#51473b);
    color: white;
    box-shadow: 2px 3px 8px 0px #2d2d2d;
    transition: all 0.5s ease-in;
    margin: 10px;
    outline: 0;
      border-bottom-left-radius: 10px;
    border-top-right-radius: 2px;
    margin-left: 29px;" href="logout.php" class="login-panel">Se déconnecter</a>
                      <a  href="dashbord.php" class="login-panel" ><img  class="img-fluid"  src="assets/img/img_customer/<?php echo $_SESSION['customer']['cust_photo'] ?>" style="border-radius: 50%;background-size: 32px 32px;width: 32px !important;height: 32px !important;box-shadow: 1px 1px 4px 0px #2d2d2d;"> </a>
                  <?php }else{
                      ?>
                      <a href="#" class="login-panel"  data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-user"></i>s'identifier/S'inscrire</a>
                  <?php }
                ?>
                <div class="top-social">
                    <a href="#"><i class="ti-facebook"></i></a>
                    <a href="#"><i class="ti-twitter-alt"></i></a>
                    <a href="#"><i class="ti-linkedin"></i></a>
                    <a href="#"><i class="ti-pinterest"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="index.php">
                            <img src="assets/img/img_static_index/logo-black.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">

                            <div class="advanced-search">
                                <button type="button" class="category-btn">toutes catégories</button>
                                <div class="input-group">
                                    <form method="get" action="search.php" role="search" >
                                    <input type="text" placeholder="rechercher un produit" name="search">
                                    <button type="submit"><i class="ti-search"></i></button>
                                    </form>
                                </div>
                            </div>

                 </div>
                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">

                        <li class="cart-icon">
                            <a href="shopping-cart.php">
                                <i class="icon_bag_alt"></i>
                                <span><?php
                                    if(isset($_SESSION['cart_p_id'])){
                                        echo count($_SESSION['cart_p_id']);
                                    }else{
                                        echo  '0';
                                    }
                                    ?></span>
                            </a>

                        </li>
                        <li class="cart-price"><?php
                            if(isset($_SESSION['cart_p_id'])) {
                                $table_total_price = 0;
                                $i=0;
                                foreach($_SESSION['cart_p_qty'] as $key => $value)
                                {
                                    $i++;
                                    $arr_cart_p_qty[$i] = $value;
                                }
                                $i=0;
                                foreach($_SESSION['cart_p_current_price'] as $key => $value)
                                {
                                    $i++;
                                    $arr_cart_p_current_price[$i] = $value;
                                }
                                for($i=1;$i<=count($arr_cart_p_qty);$i++) {
                                    $row_total_price = $arr_cart_p_current_price[$i]*$arr_cart_p_qty[$i];
                                    $table_total_price = $table_total_price + $row_total_price;
                                }
                                echo $table_total_price;
                            } else {
                                echo '0.00';
                            }
                            ?> MAD


                        </li>
                    </ul>
                </div>
                </div>

            </div>
        </div>
    </div>
    <div class="nav-item">
        <div class="container">
            <div class="nav-depart">
                <div class="depart-btn">
                    <i class="ti-menu"></i>
                    <span>TOUS LES DÉPARTEMENTS</span>

                </div>
            </div>
            <?php
            $page_url = 'index.php';
            $page_url = substr($_SERVER['SCRIPT_NAME'],strrpos($_SERVER['SCRIPT_NAME'],'/') +1);

            ?>
            <nav class="nav-menu mobile-menu">
                <ul>
                    <?php

                    ?>

                    <li class="<?php if($page_url == 'index.php' || $page_url=='search.php'|| $page_url=='dashbord.php' || $page_url == 'login.php') echo 'active'; ?> "><a href="index.php">Accueil</a></li>
                    <li class="<?php if($page_url == 'shop.php' || $page_url== 'product_details.php' || $page_url=='shopping-cart.php') echo 'active'; ?> "><a href="./shop.php">Boutique</a></li>
                    <li class="<?php if($page_url == 'blog.php' || $page_url== 'blog-details.php' || $page_url== 'search_blog.php') echo 'active'; ?> "><a href="./blog.php">articles</a></li>
                    <li class="<?php if($page_url == 'contact.php') echo 'active'; ?> "><a href="./contact.php">Contact</a></li>

                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </div>
</header>

<!---------------------------------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------->
<!-------------------------------------------Modal Register-------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------------------------------->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel" style="color: #252525;font-weight: 700;text-align: center;margin-bottom: 15px;">S'inscrire</h4>
                <div class="switch-login">
                    <a href="login.php" class="or-login">Ou  s'identifier</a>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="register-form">
                            <form action="#" method="post" class="form-inline" id="form_register">

                                <div class="col-md-6">
                                    <div class="group-input ful">
                                        <label for="username">Prénom *</label>
                                        <input type="text" id="username_cust">
                                        <span class="user_feesback"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="group-input comp">
                                        <label for="company">Nom (optional)</label>
                                        <input type="text" id="company_name_cust">
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="group-input em">
                                        <label for="company">Adresse électronique *</label>
                                        <input type="email" id="email_cust">
                                        <span class="email_feesback"></span>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="group-input phone" >
                                        <label for="company">Numéro de téléphone  * </label>
                                        <input type="tel" id="tel_cust" pattern="[0-9]*" inputmode="numeric" onkeypress="isInputNumber(event)">
                                        <span class="tel_feesback"></span>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="group-input ad ">
                                        <label for="company">Addresse * </label>
                                        <textarea name="cust_address" id="cust_address" cols="50" rows="50"></textarea>
                                        <span class="address_feesback"></span>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="group-input im ">
                                        <label for="company">Photo * </label>
                                      <input type="file" id="user_photo">
                                        <span class="img_feesback"></span>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="group-input cou">
                                        <label for="country">Pays * </label>
                                        <input type="text" id="cust_country">
                                        <span class="country_feesback"></span>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="group-input ci">
                                        <label for="city">Ville * </label>
                                        <input type="text" id="cust_city">
                                        <span class="city_feesback"></span>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="group-input st">
                                        <label for="state">Province * </label>
                                        <input type="text" id="cust_state">
                                        <span class="state_feesback"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="group-input zi">
                                        <label for="zip_code">Code postal * </label>
                                        <input type="text" id="cust_zip_code" pattern="[0-9]*" inputmode="numeric" onkeypress="isInputNumber(event)">
                                        <span class="zip_feesback"></span>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="group-input pas">
                                        <label for="password">Mot de passe  * </label>
                                        <input type="password" id="cust_password">
                                        <span class="password_feesback"></span>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="group-input re_pa">
                                        <label for="retype_password">Retaper le mot de passe *</label>
                                        <input type="password" id="cust_retype_password">
                                        <span class="ret_passwordfeesback"></span>
                                    </div>
                                </div>
                                <div class="col-md-12 btn_center">
                                    <div class="col-md-6 col-sm-offset-3">
                                        <button type="submit" class="site-btn register-btn">REGISTER</button>

                                    </div>
                                </div>


                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
