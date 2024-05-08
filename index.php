<?php include("includes/header.php"); ?>
<?php
    include("cp/includes/db_config.php");
    $sqlSelect = "SELECT * FROM posts";
    $result = mysqli_query($mysqli,$sqlSelect);
    while ($data = mysqli_fetch_array($result)) {
?>
    <div class="row mb-4 p-5 bg-light">
        <div class="col-sm-2">
            <?php echo $data["date"]; ?>
        </div>
        <div class="col-sm-3">
            <h2> <?php echo $data["title"]; ?></h2>
        </div>
        <div class="col-sm-5">
            <?php echo $data["content"]; ?>
        </div>
        <div class="col-sm-2">
            <a href="view.php?id=<?php echo $data['id']; ?>" class="btn btn-primary">READ MORE</a>
        </div>
    </div>
<?php
    }
?>
<?php include("includes/footer.php"); ?>
