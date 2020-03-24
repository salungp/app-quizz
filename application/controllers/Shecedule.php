<?php

class Shecedule extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->has_userdata('token'))
    {
      redirect('login');
    }
    $this->load->model('QuestionGroup_model', 'question_group');
    $this->load->model('Shecedule_model', 'shecedule');
  }

  public function index()
  {
    $question_group = $this->question_group->get()->getAll();
    $shecedule = $this->shecedule->get()->getAll();
    $this->load->view('templates/admin-header');
    $this->load->view('shecedule/index', ['question_group' => $question_group, 'data' => $shecedule]);
    $this->load->view('templates/admin-footer');
  }

  public function createNewShecedule()
  {
    $question = $this->input->post('question');
    $date = $this->input->post('date');
    $open_time = $this->input->post('open_time');
    $closed_time = $this->input->post('closed_time');
    
    $this->shecedule->createShecedule([
      'question_id' => $question,
      'date' => $date,
      'open_time' => $open_time,
      'closed_time' => $closed_time,
      'status' => 0
    ]);

    $this->shecedule->sendMessage('success', 'Jadwal berhasil ditambah!');

    redirect('shecedule');
  }
}