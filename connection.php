<?php

$HOST    = "localhost";
$USER    = "root";
$PW      = "";
$DB_NAME = "ecommerce";

$connect = new mysqli($HOST, $USER, $PW, $DB_NAME);

if ($connect->connect_error) {
    die('Error connection to database' . $connect->connect_error);
} 