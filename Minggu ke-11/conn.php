<?php 
class Connect {
    public function __construct() {
        $engi = "mysql"; 
		$host = "localhost"; 
		$dbse = "crud_pdo"; 
		$user = "root"; 
		$pass = ""; 
		$this->koneksi = new PDO($engi.':dbname='.$dbse.";host=".$host,$user,$pass); 
    }
	
	public function show() {
        $query = $this->koneksi->prepare("SELECT * FROM sekolah");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
    
	public function add_data($nama, $alamat, $logo) {
        $data = $this->koneksi->prepare('INSERT INTO sekolah (nama,alamat,logo) VALUES (?, ?, ?)');

        $data->bindParam(1, $nama);
        $data->bindParam(2, $alamat);
        $data->bindParam(3, $logo);

        $data->execute();
        return $data->rowCount();
    }
	
	public function get_by_id($id) {
        $query = $this->koneksi->prepare("SELECT * FROM sekolah where id=?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetch();
    }

    public function search() {
        $cari = ''; 
        if(get("q")!=""){ 
        $cari = " WHERE nama LIKE '%".get('q')."%'"; 
        } 
        $query = $this->koneksi->prepare("SELECT * FROM sekolah".$cari."ORDER BY id DESC");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
	
	public function update($id, $nama, $alamat, $update_logo) {
        $query = $this->koneksi->prepare("UPDATE sekolah SET 
		`nama`='".$nama."', 
		`alamat`='".$alamat."' 
		".$update_logo." 
		WHERE 
		`id` ='".$id."'");
        $query->execute();
        return $query->rowCount();
    }
	
	public function hapus($id) {
		$query = $this->koneksi->prepare("DELETE FROM sekolah where id=?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query->rowCount();
	}
	
	public function download() {
        $hasil = $this->koneksi->prepare("SELECT * FROM sekolah WHERE id = '" . get('id') . "'");
        $hasil->execute();
        return $hasil->fetch(PDO::FETCH_OBJ);
    }
	
	public function pdf() {
        $hasil = $this->koneksi->prepare("SELECT * FROM sekolah WHERE id = '" . get('id') . "'");
        $hasil->execute();
        return $hasil->fetch(PDO::FETCH_OBJ);
    }	
} 
?>