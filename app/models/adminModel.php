<?php

class adminModel{

	private $db;
	private $tableBab = 'bab';
	private $tableSub = 'sub_bab';
	private $tableSiswa = 'siswa';
	private $tableKelas = 'kelas';
	private $tableMapel = 'mapel';
	private $tableGuru = 'guru';

	public function __construct(){
		$this->db = new Database;
	}

	public function jumlahBab(){
		$this->db->query('SELECT COUNT(*) FROM ' . $this->tableBab);
		return $this->db->single();
	}

	public function jumlahSiswa(){
		$this->db->query('SELECT COUNT(*) FROM ' . $this->tableSiswa);
		return $this->db->single();
	}

	public function jumlahGuru(){
		$this->db->query('SELECT COUNT(*) FROM ' . $this->tableGuru);
		return $this->db->single();
	}
	
	public function getSiswaTerbaru(){
		$this->db->query('SELECT * FROM ' . $this->tableSiswa . ' LIMIT 7');
		return $this->db->resultSet();
	}

	// ===============================================================================================

	public function getAllSiswa(){
		$this->db->query('SELECT * FROM ' . $this->tableSiswa);
		return $this->db->resultSet();
	}

	public function getSiswaById($id){
		$this->db->query('SELECT * FROM ' . $this->tableSiswa . ' WHERE id_siswa = ' . $id);
		return $this->db->single();
	}

	public function tambahSiswa($data){
		$query = "INSERT INTO siswa(poin, tanggal_daftar, nama_lengkap, username, email, password, jenjang_kelas)
					VALUES
					(:poin, :tanggal_daftar, :nama_lengkap, :username, :email, :password, :jenjang_kelas)";
		$this->db->query($query);
		$this->db->bind('poin', $data['poin']);
		$this->db->bind('tanggal_daftar', $data['tanggal_daftar']);
		$this->db->bind('nama_lengkap', $data['nama_lengkap']);
		$this->db->bind('username', $data['username']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('password', $data['password']);
		$this->db->bind('jenjang_kelas', $data['jenjang_kelas']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function editSiswa($data){
		$query = "UPDATE siswa
					SET nama_lengkap = :nama_lengkap, username = :username, email = :email, password = :password, jenjang_kelas = :jenjang_kelas WHERE id_siswa = :id_siswa";
		$this->db->query($query);
		$this->db->bind('id_siswa', $data['id_siswa']);
		$this->db->bind('nama_lengkap', $data['nama_lengkap']);
		$this->db->bind('username', $data['username']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('password', $data['password']);
		$this->db->bind('jenjang_kelas', $data['jenjang_kelas']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusSiswa($id){
		$query = "DELETE FROM siswa WHERE id_siswa = :id_siswa";
		$this->db->query($query);
		$this->db->bind('id_siswa', $id);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariSiswa(){
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM $this->tableSiswa WHERE
					nama_lengkap LIKE '%$keyword%' 
					OR jenjang_kelas LIKE '%$keyword%' 
					OR alamat LIKE '%$keyword%' 
					OR username LIKE '%$keyword%' 
					OR email LIKE '%$keyword%' 
					OR password LIKE '%$keyword%'";
		$this->db->query($query);
		return $this->db->resultSet();
		
		return $this->db->resultSet();
	}

	// ===============================================================================================

	public function getAllGuru(){
		$this->db->query('SELECT * FROM ' . $this->tableGuru);
		return $this->db->resultSet();
	}

	public function getGuruById($id){
		$this->db->query('SELECT * FROM ' . $this->tableGuru . ' WHERE id_guru = ' . $id);
		return $this->db->single();
	}

	public function tambahGuru($data){
		$query = "INSERT INTO guru(poin, tanggal_daftar, nama_lengkap, username, email, password, mengajar_kelas, mengajar_mapel)
					VALUES
					(:poin, :tanggal_daftar, :nama_lengkap, :username, :email, :password, :mengajar_kelas, :mengajar_mapel)";
		$this->db->query($query);
		$this->db->bind('poin', $data['poin']);
		$this->db->bind('tanggal_daftar', $data['tanggal_daftar']);
		$this->db->bind('nama_lengkap', $data['nama_lengkap']);
		$this->db->bind('username', $data['username']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('password', $data['password']);
		$this->db->bind('mengajar_kelas', $data['mengajar_kelas']);
		$this->db->bind('mengajar_mapel', $data['mengajar_mapel']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function editGuru($data){
		$query = "UPDATE guru
					SET nama_lengkap = :nama_lengkap, username = :username, email = :email, password = :password, mengajar_kelas = :mengajar_kelas, mengajar_mapel = :mengajar_mapel WHERE id_guru = :id_guru";
		$this->db->query($query);
		$this->db->bind('id_guru', $data['id_guru']);
		$this->db->bind('nama_lengkap', $data['nama_lengkap']);
		$this->db->bind('username', $data['username']);
		$this->db->bind('email', $data['email']);
		$this->db->bind('password', $data['password']);
		$this->db->bind('mengajar_kelas', $data['mengajar_kelas']);
		$this->db->bind('mengajar_mapel', $data['mengajar_mapel']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusGuru($id){
		$query = "DELETE FROM guru WHERE id_guru = :id_guru";
		$this->db->query($query);
		$this->db->bind('id_guru', $id);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariGuru(){
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM $this->tableGuru WHERE
					nama_lengkap LIKE '%$keyword%' 
					OR mengajar_kelas LIKE '%$keyword%' 
					OR mengajar_mapel LIKE '%$keyword%' 
					OR email LIKE '%$keyword%' 
					OR password LIKE '%$keyword%'";
		$this->db->query($query);
		return $this->db->resultSet();
		
		return $this->db->resultSet();
	}

	// ===============================================================================================

	public function getAllBab(){
		$this->db->query('SELECT * FROM ' . $this->tableBab);
		return $this->db->resultSet();
	}

	public function getBabById($id){
		$this->db->query('SELECT * FROM ' . $this->tableBab . ' WHERE id_bab = ' . $id);
		return $this->db->single();
	}

	public function tambahBab($data){
		$query = "INSERT INTO bab(nama_mapel, jenjang_kelas, nama_bab, deskripsi_bab)
					VALUES
					(:nama_mapel, :jenjang_kelas, :nama_bab, :deskripsi_bab)";
		$this->db->query($query);
		$this->db->bind('nama_mapel', $data['nama_mapel']);
		$this->db->bind('jenjang_kelas', $data['jenjang_kelas']);
		$this->db->bind('nama_bab', $data['nama_bab']);
		$this->db->bind('deskripsi_bab', $data['deskripsi_bab']);

		$this->db->execute();

		return $this->db->rowCount();
	}
	

	public function editBab($data){
		$query = "UPDATE bab
					SET
					nama_mapel = :nama_mapel, jenjang_kelas = :jenjang_kelas, nama_bab = :nama_bab, deskripsi_bab = :deskripsi_bab WHERE id_bab = :id_bab";
		$this->db->query($query);
		$this->db->bind('id_bab', $data['id_bab']);
		$this->db->bind('nama_mapel', $data['nama_mapel']);
		$this->db->bind('jenjang_kelas', $data['jenjang_kelas']);
		$this->db->bind('nama_bab', $data['nama_bab']);
		$this->db->bind('deskripsi_bab', $data['deskripsi_bab']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusBab($id){
		$query = "DELETE FROM bab WHERE id_bab = :id_bab";
		$this->db->query($query);
		$this->db->bind('id_bab', $id);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariBab(){
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM $this->tableBab WHERE
					nama_mapel LIKE '%$keyword%' 
					OR jenjang_kelas LIKE '%$keyword%' 
					OR nama_bab LIKE '%$keyword%' 
					OR deskripsi_bab LIKE '%$keyword%'";
		$this->db->query($query);
		return $this->db->resultSet();
		
		return $this->db->resultSet();
	}

	// ===============================================================================================

	public function getAllMapel(){
		$this->db->query('SELECT * FROM ' . $this->tableMapel);
		return $this->db->resultSet();
	}

	public function getMapelById($id){
		$this->db->query('SELECT * FROM ' . $this->tableMapel . ' WHERE id_mapel = ' . $id);
		return $this->db->single();
	}

	public function tambahMapel($data){
		$query = "INSERT INTO mapel(nama_mapel, jenjang_kelas, deskripsi_mapel)
					VALUES
					(:nama_mapel, :jenjang_kelas, :deskripsi_mapel)";
		$this->db->query($query);
		$this->db->bind('nama_mapel', $data['nama_mapel']);
		$this->db->bind('jenjang_kelas', $data['jenjang_kelas']);
		$this->db->bind('deskripsi_mapel', $data['deskripsi_mapel']);

		$this->db->execute();

		return $this->db->rowCount();
	}
	

	public function editMapel($data){
		$query = "UPDATE mapel
					SET
					nama_mapel = :nama_mapel, jenjang_kelas = :jenjang_kelas,  deskripsi_mapel = :deskripsi_mapel WHERE id_mapel = :id_mapel";
		$this->db->query($query);
		$this->db->bind('id_mapel', $data['id_mapel']);
		$this->db->bind('nama_mapel', $data['nama_mapel']);
		$this->db->bind('jenjang_kelas', $data['jenjang_kelas']);
		$this->db->bind('deskripsi_mapel', $data['deskripsi_mapel']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusMapel($id){
		$query = "DELETE FROM mapel WHERE id_mapel = :id_mapel";
		$this->db->query($query);
		$this->db->bind('id_mapel', $id);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariMapel(){
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM $this->tableMapel WHERE
					nama_mapel LIKE '%$keyword%' 
					OR jenjang_kelas LIKE '%$keyword%'
					OR deskripsi_mapel LIKE '%$keyword%'";
		$this->db->query($query);
		return $this->db->resultSet();
		
		return $this->db->resultSet();
	}

	// ===============================================================================================

	public function getAllKelas(){
		$this->db->query('SELECT * FROM ' . $this->tableKelas);
		return $this->db->resultSet();
	}

	public function getKelasById($id){
		$this->db->query('SELECT * FROM ' . $this->tableKelas . ' WHERE id_kelas = ' . $id);
		return $this->db->single();
	}

	public function tambahKelas($data){
		$query = "INSERT INTO kelas(jenjang_kelas, deskripsi_kelas)
					VALUES
					(:jenjang_kelas, :deskripsi_kelas)";
		$this->db->query($query);
		$this->db->bind('jenjang_kelas', $data['jenjang_kelas']);
		$this->db->bind('deskripsi_kelas', $data['deskripsi_kelas']);

		$this->db->execute();

		return $this->db->rowCount();
	}
	

	public function editKelas($data){
		$query = "UPDATE kelas
					SET
					jenjang_kelas = :jenjang_kelas,  deskripsi_kelas = :deskripsi_kelas WHERE id_kelas = :id_kelas";
		$this->db->query($query);
		$this->db->bind('id_kelas', $data['id_kelas']);
		$this->db->bind('jenjang_kelas', $data['jenjang_kelas']);
		$this->db->bind('deskripsi_kelas', $data['deskripsi_kelas']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusKelas($id){
		$query = "DELETE FROM kelas WHERE id_kelas = :id_kelas";
		$this->db->query($query);
		$this->db->bind('id_kelas', $id);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariKelas(){
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM $this->tableKelas WHERE
					jenjang_kelas LIKE '%$keyword%'
					OR deskripsi_kelas LIKE '%$keyword%'";
		$this->db->query($query);
		return $this->db->resultSet();
		
		return $this->db->resultSet();
	}

	// ===============================================================================================

	public function getAllSub(){
		$this->db->query('SELECT * FROM ' . $this->tableSub .' INNER JOIN ' . $this->tableBab . ' ON ' . $this->tableSub .'.id_bab = ' . $this->tableBab . '.id_bab');
		return $this->db->resultSet();
	}

	public function getSubById($id){
		$this->db->query('SELECT * FROM ' . $this->tableSub . ' INNER JOIN ' . $this->tableBab . ' ON ' . $this->tableSub .'.id_bab = ' . $this->tableBab . '.id_bab WHERE id_sub = ' . $id);
		return $this->db->single();
	}

	public function tambahSub($data){
		$query = "INSERT INTO sub_bab(id_bab, judul_sub, isi_sub)
					VALUES
					(:id_bab, :judul_sub, :isi_sub)";
		$this->db->query($query);
		$this->db->bind('id_bab', $data['id_bab']);
		$this->db->bind('judul_sub', $data['judul_sub']);
		$this->db->bind('isi_sub', $data['isi_sub']);

		$this->db->execute();

		return $this->db->rowCount();
	}
	

	public function editSub($data){
		$query = "UPDATE sub_bab
					SET
					id_bab = :id_bab, judul_sub = :judul_sub, isi_sub = :isi_sub WHERE id_sub = :id_sub";
		$this->db->query($query);
		$this->db->bind('id_bab', $data['id_bab']);
		$this->db->bind('id_sub', $data['id_sub']);
		$this->db->bind('judul_sub', $data['judul_sub']);
		$this->db->bind('isi_sub', $data['isi_sub']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function hapusSub($id){
		$query = "DELETE FROM sub_bab WHERE id_sub = :id_sub";
		$this->db->query($query);
		$this->db->bind('id_sub', $id);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariSub(){
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM $this->tableSub INNER JOIN bab ON sub_bab.id_bab = bab.id_bab WHERE
					judul_sub LIKE '%$keyword%' 
					OR nama_bab LIKE '%$keyword%'
					OR jenjang_kelas LIKE '%$keyword%'";
		$this->db->query($query);
		return $this->db->resultSet();
		
		return $this->db->resultSet();
	}
}