<?php


class Billing_shipping
{
    private static  $tbl_customer = 'tbl_customer';
    private $fir_bill;
    private $company_bil;
    private $phone_bil;
    private $coun_bill;
    private $street_bill;
    private $town_bill;
    private $state_bill;
    private $zip_bill;

    private $fir_ship;
    private $company_ship;
    private $phone_ship;
    private $coun_ship;
    private $street_ship;
    private $town_ship;
    private $state_ship;
    private $zip_ship;

    public function addBilling_shipping($id){
        global $db;

        $this->fir_bill = $_POST['fir_bill'];
        $this->company_bil = $_POST['company_bil'];
        $this->phone_bil = $_POST['phone_bil'];
        $this->coun_bill = $_POST['coun_bill'];
        $this->street_bill = $_POST['street_bill'];
        $this->town_bill = $_POST['town_bill'];
        $this->state_bill = $_POST['state_bill'];
        $this->zip_bill = $_POST['zip_bill'];

        $this->fir_ship = $_POST['fir_ship'];
        $this->company_ship = $_POST['company_ship'];
        $this->phone_ship = $_POST['phone_ship'];
        $this->coun_ship = $_POST['coun_ship'];
        $this->street_ship = $_POST['street_ship'];
        $this->town_ship = $_POST['town_ship'];
        $this->state_ship = $_POST['state_ship'];
        $this->zip_ship = $_POST['zip_ship'];


    $stat = "UPDATE `tbl_customer` SET cust_b_name='$this->fir_bill',`cust_b_cname`='$this->company_bil',`cust_b_phone`='$this->phone_bil ' ";
    $stat .= " ,`cust_b_country`='$this->coun_bill',`cust_b_address`='$this->street_bill',`cust_b_city`='$this->town_bill' " ;
    $stat .= " ,`cust_b_state`='$this->state_bill',`cust_b_zip`='$this->zip_bill',`cust_s_name`='$this->fir_ship' ";
    $stat .= " ,`cust_s_cname`='$this->company_ship',`cust_s_phone`='$this->phone_ship',`cust_s_country`='$this->coun_ship' ";
    $stat .= " ,`cust_s_address`='$this->street_ship',`cust_s_city`='$this->town_ship',`cust_s_state`='$this->state_ship' ,`cust_s_zip` = '$this->zip_ship'  ";
    $stat .= " WHERE cust_id = " . $db->escape_string(intval($id));
   $db->exec_query($stat);
        $_SESSION['customer']['cust_b_name'] = strip_tags($_POST['fir_bill']);
        $_SESSION['customer']['cust_b_cname'] = strip_tags($_POST['company_bil']);
        $_SESSION['customer']['cust_b_phone'] = strip_tags($_POST['phone_bil']);
        $_SESSION['customer']['cust_b_country'] = strip_tags($_POST['coun_bill']);
        $_SESSION['customer']['cust_b_address'] = strip_tags($_POST['street_bill']);
        $_SESSION['customer']['cust_b_city'] = strip_tags($_POST['town_bill']);
        $_SESSION['customer']['cust_b_state'] = strip_tags($_POST['state_bill']);
        $_SESSION['customer']['cust_b_zip'] = strip_tags($_POST['zip_bill']);

        $_SESSION['customer']['cust_s_name'] = strip_tags($_POST['fir_ship']);
        $_SESSION['customer']['cust_s_cname'] = strip_tags($_POST['company_ship']);
        $_SESSION['customer']['cust_s_phone'] = strip_tags($_POST['phone_ship']);
        $_SESSION['customer']['cust_s_country'] = strip_tags($_POST['coun_ship']);
        $_SESSION['customer']['cust_s_address'] = strip_tags($_POST['street_ship']);
        $_SESSION['customer']['cust_s_city'] = strip_tags($_POST['town_ship']);
        $_SESSION['customer']['cust_s_state'] = strip_tags($_POST['state_ship']);
        $_SESSION['customer']['cust_s_zip'] = strip_tags($_POST['zip_ship']);




    }


}
$Billing_shipping = new Billing_shipping();