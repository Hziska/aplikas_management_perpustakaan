<?php
require '../config/functions.php';

// ceck fungsi mengembalikan true or false
if(isset($_POST["submit"])){
  if(signup($_POST) > 0){
    echo "
      <script>
      alert('berhasil daftar')
      location.href = 'login.php'
      </script>
    ";
  exit;
  }else{
  //   echo "
  //   <script>
  //   alert('gagal daftar')
  //   </script>
  // ";
  $pesan = "gagal daftar";
  }
  $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Sign Up page</title>

    <!-- style errror -->
     <style>
       .error {
        animation: shake 1s;
        animation-timing-function: cubic-bezier(.36,.07,.19,.97);
    }
    @keyframes shake {
        10%, 90% {
            transform: translate3d(-1px, 0, 0);
        }
        20%, 80% {
            transform: translate3d(2px, 0, 0);
        }
        30%, 50%, 70% {
            transform: translate3d(-4px, 0, 0);
        }
        40%, 60% {
            transform: translate3d(4px, 0, 0);
        }
    }
     </style>
</head>
<body>

    <section class="gradient-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5">
      
                  <div class="mb-md-2 mt-md-4 ">
      
                    <h2 class="fw-bold mb-2 text-uppercase text-center">Sign Up</h2>
                    <p class="text-white-50 mb-5 text-center">Daftar kan akun anda di aplikasi kami!</p>

                    <?php
                    if(isset($error)):
                    ?>
                    <p class="text-danger text-center fw-semibold error"><?= $pesan; ?></p>
                    <?php
                    endif;
                    ?>
      
                    <!-- form -->
                  <form action="" method="post">
                  <div data-mdb-input-init class="form-outline form-white mb-4">
                      <label class="form-label" for="username">Username</label>
                      <input type="text" id="username" name="username" class="form-control form-control-lg" />
                    </div>

                    <div data-mdb-input-init class="form-outline form-white mb-4">
                      <label class="form-label" for="email">Email</label>
                      <input type="email" id="email" name="email" class="form-control form-control-lg" />
                    </div>
      
                    <div data-mdb-input-init class="form-outline form-white mb-4">
                      <label class="form-label" for="password">Password</label>
                      <input type="password" id="password" name="password" class="form-control form-control-lg" />
                    </div>
      
                    <div data-mdb-input-init class="form-outline form-white mb-4">
                      <label class="form-label" for="konfirmasi">Konfirmasi Password</label>
                      <input type="password" id="konfirmasi" name="konfirmasi" class="form-control form-control-lg" />
                    </div>
      
      
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5 mt-4 text-center" type="submit" name="submit">Sign Up</button>
                  </form>
      
                  </div>

                 
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    
</body>
</html>