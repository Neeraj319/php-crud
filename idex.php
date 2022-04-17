<?php
include_once "db.php";
include_once "base.html";

?>
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://images.unsplash.com/photo-1495446815901-a7297e633e8d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" height="500" width="520" style="object-fit: cover !important; " class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Don’t try to plan everything out to the very last detail. I’m a big believer in just getting it out there: create a minimal viable product or website, launch it, and get feedback.</h5>
            </div>
        </div>
        <div class="carousel-item">
            <div class="carousel-caption d-none d-md-block">
                <h5>
                    Blogging is just writing — writing using a particularly efficient type of publishing technology.
                </h5>
            </div>
            <img src="https://images.unsplash.com/photo-1497633762265-9d179a990aa6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1473&q=80" height="500" width="520" style="object-fit: cover !important;" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <div class="carousel-caption d-none d-md-block">
                <h5>
                    Blogs are whatever we make them. Defining Blog is a fool’s errand.
                </h5>
            </div>
            <img src="https://images.unsplash.com/photo-1610116306796-6fea9f4fae38?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" height="500" width="520" style="object-fit: cover !important;" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container my-2">
    <h1 style="text-align : center;">
        Read Our Latest Blogs
    </h1>
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
                    <a href='/blog_with_php/" . $link . "' class='btn btn-danger'>read blog</a>
                </div>
            </div>
        </div>
        ";
            echo $html;
        } ?>

    </div>

</div>