<?php
require 'functions.php';
session_start();
if(!isset($_SESSION["login"])){
    header("Location: ../loginpage/login.php");
    exit;
}


// tangkap id dari get
$id = $_GET["id"];

$book = query("SELECT * FROM books WHERE id=$id")[0];
if(isset($_POST["submit"])){
    // cek apakah data berhasil di update
    if(edit($_POST) > 0){
        echo"
        <script>
        alert('data berhasil di update')
         location.href= '../index.php'
        </script>
        ";
    }else{
        echo"
        <script>
        alert('data gagal di update')
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form Edit data</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="mb-3">
                <h3>Form Edit data</h3>
            </div>

            <form action="" method="post" enctype="multipart/form-data" class="shadow p-4">     
                <input type="hidden" name="id" value="<?= $book["id"]?>">
                <input type="hidden" name="gambar_lama" value="<?= $book["gambar"]?>">
                <div class="mb-3">
                    <label class="mb-2" for="judul">judul buku</label>
                    <input type="text" class="form-control" name="judul" id="judul" value="<?= $book["judul"]?>">
                </div>

                <div class="mb-3">
                    <label class="mb-2" for="pengarang">pengarang</label>
                    <input type="text" class="form-control" name="pengarang" id="pengarang" value="<?= $book["pengarang"]?>">
                </div>

                <div class="mb-3">
                    <label class="mb-2" for="tahun">tahun terbit</label>
                    <input type="text" inputmode="numeric" class="form-control" name="tahun" id="tahun" value="<?= $book["tahun_terbit"]?>">
                </div>
                <div class="mb-3">
                    <label class="mb-2" for="gendre">gendre buku</label>
                    <select name="gendre" id="gendre" class="form-control">
                        <option >pilih gendre</option>
                        <option <?php if($book["gendre"] == 'action')echo "selected"?> value="action">action</option>
                        <option <?php if($book["gendre"] == 'romance')echo "selected"?> value="romance">romance</option>
                        <option <?php if($book["gendre"] == 'adventure')echo "selected"?> value="adventure">adventure</option>
                        <option <?php if($book["gendre"] == 'drama')echo "selected"?> value="drama">drama</option>
                        <option <?php if($book["gendre"] == 'study')echo "selected"?> value="study">study</option>
                     </select>
                </div>
                
                <div class="mb-3">
                    <label class="mb-2" for="gambar">gambar buku</label>
                    <input type="file" class="form-control" name="gambar" id="gambar">
                </div>


                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="submit">Edit</button>
                </div>

            </form>
        </div>
    </div>
</div>
</body>
</html>