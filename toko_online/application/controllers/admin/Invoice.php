<?php
class Invoice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['invoice'] = $this->Model_invoice->tampil_data();
        $data['title']  = "Admin - Invoice";

        //pagination
        $this->load->library('pagination');

        // Get the keyword from search bar
        if ($this->input->post('submit2')) {
            $data['keyword2'] = $this->input->post('keyword2');
            $this->session->set_userdata('keyword2', $data['keyword2']);
        } else {
            $data['keyword2'] = $this->session->userdata('keyword2');
        }
        $config['base_url']   = 'http://localhost/toko_online/admin/invoice/index';

        $this->db->like('nama', $data['keyword2']);
        $this->db->from('tb_invoice');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page']   = 10;
        $config['num_links']  = 5;

        //setting pagination / stytling
        $config['full_tag_open']  = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li">';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li">';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li">';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li">';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li">';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li">';

        $config['attributes'] = array('class' => 'page-link');

        //init config
        $this->pagination->initialize($config);

        //setting config pangination
        $data['start'] = $this->uri->segment(4);
        $data['invoice'] = $this->Model_invoice->getInvoice($config['per_page'], $data['start'], $data['keyword2']);

        //load view
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar2');
        $this->load->view('admin/invoice', $data);
        $this->load->view('templates_admin/footer');
    }

    public function detail($id_invoice)
    {
        $data['invoice'] = $this->Model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->Model_invoice->ambil_id_pesanan($id_invoice);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_invoice', $data);
        $this->load->view('templates_admin/footer');
    }
}
