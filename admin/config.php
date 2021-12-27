<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "news_site";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    echo "Server failed to connect";
}
