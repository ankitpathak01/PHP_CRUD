<?php
$servername='localhost';
$username="root";
$password='';
$database="php_users";

$conn=mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die('Database connection failed'.mysqli_connect_error());
}


?>