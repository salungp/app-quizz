<<?php

class UserAnswer_model extends CI_Model
{
  private $table = 'user_answer';
  public $query;

  public function __construct()
  {
    parent::__construct();
  }

  public function create($data)
  {
    $this->db->insert($this->table, $data);
  }

  public function createUserAnswer($data, $question, $id)
  {
    $user = $this->db->get_where('users', ['token' => $this->session->userdata('token')])->row_array();
    $token = md5(uniqid());
    $status = 0;
    $questionTotal = count($question);

    foreach($question as $k) {
      foreach($data as $key => $value) {
        if ($k['question_code'] == $key)
        {
          if ($k['answer_key'] == $value)
          {
            $this->create([
              'user_id' => $user['id'],
              'question_code' => $key,
              'answer' => $value,
              'token' => $token,
              'status' => 1
            ]);
          } else {
            $this->create([
              'user_id' => $user['id'],
              'question_code' => $key,
              'answer' => $value,
              'token' => $token,
              'status' => 0
            ]);
          }
        }
      }
    }

    $where = "token='$token' AND status=1";
    $nilai = count($this->db->get_where('user_answer', $where)->result_array());
    $lastNilai = (100/$questionTotal) * $nilai;

    $this->db->insert('daftar_nilai', [
      'question_id' => $id,
      'user_answer_token' => $token,
      'nilai' => $lastNilai
    ]);
  }

  public function generateToken()
  {
    return md5(uniqid());
  }

  public function get()
  {
    $this->query = $this->db->get($this->table);
    return $this;
  }

  public function where($key, $value)
  {
    $this->db->where($key, $value);
    return $this;
  }

  public function getSingle()
  {
    return $this->query->row_array();
  }

  public function getAll()
  {
    return $this->query->result_array();
  }

  public function sendMessage($type, $message)
  {
    $this->session->set_flashdata('message', '<div class="alert alert-'.$type.'">'.$message.'</div>');
  }

}