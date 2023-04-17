<?php
$servername = "localhost";
$username ="form";
$password = "123";
$dbname = "form";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die ("connection failed: " . mysqli_connect_error());
}
?>