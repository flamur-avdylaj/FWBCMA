<?php
$DATABASE_HOST = "localhost";
$DATABASE_USER = "id22229389_root";
$DATABASE_PASS = "UPcs2024.";
$DATABASE_NAME = "id22229389_databaza";
$conn=mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit("Failed to connect to MySql ". mysqli_connect_error());
}