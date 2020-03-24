<?php

class User_model extends CI_Model
{
  private $table = 'users';
  public $query;

  public function __construct()
  {
    parent::__construct();
  }

  public function createUser($data)
  {
    $this->db->insert($this->table, $data);
  }

  public function generateToken()
  {
    return password_hash(uniqid(), PASSWORD_BCRYPT);
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

  public function createUserSession($id)
  {
    $user = $this->where('id', $id)->get()->getSingle();
    $this->session->set_userdata([
      'token' => $user['token']
    ]);
  }

  public function sendMessage($type, $message)
  {
    $this->session->set_flashdata('message', '<div class="alert alert-'.$type.'">'.$message.'</div>');
  }

  public function getSingleUser($token)
  {
    return $this->where('token', $token)->get()->getSingle();
  }
}