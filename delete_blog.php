<?php
include "base.html";
include "db.php";
$uri = $_SERVER['REQUEST_URI'];
$uri = explode("/", $uri);
$blog_id = $uri[3];
$query = "delete from blog where id = $blog_id;";
$conn->query($query);
header("Location: /blog_with_php/all_blogs.php");
