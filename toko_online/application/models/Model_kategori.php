<?php
class Model_kategori extends CI_Model
{
    public function data_elektronik()
    {
        return $this->db->get_where('tb_barang', ['kategori' => 'elektronik']);
    }

    public function data_pakaian_pria()
    {
        return $this->db->get_where('tb_barang', ['kategori' => 'pakaian pria']);
    }

    public function data_pakaian_wanita()
    {
        return $this->db->get_where('tb_barang', ['kategori' => 'pakaian wanita']);
    }

    public function data_pakaian_anak_anak()
    {
        return $this->db->get_where('tb_barang', ['kategori' => 'pakaian anak']);
    }

    public function data_peralatan_olahraga()
    {
        return $this->db->get_where('tb_barang', ['kategori' => 'peralatan olahraga']);
    }
}
