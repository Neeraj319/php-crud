<?php

include_once "base.html";

include_once "db.php";
?>

<div class="container">
    <?php
    $uri = explode("/", $_SERVER["REQUEST_URI"]);
    $id = $uri[count($uri) - 1];
    $query = "select * from blog where id = $id";
    $row = $conn->query($query)->fetch_assoc();
    ?>
    <div class="p-5 mb-4 bg-light rounded-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">
                <?php
                echo $row["title"];
                ?> </h1>
            <p class="fs-4" style="white-space:pre-wrap">
                <?php
                echo $row["body"]
                ?></p>
            <span>
                written_on : <?php echo $row['written_on'] ?>
            </span>
        </div>
    </div>

</div>