<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">App quizz</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('admin'); ?>">Dashboard <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('question'); ?>">Soal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('shecedule'); ?>">Jadwal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link log-out" href="<?php echo base_url('logout'); ?>">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>