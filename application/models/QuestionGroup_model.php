<?php

class QuestionGroup_model extends CI_Model
{
  private $table = 'question-group';
  public $query;

  public function __construct()
  {
    parent::__construct();
  }

  public function createQuestion($data)
  {
    $this->db->insert($this->table, $data);
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