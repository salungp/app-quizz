<div class="container pt-5">
  <h1 class="text-center home-title font-weight-bold" style="color: #555555;">Tes saat ini.</h1>
  <div class="text-center mb-3">Tanggal <?php echo date('M, d Y'); ?></div>
  <ul class="list-group mb-3">
    <?php foreach($shecedules as $shecedule) : ?>
    <?php $shecedule_item = $this->question_group->where('id', $shecedule['question_id'])->get()->getSingle(); ?>
    <a href="<?php echo base_url('task/'.$shecedule_item['question_token']); ?>" class="list-group-item list-group-custom list-group-<?php echo $shecedule_item['theme']; ?>">
      <h4 class="font-weight-bold"><?php echo $shecedule_item['title']; ?></h4>
      <div class="list-group-subheader">Tutup pukul <?php echo $shecedule['closed_time']; ?></div>
    </a>
    <?php endforeach; ?>
  </ul>
  <div class="d-flex justify-content-center">
    <a href="" class="btn btn-light">
      <i class="fas fa-redo-alt"></i>
      Refresh
    </a>
  </div>
</div>