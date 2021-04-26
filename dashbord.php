<?php
require_once('_config/config.php');
require_once(ROOT.DS.'_init'.DS.'initialize.php');
require_once(ROOT.DS.'includes'.DS.'head.php');

?>

<?php
//check if customer loggin or no
if(!isset($_SESSION['customer'])){
    header('location: login.php');
    exit;
}else{
// If customer is logged in, but admin make him inactive, then force logout this user.
   echo  $dashbord->checkCustomerIfInactive();



}

?>
<body>

<div id="preloder">
    <div class="loader"></div>
</div>

<?php  require_once('includes/nav.php'); ?>
<!-- Header End -->
<div class="container-fluid p-4">

    <div class="row">
        <div class="col-3">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action " id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Profil</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Informations de facturation et d'expédition</a>
                <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Mot de passe</a>
                <a class="list-group-item list-group-item-action active" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Ordres</a>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade  " id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                    <div class="row">
                          <div class="col-md-4 " style="margin: auto; margin-bottom: 49px; margin-top: 10px">
                              <?php
                                    echo $dashbord->image_dashbord_site($_SESSION['customer']['cust_id']);
                              ?>


                          </div>


                        <div class="col-lg-12">
                            <div class="register-form">
                                <form action="#" method="post" class="form-inline" id="form_updateProfileCustomer">

                                    <div class="col-md-6">
                                        <div class="group-input fuls">
                                            <label for="username">Prénom *</label>
                                            <input type="text" id="username_custs" value="<?php echo $_SESSION['customer']['cust_name']; ?>" disabled = "disabled">
                                            <span class="user_feesbacks"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group-input comp">
                                            <label for="company">Nom (optionnel)</label>
                                            <input type="text" id="company_name_custs" value="<?php echo $_SESSION['customer']['cust_cname']; ?>">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="group-input em">
                                            <label for="company">Adresse électronique *</label>
                                            <input type="email" id="email_custs" value="<?php echo $_SESSION['customer']['cust_email']; ?>" disabled>
                                            <span class="email_feesback"></span>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="group-input phone" >
                                            <label for="company">Numéro de téléphone * </label>
                                            <input type="tel" id="tel_custs" pattern="[0-9]*" value="<?php echo $_SESSION['customer']['cust_phone']; ?>" inputmode="numeric" onkeypress="isInputNumber(event)">
                                            <span class="tel_feesbacks"></span>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="group-input ad ">
                                            <label for="company">Adresse * </label>
                                            <textarea name="cust_addresss" id="cust_addresss" cols="50" rows="50" ><?php echo $_SESSION['customer']['cust_address']; ?></textarea>
                                            <span class="address_feesbacks"></span>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="group-input im ">
                                            <label for="company">Image (optionnel) </label>
                                            <input type="file" id="user_photos">
                                            <span class="img_feesbacks"></span>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="group-input cou">
                                            <label for="country">Pays * </label>
                                            <input type="text" id="cust_countrys" value="<?php echo $_SESSION['customer']['cust_country']; ?>">
                                            <span class="country_feesbacks"></span>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="group-input ci">
                                            <label for="city">Ville * </label>
                                            <input type="text" id="cust_citys" value="<?php echo $_SESSION['customer']['cust_city']; ?>">
                                            <span class="city_feesbacks"></span>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="group-input st">
                                            <label for="state">Province * </label>
                                            <input type="text" id="cust_states" value="<?php echo $_SESSION['customer']['cust_state']; ?>">
                                            <span class="state_feesbacks"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="group-input zi">
                                            <label for="zip_code">Code postal * </label>
                                            <input type="text" id="cust_zip_codes" value="<?php echo $_SESSION['customer']['cust_zip']; ?>" pattern="[0-9]*" inputmode="numeric" onkeypress="isInputNumber(event)">
                                            <span class="zip_feesbacks"></span>
                                        </div>

                                    </div>

                                    <div class="col-md-12 btn_center">
                                        <div class="col-md-6 col-sm-offset-3">
                                            <button type="submit" class="site-btn update_profile-btn">METTRE À JOUR </button>

                                        </div>
                                    </div>


                                </form>

                            </div>
                        </div>
                    </div>





                </div>
                <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                    <form method="post" action="#" id="form_update_billing_shipping" class="checkout-form " style="margin-bottom: 49px; margin-top: 10px"">
                        <div class="row">
                            <div class="col-lg-6">

                                <h4>Détails de la facturation</h4>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="fir">Prénom<span>*</span></label>
                                        <input type="text" id="fir_bills"  value="<?php echo $_SESSION['customer']['cust_b_name']; ?>">
                                        <span class="msg_fir_bills"></span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="last">Nom<span>*</span></label>
                                        <input type="text" id="company_bils"  value="<?php echo $_SESSION['customer']['cust_b_cname']; ?>">
                                        <span class="msg_company_bills"></span>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="cun-name">Numéro de téléphone<span>*</span></label>
                                        <input type="text" id="phone_bils" value="<?php echo $_SESSION['customer']['cust_b_phone']; ?>">
                                        <span class="msg_phone_bills"></span>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="cun">Pays<span>*</span></label>
                                        <input type="text" id="coun_bills" value="<?php echo $_SESSION['customer']['cust_b_country']; ?>">
                                        <span class="msg_coun_bills"></span>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="street">Adresse<span>*</span></label>
                                        <input type="text" id="street_bills" class="street-first" value="<?php echo $_SESSION['customer']['cust_b_address']; ?>">
                                        <span class="msg_street_bills"></span>

                                    </div>

                                    <div class="col-lg-12">
                                        <label for="town">Ville<span>*</span></label>
                                        <input type="text" id="town_bills" value="<?php echo $_SESSION['customer']['cust_b_city']; ?>">
                                        <span class="msg_town_bills"></span>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="zip">Province<span>*</span></label>
                                        <input type="text" id="state_bills" value="<?php echo $_SESSION['customer']['cust_b_state']; ?>">
                                        <span class="msg_stat_bills"></span>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="zip">Code postal<span>*</span></label>
                                        <input type="text" id="zip_bills" value="<?php echo $_SESSION['customer']['cust_b_zip']; ?>">
                                        <span class="msg_zip_bills"></span>
                                    </div>



                                </div>
                            </div>
                            <div class="col-lg-6">

                                <h4>Les détails d'expédition</h4>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="fir">Prénom<span>*</span></label>
                                        <input type="text" id="fir_ships" value="<?php echo $_SESSION['customer']['cust_s_name']; ?>" >
                                        <span class="msg_fir_ships"></span>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="last">Nom<span>*</span></label>
                                        <input type="text" id="company_ships" value="<?php echo $_SESSION['customer']['cust_s_cname']; ?>">
                                        <span class="msg_company_ships"></span>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="cun-name">Numéro de téléphone<span>*</span></label>
                                        <input type="text" id="phone_ships" value="<?php echo $_SESSION['customer']['cust_s_phone']; ?>">
                                        <span class="msg_phone_ships"></span>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="cun">Pays<span>*</span></label>
                                        <input type="text" id="coun_ships" value="<?php echo $_SESSION['customer']['cust_s_country']; ?>">
                                        <span class="msg_coun_ships"></span>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="street">Adresse<span>*</span></label>
                                        <input type="text" id="street_ships" class="street-first" value="<?php echo $_SESSION['customer']['cust_s_address']; ?>">
                                        <span class="msg_street_ships"></span>

                                    </div>

                                    <div class="col-lg-12">
                                        <label for="town">Ville<span>*</span></label>
                                        <input type="text" id="town_ships" value="<?php echo $_SESSION['customer']['cust_s_city']; ?>">
                                        <span class="msg_town_ships"></span>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="zip">Province<span>*</span></label>
                                        <input type="text" id="state_ships" value="<?php echo $_SESSION['customer']['cust_s_state']; ?>">
                                        <span class="msg_stat_ships"></span>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="zip">Code postal<span>*</span></label>
                                        <input type="text" id="zip_ships" value="<?php echo $_SESSION['customer']['cust_s_zip']; ?>">
                                        <span class="msg_zip_ships"></span>
                                    </div>



                                </div>
                            </div>

                            <div class="col-md-2 " style="margin: auto">
                                <input type="submit" value="submit" style="    padding: 13px 40px 11px;
                                                                            background: #000000;
                                                                            border-color: #000000;
                                                                            color: white;
                                                                            font-weight: bold;
                                                                            letter-spacing: 1px;
                                                                            text-transform: uppercase;">
                            </div>

                        </div>
                    </form>


                </div>
                <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
                    <form method="post" action="#" id="form_update_password" class="checkout-form " style="margin-bottom: 49px; margin-top: 10px">
                    <div class="checkout-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="group-input pas">
                                    <label for="password">ancien mot de passe * </label>
                                    <input type="password" id="cust_passwords">
                                    <span class="password_feesbacks"></span>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="group-input re_pa">
                                    <label for="retype_password">nouveau mot de passe * </label>
                                    <input type="password" id="new_passwords">
                                    <span class="new_passwordfeesbacks"></span>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4 " style="margin: auto">
                            <input type="submit" value="Update Password" style="    padding: 13px 40px 11px;
                                                                            background: #000000;
                                                                            border-color: #000000;
                                                                            color: white;
                                                                            font-weight: bold;
                                                                            letter-spacing: 1px;
                                                                            text-transform: uppercase;">
                        </div>

                    </div>
                    </form>



                </div>
                <div class="tab-pane fade show active" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">

                        <?php
                         echo $dashbord->Orders_Dash($_SESSION['customer']['cust_email']);
                        ?>
                </div>
            </div>
        </div>
    </div>


</div>

<?php  require_once('includes/nav.php'); ?>

</body>
<?php require_once(ROOT.DS.'includes'.DS.'footer.php');?>
