<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="<?= base_url('login-style/style.css')?>" />

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
      body.swal2-shown {
        overflow: hidden; /* Menghindari halaman bergerak */
      }
    </style>

    <title>Login Admin</title>
  </head>
  <body>
            <?php if (session()->getFlashdata('alert') === 'login_gagal'): ?>      
            <script>
            Swal.fire({
              title: 'Login Gagal!',
              text: 'Periksa username dan password Anda.',
              icon: 'error',
              confirmButtonText: 'Oke',
            });
            </script>
            <?php elseif (session()->getFlashdata('alert') === 'logout_sukses'): ?>
              <!-- <div class="alert alert-danger">Logout berhasil.</div> -->
              <script>
              Swal.fire({
                title: 'Logout berhasil!',
                // text: 'Periksa username dan password Anda.',
                icon: 'success',
                confirmButtonText: 'Oke',
              });
              </script>
            <?php elseif (session()->getFlashdata('alert') === 'belum_login'): ?>
                <!-- <div class="alert alert-danger">Anda belum login.</div> -->
                <script>
                Swal.fire({
                  title: 'Anda belum login!',
                  text: 'Silahkan login terlebih dahulu',
                  icon: 'error',
                  confirmButtonText: 'Oke',
                });
                </script>
            <?php endif; ?>
          
    <div style="position: relative;" class="container">
      <div  class="forms">
        <div class="form login">
          <span class="title">Login</span>

          <form method="post" action="<?= base_url('admin/login_admin')?>">
            <div class="input-field">
              <input type="text" placeholder="Username" name="username" required />
              <i class="uil uil-user icon"></i>
            </div>
            <div class="input-field">
              <input type="password" class="password" name="password" placeholder="Enter your password" required />
              <i class="uil uil-lock icon"></i>
              <i class="uil uil-eye-slash showHidePw"></i>
            </div>

            <div class="input-field button">
            <!-- <button type="submit" name="login">Login</button> -->
              <input type="submit" name="login_admin" value="Login" />
            </div>
          </form>
          <div class="login-signup">
            <span class="text"
              >2024 &copy; Copyright | Khab Khun</a>
              
            </span>
          </div>
        </div>

      </div>
    </div>

    <script src="<?= base_url('login-style/script.js')?>"></script>
    
  </body>
</html>
