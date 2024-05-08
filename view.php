<?php include("includes/header.php"); ?>
<?php
$id = $_GET['id'];
if ($id) {
    include("cp/includes/db_config.php");
    $sqlSelect = "SELECT * FROM posts WHERE id = $id";
    $result = mysqli_query($mysqli, $sqlSelect);
    while ($data = mysqli_fetch_array($result)) {
?>
        <div class="post bg-light p-4 mt-5">
            <h1><?php echo $data['title']; ?></h1>
            <p><?php echo $data['date']; ?> </p>
            <p><?php echo $data['content']; ?> </p>
        </div>
<?php
    }
} else {
    echo "No post found";
}
?>
<?php include("includes/footer.php"); ?>