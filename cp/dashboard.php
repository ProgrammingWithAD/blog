<?php
include 'includes/after_login.php';
$thisPageTitle = 'Dashboard';

$sql = "SELECT * FROM `task` WHERE 1";
$user_id = $_SESSION['login']['user_id'];
?>
<!doctype html>
<html lang="en">

<head>
  <?php include_once 'includes/style.php' ?>
  <style type="text/css">
    .card-link {
      text-decoration: none;
    }

    .card-link:hover .card {
      transform: scale(1.05);
      transition: transform 0.3s ease;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
      border: 1px solid #ccc;
    }

    .card {
      border: 1px solid #dee2e6;
      transition: box-shadow 0.3s ease;
    }

    .card-body {
      background-color: #fff;
      border-top: 1px solid #dee2e6;
    }

    @media (min-width: 992px) {
      .row {
        margin-top: 80px;
      }
    }
  </style>
</head>

<body>
  <?php include_once 'includes/header.php' ?>
  <div class="main-content" id="miniaresult">
    <div class="page-content">
      <div class="container-fluid">

        <!-- start page title -->
        <div class="row justify-content-center ">

          <div class="col-xl-3 col-md-6">
            <a href="vehicles" class="card-link">
              <div class="card card-h-100">
                <div class="card-body">
                  <div class="d-block text-center">
                    <h1><?php $task_sql = (admin_access($_SESSION['login']['user_id'])) ? $sql : $sql . " AND `user_id`='$user_id'";
                        $query = $mysqli->query($task_sql);
                        echo $query->num_rows;
                        ?></h1>
                  </div>
                  <h2 class="mb-0 text-muted lh-1 d-block text-truncate text-center">BLOG Task</h2>
                </div>
              </div>
            </a>
          </div>

          <div class="col-xl-3 col-md-6">
            <a href="bill-entry" class="card-link">
              <div class="card card-h-100">
                <div class="card-body">
                  <div class="d-block text-center">
                    <h1><?php $task_sql = (admin_access($_SESSION['login']['user_id'])) ? $sql . " AND `status`=2" : $sql . " AND `user_id`='$user_id' AND `status`=2";
                        $query = $mysqli->query($task_sql);
                        echo $query->num_rows;
                        ?></h1>
                  </div>
                  <h2 class="mb-0 text-muted lh-1 d-block text-truncate text-center">BLOG In Process</h2>
                </div>
              </div>
            </a>
          </div>

          <div class="col-xl-3 col-md-6">
            <a href="bill-list" class="card-link">
              <div class="card card-h-100">
                <div class="card-body">
                  <div class="d-block text-center">
                    <h1><?php $task_sql = (admin_access($_SESSION['login']['user_id'])) ? $sql . " AND `status`=3" : $sql . " AND `user_id`='$user_id' AND `status`=3";
                        $query = $mysqli->query($task_sql);
                        echo $query->num_rows;
                        ?></h1>
                  </div>
                  <h2 class="mb-0 text-muted lh-1 d-block text-truncate text-center">BLOG Done</h2>
                </div>
              </div>
            </a>
          </div>

        </div>

        <!-- end page title -->

      </div> <!-- container-fluid -->
    </div>
  </div>

  <?php include_once 'includes/footer.php' ?>

</body>

</html>