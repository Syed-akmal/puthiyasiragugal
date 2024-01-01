<?php
defined('BASEPATH') or exit('no direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //cek login
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url() . 'welcome?pesan=belumlogin');
        }
    }

    //fungsi utk tampilan dashboard admin
    function index()
    {
        $data['transaksi'] = $this->db->query("select * from transaksi,mobil,kostumer where transaksi_mobil=mobil_id and transaksi_kostumer=kostumer_id order by transaksi_id desc limit 10")->result(); //transaksi terakhir
        $data['kostumer'] = $this->db->query("select * from kostumer order by kostumer_id desc limit 3")->result(); //menampilkan kostumer baru
        $data['mobil'] = $this->db->query("select * from mobil order by mobil_id desc limit 3")->result(); //menampilkan mobil baru
        $data['customercount'] = $this->db->query('SELECT * FROM customer_details')->num_rows();
        $data['loan_amount_in_process'] = $this->db->select_sum('loan_amount')->where('loan_status', 'in_process')->get('loan')->row()->loan_amount;
        $data['total_loan_amount_in_process'] = $this->db->select_sum('totalloanamount')->where('loan_status', 'in_process')->get('loan')->row()->totalloanamount;
        $data['savingscustomercount'] = $this->db->query('SELECT * FROM saving_customer_details')->num_rows();
        $data['total_savings_amount_in_process'] = $this->db->select_sum('termaccount.amount')->from('account')->join('termaccount', 'account.id = termaccount.accountid', 'left')->where('account.status', 'in_process')->get()->row()->amount;
        $data['total_amount_difference'] = $this->db->query("SELECT SUM(loan.totalloanamount) - COALESCE(SUM(term.amount), 0) as total_difference FROM loan LEFT JOIN term ON loan.id = term.loan_id WHERE loan.loan_status = 'in_process' AND loan.id NOT IN (SELECT loan_id FROM term WHERE loan_status = 'completed')")->row()->total_difference;
        $this->load->view('admin/header');
        $this->load->view('admin/index', $data);
        $this->load->view('admin/footer');
    }

    //fungsi ganti password
    function ganti_password()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/ganti_password');
        $this->load->view('admin/footer');
    }
    function ganti_password_act()
    {
        $pass_baru  = $this->input->post('pass_baru');
        $ulang_pass = $this->input->post('ulang_pass');

        $this->form_validation->set_rules('pass_baru', 'Password baru', 'required|matches[ulang_pass]');
        $this->form_validation->set_rules('ulang_pass', 'Ulangi password baru', 'required');

        if ($this->form_validation->run() != false) {
            $data   = array('admin_password' => md5($pass_baru));
            $w      = array('admin_id' => $this->session->userdata('id'));
            $this->m_rental->update_data($w, $data, 'admin');
            redirect(base_url() . 'admin/ganti_password?pesan=berhasil');
        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/ganti_password');
            $this->load->view('admin/footer');
        }
    }

    //fungsi logout
    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'welcome?pesan=logout');
    }
}
