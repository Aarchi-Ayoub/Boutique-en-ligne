<?php
require_once('_config/config.php');
require_once(ROOT.DS.'_init'.DS.'initialize.php');
require_once(ROOT.DS.'includes'.DS.'head.php');

?>

<body>

    <div id="preloder">
        <div class="loader"></div>
    </div>

    <?php  require_once('includes/nav.php'); ?>

    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="index.php"><i class="fa fa-home"></i> Accueil</a>
                        <a href="shop.php">Boutique</a>
                        <span>Panier</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <?php
                  if(!isset($_SESSION['cart_p_id'])){
                      echo "<h2 class='text-center' style='margin: auto;'>Le panier est vide</h2>";
                  }else{
                      ?>
                    <form action="" method="post">
                      <div class="col-lg-12">
                          <div class="cart-table" >
                              <?php
                              echo $cart->update_cart();
                      if(isset($_REQUEST['id']) && isset($_REQUEST['size']) && isset($_REQUEST['color'])  ) {
                          echo  $cart->delete_item_cart();
                          header('location: shopping-cart.php');
                      }




                              ?>
                              <table>
                                  <thead>
                                  <tr>
                                      <th>Image</th>
                                      <th class="p-name">Nom du Produit</th>
                                      <th>Prix</th>
                                      <th>Quantité</th>
                                      <th>Totale</th>
                                      <th>Action</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                   <?php
                                   $total_price = 0;
                                    for($i=1;$i<=count($_SESSION['cart_p_id']);$i++){
                                    ?>
                                        <tr>
                                            <td class="cart-pic first-row"><img src="assets/img/img_product/<?php echo $_SESSION['cart_p_photo'][$i] ?>" alt=""></td>
                                            <td class="cart-title first-row">
                                                <h5><?php echo $_SESSION['cart_p_name'][$i]?></h5>
                                            </td>
                                            <td class="p-price first-row"><?php echo $_SESSION['cart_p_current_price'][$i] ?> MAD</td>
                                            <td class="qua-col first-row">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="hidden" name="product_id[]" value="<?= $_SESSION['cart_p_id'][$i]?>">
                                                        <input type="hidden" name="product_name[]" value="<?= $_SESSION['cart_p_name'][$i]?>">
                                                        <input type="text" step="1" min="1" max=""  name="quantity[]" value="<?php echo $_SESSION['cart_p_qty'][$i] ?>" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric"  onkeypress='isInputNumber(event)'>
                                                    </div>
                                                </div>
                                            </td>
                                            <?php
                                              $row_total_price = $_SESSION['cart_p_current_price'][$i] * $_SESSION['cart_p_qty'][$i];
                                              $total_price = $total_price + $row_total_price;
                                            ?>
                                            <td class="total-price first-row"><?php echo $row_total_price ?> MAD</td>

                                        <td class="close-td first-row "><a style="color: #17191b" href="shopping-cart.php?id=<?php echo $_SESSION['cart_p_id'][$i]; ?>&size=<?php echo $_SESSION['cart_size_id'][$i]; ?>&color=<?php echo $_SESSION['cart_color_id'][$i];?>" <i class="ti-close"></i></a></td>
                                        </tr>
                                   <?php  }

                                  ?>


                                  </tbody>
                              </table>
                          </div>
                          <div class="row">
                              <div class="col-lg-4">
                                  <div class="cart-buttons">
                                      <a href="shop.php" class="primary-btn continue-shop"><< retour</a>
                                      <input href="#" type="submit" class="primary-btn up-cart" value="Mise à jour panier" name="update_cart">
                                  </div>

                    </form>

                              </div>
                              <div class="col-lg-4 offset-lg-4">
                                  <div class="proceed-checkout">
                                      <ul>
                                          <li class="subtotal">Subtotale <span><?php echo $total_price?> MAD</span></li>
                                          <li class="cart-total">Totale <span><?php echo $total_price?> MAD</span></li>
                                      </ul>
                                      <a href="checkout.php" class="proceed-btn">PASSER À LA CAISSE</a>
                                  </div>
                              </div>
                          </div>
                      </div>


                <?php  }
                ?>

            </div>
        </div>
    </section>
<?php require_once(ROOT.DS.'includes'.DS.'footer.php');?>