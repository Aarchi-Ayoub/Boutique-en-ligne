<?php


class Admin_order
{
    private  static $tbl_payment = 'tbl_payment';
    private  static $tbl_order = 'tbl_order';
    private  static $tbl_product = 'tbl_product';
    public  function getAllOrderAndpayment(){
        global $db;
      $stat = "SELECT * FROM " . self::$tbl_payment . " ORDER by id DESC";
     $exec = $db->exec_query($stat);
     $i=0;
         while ($row = mysqli_fetch_assoc($exec)){
             $i++;
             ?>
             <tr class="<?php if($row['payment_status']=='Pending'){echo 'bg-r';}else{echo 'bg-g';} ?>">
             <td><?php echo $i; ?></td>
             <td>
                 <b>Id:</b> <?php echo $row['customer_id']; ?><br>
                 <b>Nom:</b><br> <?php echo $row['customer_name']; ?><br>
                 <b>Email:</b><br> <?php echo $row['customer_email']; ?><br><br>

             </td>
             <td>
                 <?php
                   $stat2 = " SELECT * FROM " . self::$tbl_order . " WHERE  payment_id = " . $row['payment_id'];
                   $exec2 = $db->exec_query($stat2);
                   while ($row_result = mysqli_fetch_assoc($exec2)){
                       echo '<b>Nom du produit:</b> '.$row_result['product_name'];
                       echo '<br>(<b>Taille:</b> '.$row_result['size'];
                       echo ', <b>Coleur:</b> '.$row_result['color'].')';
                       echo '<br>(<b>Quantité:</b> '.$row_result['quantity'];
                       echo ', <b>Prix ​unitaire:</b> '.$row_result['unit_price'].')';
                       echo '<br><br>';
                   }
                 ?>
             </td>
             <td>
             <?php if($row['payment_method'] == 'PayPal'): ?>
                 <b>Mode de paiement:</b> <?php echo '<span style="color:red;"><b>'.$row['payment_method'].'</b></span>'; ?><br>
                 <b>ID de paiement:</b> <?php echo $row['payment_id']; ?><br>
                 <b>Date:</b> <?php echo $row['payment_date']; ?><br>
                 <b>ID de transaction:</b> <?php echo $row['txnid']; ?><br>
             <?php endif; ?>

             </td>
             <td><?php echo $row['paid_amount'] * 10; ?> MAD</td>
             <td>
                 <?php
                     if($row['payment_status'] == "Pending"){
                         ?>
                         En attente
                    <?php  } else{
                         ?>
                         Terminé
                    <?php  }


                 ?>
                 <br><br>
                 <?php
                 if($row['payment_status']=='Pending'){
                     ?>

                     <a href='#' class="btn btn-warning btn-xs make_completed_payment_status" id='<?php echo $row['id']; ?>' style="width:100%;margin-bottom:4px;">Rendre terminé</a>
                     <?php
                 }
                 ?>
             </td>
             <td>
                 <?php
                    if($row['shipping_status'] == "Pending"){
                        ?>
                        En attente
                   <?php  } else{
                        ?>
                        Terminé
                   <?php  }


                 ?>
                 <br><br>
                 <?php
                 if($row['payment_status']=='Completed') {
                     if($row['shipping_status']=='Pending'){
                         ?>

                         <a href="#" class="btn btn-warning btn-xs make_completed_shipping_status" id='<?php echo $row['id']; ?>' style="width:100%;margin-bottom:4px;">Rendre terminé</a>
                         <?php
                     }
                 }
                 ?>
             </td>
             <td>
                 <a href="#" class="btn btn-danger btn-xs delete_order" id='<?php echo $row['id']; ?>' style="width:100%;">Supprimer</a>
             </td>
             </tr>



        <?php }


    }

    public  function  Check_order($id){
        global $db;
        $stat = "SELECT * FROM " . self::$tbl_payment . " WHERE id = " . $id;
        $exec  = $db->exec_query($stat);
        $total = mysqli_num_rows($exec);

        return $total;

    }
    public function completed_payment_status($id){
        global $db;
        $stat = " UPDATE " .self::$tbl_payment . " SET payment_status='Completed'  WHERE id=" . $id;
        $db->exec_query($stat);
    }

    public  function  Check_order_shipping($id){
        global $db;
        $stat = "SELECT * FROM " . self::$tbl_payment . " WHERE id = " . $id;
        $exec  = $db->exec_query($stat);
        $total = mysqli_num_rows($exec);

        return $total;

    }
    public function completed_shipping_status($id){
        global $db;
        $stat = " UPDATE " .self::$tbl_payment . " SET shipping_status='Completed'  WHERE id=" . $id;
        $db->exec_query($stat);
    }

    public  function  Check_order_Delete($id){
        global $db;
        $stat = "SELECT * FROM " . self::$tbl_payment . " WHERE id = " . $id;
        $exec  = $db->exec_query($stat);
        $total = mysqli_num_rows($exec);

        return $total;

    }

    public function  Delete_order($id){
        global $db;
        $stat = "SELECT * FROM " . self::$tbl_payment . " WHERE id = " . $id;
        $exec  = $db->exec_query($stat);
        while ($row = mysqli_fetch_assoc($exec)){
            $payment_id = $row['payment_id'];
            $payment_status = $row['payment_status'];
            $shipping_status = $row['shipping_status'];

        }

        if( ($payment_status == 'Completed') && ($shipping_status == 'Completed') ):
            // No return to stock
        else:
           // Return the stock
            $statement = " SELECT * FROM " . self::$tbl_order . " WHERE payment_id = " . $payment_id;
            $exec = $db->exec_query($statement);
            while ($row = mysqli_fetch_assoc($exec)){
              $statement1 = " SELECT * FROM " . self::$tbl_product . " WHERE p_id = " . $row['product_id'] ;
              $exec2 = $db->exec_query($statement1);
              while ($row2 = mysqli_fetch_assoc($exec2)){
                  $p_qty = $row2['p_qty'];
              }
                $final = $p_qty + $row['quantity'];

              $statement2 = "UPDATE " . self::$tbl_product  . " SET p_qty=$final WHERE p_id= " . $row['product_id'];
              $db->exec_query($statement2);

            }
         endif;
            //Delete from tbl Order

        $statement3 = "DELETE FROM " . self::$tbl_order . " WHERE payment_id = $payment_id";
        $db->exec_query($statement3);

        //Delete from tbl payment

        $statement4 = "DELETE FROM " . self::$tbl_payment. " WHERE id = $id";
        $db->exec_query($statement4);



    }
}
$Admin_order = new Admin_order();