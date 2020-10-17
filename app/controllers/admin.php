<?php 
class Admin extends Controller{

	public function index(){
		$data['bagian'] = '';

		$data['jumlahBab'] = $this->model('adminModel')->jumlahBab();
		$data['jumlahSiswa'] = $this->model('adminModel')->jumlahSiswa();
		$data['jumlahGuru'] = $this->model('adminModel')->jumlahGuru();

		$data['siswaTerbaru'] = $this->model('adminModel')->getSiswaTerbaru();

		$this->view('templates/admin/header', $data);
		$this->view('admin/index', $data);
		$this->view('templates/admin/footer');
	}

	// ===============================================================================================

	public function siswa(){
		$data['bagian'] = 'Siswa';

		$data['siswa'] = $this->model('adminModel')->getAllSiswa();

		$this->view('templates/admin/header', $data);
		$this->view('admin/siswa/index', $data);
		$this->view('templates/admin/footer');
	}

	public function tambahSiswa(){

		if ($this->model('adminModel')->tambahSiswa($_POST) > 0) {
			Flasher::setFlash('Berhasil menambahkan data siswa.', 'primary');
			header('Location: ' . BASEURL . '/admin/siswa/index');
			exit;
		} else{
			Flasher::setFlash('Gagal menambahkan data siswa!', 'warning');
		}
	}

	public function editSiswa($id){
		$data['bagian'] = 'Edit siswa';

		$data['siswa'] = $this->model('adminModel')->getSiswaById($id);

		$this->view('templates/admin/header', $data);
		$this->view('admin/siswa/editSiswa', $data);
		$this->view('templates/admin/footer');
	}

	public function prosesEditSiswa(){
		if ($this->model('adminModel')->editSiswa($_POST) > 0) {
			Flasher::setFlash('Berhasil update data siswa.', 'primary');
			header('Location: ' . BASEURL . '/admin/siswa/index');
			exit;
		} else{
			Flasher::setFlash('Gagal update data siswa!', 'warning');
		}
	}

	public function hapusSiswa($id){
		if ($this->model('adminModel')->hapusSiswa($id) > 0) {
			Flasher::setFlash('Berhasil menghapus data siswa.', 'primary');
			header('Location: ' . BASEURL . '/admin/siswa/index');
			exit;
		} else{
			Flasher::setFlash('Gagal menghapus data siswa!', 'warning');
		}
	}

	public function cariSiswa(){
		$data['bagian'] = 'Siswa';

		$data['siswa'] = $this->model('adminModel')->cariSiswa();

		$this->view('templates/admin/header', $data);
		$this->view('admin/siswa/index', $data);
		$this->view('templates/admin/footer');
	}

	// ===============================================================================================

	public function guru(){
		$data['bagian'] = 'Guru';

		$data['guru'] = $this->model('adminModel')->getAllGuru();

		$this->view('templates/admin/header', $data);
		$this->view('admin/guru/index', $data);
		$this->view('templates/admin/footer');
	}

	public function tambahGuru(){

		if ($this->model('adminModel')->tambahGuru($_POST) > 0) {
			Flasher::setFlash('Berhasil menambahkan data guru.', 'primary');
			header('Location: ' . BASEURL . '/admin/siswa/index');
			exit;
		} else{
			Flasher::setFlash('Gagal menambahkan data guru!', 'warning');
		}
	}

	public function editGuru($id){
		$data['bagian'] = 'Edit guru';

		$data['guru'] = $this->model('adminModel')->getGuruById($id);

		$this->view('templates/admin/header', $data);
		$this->view('admin/guru/editGuru', $data);
		$this->view('templates/admin/footer');
	}

	public function prosesEditGuru(){
		if ($this->model('adminModel')->editGuru($_POST) > 0) {
			Flasher::setFlash('Berhasil update data guru.', 'primary');
			header('Location: ' . BASEURL . '/admin/guru/index');
			exit;
		} else{
			Flasher::setFlash('Gagal update data guru!', 'warning');
		}
	}

	public function hapusGuru($id){
		if ($this->model('adminModel')->hapusGuru($id) > 0) {
			Flasher::setFlash('Berhasil menghapus data guru.', 'primary');
			header('Location: ' . BASEURL . '/admin/guru/index');
			exit;
		} else{
			Flasher::setFlash('Gagal menghapus data guru!', 'warning');
		}
	}

	public function cariGuru(){
		$data['bagian'] = 'Guru';

		$data['guru'] = $this->model('adminModel')->cariGuru();

		$this->view('templates/admin/header', $data);
		$this->view('admin/guru/index', $data);
		$this->view('templates/admin/footer');
	}

	// ===============================================================================================

	public function bab(){
		$data['bagian'] = 'Bab';

		$data['bab'] = $this->model('adminModel')->getAllBab();

		$this->view('templates/admin/header', $data);
		$this->view('admin/bab/index', $data);
		$this->view('templates/admin/footer');
	}

	public function tambahBab(){

		if ($this->model('adminModel')->tambahBab($_POST) > 0) {
			Flasher::setFlash('Berhasil menambahkan data bab.', 'primary');
			header('Location: ' . BASEURL . '/admin/bab/index');
			exit;
		} else{
			Flasher::setFlash('Gagal menambahkan data bab!', 'warning');
		}
	}

	public function editBab($id){
		$data['bagian'] = 'Edit bab';

		$data['bab'] = $this->model('adminModel')->getBabById($id);

		$this->view('templates/admin/header', $data);
		$this->view('admin/bab/editBab', $data);
		$this->view('templates/admin/footer');
	}

	public function prosesEditBab(){
		if ($this->model('adminModel')->editBab($_POST) > 0) {
			Flasher::setFlash('Berhasil update data bab.', 'primary');
			header('Location: ' . BASEURL . '/admin/bab/index');
			exit;
		} else{
			Flasher::setFlash('Gagal update data bab!', 'warning');
		}
	}

	public function hapusBab($id){
		if ($this->model('adminModel')->hapusBab($id) > 0) {
			Flasher::setFlash('Berhasil menghapus data bab.', 'primary');
			header('Location: ' . BASEURL . '/admin/bab/index');
			exit;
		} else{
			Flasher::setFlash('Gagal menghapus data bab!', 'warning');
		}
	}

	public function cariBab(){
		$data['bagian'] = 'Bab';

		$data['bab'] = $this->model('adminModel')->cariBab();

		$this->view('templates/admin/header', $data);
		$this->view('admin/bab/index', $data);
		$this->view('templates/admin/footer');
	}

	// ===============================================================================================

	public function mapel(){
		$data['bagian'] = 'Mapel';

		$data['mapel'] = $this->model('adminModel')->getAllMapel();

		$this->view('templates/admin/header', $data);
		$this->view('admin/mapel/index', $data);
		$this->view('templates/admin/footer');
	}

	public function tambahMapel(){

		if ($this->model('adminModel')->tambahMapel($_POST) > 0) {
			Flasher::setFlash('Berhasil menambahkan data mapel.', 'primary');
			header('Location: ' . BASEURL . '/admin/mapel/index');
			exit;
		} else{
			Flasher::setFlash('Gagal menambahkan data mapel!', 'warning');
		}
	}

	public function editMapel($id){
		$data['bagian'] = 'Edit mapel';

		$data['mapel'] = $this->model('adminModel')->getMapelById($id);

		$this->view('templates/admin/header', $data);
		$this->view('admin/mapel/editMapel', $data);
		$this->view('templates/admin/footer');
	}

	public function prosesEditMapel(){
		if ($this->model('adminModel')->editMapel($_POST) > 0) {
			Flasher::setFlash('Berhasil update data mapel.', 'primary');
			header('Location: ' . BASEURL . '/admin/mapel/index');
			exit;
		} else{
			Flasher::setFlash('Gagal update data mapel!', 'warning');
		}
	}

	public function hapusMapel($id){
		if ($this->model('adminModel')->hapusMapel($id) > 0) {
			Flasher::setFlash('Berhasil menghapus data mapel.', 'primary');
			header('Location: ' . BASEURL . '/admin/mapel/index');
			exit;
		} else{
			Flasher::setFlash('Gagal menghapus data mapel!', 'warning');
		}
	}

	public function cariMapel(){
		$data['bagian'] = 'Mapel';

		$data['mapel'] = $this->model('adminModel')->cariMapel();

		$this->view('templates/admin/header', $data);
		$this->view('admin/mapel/index', $data);
		$this->view('templates/admin/footer');
	}

	// ===============================================================================================

	public function kelas(){
		$data['bagian'] = 'Kelas';

		$data['kelas'] = $this->model('adminModel')->getAllKelas();

		$this->view('templates/admin/header', $data);
		$this->view('admin/kelas/index', $data);
		$this->view('templates/admin/footer');
	}

	public function tambahKelas(){

		if ($this->model('adminModel')->tambahKelas($_POST) > 0) {
			Flasher::setFlash('Berhasil menambahkan data kelas.', 'primary');
			header('Location: ' . BASEURL . '/admin/kelas/index');
			exit;
		} else{
			Flasher::setFlash('Gagal menambahkan data kelas!', 'warning');
		}
	}

	public function editKelas($id){
		$data['bagian'] = 'Edit kelas';

		$data['kelas'] = $this->model('adminModel')->getKelasById($id);

		$this->view('templates/admin/header', $data);
		$this->view('admin/kelas/editKelas', $data);
		$this->view('templates/admin/footer');
	}

	public function prosesEditKelas(){
		if ($this->model('adminModel')->editKelas($_POST) > 0) {
			Flasher::setFlash('Berhasil update data kelas.', 'primary');
			header('Location: ' . BASEURL . '/admin/kelas/index');
			exit;
		} else{
			Flasher::setFlash('Gagal update data kelas!', 'warning');
		}
	}

	public function hapusKelas($id){
		if ($this->model('adminModel')->hapusKelas($id) > 0) {
			Flasher::setFlash('Berhasil menghapus data kelas.', 'primary');
			header('Location: ' . BASEURL . '/admin/kelas/index');
			exit;
		} else{
			Flasher::setFlash('Gagal menghapus data kelas!', 'warning');
		}
	}

	public function cariKelas(){
		$data['bagian'] = 'Kelas';

		$data['kelas'] = $this->model('adminModel')->cariKelas();

		$this->view('templates/admin/header', $data);
		$this->view('admin/kelas/index', $data);
		$this->view('templates/admin/footer');
	}

	// ===============================================================================================

	public function sub(){
		$data['bagian'] = 'Sub Bab';

		$data['sub'] = $this->model('adminModel')->getAllSub();
		$data['bab'] = $this->model('adminModel')->getAllBab();

		$this->view('templates/admin/header', $data);
		$this->view('admin/sub/index', $data);
		$this->view('templates/admin/footer');
	}

	public function tambahSub(){

		if ($this->model('adminModel')->tambahSub($_POST) > 0) {
			Flasher::setFlash('Berhasil menambahkan data sub.', 'primary');
			header('Location: ' . BASEURL . '/admin/sub/index');
			exit;
		} else{
			Flasher::setFlash('Gagal menambahkan data sub!', 'warning');
		}
	}

	public function editSub($id){
		$data['bagian'] = 'Edit sub';
		$data['bab'] = $this->model('adminModel')->getAllBab();

		$data['sub'] = $this->model('adminModel')->getSubById($id);

		$this->view('templates/admin/header', $data);
		$this->view('admin/sub/editSub', $data);
		$this->view('templates/admin/footer');
	}

	public function prosesEditSub(){
		if ($this->model('adminModel')->editSub($_POST) > 0) {
			Flasher::setFlash('Berhasil update data sub.', 'primary');
			header('Location: ' . BASEURL . '/admin/sub/index');
			exit;
		} else{
			Flasher::setFlash('Gagal update data sub!', 'warning');
		}
	}

	public function hapusSub($id){
		if ($this->model('adminModel')->hapusSub($id) > 0) {
			Flasher::setFlash('Berhasil menghapus data sub.', 'primary');
			header('Location: ' . BASEURL . '/admin/sub/index');
			exit;
		} else{
			Flasher::setFlash('Gagal menghapus data sub!', 'warning');
		}
	}

	public function cariSub(){
		$data['bagian'] = 'Sub Bab';

		$data['sub'] = $this->model('adminModel')->cariSub();
		$this->view('templates/admin/header', $data);
		$this->view('admin/sub/index', $data);
		$this->view('templates/admin/footer');
	}
}