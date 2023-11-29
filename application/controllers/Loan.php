<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Loan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('loan_model');
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('footer');
    }
    
}
