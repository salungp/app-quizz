<?php

class Question extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->has_userdata('token'))
    {
      redirect('login');
    }
    $this->load->model('QuestionGroup_model', 'question_group');
    $this->load->model('User_model', 'user');
    $this->load->model('Answer_model', 'answer');
    $this->load->model('Question_model', 'question');
    $this->load->model('UserAnswer_model', 'user_answer');
  }

  public function index()
  {
    $data = $this->question_group->get()->getAll();
    $this->load->view('templates/admin-header');
    $this->load->view('question/index', ['data' => $data]);
    $this->load->view('templates/admin-footer');
  }

  public function createNewQuestion()
  {
    $title = htmlspecialchars($this->input->post('title'));
    $course = htmlspecialchars($this->input->post('course'));
    $for_class = htmlspecialchars($this->input->post('for_class'));
    $theme = htmlspecialchars($this->input->post('theme'));
    $author = $this->user->getSingleUser($this->session->userdata('token'))['id'];
    $token = $this->question_group->generateToken();

    $this->question_group->createQuestion([
      'title' => $title,
      'course' => $course,
      'class' => $for_class,
      'theme' => $theme,
      'author' => $author,
      'question_token' => $token 
    ]);

    redirect('question/soal/'.$token);
  }

  public function soal($token)
  {
    $data = $this->question_group->where('question_token', $token)->get()->getSingle();

    $this->load->view('templates/question-header');
    $this->load->view('question/soal', ['data' => $data]);
    $this->load->view('templates/question-footer');
  }

  public function createSingleQuestion($question_group)
  {
    $text = htmlspecialchars($this->input->post('question_text'));
    $answerTotal = $this->input->post('answer_total');
    $letters = ['a', 'b', 'c', 'd', 'e'];
    $answers = [];
    $key = $this->input->post('answer_key');
    $code = 'S'.strtoupper(uniqid());

    for ($answer = 0; $answer < $answerTotal; $answer++) {
      $answers[$letters[$answer]] = $this->input->post($letters[$answer]);
    }

    $this->answer->createMultipleAnswer($answers, $code);
    $this->question->createQuestion([
      'text' => $text,
      'answer_key' => $key,
      'question_group' => $question_group,
      'question_code' => $code
    ]);

    redirect($this->agent->referrer());
  }

  public function answer($id)
  {
    $question = $this->question->where('question_group', $id)->get()->getAll();
    $answers = [];

    foreach($question as $k) {
      $answers[$k['question_code']] = $this->input->post($k['question_code']);
    }

    $this->user_answer->createUserAnswer($answers, $question, $id);
    redirect();
  }
}