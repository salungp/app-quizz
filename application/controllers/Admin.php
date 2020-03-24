<?php

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->has_userdata('token'))
    {
      redirect('login');
    }
  }

  public function index()
  {
    $this->load->view('templates/admin-header');
    $this->load->view('admin/index');
    $this->load->view('templates/admin-footer');
  }
}