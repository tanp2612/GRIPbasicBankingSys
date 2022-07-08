<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername,
$username,
$password);

$sql = "CREATE DATABASE bankingsys";
$sql = "USE bankingsys";
$result = mysqli_query($conn, $sql);

if (!$conn){
    die("connection failed".mysqli_connect_error());

}else{
    echo" ";
} 

?>