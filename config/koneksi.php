<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "perpustakaan";

$conn = mysqli_connect($servername,$username,$password,$db_name);

if(!$conn){
    echo"koneksi gagal";
}

?>