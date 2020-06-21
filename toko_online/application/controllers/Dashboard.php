<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('role_id') != '2') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('auth/login');
        }
    }

    public function tambah_ke_keranjang($id)
    {
        $brg = $this->Model_barang->find($id);

        $data = array(
            'id'      => $brg->id_brg,
            'qty'     => 1,
            'price'   => $brg->harga,
            'name'    => $brg->nama_brg
        );

        $this->cart->insert($data);
        redirect('Welcome');
    }

    public function detail_keranjang()
    {
        $data['title'] = 'Detail Keranjang';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('keranjang');
        $this->load->view('templates/footer');
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('Welcome');
    }

    public function pembayaran()
    {
        $data['title'] = 'Pembayaran';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pembayaran');
        $this->load->view('templates/footer');
    }

    public function proses_pesanan()
    {
        $data['title'] = 'Proses Pesanan';
        $is_processed = $this->Model_invoice->index();
        if ($is_processed) {
            $this->cart->destroy();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('proses_pesanan');
            $this->load->view('templates/footer');
        } else {
            echo "Maaf pesanan anda gagal diproses, silahkan coba lagi";
        }
    }

    public function detail($id_brg)
    {
        $data['title'] = 'Detail Barang';
        $data['barang'] = $this->Model_barang->detail_brg($id_brg);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('detail_barang', $data);
        $this->load->view('templates/footer');
    }
}
