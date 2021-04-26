<?php
require_once('_config/config.php');
require_once(ROOT.DS.'_init'.DS.'initialize.php');
require_once(ROOT.DS.'includes'.DS.'head.php');

if(!isset($_SESSION['cart_p_id'])){
    header('location: shopping-cart.php');
    exit;
}






?>
<body>

<div id="preloder">
    <div class="loader"></div>
</div>

<?php  require_once('includes/nav.php'); ?>

<div class="breacrumb-section">
    <div class="container">
        <input type="hidden" id="cust_id" value="<?php echo $_SESSION['customer']['cust_id'];?>">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="index.php"><i class="fa fa-home"></i> Accueil</a>
                    <a href="shop.php">Boutique</a>
                    <span>Check-out</span>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="checkout-section spad">
    <div class="container">
        <?php
          if(!isset($_SESSION['customer'])){
             ?>
              <div class="checkout-content">
                  <a href="login.php" class="content-btn">Cliquez ici pour vous identifier</a>
              </div>
          <?php }else{
              ?>
              <?php
              $checkout_access = 1;
              if(
                  ($_SESSION['customer']['cust_b_name']=='') ||
                  ($_SESSION['customer']['cust_b_cname']=='') ||
                  ($_SESSION['customer']['cust_b_phone']=='') ||
                  ($_SESSION['customer']['cust_b_country']=='') ||
                  ($_SESSION['customer']['cust_b_address']=='') ||
                  ($_SESSION['customer']['cust_b_city']=='') ||
                  ($_SESSION['customer']['cust_b_state']=='') ||
                  ($_SESSION['customer']['cust_b_zip']=='') ||
                  ($_SESSION['customer']['cust_s_name']=='') ||
                  ($_SESSION['customer']['cust_s_cname']=='') ||
                  ($_SESSION['customer']['cust_s_phone']=='') ||
                  ($_SESSION['customer']['cust_s_country']=='') ||
                  ($_SESSION['customer']['cust_s_address']=='') ||
                  ($_SESSION['customer']['cust_s_city']=='') ||
                  ($_SESSION['customer']['cust_s_state']=='') ||
                  ($_SESSION['customer']['cust_s_zip']=='')
              ) {
                  $checkout_access = 0;
              }

              if($checkout_access == 0){
                  ?>
                  <form method="post" action="#" id="form_add_billing_shipping" class="checkout-form">
                      <div class="row">
                          <div class="col-lg-6">

                              <h4>Détails de la facturation</h4>
                              <div class="row">
                                  <div class="col-lg-6">
                                      <label for="fir">Prénom<span>*</span></label>
                                      <input type="text" id="fir_bill">
                                      <span class="msg_fir_bill"></span>
                                  </div>
                                  <div class="col-lg-6">
                                      <label for="last">Nom<span>*</span></label>
                                      <input type="text" id="company_bil">
                                      <span class="msg_company_bill"></span>
                                  </div>
                                  <div class="col-lg-12">
                                      <label for="cun-name">Numéro de téléphone<span>*</span></label>
                                      <input type="text" id="phone_bil">
                                      <span class="msg_phone_bill"></span>
                                  </div>
                                  <div class="col-lg-12">
                                      <label for="cun">Pays<span>*</span></label>
                                      <input type="text" id="coun_bill">
                                      <span class="msg_coun_bill"></span>
                                  </div>
                                  <div class="col-lg-12">
                                      <label for="street">Adresse<span>*</span></label>
                                      <input type="text" id="street_bill" class="street-first">
                                      <span class="msg_street_bill"></span>

                                  </div>

                                  <div class="col-lg-12">
                                      <label for="town">Ville<span>*</span></label>
                                      <input type="text" id="town_bill">
                                      <span class="msg_town_bill"></span>
                                  </div>
                                  <div class="col-lg-12">
                                      <label for="zip">Province<span>*</span></label>
                                      <input type="text" id="state_bill">
                                      <span class="msg_stat_bill"></span>
                                  </div>
                                  <div class="col-lg-12">
                                      <label for="zip">code postal<span>*</span></label>
                                      <input type="text" id="zip_bill">
                                      <span class="msg_zip_bill"></span>
                                  </div>



                              </div>
                          </div>
                          <div class="col-lg-6">

                              <h4>Les détails d'expédition</h4>
                              <div class="row">
                                  <div class="col-lg-6">
                                      <label for="fir">Prénom<span>*</span></label>
                                      <input type="text" id="fir_ship">
                                      <span class="msg_fir_ship"></span>
                                  </div>
                                  <div class="col-lg-6">
                                      <label for="last">Nom<span>*</span></label>
                                      <input type="text" id="company_ship">
                                      <span class="msg_company_ship"></span>
                                  </div>
                                  <div class="col-lg-12">
                                      <label for="cun-name">Numéro de téléphone<span>*</span></label>
                                      <input type="text" id="phone_ship">
                                      <span class="msg_phone_ship"></span>
                                  </div>
                                  <div class="col-lg-12">
                                      <label for="cun">Pays<span>*</span></label>
                                      <input type="text" id="coun_ship">
                                      <span class="msg_coun_ship"></span>
                                  </div>
                                  <div class="col-lg-12">
                                      <label for="street">Adresse <span>*</span></label>
                                      <input type="text" id="street_ship" class="street-first">
                                      <span class="msg_street_ship"></span>

                                  </div>

                                  <div class="col-lg-12">
                                      <label for="town">Ville<span>*</span></label>
                                      <input type="text" id="town_ship">
                                      <span class="msg_town_ship"></span>
                                  </div>
                                  <div class="col-lg-12">
                                      <label for="zip">Province<span>*</span></label>
                                      <input type="text" id="state_ship">
                                      <span class="msg_stat_ship"></span>
                                  </div>
                                  <div class="col-lg-12">
                                      <label for="zip">code postal<span>*</span></label>
                                      <input type="text" id="zip_ship">
                                      <span class="msg_zip_ship"></span>
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

             <?php }else{
                  ?>
                  <form action="#" class="checkout-form">
                      <div class="row">
                          <div class="col-lg-12">
                              <div class="place-order">
                                  <h4>Votre commande</h4>
                                  <div class="order-total">
                                      <ul class="order-table">
                                          <li>Produit <span>Totale</span></li>
                                          <?php
                                            $total_price_order = 0;

                                            for($i = 1 ;$i<=count($_SESSION['cart_p_id']);$i++){
                                               ?>
                                                <li class="fw-normal"><?php echo $_SESSION['cart_p_name'][$i]?> x <?php echo $_SESSION['cart_p_qty'][$i] ?>
                                                    <?php
                                                    $row_total_price_order = $_SESSION['cart_p_current_price'][$i] * $_SESSION['cart_p_qty'][$i];
                                                    $total_price_order = $total_price_order + $row_total_price_order;
                                                    ?>

                                                    <span><?php echo number_format($row_total_price_order,2) ?> MAD</span></li>

                                           <?php }


                                          ?>
                                          <?php
                                            $final_price = 0;
                                          ?>

                                          <li class="fw-normal">les frais de livraison(20 MAD) <span>20 MAD</span></li>
                                          <?php
                                           $final_price = $total_price_order + 20;
                                          ?>
                                          <li class="fw-normal">Subtotale <span><?php echo number_format($final_price,2) ?> MAD</span></li>
                                          <li class="total-price">Totale <span><?php echo number_format($final_price,2) ?> MAD</span></li>

                                      </ul>
                                      <div class="col-md-4 form-group">
                                          <label for="">Sélectionnez le mode de paiement *</label>
                                          <select name="payment_method" class="form-control select2" id="advFieldsStatus">
                                              <option value="">Sélectionnez une méthode</option>
                                              <option value="PayPal">paypal</option>
                                          </select>
                                      </div>

                                  </div>
                              </div>
                          </div>
                      </div>


                  </form>

                  <form class="paypal" action="payment/paypal/payment_process.php" method="post" id="paypal_form" target="_blank">
                      <input type="hidden" name="cmd" value="_xclick" />
                      <input type="hidden" name="no_note" value="1" />
                      <input type="hidden" name="lc" value="UK" />
                      <input type="hidden" name="currency_code" value="USD" />
                      <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />

                      <input type="hidden" name="final_total" value="<?php echo $final_price/10; ?>">
                      <div class="order-btn">
                          <button type="submit" class="site-btn place-btn" name="form1">Passer la commande</button>
                      </div>
                  </form>

            <?php  }

              ?>


        <?php  }
        ?>



    </div>
</section>


<?php require_once(ROOT.DS.'includes'.DS.'footer.php');?>