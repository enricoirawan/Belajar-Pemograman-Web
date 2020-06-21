<?php 
    class Registrasi extends CI_Controller{
        public function index()
        {
            $data['title'] = 'Daftar Akun';

            $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
                'required' => 'Nama wajib diisi!'
            ]);
            $this->form_validation->set_rules('username', 'Username', 'required|trim', [
                'required' => 'username wajib diisi!'
            ]);
            $this->form_validation->set_rules('password_1', 'Password', 'required|trim|matches[password_2]', [
                'required' => 'Password wajib diisi!',
            ]);
            $this->form_validation->set_rules('password_2', 'Password', 'required|trim|matches[password_1]', [
                'required' => 'Password wajib diisi!',
                'matches'  => 'Password tidak cocok!'
            ]);

            if($this->form_validation->run() == false){
                $this->load->view('templates/header', $data);
                $this->load->view('registrasi');
                $this->load->view('templates/footer');
            }else {
                $data = [
                    "id"         => '',
                    "nama"       => $this->input->post('nama'),
                    "username"   => $this->input->post('username'),
                    "password"   => $this->input->post('password_1'),
                    "role_id"    => 2
                ];

                $this->db->insert('tb_user', $data);
                redirect('Auth/login');
            }
        }
    }
?>