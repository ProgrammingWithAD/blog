<?php

    include 'includes/db_config.php';
    $thisPageTitle = 'Login';
    $company=company_details();
    function generateCaptcha(){
        return rand(1000, 9999);
    }

    if(isset($_POST['submit'])){
        if(empty($_POST['user_email'])){
            $result = array('result' => false, 'dhSession' => ["error" => "Please Enter Username"]);
            echo json_encode($result);
            exit;
        }
        elseif(empty($_POST['password'])){
            $result = array('result' => false, 'dhSession' => ["error" => "Please Enter Password"]);
            echo json_encode($result);
            exit;
        }
        elseif(empty($_POST['captcha'])){
            $result = array('result' => false, 'dhSession' => ["error" => "Please Enter Captcha"]);
            echo json_encode($result);
            exit;
        }



        if($_SESSION['captcha']==$_POST['captcha']){
            $user_email=filtervar($mysqli,$_POST['user_email']);
            $password=md5(filtervar($mysqli,$_POST['password']));
            $sql="SELECT * FROM `users`  WHERE user_email='".$user_email."' AND password='".$password."'";
            $query=$mysqli->query($sql);
            $rowCount=$query->num_rows;
            //If the result matched $username and $password, table row must be 1 row
            if($rowCount==1){
                $fetch=mysqli_fetch_assoc($query);
                $_SESSION['login'] = array('user_email'=>$fetch['user_email'],'user_name'=>$fetch['name'],'user_id'=>$fetch['id'],'user_role'=>$fetch['role']);

                $result = array('result' => true, 'redirect' => 'dashboard', 'dhSession' => ["success" => "WELCOME " .$_SESSION['login']['user_name']. ""]);

            }else{
                $result = array('result' => false,'dhSession' => ["error" => "Username and Password Mismatched"]);
            }
        }else{

            $result = array('result' => false,'redirect' => '','dhSession' => ["error" => "Captcha Mismatched"]);
            echo json_encode($result);
            $_SESSION['captcha']=generateCaptcha();
            exit;

        }
        echo json_encode($result);
        exit;
    }

    $_SESSION['captcha']=generateCaptcha();


?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title><?=$thisPageTitle?> | <?=$thisSoftware;?></title>
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
<link rel="stylesheet" href="assets/libs/flatpickr/flatpickr.css?v=1.1" /><style type="text/css">
  .login-screen .login-logo{
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
            <input type="text" name="user_email" class="form-control nocase" placeholder="Username"/>
          </div>

          <div class="form-group">
            <input type="password" name="password" class="form-control nocase" placeholder="Password" />
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



    <footer class="main-footer">
     <div class="row">
        <div class="col">© <?php echo $company['name'] ?></div>
        <div class="col text-right"><a href="https://webihqsolutions.in/" target="_blank" class="text-white font-weight-bold">WEBI-HQ Solutions</a></div>
     </div>
    </footer>

    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/moment.js"></script>
    <!-- Notification -->
    <!-- <script src="https://nfcoperations.in/js/notify.js"></script> -->
    <!-- Parsley -->
    <!-- <script src="https://nfcoperations.in/js/parsley.js"></script> -->
    <!-- Main Js Required -->
    <script src="assets/js/main.js"></script>
    <!-- Custom Js Required -->
    <script src="assets/dhScript.js?v=1"></script>

    <script type="text/javascript">
       function change_captcha(){
          var image ='<img src="captcha_image.php?'+ new Date().getTime()+'" />';
          $(".captcha-image").html(image);
          $("#captcha").val('');
       }
    </script>


</body>

</html>