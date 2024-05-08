<?php
include 'includes/after_login.php';
$thisPageTitle = 'BLOG';
$action = "ADD";

if (isset($_POST['submit'])) {
    $id = isset($_POST['id']) ? filtervar($mysqli, $_POST['id']) : '';
    $form_action = filtervar($mysqli, $_POST['form_action']);
    $title = filtervar($mysqli, ($_POST['title']));
    $description = filtervar($mysqli, htmlentities($_POST['description']));
    $data = "`date` = NOW(),
             `title` = '$title',
             `summary` = '$description',
             `content` = '$description'";

    if ($form_action == 'ADD') {
        $query = "INSERT INTO `posts` SET $data";
        $msg = "Successfully Inserted";
    } elseif ($form_action == 'UPDATE') {
        $query = "UPDATE `posts` SET $data WHERE `id`='$id'";
        $msg = "Successfully Updated";
    }

    if (!empty($query) && $mysqli->query($query)) {
        $result = array('result' => true, 'redirect' => 'task', 'dhSession' => ["success" => $msg]);
    } else {
        $result = array('result' => false, 'dhSession' => ["success" => "Sorry !! Try Again"]);
    }

    echo json_encode($result);
    exit;
}

if (isset($_REQUEST['e_id'])) {
    $id = filter_var($mysqli, $_REQUEST['e_id']);
    $get_result = $mysqli->query("SELECT * FROM `posts` WHERE `id`='$id'");
    if ($get_result->num_rows) {
        $row = $get_result->fetch_assoc();
        $action = "UPDATE";
    } else {
        echo '<script>window.history.back();</script>';
        exit;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <?php include_once 'includes/style.php' ?>
    <link rel="stylesheet" href="assets/libs/datatables/dataTables.bs4.css" />
    <link rel="stylesheet" href="assets/libs/jquery-ui/jquery-ui.css">
</head>

<body>
    <?php include_once 'includes/header.php' ?>
    <div class="main-content" id="miniaresult">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4><?php echo $action ?> <?php echo $thisPageTitle ?></h4>
                            </div>
                            <div class="card-body">
                                <form class="dhForm" method="post">
                                    <div class="row g-3">
                                        <input type="hidden" name="form_action" id="form_action" value="<?php echo $action ?>">
                                        <input type="hidden" name="id" value="<?php echo (isset($row['id']) && !empty($row['id']) ? $row['id'] : '') ?>">
                                        <div class="col-md-12 ">
                                            <label for="">Blog Title</label>
                                            <input type="text" class="form-control" name="title" id="title" value="<?php echo (isset($row['title'])) ? $row['title'] : '' ?>" placeholder="Enter Blog Title">
                                        </div>
                                        <div class="col-md-12 ">
                                            <label for="">Blog Description</label>
                                            <textarea class="form-control ckeditor" name="description" id="description" placeholder="Enter Blog Description"><?php echo (isset($row['summary'])) ? $row['summary'] : '' ?></textarea>
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
            </div> <!-- container-fluid -->
        </div>
    </div>
    <?php include_once 'includes/footer.php' ?>
    <script src="assets/libs/jquery-ui/jquery-ui.js"></script>
    <script src="assets/libs/datatables/dataTables.min.js"></script>
    <script src="assets/libs/datatables/dataTables.bootstrap.min.js"></script>
    <script src="assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('.ckeditor'))
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>