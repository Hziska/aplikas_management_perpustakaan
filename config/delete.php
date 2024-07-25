<?php
require 'functions.php';
session_start();
if(!isset($_SESSION["login"])){
    header("Location: ../loginpage/login.php");
    exit;
}

$id = $_GET["id"];

if(hapus($id) > 0){
    echo"
    <script>
    alert('data berhasil di hapus')
     location.href= '../index.php'
    </script>
    ";

}else{
    echo"
    <script>
    alert('data gagal di hapus')
    </script>
    "; 
}
?>