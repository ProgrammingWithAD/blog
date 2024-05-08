<?php
include 'includes/db_config.php';
$thisPageTitle = 'Login';
$company = company_details();
function generateCaptcha()
{
    return rand(1000, 9999);
}

if (isset($_POST['submit'])) {
    if (empty($_POST['user_name'])) {
        $result = array('result' => false, 'dhSession' => ["error" => "Please Enter Name"]);
        echo json_encode($result);
        exit;
    } elseif (empty($_POST['user_email'])) {
        $result = array('result' => false, 'dhSession' => ["error" => "Please Enter Email"]);
        echo json_encode($result);
        exit;
    } elseif (empty($_POST['password'])) {
        $result = array('result' => false, 'dhSession' => ["error" => "Please Enter Password"]);
        echo json_encode($result);
        exit;
    } elseif (empty($_POST['user_phone'])) {
        $result = array('result' => false, 'dhSession' => ["error" => "Please Enter Phone"]);
        echo json_encode($result);
        exit;
    } elseif (empty($_POST['gender'])) {
        $result = array('result' => false, 'dhSession' => ["error" => "Please Select Gender"]);
        echo json_encode($result);
        exit;
    } elseif (empty($_POST['user_abot'])) {
        $result = array('result' => false, 'dhSession' => ["error" => "Please Enter Something About You"]);
        echo json_encode($result);
        exit;
    } elseif (empty($_POST['captcha'])) {
        $result = array('result' => false, 'dhSession' => ["error" => "Please Enter Captcha"]);
        echo json_encode($result);
        exit;
    }



    if ($_SESSION['captcha'] == $_POST['captcha']) {
        $user_name = filtervar($mysqli, $_POST['user_name']);
        $user_phone = filtervar($mysqli, $_POST['user_phone']);
        $user_email = filtervar($mysqli, $_POST['user_email']);
        $password = md5(filtervar($mysqli, $_POST['password']));
        $tmp_pass   = filtervar($mysqli, $_POST['password']);
        $role   = filtervar($mysqli, $_POST['role']);

        $gender = filtervar($mysqli, $_POST['gender']);
        $user_abot = filtervar($mysqli, $_POST['user_abot']);
        $data     = "   `name`       = '$user_name',
                        `phone`      = '$user_phone',
                        `user_email` = '$user_email',
                        `password`   = '$password',
                        `tmp_pass`   = '$tmp_pass',
                        `gender`   = '$gender',
                        `about`   = '$user_abot',
                        `role`       = '$role'  ";
        $sql = "INSERT INTO `users` SET $data";

        $query = $mysqli->query($sql);
        if ($query) {
            $msg = "User Registerd";
            $result = array('result' => true, 'redirect' => 'dashboard', 'dhSession' => ["success" => $msg]);
        } else {
            $msg = "Some error";
            $result = array('result' => true, 'redirect' => '', 'dhSession' => ["success" => $msg]);
        }
    } else {

        $result = array('result' => false, 'redirect' => '', 'dhSession' => ["error" => "Captcha Mismatched"]);
        echo json_encode($result);
        $_SESSION['captcha'] = generateCaptcha();
        exit;
    }
    echo json_encode($result);
    exit;
}

$_SESSION['captcha'] = generateCaptcha();


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Sample Blog | Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="images/favicon.png">
    <!-- flatpicker css -->
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="assets/css/bootstrap2.min.css?v=1.1">

    <!-- Icomoon Font Icons css -->
    <link rel="stylesheet" href="assets/fonts/style.css?v=1.1">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/main2.css?v=1.1">
    <!-- custom.css-->
    <link rel="stylesheet" href="assets/css/dh-custom.css?v=1.1">
    <!--Font Awesome-->
    <link rel="stylesheet" href="assets/libs/fontawesome/css/all.min.css?v=1.1" />

    <!-- Data Tables -->
    <link rel="stylesheet" href="assets/libs/datatables/dataTables.bs4.css?v=1.1" />
    <link rel="stylesheet" href="assets/libs/datatables/dataTables.bs4-custom.css?v=1.1" />

    <!-- Datepicker css -->
    <link rel="stylesheet" href="assets/libs/flatpickr/flatpickr.css?v=1.1" />
    <style type="text/css">
        .login-screen .login-logo {
            margin: 0px;
            display: inline-block;
            font-size: 2.5rem;
            font-weight: 700;
            width: 50%;
            margin-left: 25%;
        }
    </style>
</head>

<body>
    <div class="authentication">
        <!-- Container start -->
        <div class="container">

            <form action="" method="POST" class="dhForm">
                <input type="hidden" name="role" value="<?php echo (isset($row['role']) && !empty($row['role']) ? $row['role'] : 'EMPLOYEE') ?>">

                <div class="row justify-content-end">
                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                        <div class="login-screen">
                            <div class="login-box">
                                <a href="javascript:void(0)" class="login-logo mb-3">
                                    <img src="<?php echo $company['logo_path'] ?>" alt="Logo" style="width: 100%;">
                                    <!-- NEW LIFE FERTILITY CENTRE -->
                                </a>
                                <h5 style="text-align: center;"><b>Please Login to Continue</b></h5>
                                <div class="form-group">
                                    <input type="text" name="user_name" class="form-control nocase" placeholder="Name" />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="user_email" class="form-control nocase" placeholder="Username" />
                                </div>

                                <div class="form-group">
                                    <input type="password" name="password" class="form-control nocase" placeholder="Password" />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="user_phone" class="form-control nocase" placeholder="Phone" />
                                </div>
                                <div class="form-group">
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option>
                                        <option value="O">Others</option>
                                    </select>
                                    <!-- <input type="text" name="user_phone" class="form-control nocase" placeholder="Phone"/> -->
                                </div>
                                <div class="form-group">
                                    <input type="text" name="user_abot" class="form-control nocase" placeholder="About" />
                                </div>

                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" id="captcha" name="captcha" class="form-control numInputLogin" placeholder="Enter Captcha Here">
                                        <div class="input-group-append captcha-image">
                                            <span class="input-group-text bg-primary text-white"><?php echo $_SESSION['captcha'] ?></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="actions">
                                    <a href="forgot-password" style="display: none;">Recover password</a>
                                    <button type="submit" name="submit" class="btn btn-info">Login</button>
                                </div>
                                <!-- <hr><div class="m-0"><span class="additional-link">No account? <a href="signup.html" class="btn btn-secondary">Signup</a></span></div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php include("includes/footer.php"); ?>