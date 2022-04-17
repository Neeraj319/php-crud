<?php
include "base.html";
include "db.php";
if ($_POST) {
    $title = $_POST["title"];
    $body = $_POST["body"];
    if ($title == "" || $body == "") {
        echo "<div class='alert alert-danger'>
        <strong>Error!</strong> Please fill all the fields.
        </div>";
    } else {
        $query = "insert into blog (title, body, written_on) values (?, ?, now());";
        $conn->prepare($query)->execute([$title, $body]);
        echo "<div class='alert alert-success'>
        <strong>Success!</strong> Blog added successfully.
        </div>";
        header("Location: /blog_with_php/all_blogs.php");
    }
}
?>
<div class="container">
    <form action="<?php $_PHP_SELF ?>" method="post">
        <div class="mb-3">
            <label class="form-label">Title of Blog</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Body</label>
            <textarea name="body" class="form-control" rows="7">
                </textarea>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>