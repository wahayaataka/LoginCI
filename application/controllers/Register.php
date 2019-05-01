<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Register extends CI_Controller
    {
        public function insertUser()
    {
        $this->input->post('username');
        $this->input->post('fname');
        $this->input->post('email');
        $this->input->post('contact');
        $this->input->post('nis');
        $this->input->post('password');

        $data = array(
                    'username' => $this->input->post('username'),
                    'fname' => $this->input->post('fname'),
                    'email' => $this->input->post('email'),
                    'contact' => $this->input->post('contact'),
                    'nis' => $this->input->post('nis'),
                    'password' => $this->input->post('password'));
                    $this->db->insert('admin', $data);
                    redirect('Login/index');
                }
                
                
        public function registerUser()
        {
            $this->form_validation->set_rules('username', 'Username', 'required|is_unique[admin.username]');
            $this->form_validation->set_rules('fname', 'Full Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('contact', 'Contact', 'required');
            $this->form_validation->set_rules('nis', 'NIS', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');

            if ($this->form_validation->run() == TRUE) {
                $this->load->model('Login_user');
                $this->Login_user->insertUser();

                $this->session->set_flashdata('success', 'Anda berhasil terdaftar!');
                redirect('Login/index');
            }
            else{
                $this->load->view('register_view');
            }
        }
        public function Reg()
        {
            $this->load->view('login/register_view');
            
        }
    }
    
    
    /* End of file Register.php */
    
?>