<?php $user = $this->user->where('id', $data['author'])->get()->getSingle(); ?>
<?php $questions = $this->question->where('question_group', $data['id'])->get()->getAll(); ?>
<div class="question-wrapper">
  <div class="question-header question-<?php echo $data['theme']; ?>">
    <h3 class="question-title text-center font-weight-bold"><?php echo $data['title']; ?></h3>
    <div class="text-center"><?php echo $user['name']; ?></div>
  </div>
  <div class="backdrop"></div>
  <div class="container">
    <div class="paper" style="font-size: 20px;">
      <form action="<?php echo base_url('question_answer/'.$data['id']); ?>" method="POST" novalidate>
        <table>
          <?php $i = 1; ?>
          <?php foreach($questions as $question) : ?>
            <?php $answers = $this->answer->where('question_code', $question['question_code'])->get()->getAll(); ?>
            <tr>
              <td valign="top" style="width: 30px;"><?php echo $i++ .'. '; ?></td>
              <td>
                <div class="question-text"><?php echo $question['text']; ?></div>
                <ul class="answer-group mt-3" style="padding: 0;">
                  <?php foreach($answers as $item) : ?>
                  <li>
                    <input type="radio" name="<?php echo $question['question_code']; ?>" id="<?php echo $item['key_answer'].$question['question_code']; ?>" value="<?php echo $item['key_answer']; ?>" required>
                    <label for="<?php echo $item['key_answer'].$question['question_code']; ?>"><?php echo $item['key_answer'].'. '.$item['text']; ?></label>
                  </li>
                  <?php endforeach; ?>
                </ul>
              </td>
            </tr>
          <?php endforeach; ?>
        </table>
        <button type="submit" class="btn btn-primary">Selesai</button>
      <form>
    </div>
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
        <form action="<?php echo base_url('question/createSingleQuestion/'.$data['id']); ?>" method="POST">
          <div class="form-group">
            <label for="question-text">Teks soal</label>
            <textarea name="question_text" id="question-text" class="form-control" placeholder="Masukkan teks soal" required></textarea>
          </div>
          <div class="form-group">
            <label for="answer-total">Jumlah jawaban</label>
            <select id="answer-total" class="form-control" name="answer_total">
              <option value="">-pilih-</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
          <div class="answer-wrapper"></div>
          <div class="form-group">
            <label for="answer-key">Kunci</label>
            <select name="answer_key" id="answer-key" class="form-control">
              <option value="">-pilih-</option>
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