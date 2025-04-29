<?php
class Auth extends CI_Controller {
    public function index() {
		$this->load->helper('url');

        $this->load->view('auth/login');
    }
	public function login() {
		$this->load->helper('url');

        $this->load->view('auth/login');
    }

    public function do_login() {
		$this->load->helper('url');

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('users', ['username' => $username])->row();
        if ($user && $user->id !='') {
			//echo "dddd";exit;
            $this->session->set_userdata('user_id', $user->id);
            redirect('products/index');
        } else {
			//echo "aaa";exit;
            $this->session->set_flashdata('error', 'Invalid credentials');
            redirect('auth/login');
        }
    }

    public function logout() {
		$this->load->helper('url');

        $this->session->sess_destroy();
        redirect('auth/login');
    }
}


?>