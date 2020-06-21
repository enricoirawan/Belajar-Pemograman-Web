<?php
class Model_barang extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_barang');
    }

    public function tambah_barang($data, $tabel)
    {
        $this->db->insert($tabel, $data);
    }

    public function edit_barang($where, $tabel)
    {
        return $this->db->get_where($tabel, $where);
    }

    public function update_data($where, $data, $tabel)
    {
        $this->db->where($where);
        $this->db->update($tabel, $data);
    }

    public function hapus_data($where, $tabel)
    {
        $this->db->where($where);
        $this->db->delete($tabel);
    }

    public function find($id)
    {
        $result = $this->db->where('id_brg', $id)
            ->limit(1)
            ->get('tb_barang');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function detail_brg($id_brg)
    {
        $result = $this->db->where('id_brg', $id_brg)->get('tb_barang');

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function jumlah_barang()
    {
        return $this->db->get('tb_barang')->num_rows();
    }

    public function getBarang($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_brg', $keyword);
            $this->db->or_like('keterangan', $keyword);
            $this->db->or_like('kategori', $keyword);
        }
        return $this->db->get('tb_barang', $limit, $start)->result();
    }
}
