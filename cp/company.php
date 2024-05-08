<?php
    include 'includes/after_login.php';
    $thisPageTitle = 'Company';
?>
<?php

    $di_sql    = "SELECT * FROM `company` WHERE `id`=1";
    $di_result = $mysqli->query($di_sql);
    $row       = $di_result->fetch_assoc();
    if(isset($_POST['submit'])){
        $id               = filtervar($mysqli,$_POST['id']);
        $logo_path        = filtervar($mysqli,$_POST['logo_path']);
        $name             = filtervar($mysqli,$_POST['name']);
        $tag              = filtervar($mysqli,$_POST['tag']);
        $address          = filtervar($mysqli,$_POST['address']);
        $phone            = filtervar($mysqli,$_POST['phone']);
        $email            = filtervar($mysqli,$_POST['email']);
        $pan_no           = filtervar($mysqli,$_POST['pan_no']);
        $hsc_code         = filtervar($mysqli,$_POST['hsc_code']);
        $gst_no           = filtervar($mysqli,$_POST['gst_no']);
        $inv_f_part       = filtervar($mysqli,$_POST['inv_f_part']);
        $inv_l_part       = filtervar($mysqli,$_POST['inv_l_part']);
        $inv_session_part = filtervar($mysqli,$_POST['inv_session_part']);

        //----------------------Moving Logo Img To images/company/file_name.png--------------------//
        if(!empty($_FILES['logo'])){
            $file_path = "images/company/";
            $temp_name = $_FILES['logo']['tmp_name'];

            $target_file = $file_path . basename($_FILES["logo"]["name"]);
            if(move_uploaded_file($temp_name, $target_file)){
              $logo_path= $target_file;
            }else{
              $result = array('result' => false, 'dhSession' => ["success" => "File Upload Error"]);
            }
        }


        $query=" UPDATE `company` SET  
                `name`              = '".$name."', 
                `tag`               = '".$tag."',  
                `address`           = '".$address."',  
                `phone`             = '".$phone."',  
                `email`             = '".$email."',  
                `pan_no`            = '".$pan_no."',  
                `logo_path`         = '".$logo_path."',  
                `hsc_code`          = '".$hsc_code."',   
                `gst_no`            = '".$gst_no."',   
                `inv_f_part`        = '".$inv_f_part."',
                `inv_l_part`        = '".$inv_l_part."',
                `inv_session_part`  = '".$inv_session_part."' WHERE
                `id`                = $id";

        if($mysqli->query($query)){
            $msg = "Successfully Updated";
            $result = array('result' => true, 'redirect' => 'company', 'dhSession' => ["success" => $msg]);
        } else {
            $result = array('result' => false, 'dhSession' => ["success" => "Sorry !! Try Again"]);
        }

        echo json_encode($result);
        exit;
    }



?>
<!doctype html>
<html lang="en">

<head>
    <?php include_once 'includes/style.php' ?>
</head>

<body>
    <?php include_once 'includes/header.php' ?>
    <div class="main-content" id="miniaresult">
    <div class="page-content">
    <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
    <div class="col-12">
    <div class="card">
    <div class="card-body">
    <form  method="post" class="dhForm" autocomplete="off">
    <input type="hidden" name="id" value="<?php echo (isset($row['id'])?$row['id']:'') ?>">
    <input type="hidden" name="logo_path" id="logo_path" value="<?php echo (isset($row['logo_path'])?$row['logo_path'] :'')?>">
    <div class="row g-3">
    <div class="col-md-4">
    <label for="">Company Name</label>
    <input type="text" name="name" id="name" value="<?php echo (isset($row['name'])?$row['name'] :'')?>" class="form-control" placeholder="Enter Company Name"/>
    </div>
    <div class="col-md-4">
    <label for="">Company Tag</label>
    <input type="text" name="tag" id="tag" value="<?php echo (isset($row['tag'])?$row['tag'] :'')?>" class="form-control"placeholder="Enter Company Tag">
    </div>
    <div class="col-md-4">
    <label for="">Address</label>
    <input type="text" name="address" id="address" value="<?php echo (isset($row['address'])?$row['address'] :'')?>" class="form-control"placeholder="Enter Address">
    </div>
    <div class="col-md-4">
    <label for="">Phone</label>
    <input type="text" name="phone" id="phone" value="<?php echo (isset($row['phone'])?$row['phone'] :'')?>" class="form-control"placeholder="Enter Phone">
    </div>

    <div class="col-md-4">
        <label for="">Email</label>
        <input type="text" name="email" id="email" value="<?php echo (isset($row['email'])?$row['email'] :'')?>" class="form-control"placeholder="Enter Email">
    </div>

    <div class="col-md-4 d-none">
        <label for="">PAN Number</label>
        <input type="text" name="pan_no" id="pan_no" value="<?php echo (isset($row['pan_no'])?$row['pan_no'] :'')?>" class="form-control"placeholder="Enter PAN Number">
    </div>

    <div class="col-md-4 d-none">
        <label for="">HSC Code</label>
        <input type="text" name="hsc_code" id="hsc_code" value="<?php echo (isset($row['hsc_code'])?$row['hsc_code'] :'')?>" class="form-control"placeholder="Enter HSC Code">
    </div>

    <div class="col-md-4">
        <label for="">GST No</label>
        <input type="text" name="gst_no" id="gst_no" value="<?php echo (isset($row['gst_no'])?$row['gst_no'] :'')?>" class="form-control"placeholder="Enter GST No">
    </div>
    <div class="col-md-4 d-none">
        <label for="">Invoice First Part</label>
        <input type="text" name="inv_f_part" id="inv_f_part" value="<?php echo (isset($row['inv_f_part'])?$row['inv_f_part'] :'')?>" class="form-control"placeholder="Enter Invoice First Part">
    </div>
    <div class="col-md-4 d-none">
        <label for="">Invoice Middle Part</label>
        <input type="text" name="inv_l_part" id="inv_l_part" value="<?php echo (isset($row['inv_l_part'])?$row['inv_l_part'] :'')?>" class="form-control"placeholder="Enter Invoice Middle Part">
    </div>
    <div class="col-md-4 d-none">
        <label for="">Invoice Last Part</label>
        <input type="text" name="inv_session_part" id="inv_session_part" value="<?php echo (isset($row['inv_session_part'])?$row['inv_session_part'] :'')?>" class="form-control"placeholder="Enter Invoice Last Part">
    </div>
    <div class="col-md-4">
        <label for="">Change Logo (Max-Size : 500KB)</label>
        <input type="file" name="logo" id="logo" class="form-control"placeholder="">
    </div>

    <div class="col-md-12 text-end">
        <img src=" <?php echo (isset($row['logo_path'])?$row['logo_path'] :'')?>" alt="" width="250px">
    </div>

    <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle me-2"></i>SUBMIT DETAILS</button>
    </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    <!-- end page title -->

    </div> <!-- container-fluid -->
    </div>
    </div>

    <?php include_once 'includes/footer.php' ?>
</body>

</html>