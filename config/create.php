<?php
require 'functions.php';

// ketika button tambah di klik 
if(isset($_POST["submit"])){
    if(tambah($_POST) > 0){
        echo"
        <script>
        alert('data berhasil di tambah')
         location.href= '../index.php'
        </script>
        ";

    }else{
        echo"
        <script>
        alert('data gagal di tambah')
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
    <title>form tambah data</title>
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
                <h3>Form Tambah data</h3>
            </div>

            <form action="" method="post" enctype="multipart/form-data" class="shadow p-4">                  
                <div class="mb-3">
                    <label class="mb-2" for="judul">judul buku</label>
                    <input required type="text" class="form-control" name="judul" id="judul">
                </div>

                <div class="mb-3">
                    <label class="mb-2" for="pengarang">pengarang</label>
                    <input required type="text" class="form-control" name="pengarang" id="pengarang">
                </div>

                <div class="mb-3">
                    <label class="mb-2" for="tahun">tahun terbit</label>
                    <input required type="text" class="form-control" name="tahun" id="tahun">
                </div>
                <div class="mb-3">
                    <label class="mb-2" for="gendre">gendre buku</label>
                     <select name="gendre" id="gendre" class="form-control">
                        <option selected>pilih gendre</option>
                        <option value="action">action</option>
                        <option value="romance">romance</option>
                        <option value="adventure">adventure</option>
                        <option value="drama">drama</option>
                        <option value="study">study</option>
                     </select>
                </div>
                <div class="mb-3">
                    <label class="mb-2" for="gambar">gambar buku</label>
                    <input type="file" class="form-control" name="gambar" id="gambar">
                </div>



                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="submit">tambah</button>
                </div>

            </form>
        </div>
    </div>
</div>
</body>
</html>