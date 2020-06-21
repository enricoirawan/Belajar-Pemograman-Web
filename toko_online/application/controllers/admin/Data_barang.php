<?php
class Data_barang extends CI_Controller
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

        //title
        $data['title']  = "Admin - Data Barang";

        //get all barang to view
        $data['barang'] = $this->Model_barang->tampil_data()->result();

        //pagination
        $this->load->library('pagination');

        // Get the keyword from search bar
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $config['base_url']   = 'http://localhost/toko_online/admin/data_barang/index';

        $this->db->like('nama_brg', $data['keyword']);
        $this->db->from('tb_barang');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
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
        $data['barang'] = $this->Model_barang->getBarang($config['per_page'], $data['start'], $data['keyword']);

        //load view
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi()
    {
        $nama_brg     = $this->input->post('nama_brg');
        $keterangan   = $this->input->post('keterangan');
        $kategori     = $this->input->post('kategori');
        $harga        = $this->input->post('harga');
        $stok         = $this->input->post('stok');
        $gambar       = $_FILES['gambar']['name'];

        if ($gambar = '') {
        } else {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo 'Gambar Gagal Di Upload';
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = [
            'nama_brg'   => $nama_brg,
            'keterangan' => $keterangan,
            'kategori'   => $kategori,
            'harga'      => $harga,
            'stok'       => $stok,
            'gambar'     => $gambar,
        ];

        $this->Model_barang->tambah_barang($data, 'tb_barang');
        redirect('admin/data_barang/index');
    }

    public function edit($id)
    {
        $where = ['id_brg' => $id];
        $data['barang'] = $this->Model_barang->edit_barang($where, 'tb_barang')->result();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update()
    {
        $id        = $this->input->post('id_brg');
        $nama_brg   = $this->input->post('nama_brg');
        $keterangan = $this->input->post('keterangan');
        $kategori   = $this->input->post('kategori');
        $harga      = $this->input->post('harga');
        $stok       = $this->input->post('stok');

        $data = [
            "nama_brg"   => $nama_brg,
            "keterangan" => $keterangan,
            "kategori"   => $kategori,
            "harga"      => $harga,
            "stok"       => $stok,
        ];

        $where = ["id_brg" => $id];

        $this->Model_barang->update_data($where, $data, 'tb_barang');
        redirect('admin/data_barang/index');
    }

    public function hapus($id)
    {
        $where = [
            "id_brg" => $id
        ];

        $this->Model_barang->hapus_data($where, 'tb_barang');
        redirect('admin/data_barang/index');
    }

    public function detail_barang($id_brg)
    {
        $data['barang'] = $this->Model_barang->detail_brg($id_brg);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_barang', $data);
        $this->load->view('templates_admin/footer');
    }
}
