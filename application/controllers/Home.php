<?php

class Home extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Shecedule_model', 'shecedule');
    $this->load->model('QuestionGroup_model', 'question_group');
  }

  public function index()
  {
    $shecedules = $this->shecedule->get()->getAll();
    $this->load->view('templates/question-header');
    $this->load->view('home/index', ['shecedules' => $shecedules]);
    $this->load->view('templates/question-footer');
  }
}