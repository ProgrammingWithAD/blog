<?php
include('after_login.php');

if (isset($_REQUEST['get_vehicle']) && isset($_REQUEST['vehicle_type'])) {

    $type = $_REQUEST['vehicle_type'];
    $vehicle_query = $mysqli->query("SELECT * FROM vehicles WHERE vehicle_type='" . $type . "'");
    echo '<option value="">Select</option>';
    while ($vehicle_info = $vehicle_query->fetch_assoc()) {
        echo '<option value="' . $vehicle_info['name'] . '" no="' . $vehicle_info['vehicle_no'] . '">' . $vehicle_info['name'] . ', ' . $vehicle_info['vehicle_no'] . '</option>';
    }
}







//-------------------------Get Form Bill Entry---------------------------------
if (isset($_REQUEST['getForm_billEntry']) && isset($_REQUEST['bill_type'])) {
    $tax_query = $mysqli->query("SELECT * FROM taxes");
    $total_tax_percent = 0;
    $tax_arr = [];
    while ($tax = $tax_query->fetch_assoc()) {
        $tax_arr[] = $tax;
        $total_tax_percent += $tax['tax_percent'];
    }


    if (isset($_REQUEST['e_id'])) {
        $id = filtervar($mysqli, $_REQUEST['e_id']);
        $get_result = $mysqli->query("SELECT * FROM `vehicle_bill` WHERE `id`='$id' ");
        if ($get_result->num_rows) {
            $row = $get_result->fetch_assoc();
        } else {
            echo '<script>window.history.back();</script>';
            exit;
        }
    }


?>
    


    <?php
    $vehicle_name = array(null);
    if (isset($_REQUEST['e_id'])) {
        $date_from         = explode('||', $row['date_from']);
        $date_to           = explode('||', $row['date_to']);
        $vehi_typ          = explode('||', $row['vehicle_type']);
        $vehicle_name      = explode('||', $row['vehicle_name']);
        $vehicle_no        = explode('||', $row['vehicle_no']);
        $total_km          = explode('||', $row['total_km']);
        $avg               = explode('||', $row['avg']);
        $fuel_price        = explode('||', $row['fuel_price']);
        $total_fuel_price  = explode('||', $row['total_fuel_price']);
        $daily_basis       = explode('||', $row['daily_basis']);
        $no_days           = explode('||', $row['no_days']);
        $total_daily_basis = explode('||', $row['total_daily_basis']);

        $total_hr       = explode('||', $row['total_hr']);
        $hr_rate        = explode('||', $row['hr_rate']);
        $total_hr_price = explode('||', $row['total_hr_price']);

        $extra_hr          = explode('||', $row['extra_hr']);
        $extra_hr_rate     = explode('||', $row['extra_hr_rate']);
        $total_ex_hr_rate  = explode('||', $row['total_ex_hr_rate']);
        $night_halt        = explode('||', $row['night_halt']);
        $parking_toll      = explode('||', $row['parking_toll']);
        $grand_total      = explode('||', $row['grand_total']);

        $total_km2      = explode('||', $row['total_km']);
        $rate_per_km2      = explode('||', $row['rate_per_km']);
        $total_price_per_km2      = explode('||', $row['total_price_per_km']);
    }
    $row_cunt = 1;
    ?>

    <!-- add more start -->
    <div class="addmore_container">
        <?php $key = 0;
        foreach ($vehicle_name as $vehicle_name) { ?>
            <div class="addmore_via">

<div class="card card-body">
                <div class="row">
                    <div class="col-md-11">
                        <div class="">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class=" col-md-2">
                                            <label>Vehicle Type</label>
                                            <select name="vehicle_type[]" onchange="get_vehicle(this);" class="form-select " id="vehicle_type_<?php echo $row_cunt ?>" required="required">
                                                <option value="">Select</option>
                                                <option <?php echo (isset($vehi_typ[$key]) && $vehi_typ[$key] == 'AC') ?  "selected" : "" ?> value="AC">AC</option>
                                                <option <?php echo (isset($vehi_typ[$key]) && $vehi_typ[$key] == 'NON AC') ?  "selected" : "" ?> value="NON AC">NON AC</option>
                                            </select>
                                        </div>
                                        <div class=" col-md-4">
                                            <label>Vehicle Name/Number</label>
                                            <select name="vehicle_name[]" onchange="set_vehicle_no(this)" onkeyup="get_total();" class="form-select select_search vehicle_name" required="required">
                                                <option value="">Select</option>
                                                <?php echo (isset($vehicle_name)) ? '<option value="' . $vehicle_name . '" no="' . $vehicle_no[$key] . '" selected>' . $vehicle_name . ',' . $vehicle_no[$key] . '</option>' : '' ?>
                                            </select>
                                        </div>
                                        <!-- <div class=" col-md-4">
         <label>Vehicle No</label> -->
                                        <input type="hidden" class="form-control vehicle_no" name="vehicle_no[]" onchange="get_total();" onkeyup="get_total();" value="<?php echo (isset($vehicle_no[$key])) ? $vehicle_no[$key] : '' ?>" placeholder="Vehicle No" value="" />
                                        <!-- </div> -->
                                        <div class=" col-md-3">
                                            <label>Date From</label>
                                            <input type="text" class="form-control  start_date" name="date_from[]" onchange="get_total();" onkeyup="get_total();" id="date_from_<?php echo $row_cunt ?>" value="<?php echo (isset($date_from[$key])) ? output_date_st($date_from[$key]) : '' ?>" placeholder="Date From" required />
                                        </div>
                                        <div class=" col-md-3">
                                            <label>Date To</label>
                                            <input type="text" class="form-control  end_date" name="date_to[]" onchange="get_total();" onkeyup="get_total();" id="date_to_<?php echo $row_cunt ?>" value="<?php echo (isset($date_to[$key])) ? output_date_st($date_to[$key]) : '' ?>" placeholder="Date To" readonly required />
                                        </div>
                                    </div>
                                </div>
                                <?php if ($_REQUEST['bill_type'] == 'Daily Basis') { ?>
                                    <div class=" col-md-3 ">
                                        <label>Total Km</label>
                                        <input type="text" class="form-control numInputPoint" name="total_km[]" onchange="get_total();" onkeyup="get_total();" id="total_km_<?php echo $row_cunt ?>" value="<?php echo (isset($total_km[$key])) ? $total_km[$key] : '' ?>" placeholder="Total Km" />
                                    </div>
                                    <div class=" col-md-3 ">
                                        <label>Average Km/Lt</label>
                                        <input type="text" class="form-control numInputPoint" name="avg[]" onchange="get_total();" onkeyup="get_total();" id="avg_<?php echo $row_cunt ?>" value="<?php echo (isset($avg[$key])) ? $avg[$key] : '' ?>" placeholder="Average Km/Lt" />
                                    </div>
                                    <div class=" col-md-3 ">
                                        <label>Fuel Price/Lt</label>
                                        <input type="text" class="form-control numInputPoint" name="fuel_price[]" onchange="get_total();" onkeyup="get_total();" id="fuel_price_<?php echo $row_cunt ?>" value="<?php echo (isset($fuel_price[$key])) ? $fuel_price[$key] : '' ?>" placeholder="Fuel Price/Lt" />
                                    </div>
                                    <div class=" col-md-3 ">
                                        <label>Total Fuel Price</label>
                                        <input type="text" class="form-control numInputPoint" name="total_fuel_price[]" onchange="get_total();" onkeyup="get_total();" id="total_fuel_price_<?php echo $row_cunt ?>" value="<?php echo (isset($total_fuel_price[$key])) ? $total_fuel_price[$key] : '' ?>" placeholder="Total Fuel Price" readonly />
                                    </div>
                                <?php } else { ?>

                                    <div class=" col-md-4">
                                        <label>Total Km</label>
                                        <input type="text" class="form-control numInputPoint" name="total_km[]" id="total_km_<?php echo $row_cunt ?>" onchange="get_total();" onkeyup="get_total();" value="<?php echo (isset($total_km[$key])) ? $total_km[$key] : '' ?>" placeholder="Total Km" required />
                                    </div>
                                    <div class=" col-md-4">
                                        <label>Rate Per KM</label>
                                        <input type="text" class="form-control numInputPoint" name="rate_per_km[]" id="rate_per_km_pk_<?php echo $row_cunt ?>" onchange="get_total();" onkeyup="get_total();" value="<?php echo (isset($rate_per_km2[$key])) ? $rate_per_km2[$key] : '' ?>" placeholder="Rate Per KM" required />
                                    </div>
                                    <div class=" col-md-4">
                                        <label>Total Price Per KM</label>
                                        <input type="text" class="form-control numInputPoint" name="total_price_per_km[]" id="total_fuel_price_<?php echo $row_cunt ?>" onchange="get_total();" onkeyup="get_total();" value="<?php echo (isset($total_price_per_km2[$key])) ? $total_price_per_km2[$key] : '' ?>" placeholder="Total Price Per KM" readonly />
                                    </div>

                                <?php } ?>
                                <div class=" col-md-4">
                                    <label>Total Hour</label>
                                    <input type="text" class="form-control numInputPoint" name="total_hr[]" onchange="get_total();" onkeyup="get_total();" id="total_hr_<?php echo $row_cunt ?>" value="<?php echo (isset($total_hr[$key])) ? $total_hr[$key] : '' ?>" placeholder="Total Hour" />
                                </div>
                                <div class=" col-md-4">
                                    <label>Rate / Hour</label>
                                    <input type="text" class="form-control numInputPoint" name="hr_rate[]" onchange="get_total();" onkeyup="get_total();" id="hr_rate_<?php echo $row_cunt ?>" value="<?php echo (isset($hr_rate[$key])) ? $hr_rate[$key] : '' ?>" placeholder="Rate / Hour" />
                                </div>
                                <div class=" col-md-4">
                                    <label>Total Hour Price</label>
                                    <input type="text" class="form-control numInputPoint" name="total_hr_price[]" onchange="get_total();" onkeyup="get_total();" id="total_hr_price_<?php echo $row_cunt ?>" value="<?php echo (isset($total_hr_price[$key])) ? $total_hr_price[$key] : '' ?>" placeholder="Total Hour Price" readonly />
                                </div>

                                <?php if ($_REQUEST['bill_type'] == 'Daily Basis') { ?>
                                    <div class=" col-md-4">
                                        <label>Daily Basis</label>
                                        <input type="text" class="form-control numInputPoint" name="daily_basis[]" onchange="get_total();" onkeyup="get_total();" id="daily_basis_<?php echo $row_cunt ?>" value="<?php echo (isset($daily_basis[$key])) ? $daily_basis[$key] : '' ?>" placeholder="Daily Basis" />
                                    </div>
                                    <div class=" col-md-4">
                                        <label>No Of Days</label>
                                        <input type="text" class="form-control numInputPoint" name="no_days[]" onchange="get_total();" onkeyup="get_total();" id="no_days_<?php echo $row_cunt ?>" value="<?php echo (isset($no_days[$key])) ? $no_days[$key] : '' ?>" placeholder="No Of Days" />
                                    </div>
                                    <div class=" col-md-4">
                                        <label>Total Daily Basis</label>
                                        <input type="text" class="form-control numInputPoint" name="total_daily_basis[]" onchange="get_total();" onkeyup="get_total();" id="total_daily_basis_<?php echo $row_cunt ?>" value="<?php echo (isset($total_daily_basis[$key])) ? $total_daily_basis[$key] : '' ?>" placeholder="Total Daily Basis" readonly />
                                    </div>
                                <?php } ?>
                                <div class=" col-md-4">
                                    <label>Extra Hour</label>
                                    <input type="text" class="form-control numInputPoint" name="extra_hr[]" onchange="get_total();" onkeyup="get_total();" id="extra_hr_<?php echo $row_cunt ?>" value="<?php echo (isset($extra_hr[$key])) ? $extra_hr[$key] : '' ?>" placeholder="Extra Hour" />
                                </div>
                                <div class=" col-md-4">
                                    <label>Extra Hour Rate</label>
                                    <input type="text" class="form-control numInputPoint" name="extra_hr_rate[]" onchange="get_total();" onkeyup="get_total();" id="extra_hr_rate_<?php echo $row_cunt ?>" value="<?php echo (isset($extra_hr_rate[$key])) ? $extra_hr_rate[$key] : '' ?>" placeholder="Extra Hour Rate" />
                                </div>
                                <div class=" col-md-4">
                                    <label>Extra Hour Price</label>
                                    <input type="text" class="form-control numInputPoint" name="extra_hr_price[]" onchange="get_total();" onkeyup="get_total();" id="extra_hr_price_<?php echo $row_cunt ?>" value="<?php echo (isset($total_ex_hr_rate[$key])) ? $total_ex_hr_rate[$key] : '' ?>" placeholder="Extra Hour Price" readonly />
                                </div>
                                <div class=" col-md-4">
                                    <label>Night Halt</label>
                                    <input type="text" class="form-control numInputPoint" name="night_halt[]" onchange="get_total();" onkeyup="get_total();" id="night_halt_<?php echo $row_cunt ?>" value="<?php echo (isset($night_halt[$key])) ? $night_halt[$key] : '' ?>" placeholder="Night Halt" />
                                </div>
                                <div class=" col-md-4">
                                    <label>Parking/Toll</label>
                                    <input type="text" class="form-control numInputPoint" name="parking_toll[]" onchange="get_total();" onkeyup="get_total();" id="parking_toll_<?php echo $row_cunt ?>" value="<?php echo (isset($parking_toll[$key])) ? $parking_toll[$key] : '' ?>" placeholder="Parking/Toll" />
                                </div>
                                <div class=" col-md-4">
                                    <label>Total*</label>
                                    <input type="text" class="form-control numInputPoint" name="grand_total[]" onchange="get_total();" onkeyup="get_total();" id="grand_total_<?php echo $row_cunt ?>" value="<?php echo (isset($grand_total[$key])) ? $grand_total[$key] : '' ?>" placeholder="Total" required readonly />
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-1">
                        <?php if ($row_cunt === 1) { ?>
                            <button type="button" id="btn_add" class="btn_add btn btn-info " title="add more"><i class="fa fa-plus"></i></button>
                        <?php } else {
                        ?>
                            <button type="button" id="btn_add" class="remove_btn  btn btn-danger " title="add more"><i class="fa fa-times "></i></button>

                        <?php
                        } ?>
                        <input type="hidden" id="row_cunt" name="row_cunt" value="1">
                    </div>
                </div>
            </div>
        <?php $row_cunt++;
            $key++;
        }
        ?>
    </div>
    </div>
    </div>
    <!-- add more end -->
    
    <!------------------------------->
<div class="card card-body m-2">
    <div class="col-md-11">
        <div class="row g-3">
            <div class="col-md-3">
                <label>Sub Total*</label>
                <input type="text" class="form-control" name="sub_total" id="sub_total" placeholder="Sub Total" value="<?php echo (isset($row['sub_total'])) ? $row['sub_total'] : '' ?>" required readonly />
            </div>
            <div class="col-md-3">
                <label>Discount Type</label>
               <select class="form-select" name="discount_type" id="discount_type" onchange="discount_type_for_lable(this.value)"> 
                <option value="2" <?php echo (isset($row['discount_type'])&&$row['discount_type']==2)?'selected':'' ?>>Percentage (%)</option>
                <option value="1" <?php echo (isset($row['discount_type'])&&$row['discount_type']==1)?'selected':'' ?>> Amount (₹)</option>
               </select>
            </div>
            <div class="col-md-3">
                <label id="discount_lable">Discount Rate </label>
                <input type="text" class="form-control numInputPoint" name="discount" id="discount" placeholder="Discount Rate" onchange="get_total_discount(this.value)" value="<?php echo (isset($row['discount'])) ? $row['discount'] : '' ?>"  />
            </div>
            <div class="col-md-3" >
                <label >Total Discount </label>
                <input type="text" class="form-control" name="total_discount" id="total_discount" placeholder="Total Discount" value="<?php echo (isset($row['total_discount'])) ? $row['total_discount'] : '' ?>"  required readonly />
            </div>
            <div id="tax_val">
                <div class="row g-3">
                    <?php $st_i = 0;
                    foreach ($tax_arr as $key => $tax) {
                        $st_i++;
                        $st_tax_arr = explode(',', $tax['tax_percent']);

                        if (isset($row["tax_$st_i"])) {
                            $tx_dtl = explode('||', $row["tax_$st_i"]);
                        }
                    ?>
                        <script>
                            console.log('<?php echo json_encode($tx_dtl) ?>')
                        </script>
                        <div class=" col-md-4">
                            <label><?php echo $tax['tax_name']; ?></label>
                            <div class="clearfix"></div>
                            <input type="hidden" name="st_tx_nam_<?php echo $st_i; ?>" value="<?php echo (isset($row['tax_name'])) ? $row['tax_name'] : $tax['tax_name']; ?>">
                            <input type="text" class="form-control numInputPoint tax" tax_percent="<?php echo $st_i; ?>" value="<?php if (isset($tx_dtl[1]) && !empty($tx_dtl[1]) && ($tx_dtl[0] == $tax['tax_name'])) {
                                                                                                                        echo $tx_dtl[1];
                                                                                                                    } ?>" abc="<?php echo json_encode($tx_dtl[1]) ?>" name="tx_rate_<?php echo $st_i; ?>" onchange="get_total();" onkeyup="get_total();" id="tx_rate_<?php echo $st_i; ?>" style="width:50%;float: left;" placeholder="Rate">

                            <input type="text" class="form-control " tax_percent="<?php echo $st_i; ?>" value="<?php if (isset($tx_dtl[2]) && !empty($tx_dtl[2]) && ($tx_dtl[0] == $tax['tax_name'])) {
                                                                                                                    echo $tx_dtl[2];
                                                                                                                } ?>" abc="<?php echo json_encode($tx_dtl[0]) ?>" name="tx_amt_<?php echo $st_i; ?>" id="tx_amt_<?php echo $st_i; ?>" placeholder="Amount" style="width:48%;float: right;" readonly />
                            <div class="clearfix"></div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class=" col-md-4">
                        <label>Grand Total*</label>
                        <input type="text" class="form-control" name="grand_total_tax" value="<?php echo (isset($row['grand_total_tax'])) ? $row['grand_total_tax'] : ''; ?>" id="grand_total_tax" placeholder="Grand Total" required readonly />
                    </div>

                    <div class=" col-md-12">
                        <label>Destination Details</label>
                        <input type="text" class="form-control" name="dest_deti" value="<?php echo (isset($row['dest_deti'])) ? $row['dest_deti'] : ''; ?>" id="dest_deti" placeholder="Destination Details" />
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>


        <div class=" col-md-12 text-center pt-4">
            <!--     <button class="btn btn-primary" type="submit">Submit</button> -->
            <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle me-2"></i>SUBMIT DETAILS</button>

        </div>
    </div>
<?php } ?>

<?php
//-----------------------------------guests.php---------------------------------//
//##----------------------------------guest form-------------------------------##//
if (isset($_POST['get_guest_left_form']) && !empty($_POST['value'])) {
    if(isset($_POST['e_id'])&& $_POST['e_id']!=0){
        $id=$_POST["e_id"]; 
        $e_sql=$mysqli->query("SELECT * FROM `guests` WHERE `id`='$id' ");
        $e_fetch=$e_sql->fetch_assoc();
    }
    // if ($_POST['value'] == 'Company' || $_POST['value'] == 'COMPANY') {
?>

        <div class="row">
            <div class="col-md-3 <?php echo ($_POST['value'] == 'Company' || $_POST['value'] == 'COMPANY')?'':'d-none' ?>">
                <label for="">Company Name</label>
                <input class="form-control" type="text" name="guest_company" id="guest_company" value="<?php echo (isset($_POST['value'])&&$_POST['value']=='Company'||$_POST['value']=='COMPANY')?((isset($e_fetch['guest_company']))?$e_fetch['guest_company']:''):'' ?>" placeholder="Company Name">
            </div>
            <div class="col-md-3">
                <label for="">GST No</label>
                <input class="form-control" type="text" name="guest_gstn" id="guest_gstn" placeholder="GST No" value="<?php echo (isset($e_fetch['guest_gstn']))?$e_fetch['guest_gstn']:'' ?>">
            </div>
            <div class="<?php echo ($_POST['value'] == 'Company' || $_POST['value'] == 'COMPANY')?'col-md-3':'col-md-6' ?>">
                <label for="">Address</label>
                <input class="form-control" type="text" name="guest_address" id="guest_address" placeholder="Address" value="<?php echo (isset($e_fetch['guest_address']))?$e_fetch['guest_address']:'' ?>">
            </div>
            <div class="col-md-3">
                <label for="">Discount (%)</label>
                <input class="form-control numInput" type="text" name="guest_discount" id="guest_discount" placeholder="Discount (%)" value="<?php echo (isset($e_fetch['guest_discount']))?$e_fetch['guest_discount']:'0' ?>">
            </div>
        </div>
    <?php 
// } elseif ($_POST['value'] == 'Individual' || $_POST['value'] == 'INDIVIDUAL') { 
     ?>
        <!-- <div class="row">
        <div class="col-md-3">
                <label for="">GST No</label>
                <input class="form-control" type="text" name="guest_gstn" id="guest_gstn" placeholder="GST No" value="<?php echo (isset($e_fetch['guest_gstn']))?$e_fetch['guest_gstn']:'' ?>">
            </div>
        <div class="col-md-9">
            <label for="">Address</label>
            <input class="form-control" type="text" name="guest_address" id="guest_address" placeholder="Address" value="<?php echo (isset($e_fetch['guest_address']))?$e_fetch['guest_address']:'' ?>">
        </div>
        </div> -->
<?php
    // }
}






if(isset($_REQUEST['guest_autocomplete']) && isset($_REQUEST['guest_name'])){
    $guest_search    = filtervar($mysqli,$_REQUEST['guest_name']);

    $st_sql = "SELECT * FROM `guests` WHERE (`guest_name` LIKE '%$guest_search%' OR `guest_phone` LIKE '%$guest_search%' OR `guest_email` LIKE '%$guest_search%') ORDER BY `guest_name` ASC";


    $reseponseData = [];
    $result = mysqli_query($mysqli, $st_sql);
    $output = '<ul class="list-unstyled">';
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){

          

            $row['label'] ='<strong>'.$row['guest_name'].' ('.$row['guest_phone'].')</strong>';
            if(strlen($row["guest_email"])>3 ){
                $row['label'] .='<br><small>'; $row['label'] .= (strlen($row["guest_email"])>3)?$row["guest_email"]:''; $row['label'] .='</small>';
            }
            $row['value'] = $row['guest_name'];

            $reseponseData[] =  array(
                'guest_id'    => $row['id'],
                'guest_name'  => $row['guest_name'],
                'guest_type'    => $row['guest_type'],
                'guest_phone'    => $row['guest_phone'],
                'guest_email'    => $row['guest_email'],
                'address'     => $row['guest_address'],
                'guest_company'     => $row['guest_company'],
                'guest_gstn'     => $row['guest_gstn'],
                'guest_discount'     => $row['guest_discount'],
                'label'       => $row['label'],
                'value'       => $row['value']
            );
        }
    }

    echo json_encode($reseponseData);
    exit;
}


?>



<?php
 // monthly stats of last 12 months vehical booking
if(isset($_REQUEST['get_chart_data'])){
    $firstDate = new DateTime();
    $firstDate->modify('-12 months');
    $firstDate->modify('first day of this months');
    $firstDate = $firstDate->format('Y-m-d');
    
    // Second date: Last date of the current month
    $lastDate = new DateTime('last day of this month');
    $lastDate = $lastDate->format('Y-m-d');
    // echo "First Date: $firstDate\n";
    // echo "Second Date: $lastDate\n";

    $sql="SELECT * FROM `vehicle_bill` WHERE `gen_date` BETWEEN '$firstDate' AND '$lastDate'";
    $query=$mysqli->query($sql);
    if($query->num_rows){
        $monthly_car_booking=[];
while( $row=$query->fetch_assoc() ) {

$monthly_car_booking[]=$row["gen_date"];
    
    }
    echo json_encode($monthly_car_booking);
    exit;
}
}


?>