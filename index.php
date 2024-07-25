<?php
require 'config/functions.php';

// data ini menghasilkan nilai array assoiatif
$books = query("SELECT * FROM books");


if(isset($_POST["keyword"])){
    $books = cari($_POST["keyword"]);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Simple Data Table</title>
<!-- style -->
 <link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
    img{
        width: 70px;
        height: 70px;
    }
</style>
</head>
<body>
<div class="container-xl">
    <!-- judul tabel -->
    <div class="table-title mt-5 p-2">
        <div class="row">
            <div class="col-sm-8 my-2"><h2>Data <b>Buku</b></h2></div>
        </div>

        <div class="row justify-content-between align-items-center">
             <!-- box search -->
             <div class="my-2">
                <div class="search-box">
                    <form action="" method="post">
                    <i class="material-icons">&#xE8B6;</i>
                    <input type="text" class="form-control" name="keyword" placeholder="Cari Buku&hellip;">
                    </form>
                </div>
            </div>
            <!-- tambah data -->
            <div class=" my-2">
                <div class="add_box">
                <a href="config/create.php" class="btn btn-primary mt-2 mb-4">
                Tambah data</a>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <div class="table-wrapper">

          
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar Buku</th>
                        <th>Judul Buku</i></th>
                        <th>Pengarang Buku</th>
                        <th>Tahun Terbit</i></th>
                        <th>Gendre Buku</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
            <?php
            // nilai untuk penambah nomor setiap 1 perulangan
            $i= 1;
            foreach($books as $book):
            ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><img src="img/<?= $book["gambar"]?>" alt="<?= $book["judul"]?>"></td>
                        <td><?= $book["judul"]; ?></td>
                        <td><?= $book["pengarang"]; ?></td>
                        <td><?= $book["tahun_terbit"]; ?></td>
                        <td><?= $book["gendre"]; ?></td>
                        <td>
                            <a href="config/update.php?id=<?= $book["id"]?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="config/delete.php?id=<?= $book["id"]?>" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons" onclick="return confirm('yakin hapus?')">&#xE872;</i></a>
                        </td>
                    </tr>
                    <?php
            $i++;
            endforeach;
            ?>
                </tbody>
                
            </table>
            
            <div class="clearfix">
                <!-- <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div> -->
                <!-- <ul class="pagination">
                    <li class="page-item disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                </ul> -->
            </div>
        </div>
    </div>  
</div>   


<script src="js/script.js"></script>
</body>
</html>