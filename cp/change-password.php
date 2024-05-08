<?php
include 'includes/after_login.php';
$thisPageTitle = 'Change Password';

if(isset($_POST['submit'])) { 
$old_password=filtervar($mysqli,$_POST['old_password']);
$new_password=filtervar($mysqli,$_POST['new_password']);
$confirm_password=filtervar($mysqli,$_POST['confirm_password']);    
// check if confirm pass and new pass are same or not
if($new_password !=$confirm_password) {
$msg="New Password And Confirm Password not Same";
$res_msg=false;
}else{
// check id the old_password id correct
$sql=$mysqli->query("SELECT password FROM users WHERE id='".$_SESSION['login']['user_id']."'");
$fetch=$sql->fetch_assoc();
if($fetch['password']!==md5($old_password)) {
    $msg="Old Password is Incorrect";
    $res_msg=false;    
} else {
$di_sql="UPDATE users SET password='".md5($new_password)."', tmp_pass='".$new_password."' WHERE id='".$_SESSION['login']['user_id']."'";
    $query=$mysqli->query($di_sql);
    if($query){
$msg="Password Changed Successfully";   
$res_msg=true; 
    }else{
$msg="Error Occurred While Changing Password";  
$res_msg=false;
    }
    
}
}
$result = array('result' => $res_msg, 'redirect' => 'change-password', 'dhSession' => ["success" => $msg]);
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
<form class="dhForm" method="post" autocomplete="off">
<div class="row g-3">
    <div class="col-md-4">
        <label for="">Old Password</label>
        <input type="text" class="form-control nocase" name="old_password" id="old_password" placeholder="Old Password">
    </div>
    <div class="col-md-4">
        <label for="">New Password</label>
        <input type="text" class="form-control nocase" name="new_password" id="new_password" placeholder="New Password">
    </div>
    <div class="col-md-4">
        <label for="">Confirm Password</label>
        <input type="text" class="form-control nocase" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
    </div>
    <div class="col-md-12 text-center">
    <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle me-2"></i>SUBMIT DETAILS</button>
    </div>
</div>

</form>
                </div>
            </div>
            <!-- end page title -->

        </div> <!-- container-fluid -->
    </div>
</div>

<?php include_once 'includes/footer.php' ?>
</body>
</html>