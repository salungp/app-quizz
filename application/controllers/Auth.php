<?php

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model', 'user');
  }

  public function index()
  {
    $this->load->view('auth/login');
  }

  public function show_register()
  {
    $this->load->view('auth/register');
  }

  public function login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $user = $this->user->where('email', $email)->get()->getSingle();

    if ($user)
    {
      if (password_verify($password, $user['password']))
      {
        $this->user->createUserSession($user['id']);
        redirect('admin');
      } else {
        $this->user->sendMessage('danger', 'Maaf password salah.');
        redirect('login');
      }
    } else {
      $this->user->sendMessage('danger', 'Maaf email tidak ditemukan.');
      redirect('login');
    }
  }

  public function register()
  {
    $name = htmlspecialchars($this->input->post('name'));
    $class = htmlspecialchars($this->input->post('class'));
    $email = htmlspecialchars($this->input->post('email'));
    $password = htmlspecialchars($this->input->post('password'));

    $this->user->createUser([
      'name' => $name,
      'email' => $email,
      'class' => $class,
      'password' => password_hash($password, PASSWORD_BCRYPT),
      'level' => 2,
      'token' => $this->user->generateToken()
    ]);

    $this->user->sendMessage('success', 'Daftar berhasil!, silahkan sign in terlebih dahulu.');
    redirect('login');
  }

  public function logout()
  {
    $this->session->unset_userdata('token');
    redirect('login');
  }
}