<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>App quizz</title>

  <!-- file css -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free-5.12.1-web/css/all.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('plugins/bootstrap-4.4.1/dist/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('plugins/addons/style.css'); ?>">
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  <style>
    * {
      font-family: 'Poppins', 'Helvetica', 'Arial', sans-serrif;
    }
  </style>
</head>
<body>
  <div class="auth-wrapper">
    <div class="form-wrapper">
      <h3 class="form-title">Login</h3>
      <?php echo $this->session->flashdata('message'); ?>
      <form action="<?php echo base_url('auth/login'); ?>" method="POST">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">
              <i class="fas fa-user"></i>
            </span>
          </div>
          <input type="text" class="form-control" name="email" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">
              <i class="fas fa-unlock-alt"></i>
            </span>
          </div>
          <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
        </div>
        <button class="btn btn-warning w-100">Login</button>
      </form>
      <div class="mt-2" style="font-size: 14px">Belum punya akun? <a href="<?php echo base_url('register'); ?>">Daftar</a></div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="<?php echo base_url('plugins/bootstrap-4.4.1/dist/js/bootstrap.min.js'); ?>"></script>
</body>
</html>