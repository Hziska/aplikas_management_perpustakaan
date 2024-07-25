<?php
require 'koneksi.php';

// tampilkan data
function query($query){
    global $conn;

    $result = mysqli_query($conn,$query);
    
    // simpan data ke wadah baru
    // buat wadah baru
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    // kembalikan nilai dri wadah baru
    return $rows;
}

// upload
function upload(){
    // ambil data dari gambar
    $nama_gambar = $_FILES["gambar"]["name"];
    $error = $_FILES["gambar"]["error"];
    $tmp = $_FILES["gambar"]["tmp_name"];
    $size = $_FILES["gambar"]["size"];

    // cek apakah ada gambar di upload atau tidak
    if($error === 4){
        return 'noimg.jpg';
    }

    // cek format gambar
    // buat format
    $format_gambar_valid = ['jpg','png','jpeg'];
    // pisahkan gambar dengan format
    $format_gambar = explode('.',$nama_gambar);
    // ambil formatnya
    $format_gambar = strtolower(end($format_gambar));
    // cek eksteknsi gambar
    if(!in_array($format_gambar,$format_gambar_valid)){
        echo "<script>
        alert('ekstensi tidak mendukung');
        </script>";
        return false;
    }

    // cek ukuran gambar
    if($size > 2000000){
        echo"<script>
        alert('ukuran gambar terlalu besar');
        </script>";
        return false;
    }

    // acak nama file
    $nama_gambar_baru = uniqid();
    $nama_gambar_baru .= '.';
    $nama_gambar_baru .= $format_gambar;

    // pindahkan file ke direktori baru
    move_uploaded_file($tmp,'../img/'. $nama_gambar_baru);

    // kemblikan nilai gambar baru
    return $nama_gambar_baru;

}

// fungsi tambah
function tambah($data){
    global $conn;

    // ambil semuda data yang dibutuh kan
    $judul = $data["judul"];
    $pengarang = $data["pengarang"];
    $tahun_terbit = $data["tahun"];
    $gendre = $data["gendre"];
    $gambar = upload();
    if(!$gambar){
        return false;
    }

    // tambah data ke database
    $query = mysqli_query($conn,"INSERT INTO books VALUES ('','$judul','$pengarang','$tahun_terbit','$gendre','$gambar')");

    // kembalikan nilai jika ada data di db yg di rubah
    return mysqli_affected_rows($conn);

}

// fungsi edit
function edit($data){
    global $conn;
    // ambil semuda data yang dibutuh kan
    $id = $data["id"];
    $judul = $data["judul"];
    $pengarang = $data["pengarang"];
    $tahun_terbit = $data["tahun"];
    $gendre = $data["gendre"];
    $gambar_lama = $data["gambar_lama"];

    // jika tidak ada gambar yg di upload maka pakai gambar lama
    if($_FILES["gambar"]["error"]){
        $gambar = $gambar_lama;
    }else{
        $gambar = upload();
    }

    mysqli_query($conn, "UPDATE books set
        judul = '$judul',
        pengarang = '$pengarang',
        tahun_terbit = '$tahun_terbit',
        gendre = '$gendre',
        gambar = '$gambar'
        WHERE id = $id
    ");

    return mysqli_affected_rows($conn);
}

// fungsi hapus
function hapus($id){
    global $conn;

    mysqli_query($conn,"DELETE FROM books WHERE id = $id");
    return mysqli_affected_rows($conn);
}

// funsgi cari
function cari($keyword){
    global $conn;

    $query = "SELECT * FROM books WHERE 
    judul LIKE '%$keyword%' OR 
    pengarang LIKE '%$keyword%' OR 
    tahun_terbit LIKE '%$keyword%' OR 
    gendre LIKE '%$keyword%'";
    return query($query);
}


// fungsi singup
function signup($data){
    global $conn;
    // ambil data yang diperlukan
    $username = htmlspecialchars(stripslashes($data["username"]));
    $email = htmlspecialchars(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $konfirmasi_password = mysqli_real_escape_string($conn,$data["konfirmasi"]);

    // cek apakah ada email yang sama
    $result = mysqli_query($conn,"SELECT email FROM users email WHERE email='$email'");
    if(mysqli_fetch_assoc($result)){
        echo "
         <script>
         alert('uaername sudah terdaftar')
         </script>
       ";
       return false;
    }

    // cek konfirmasi password
    if($password !== $konfirmasi_password){
        return false;
    }

    // hash password
    $password =password_hash($password,PASSWORD_DEFAULT);

    // masukan data
    mysqli_query($conn,"INSERT INTO users VALUES('','$username','$email','$password')");

return mysqli_affected_rows($conn); 
}
?>