<!-- modal button -->
<button type="button" class="add-fixed-btn" data-toggle="modal" data-target="#questionModal">
  <i class="fas fa-plus"></i>
</button>

<div class="container pt-4 table-responsive">
  <h4>Jadwal tes</h4>
  <?php echo $this->session->flashdata('message'); ?>
  <table class="table">
    <thead>
      <tr>
        <th scope="col" style="width: 30px !important;">No</th>
        <th scope="col">Tes</th>
        <th scope="col">Mata pelajaran</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Waktu</th>
        <th scope="col">Expired</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php foreach($data as $key) : ?>
      <?php $question = $this->question_group->where('id', $key['question_id'])->get()->getSingle(); ?>
      <tr>
        <th scope="row"><?php echo $i++; ?></th>
        <th><?php echo $question['title']; ?></th>
        <td><?php echo $question['course']; ?></td>
        <td><?php echo date('M, d Y', strtotime($key['date'])); ?></td>
        <td><?php echo $key['open_time']; ?></td>
        <td><?php echo $key['closed_time']; ?></td>
        <td>
          <div class="btn-group">
            <a href="" class="btn btn-sm btn-primary">
              <i class="fas fa-edit"></i>
            </a>
            <a href="" class="btn btn-sm btn-danger">
              <i class="fas fa-trash"></i>
            </a>
          </div>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="questionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat jadwal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('shecedule/createNewShecedule'); ?>" method="POST">
          <div class="form-group">
            <label for="question">Soal</label>
            <select name="question" id="question" class="form-control">
              <?php foreach($question_group as $question) : ?>
                <option value="<?php echo $question['id']; ?>"><?php echo $question['title']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="date">Tanggal</label>
            <input type="date" name="date" id="date" class="form-control">
          </div>
          <div class="form-group">
            <label for="open-time">Waktu mulai</label>
            <input type="time" name="open_time" id="open-time" class="form-control">
          </div>
          <div class="form-group">
            <label for="closed-time">Waktu tutup</label>
            <input type="time" name="closed_time" id="closed-time" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Jadwalkan</button>
        </form>
      </div>
    </div>
  </div>
</div>