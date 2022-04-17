<?php
include "base.html";
include "db.php";
$uri = explode("/", $_SERVER["REQUEST_URI"]);
$id = $uri[count($uri) - 1];
$query = "select * from blog where id = $id;";
$row = $conn->query($query)->fetch_assoc();


if ($_POST) {
    $title = $_POST["title"];
    $body = $_POST["body"];
    if ($title == "" || $body == "") {
        echo "<div class='alert alert-danger'>
        <strong>Error!</strong> Please fill all the fields.
        </div>";
    } else {
        $query = "UPDATE blog set title = ? , body = ? WHERE id = ?;";
        $conn->prepare($query)->execute([$title, $body, $id]);
        echo "<div class='alert alert-success'>
        <strong>Success!</strong> Blog updated successfully.
        </div>";
        header("Location: /blog_with_php/blog_detail.php/$id");
    }
}
?>
<div class="container">
    <form action="<?php $_PHP_SELF ?>" method="post">
        <div class="mb-3">
            <label class="form-label">Title of Blog</label>
            <input type="text" name="title" class="form-control" value="<?php echo $row["title"]; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Body</label>
            <textarea name="body" class="form-control" rows="15">
                <?php
                echo $row["body"];
                ?>
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Blog</button>
    </form>
</div>