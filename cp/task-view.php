<?php
include 'includes/after_login.php';
$thisPageTitle = 'Common';

if(isset($_REQUEST['e_id'])){
    $id         = filtervar($mysqli, $_REQUEST['e_id']);
    $user_id=$_SESSION['login']['user_id'];
    $get_result = $mysqli->query("SELECT * FROM `task` WHERE `id`='$id' AND `user_id`='$user_id'");
    if($get_result->num_rows){
        $row = $get_result->fetch_assoc();
        $action = "UPDATE";
    }else{
        echo '<script>window.history.back();</script>'; exit;
    }
  }


if(isset($_POST['submit'])){
    $id = isset($_POST['id']) ? filtervar($mysqli, $_POST['id']) : '';

    $task_status=filtervar($mysqli,($_POST['task_status']));
    
    
    $data = "`status` = '$task_status'";

    
        $query = "UPDATE `task` SET $data WHERE `id`='$id'";
        $msg = "Successfully Updated";
    

    if($mysqli->query($query)){
       $result = array('result' => true, 'redirect' => 'task', 'dhSession' => ["success" => $msg]);
    }else{
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
    <div class="card-header">
    <h4>Task Details</h4>
    </div>
    <div class="card-body">
        <h1>Task Title : <?php echo $row['title']?></h1>
<hr>
<h1>Description :</h1>
        <article><?php echo html_entity_decode(html_entity_decode($row['description'])) ?></article><hr><br>

        <h3>End Date : <?php echo $row['due_date'] ?></h3><hr>
        <form class="dhForm" method="post">
    <input type="hidden" name="id" value="<?php echo (isset($row['id'])&&!empty($row['id'])?$row['id']:'') ?>">
    <input type="hidden" name="form_action" id="form_action" value="UPDATE">

            <div class="row">
                <div class="col-md-4">
                <label for="">Status</label>
        <select name="task_status" id="task_status" class="form-select">
            <option value="" >Select Status</option>
            <option value="1" <?php echo (isset($row['status'])&& $row['status']==1)?'selected':'' ?>>To Do</option>
            <option value="2" <?php echo (isset($row['status'])&& $row['status']==2)?'selected':'' ?>>In Progress</option>
            <option value="3" <?php echo (isset($row['status'])&& $row['status']==3)?'selected':'' ?>>Done</option>
        </select>
                </div>
                <div class="col-md-12  text-center">
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