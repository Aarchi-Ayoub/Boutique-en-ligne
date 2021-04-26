<?php


class Dashbord
{
  private  static  $tbl_customer = 'tbl_customer';
  private  static  $tbl_payment = 'tbl_payment';
  private  static  $tbl_order = 'tbl_order';
    private  $folder_tmp = ROOT .DS. 'assets'.DS.'img'.DS.'img_customer';
    private  $folder_tmps = 'assets'.DS.'img'.DS.'img_customer';
    private $password_db;

    private $file;
    public function  checkCustomerIfInactive(){
        global $db;

        $statment = "SELECT * FROM " . self::$tbl_customer . " WHERE cust_id = " . $_SESSION['customer']['cust_id'] . " AND cust_status = 0 ";
        $exec = $db->exec_query($statment);
        $total = mysqli_num_rows($exec);
        if($total) {
            header('location: logout.php');
            exit;
        }



    }


    public  function image_dashbord_site($cust_id){
        global $db;
        $stat = " SELECT * FROM " .self::$tbl_customer . " WHERE cust_id = $cust_id ";
        $exec = $db->exec_query($stat);

        while ($row = mysqli_fetch_assoc($exec)){
            $this->file = $row['cust_photo'];
            echo " <img style='height: 90%;
    width: 73%;
    box-shadow: 3px -2px 7px 5px #e3e1e1;' class='img-fluid' src='{$this->folder_tmps}/{$this->file}' alt='img'>";

        }


    }

    public  function  Update_without_photos($cust_id){
        global $db;

        $cust_cname = strip_tags($_POST['companynames']);
        $cust_phone = strip_tags($_POST['telcusts']);
        $cust_country = strip_tags($_POST['countrys']);
        $cust_adress = strip_tags($_POST['custaddresss']);
        $cust_city = strip_tags($_POST['citys']);
        $cust_state = strip_tags($_POST['states']);
        $cust_zip = strip_tags($_POST['zipcodes']);

       $stat = " UPDATE "  . self::$tbl_customer . " SET " ;
       $stat .= " cust_cname = '$cust_cname' , ";
       $stat .= " cust_phone = '$cust_phone' , ";
       $stat .= " cust_country = '$cust_country' ,  ";
       $stat .= " cust_address = '$cust_adress' ,  ";
       $stat .= " cust_city = '$cust_city' ,  ";
       $stat .= " cust_state = '$cust_state' ,  ";
       $stat .= " cust_zip = '$cust_zip'   ";
       $stat .= " WHERE cust_id = $cust_id ";
        $db->exec_query($stat);


        $_SESSION['customer']['cust_cname'] = $_POST['companynames'];
        $_SESSION['customer']['cust_phone'] = $_POST['telcusts'];
        $_SESSION['customer']['cust_country'] = $_POST['countrys'];
        $_SESSION['customer']['cust_address'] = $_POST['custaddresss'];
        $_SESSION['customer']['cust_city'] = $_POST['citys'];
        $_SESSION['customer']['cust_state'] = $_POST['states'];
        $_SESSION['customer']['cust_zip'] = $_POST['zipcodes'];





    }
    public  function  Update_with_photos($cust_id){
        global $db;

        //1 - unlink photo older

        $statment = "SELECT * FROM " . self::$tbl_customer . " WHERE cust_id = " . $cust_id;
        $exec_statement = $db->exec_query($statment);


        while($result = mysqli_fetch_assoc($exec_statement)){
            $file = $result['cust_photo'];

            unlink($this->folder_tmp.DS.$file);
        }



        $cust_cname = strip_tags($_POST['companynames']);
        $cust_phone = strip_tags($_POST['telcusts']);
        $cust_country = strip_tags($_POST['countrys']);
        $cust_adress = strip_tags($_POST['custaddresss']);
        $cust_city = strip_tags($_POST['citys']);
        $cust_state = strip_tags($_POST['states']);
        $cust_zip = strip_tags($_POST['zipcodes']);

       //2 new photo
        $file=uniqid('user_',TRUE).$_FILES['file']['name'];
        $tmp_name=$_FILES['file']['tmp_name'];
        move_uploaded_file($tmp_name, "$this->folder_tmp".DS.$file);


        $stat = " UPDATE "  . self::$tbl_customer . " SET " ;
        $stat .= " cust_cname = '$cust_cname' , ";
        $stat .= " cust_phone = '$cust_phone' , ";
        $stat .= " cust_country = '$cust_country' ,  ";
        $stat .= " cust_address = '$cust_adress' ,  ";
        $stat .= " cust_city = '$cust_city' ,  ";
        $stat .= " cust_state = '$cust_state' ,  ";
        $stat .= " cust_zip = '$cust_zip'  , ";
        $stat .= " cust_photo = '$file'   ";
        $stat .= " WHERE cust_id = $cust_id ";
        $exec =  $db->exec_query($stat);
        if(!$exec) echo "error" . mysqli_error($db->getConnection());

        $_SESSION['customer']['cust_cname'] = $_POST['companynames'];
        $_SESSION['customer']['cust_phone'] = $_POST['telcusts'];
        $_SESSION['customer']['cust_country'] = $_POST['countrys'];
        $_SESSION['customer']['cust_address'] = $_POST['custaddresss'];
        $_SESSION['customer']['cust_city'] = $_POST['citys'];
        $_SESSION['customer']['cust_state'] = $_POST['states'];
        $_SESSION['customer']['cust_zip'] = $_POST['zipcodes'];
        $_SESSION['customer']['cust_photo'] = $file;





    }
    public  function Update_billing_shipping($cust_id){
        global $db;
        $cust_bname=strip_tags($_POST['fir_bills']);
        $cust_bcname=strip_tags($_POST['company_bils']);
        $cust_bphone=strip_tags($_POST['phone_bils']);
        $cust_bcountry=strip_tags($_POST['coun_bills']);
        $cust_baddre=strip_tags($_POST['street_bills']);
        $cust_bcity=strip_tags($_POST['town_bills']);
        $cust_bstate=strip_tags($_POST['state_bills']);
        $cust_bzip=strip_tags($_POST['zip_bills']);

        /***********/
        $cust_sname=strip_tags($_POST['fir_ships']);
        $cust_ssname=strip_tags($_POST['company_ships']);
        $cust_sphone=strip_tags($_POST['phone_ships']);
        $cust_scountry=strip_tags($_POST['coun_ships']);
        $cust_saddre=strip_tags($_POST['street_ships']);
        $cust_scity=strip_tags($_POST['town_ships']);
        $cust_sstate=strip_tags($_POST['state_ships']);
        $cust_szip=strip_tags($_POST['zip_ships']);






        $statement = " UPDATE " . self::$tbl_customer . " SET ";
       $statement .= " cust_b_name = '$cust_bname' , ";
       $statement .= " cust_b_cname = '$cust_bcname' , ";
       $statement .= " cust_b_phone = '$cust_bphone' , ";
       $statement .= " cust_b_country = '$cust_bcountry' , ";
       $statement .= " cust_b_address = '$cust_baddre' , ";
       $statement .= " cust_b_city = '$cust_bcity' , ";
       $statement .= " cust_b_state = '$cust_bstate' , ";
       $statement .= " cust_b_zip = '$cust_bzip' , ";
       $statement .= " cust_s_name = '$cust_sname' , ";
       $statement .= " cust_s_cname = '$cust_ssname' , ";
       $statement .= " cust_s_phone = '$cust_sphone' , ";
       $statement .= " cust_s_country = '$cust_scountry' , ";
       $statement .= " cust_s_address = '$cust_saddre' , ";
       $statement .= " cust_s_city = '$cust_scity' , ";
       $statement .= " cust_s_state = '$cust_sstate' , ";
       $statement .= " cust_s_zip = '$cust_szip'  ";
       $statement .= "  WHERE cust_id  = $cust_id ";

       $db->exec_query($statement);


        $_SESSION['customer']['cust_b_name'] = strip_tags($_POST['fir_bills']);
        $_SESSION['customer']['cust_b_cname'] = strip_tags($_POST['company_bils']);
        $_SESSION['customer']['cust_b_phone'] = strip_tags($_POST['phone_bils']);
        $_SESSION['customer']['cust_b_country'] = strip_tags($_POST['coun_bills']);
        $_SESSION['customer']['cust_b_address'] = strip_tags($_POST['street_bills']);
        $_SESSION['customer']['cust_b_city'] = strip_tags($_POST['town_bills']);
        $_SESSION['customer']['cust_b_state'] = strip_tags($_POST['state_bills']);
        $_SESSION['customer']['cust_b_zip'] = strip_tags($_POST['zip_bills']);

        $_SESSION['customer']['cust_s_name'] = strip_tags($_POST['fir_ships']);
        $_SESSION['customer']['cust_s_cname'] = strip_tags($_POST['company_ships']);
        $_SESSION['customer']['cust_s_phone'] = strip_tags($_POST['phone_ships']);
        $_SESSION['customer']['cust_s_country'] = strip_tags($_POST['coun_ships']);
        $_SESSION['customer']['cust_s_address'] = strip_tags($_POST['street_ships']);
        $_SESSION['customer']['cust_s_city'] = strip_tags($_POST['town_ships']);
        $_SESSION['customer']['cust_s_state'] = strip_tags($_POST['state_ships']);
        $_SESSION['customer']['cust_s_zip'] = strip_tags($_POST['zip_ships']);




    }

    /*******************************/

    public function CheckIfPassCorrect_in_dashbord($cust_id){
        global $db;
        $old_passsword = strip_tags($_POST['pass']);

        $statement = "SELECT * FROM " . self::$tbl_customer . " WHERE cust_id =  $cust_id ";
        $exec = $db->exec_query($statement);

        while($row = mysqli_fetch_assoc($exec)){
            $this->password_db = $row['cust_password'];
        }
        if($this->password_db != md5($old_passsword)){
            return "not the seem";
        }

    }
    public function new_pasword_update($cust_id){
        global  $db;
        $cust_password = md5(trim($_POST['newPass']));

        $stat = " UPDATE " . self::$tbl_customer . " SET cust_password = '$cust_password' WHERE cust_id = $cust_id ";
        $db->exec_query($stat);


    }

    public  function Orders_Dash($cust_email){
         global $db;
        /* ===================== Pagination Code Starts ================== */
        $adjacents = 5;
      $stat1 = " SELECT * FROM " . self::$tbl_payment . " WHERE customer_email= '$cust_email' ORDER BY id DESC";
      $exec1 = $db->exec_query($stat1);
      $total_pages = mysqli_num_rows($exec1);

        $targetpage = 'dashbord.php';
        $limit = 4;
        $page = @$_GET['page'];
        if($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;
        $stat2 = " SELECT * FROM " . self::$tbl_payment . " WHERE customer_email= '$cust_email' ORDER BY id DESC LIMIT $start, $limit";
        $exec2 = $db->exec_query($stat2);

        if ($page == 0) $page = 1;
        $prev = $page - 1;
        $next = $page + 1;
        $lastpage = ceil($total_pages/$limit);
        $lpm1 = $lastpage - 1;
        $pagination = "";
        if($lastpage > 1)
        {
            $pagination .= "<div class=\"pagination\">";
            if ($page > 1)
                $pagination.= "<a href=\"$targetpage?page=$prev\" style='background-color: #2d2d2d;
    color: white;
    padding: 7px;'>&#171; previous</a>";
            else
                $pagination.= "<span class=\"disabled\" style='background-color: #2d2d2d;
    color: white;
    padding: 7px;'>&#171; previous</span>";
            if ($lastpage < 7 + ($adjacents * 2))
            {
                for ($counter = 1; $counter <= $lastpage; $counter++)
                {
                    if ($counter == $page)
                        $pagination.= "<span style='background-color: #b19e49;
    color: white;
    padding: 7px;' class=\"current\">$counter</span>";
                    else
                        $pagination.= "<a style='background-color: #a79e77;
    color: white;
    padding: 7px;' href=\"$targetpage?page=$counter\">$counter</a>";
                }
            }
            elseif($lastpage > 5 + ($adjacents * 2))
            {
                if($page < 1 + ($adjacents * 2))
                {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                    {
                        if ($counter == $page)
                            $pagination.= "<span class=\"current\">$counter</span>";
                        else
                            $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
                    }
                    $pagination.= "...";
                    $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                    $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";
                }
                elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
                {
                    $pagination.= "<a href=\"$targetpage?page=1\" style='background-color: #b19e49;
    color: white;
    padding: 7px;'>1</a>";
                    $pagination.= "<a href=\"$targetpage?page=2\" style='background-color: #b19e49;
    color: white;
    padding: 7px;'>2</a>";
                    $pagination.= "...";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                    {
                        if ($counter == $page)
                            $pagination.= "<span class=\"current\">$counter</span>";
                        else
                            $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
                    }
                    $pagination.= "...";
                    $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                    $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";
                }
                else
                {
                    $pagination.= "<a href=\"$targetpage?page=1\" style='background-color: #b19e49;
    color: white;
    padding: 7px;'>1</a>";
                    $pagination.= "<a href=\"$targetpage?page=2\" style='background-color: #b19e49;
    color: white;
    padding: 7px;'>2</a>";
                    $pagination.= "...";
                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                    {
                        if ($counter == $page)
                            $pagination.= "<span class=\"current\">$counter</span>";
                        else
                            $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";
                    }
                }
            }
            if ($page < $counter - 1)
                $pagination.= "<a href=\"$targetpage?page=$next\" style='background-color: #2d2d2d;
    color: white;
    padding: 7px;'>next &#187;</a>";
            else
                $pagination.= "<span class=\"disabled\" style='background-color: #2d2d2d;
    color: white;
    padding: 7px;'>next &#187;</span>";
            $pagination.= "</div>\n";
        }
        /* ===================== Pagination Code Ends ================== */
        $tip = $page*10-10;

        echo '<table class="table table-striped table-dark"> ';
        echo  '<thead>';
        echo ' <tr>
                            <th scope="col">série</th>
                            <th scope="col">détails du produit</th>
                            <th scope="col">Temps de paiement</th>
                            <th scope="col">ID transaction</th>
                            <th scope="col">Montant payé</th>
                            <th scope="col">Statut</th>
                            <th scope="col">Mode de paiement</th>
                            <th scope="col">PaymentID</th>
                        </tr>';
        echo  '</thead>';
        echo '<tbody>';

          while ($row = mysqli_fetch_assoc($exec2)){
              $tip++;

              ?>

              <tr>
                  <td scope="row"><?php echo $tip; ?></td>
                  <td>
                      <?php
                      $statement1 = " SELECT * FROM " . self::$tbl_order . " WHERE payment_id  =  " . $row['payment_id'];
                       $exec3 = $db->exec_query($statement1);
                         while($row1 = mysqli_fetch_assoc($exec3)){
                             echo 'Nom du produit: '.$row1['product_name'];
                             echo '<br>Taille: '.$row1['size'];
                             echo '<br>coleur: '.$row1['color'];
                             echo '<br>Quantité: '.$row1['quantity'];
                             echo '<br>Prix unitaire: '.$row1['unit_price'];
                             echo '<br><br>';


                         }

                      ?>
                  </td>
                  <td><?php echo $row['payment_date']; ?></td>
                  <td><?php echo $row['txnid']; ?></td>
                  <td>$<?php echo $row['paid_amount']; ?> = <?php echo $row['paid_amount'] * 10 ; ?>  MAD</td>
                  <td><?php
                      if($row['payment_status'] == 'Pending'){
                          ?>
                          En attente

                     <?php

                      }else{
                          ?>
                          Terminé

                     <?php }

                      ?>

                  </td>
                  <td><?php echo $row['payment_method']; ?></td>
                  <td><?php echo $row['payment_id']; ?></td>
              </tr>




        <?php  }
      echo  '</tbody>';


echo  '</table>';

echo  '  <div class="pagination" style="overflow: hidden;">';
  echo  $pagination;
echo  '</div>';

    }


}
$dashbord = new Dashbord();