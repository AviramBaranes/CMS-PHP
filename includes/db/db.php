<?php 
include 'variables.php';

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if(!$connection){
    echo 'db connection failed';
}