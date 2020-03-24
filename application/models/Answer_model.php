<?php

class Answer_model extends CI_Model
{
  private $table = 'question-answer';
  public $query;

  public function __construct()
  {
    parent::__construct();
  }

  public function createAnswer($data)
  {
    $this->db->insert($this->table, $data);
  }

  public function createMultipleAnswer($data, $question_code)
  {
    foreach($data as $k => $v)
    {
      $this->createAnswer([
        'key_answer' => $k,
        'text' => $v,
        'question_code' => $question_code
      ]);
    }
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
}