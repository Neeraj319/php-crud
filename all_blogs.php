<?php
include_once "base.html";
include_once "db.php";
?>
<div class="container">
    <div class="row">
        <?php
        $query = "select * from blog;";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $link = "blog_detail.php/" . $row["id"];
            $html = "<div class='col-sm-6'>
        <div class='card'>
                <div class='card-body'>
                    <h5 class='card-title'>" . $row['title'] . "</h5>
                    <p class='card-text'>" . substr($row["body"], 0, 150) . "...</p>
                    <small> posted on: " . $row["written_on"] . "</small>
                    <br>
                    <input type = 'hidden' value = '" . $row["id"] . "'>
                    <a href='/blog_with_php/" . $link . "' class='btn btn-primary'>view blog</a>
                    <a href='/blog_with_php/" . "edit_blog.php/" . $row['id'] .  "' class='btn btn-success'>edit blog</a>
                    <button type = 'submit'  class='btn btn-danger' id = 'delete-btn'>delete blog</button>
                </div>
            </div>
        </div>
        ";
            echo $html;
        } ?>

    </div>

</div>

<script>
    const delete_btn = document.querySelectorAll("#delete-btn");
    for (let i = 0; i < delete_btn.length; i++) {
        delete_btn[i].addEventListener("click", function(e) {
            let id = e.target.parentElement.children[4].value;
            if (confirm("are you sure you want to delete this blog?")) {
                const url = "/blog_with_php/delete_blog.php/" + id;
                window.location.href = url;
            }
        })
    }
</script>