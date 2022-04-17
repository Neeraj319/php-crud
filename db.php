<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "blog";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("connection error" . $conn->connect_error);
}
