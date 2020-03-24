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
      <h3 class="form-title">Register</h3>
      <form action="<?php echo base_url('auth/register'); ?>" method="POST">
        <div class="form-group">
          <label for="name">Nama</label>
          <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan nama">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email">
        </div>
        <div class="form-group">
          <label for="class">Kelas</label>
          <input type="text" id="class" name="class" class="form-control" placeholder="Masukkan kelas">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password">
        </div>
        <button class="btn btn-warning w-100">Register</button>
      </form>
      <div class="mt-2" style="font-size: 14px">Sudah punya akun? <a href="<?php echo base_url('login'); ?>">Masuk</a></div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="<?php echo base_url('plugins/bootstrap-4.4.1/dist/js/bootstrap.min.js'); ?>"></script>
</body>
</html>