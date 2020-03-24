<div class="container pt-4">
  <h4 class="mb-3">Soal</h4>
  <div class="d-flex justify-content-between">
    <div class="left search-right">
      <form action="">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Cari...">
          <div class="input-group-append">
            <button class="btn btn-primary">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
    <div class="right">
      <select name="" id="" class="form-control">
        <option value="">Sort by</option>
      </select>
    </div>
  </div>
  
  <div class="row mt-3">
    <?php foreach($data as $key) : ?>
    <div class="col-md-3 mb-4">
      <div class="card-custom card-<?php echo $key['theme']; ?> card-hover">
        <div class="card-content">
          <h3 style="font-weight: 600;"><?php echo $key['title']; ?></h3>
          <small style="font-weight: bold;opacity: .8;">By Salung Prastyo . <?php echo date('M, d Y', strtotime($key['created_at'])); ?></small>
          <a href="<?php echo base_url('question/soal/'.$key['question_token']); ?>" class="card-btn">Detail</a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

  <button type="button" class="add-fixed-btn" data-toggle="modal" data-target="#questionModal">
    <i class="fas fa-plus"></i>
  </button>
</div>

<!-- Modal -->
<div class="modal fade" id="questionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat soal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('question/createNewQuestion'); ?>" method="POST">
          <div class="form-group">
            <label for="title">Judul soal</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Masukkan judul" required>
          </div>
          <div class="form-group">
            <label for="course">Mata pelajaran</label>
            <input type="text" name="course" class="form-control" id="course" placeholder="Mata pelajaran" required>
          </div>
          <div class="form-group">
            <label for="for_class">Untuk kelas</label>
            <select name="for_class" id="for_class" class="form-control">
              <option value="">-pilih-</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
            </select>
          </div>
          <div class="form-group">
            <label for="theme">Tema</label>
            <select name="theme" id="theme" class="form-control">
              <option value="">-pilih-</option>
              <option value="danger">Danger</option>
              <option value="primary">Primary</option>
              <option value="success">Success</option>
              <option value="warning">Warning</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Buat soal</button>
        </form>
      </div>
    </div>
  </div>
</div>