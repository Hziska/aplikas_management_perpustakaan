<?php
require "../config/koneksi.php";
session_start();

// jika tombol masuk/login di klik
if(isset($_POST["submit"])){
// tangkap nilai
$email = htmlspecialchars($_POST["email"]);
$password = mysqli_real_escape_string($conn,$_POST["password"]);
// cek email
$query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
if(mysqli_num_rows($query) === 1){
  // ambil data password dri db
  $result = mysqli_fetch_array($query);
  
  // cek kesamaan password
  if(password_verify($password, $result["password"])){
  //  set sessionnya
    $_SESSION["login"] = true;

    // pindah ke page utama
    header("Location: ../index.php");
    exit;
  }
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>login page</title>
</head>
<body>

    <section class="gradient-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5">
      
                  <div class="mb-md-2 mt-md-4 ">
      
                    <h2 class="fw-bold mb-2 text-uppercase text-center">Login</h2>
                    <p class="text-white-50 mb-5">Tolong masukan Username dan Password anda!</p>
      
                    <!-- form -->
                  <form action="" method="post">
                  <!-- <div data-mdb-input-init class="form-outline form-white mb-4">
                      <label class="form-label" for="username">Username</label>
                      <input type="text" id="username" name="username" class="form-control form-control-lg" />
                    </div> -->

                    <div data-mdb-input-init class="form-outline form-white mb-4">
                      <label class="form-label" for="email">Email</label>
                      <input type="email" id="email" name="email" class="form-control form-control-lg" />
                    </div>
      
                    <div data-mdb-input-init class="form-outline form-white mb-4">
                      <label class="form-label" for="password">Password</label>
                      <input type="password" id="password" name="password" class="form-control form-control-lg" />
                    </div>
      
      
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5 mt-4 m-auto" type="submit" name="submit">Login</button>
                  </form>
      
                  <div class="m-3 pt-4">
                    <p class="mb-0 text-center">Tidak punya akun? <a href="signup.php" class="text-white-50 fw-bold">Sign Up</a>
                    </p>
                  </div>
                  </div>
      
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    
</body>
</html>