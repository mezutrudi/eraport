<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}
	public function tamsis()
	{
		$judul['halaman']="Halaman Tambah Siswa";
		$judul['menu']="Siswa";
		$judul['awal']="Halaman Siswa";
		$judul['pusat']="Master";
		$judul['content']="admin/formsiswa";
		$judul['error']="";

		$this->load->view('template/wrapper', $judul, FALSE);
	}
	public function simpansiswa()	
	{
		if ($_FILES['foto']['name']) {
			$config['upload_path']='./public/images/';
			$config['allowed_types']='gif|jpg|png';
			$config['max_size']=1024;
			$config['encrypt_name']=True;
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				$judul['halaman']="Halaman Tambah Siswa";
				$judul['menu']="Siswa";
				$judul['awal']="Halaman Siswa";
				$judul['pusat']="Master";
				$judul['content']="admin/formsiswa";
				$judul['error']=$this->upload->display_errors();

				$this->load->view('template/wrapper', $judul, FALSE);
			} else {
				$gbr=$this->upload->data();
				$config['image_library']='gd2';
				$config['source_image']='./public/images/'.$gbr['file_name'];
				$config['create_thumb']=FALSE;
				$config['maintain_ratio']=FALSE;
				$config['quality']='50%';
				$config['width']=400;
				$config['height']=400;
				$config['new_image']='./public/images/'.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				$foto=$gbr['file_name'];
				$data=array(
					'nis'=>$this->input->post('nis'),
					'nisn'=>$this->input->post('nisn'),
					'nama_siswa'=>$this->input->post('nama_siswa'),
					'jk'=>$this->input->post('jk'),
					'tempatlahir'=>$this->input->post('tempatlahir'),
					'tgllahir'=>$this->input->post('tgllahir'),
					'agama'=>$this->input->post('agama'),
					'alamat'=>$this->input->post('alamat'),
					'foto'=>$foto
				);
				$query = $this->admin_model->simpandata('siswa', $data);
				if ($query) {
					$this->session->set_flashdata('info', 'Data Tersimpan');
					redirect('Admin/Siswa','refresh');
				} else {
					$this->session->set_flashdata('info', 'Data Gagal');
					redirect('Admin/Siswa','refresh');
				}
				
			}
			
		} else {
			$data=array(
				'nis'=>$this->input->post('nis'),
				'nisn'=>$this->input->post('nisn'),
				'nama_siswa'=>$this->input->post('nama_siswa'),
				'jk'=>$this->input->post('jk'),
				'tempatlahir'=>$this->input->post('tempatlahir'),
				'tgllahir'=>$this->input->post('tgllahir'),
				'agama'=>$this->input->post('agama'),
				'alamat'=>$this->input->post('alamat')
			);
			$query = $this->admin_model->simpandata('siswa', $data);
			if ($query) {
				$this->session->set_flashdata('info', 'Data Tersimpan');
				redirect('Admin/Siswa','refresh');
			} else {
				$this->session->set_flashdata('info', 'Data Gagal');
				redirect('Admin/Siswa','refresh');
			}
		}
		
	}
	public function hasis($id)
	{
		$data = $this->admin_model->formubahdata('siswa', 'id_siswa', $id);
		$this->admin_model->hapusdata('siswa', $id, 'id_siswa');
		if ($this->db->affected_rows()) {
			unlink("./public/images/".$data->foto);
			$this->session->set_flashdata('info', 'Data Berhasil Dihapus');
			redirect('Admin/Siswa','refresh');
		} else {
			$this->session->set_flashdata('info', 'Data Gagal Dihapus');
			redirect('Admin/Siswa','refresh');
		}
		
	}

	public function index()
	{
		$judul['halaman']="Halaman Utama Administrator";
		$judul['menu']="Dashboard";
		$judul['awal']="Halaman Dashboard";
		$judul['pusat']="Dashboard";
		$judul['content']="admin/dashboard";
		$judul['kelas']=$this->db->get('kelas')->num_rows();

		$this->load->view('template/wrapper', $judul, FALSE);
	}
	public function TampilKelas()
	{
		$result = $this->admin_model->kelas()->result();
		echo json_encode($result);
	}
	public function kelas()
	{
		$data1 = $this->admin_model->tampildata('guru', 'id_guru');
		$guru[null]= '--Pilih Wali Kelas--';
		foreach($data1->result() as $gru){
			$guru[$gru->id_guru] = $gru->nama;
		};
		$data = $this->admin_model->tampildata('tahunajaran', 'id_ta');
		$tahun[null]= '--Pilih Tahun Ajaran--';
		foreach($data->result() as $thn){
			$tahun[$thn->id_ta] = $thn->namasemester;
			// $tahun[$thn->id_ta] = $thn->semester;
		}
		$judul = array(
			'halaman'	=> 'Halaman Kelas',
			'menu'		=> 'Kelas',
			'awal'		=> 'Halaman Kelas',
			'pusat'		=> 'Master',
			'content'	=> 'admin/kelas',
			'guru'		=> $data1,
			'tahun'		=> $data,
			'kelas1'	=> $this->admin_model->tampildata('kelas', 'id_kelas'),
			'kelas'		=> $this->admin_model->kelas()->result(),
		);
		$this->load->view('template/wrapper', $judul, FALSE);
	}
	public function tambahkelas(){
		$data=array(
			'namakls'=>$this->input->post('namakls'),
			'id_guru'=>$this->input->post('walikelas'),
			'id_ta'=>$this->input->post('tahun'),
		);
		$this->admin_model->simpandata('kelas', $data);
	}
	public function ubahkelas(){
		$data=array(
			'namakls'=>$this->input->post('namakls'),
			'id_guru'=>$this->input->post('walikelas'),
			'id_ta'=>$this->input->post('tahun'),		
		);
		$id=$this->input->post('id_kelas');
		$this->admin_model->ubahdata('kelas', 'id_kelas', $id, $data);
	}
	public function hapuskelas(){
		$id = $this->input->get('id_kelas');
		$result = $this->admin_model->hapusdata('kelas', $id, 'id_kelas');
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
	public function hapusbanyakkelas(){
		$id = $this->input->post('id_kelas');
		$col = "id_kelas";
		$result = $this->admin_model->delete_multiple_records_by_args('kelas', $col, $id);
		echo json_encode($result);
	}
	public function guru()
	{
		$judul['halaman']="Halaman Guru";
		$judul['menu']="Guru";
		$judul['awal']="Halaman Guru";
		$judul['pusat']="Master";
		$judul['content']="admin/guru";
		$judul['guru']=$this->admin_model->tampildata('guru', 'id_guru');
		$this->load->view('template/wrapper', $judul, FALSE);
	}
	public function tambahguru(){
		$data=array(
			'nip'=>$this->input->post('nip'),
			'nama'=>$this->input->post('nama'),
			'nohp'=>$this->input->post('nohp'),
			'email'=>$this->input->post('email'),
			'alamat'=>$this->input->post('alamat'),
		);
		$this->admin_model->simpandata('guru', $data);
	}
	public function ubahguru(){
		$data=array(
			'nip'=>$this->input->post('nip'),
			'nama'=>$this->input->post('nama'),
			'nohp'=>$this->input->post('nohp'),
			'email'=>$this->input->post('email'),
			'alamat'=>$this->input->post('alamat'),	
		);
		$id=$this->input->post('id_guru');
		$this->admin_model->ubahdata('guru', 'id_guru', $id, $data);
	}
	public function hapusguru(){
		$id = $this->input->get('id_guru');
		$result = $this->admin_model->hapusdata('guru', $id, 'id_guru');
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
	public function hapusbanyakguru(){
		$id = $this->input->post('id_guru');
		$col = "id_guru";
		$result = $this->admin_model->delete_multiple_records_by_args('guru', $col, $id);
		echo json_encode($result);
	}
	public function siswa()
	{
		$judul['halaman']="Halaman Siswa";
		$judul['menu']="Siswa";
		$judul['awal']="Halaman Siswa";
		$judul['pusat']="Master";
		$judul['content']="admin/siswa";
		$judul['siswa']=$this->admin_model->tampildata('siswa', 'id_siswa');
		$this->load->view('template/wrapper', $judul, FALSE);
	}
	// public function tambahsiswa(){
	// 	$data=array(
	// 		'nis'=>$this->input->post('nis'),
	// 		'nisn'=>$this->input->post('nisn'),
	// 		'nama_siswa'=>$this->input->post('nama_siswa'),
	// 		'jk'=>$this->input->post('jk'),
	// 		'tempatlahir'=>$this->input->post('tempatlahir'),
	// 		'tgllahir'=>$this->input->post('tgllahir'),
	// 		'agama'=>$this->input->post('agama'),
	// 		'alamat'=>$this->input->post('alamat'),
	// 	);
	// 	$this->admin_model->simpandata('siswa', $data);
	// }
	public function tambahsiswa(){
		$data=array(
			'nis'=>$this->input->post('nis'),
			'nisn'=>$this->input->post('nisn'),
			'nama_siswa'=>$this->input->post('nama_siswa'),
			'jk'=>$this->input->post('jk'),
			'tempatlahir'=>$this->input->post('tempatlahir'),
			'tgllahir'=>$this->input->post('tgllahir'),
			'agama'=>$this->input->post('agama'),
			'alamat'=>$this->input->post('alamat'),
		);
		$this->admin_model->simpandata('siswa', $data);
	}
	public function ubahsiswa(){
		$data=array(
			'nis'=>$this->input->post('nis'),
			'nisn'=>$this->input->post('nisn'),
			'nama_siswa'=>$this->input->post('nama_siswa'),
			'jk'=>$this->input->post('jk'),
			'tempatlahir'=>$this->input->post('tempatlahir'),
			'tgllahir'=>$this->input->post('tgllahir'),
			'agama'=>$this->input->post('agama'),
			'alamat'=>$this->input->post('alamat'),	
		);
		$id=$this->input->post('id_siswa');
		$this->admin_model->ubahdata('siswa', 'id_siswa', $id, $data);
	}
	public function hapussiswa(){
		$id = $this->input->get('id_siswa');
		$result = $this->admin_model->hapusdata('siswa', $id, 'id_siswa');
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
	public function formubahsiswa($id){
		$judul['halaman']="Halaman Form Ubah Siswa";
		$judul['menu']="Siswa";
		$judul['awal']="Form Ubah Siswa";
		$judul['pusat']="Master";
		$judul['ubah']=$this->admin_model->formubahdata('siswa', 'id_siswa', $id);
		$judul['content']="admin/formusiswa";
		$this->load->view('template/wrapper', $judul, FALSE);
	}
	public function hapusbanyaksiswa(){
		$id = $this->input->post('id_siswa');
		$col = "id_siswa";
		$result = $this->admin_model->delete_multiple_records_by_args('siswa', $col, $id);
		echo json_encode($result);
	}
	public function mapel()
	{
		$judul['halaman']="Halaman Mata Pelajaran";
		$judul['menu']="Mata Pelajaran";
		$judul['awal']="Halaman Mata Pelajaran";
		$judul['pusat']="Master";
		$judul['content']="admin/mapel";
		$judul['mapel']=$this->admin_model->tampildata('mapel', 'id_mapel');
		$this->load->view('template/wrapper', $judul, FALSE);
	}
	public function tambahmapel()
	{
		$judul['halaman']="Halaman Form Mata Pelajaran";
		$judul['menu']="Mata Pelajaran";
		$judul['awal']="Form Tambah Mata Pelajaran";
		$judul['pusat']="Master";
		$judul['content']="admin/formmapel";
		$this->load->view('template/wrapper', $judul, FALSE);		
	}
	public function simpanmapel()
	{
		$this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required');
		$this->form_validation->set_rules('kelompok', 'Kelompok', 'required');
		if ($this->form_validation->run()==FALSE) {
			$judul['halaman']="Halaman Form Mata Pelajaran";
			$judul['menu']="Mata Pelajaran";
			$judul['awal']="Form Tambah Mata Pelajaran";
			$judul['pusat']="Master";
			$judul['content']="admin/formmapel";
			$this->load->view('template/wrapper', $judul, FALSE);
		} else {
			$data = array(
				'mapel' => $this->input->post('mapel'),
				'kelompok' => $this->input->post('kelompok')
			);
			$query = $this->admin_model->simpandata('mapel', $data);
				if ($query) {
					$this->session->set_flashdata('flash', 'Berhasil Disimpan');
					redirect('admin/mapel','refresh');
				}else{
					$this->session->set_flashdata('flash', 'Gagal Disimpan');
				}
		}
	}
	public function formubahmapel($id){
		$judul['halaman']="Halaman Form Ubah Mata Pelajaran";
		$judul['menu']="Mata Pelajaran";
		$judul['awal']="Form Ubah Mata Pelajaran";
		$judul['pusat']="Master";
		$judul['ubah']=$this->admin_model->formubahdata('mapel', 'id_mapel', $id);
		$judul['content']="admin/formumapel";
		$this->load->view('template/wrapper', $judul, FALSE);
	}
	public function ubahmapel(){
		$id = $this->input->post('id_mapel');
		$data = array(
			'mapel' => $this->input->post('mapel'),
			'kelompok' => $this->input->post('kelompok')
		);
		$query = $this->admin_model->ubahdata('mapel', 'id_mapel', $id, $data);
			if ($query) {
				$this->session->set_flashdata('flash', 'Berhasil Diubah');
				redirect('admin/mapel','refresh');
			}else{
				$this->session->set_flashdata('flash', 'Gagal Diubah');
			}
	}
	public function hapusmapel($id){
		$this->admin_model->hapusdata('mapel', $id, 'id_mapel');
		if ($this->db->affected_rows()) {
			$this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
			redirect('Admin/mapel','refresh');
		} else {
			$this->session->set_flashdata('flash', 'Data Gagal Dihapus');
			redirect('Admin/mapel','refresh');
		}		
	}
	public function hapusbanyakmapel(){
		$id = $this->input->post('id_kelas');
		$col = "id_mapel";
		$result = $this->admin_model->delete_multiple_records_by_args('mapel', $col, $id);
		echo json_encode($result);
	}
	public function sekolah($id)
	{
		$judul['halaman']="Halaman Sekolah";
		$judul['menu']="Sekolah";
		$judul['awal']="Halaman Sekolah";
		$judul['pusat']="Pengaturan";
		$judul['content']="admin/sekolah";
		$judul['ubah']=$this->admin_model->formubahdata('sekolah', 'id_sekolah', $id);
		$this->load->view('template/wrapper', $judul, FALSE);
	}
	public function ubahsekolah(){
		$id = $this->input->post('id_sekolah');
		$data = array(
			'namasekolah' => $this->input->post('namasekolah'),
			'npsn' => $this->input->post('npsn'),
			'alamat' => $this->input->post('alamat'),
			'kepsek' => $this->input->post('kepsek'),
			'nipkepsek' => $this->input->post('nipkepsek')
		);
		$query = $this->admin_model->ubahdata('sekolah', 'id_sekolah', $id, $data);
			if ($query) {
				$this->session->set_flashdata('flash', 'Berhasil Diubah');
				redirect('admin/','refresh');
			}else{
				$this->session->set_flashdata('flash', 'Gagal Diubah');
			}
	}
	public function tahunajaran()
	{
		$judul['halaman']="Halaman Tahun Ajaran";
		$judul['menu']="Tahun Ajaran";
		$judul['awal']="Halaman Tahun Ajaran";
		$judul['pusat']="Pengaturan";
		$judul['content']="admin/tahunajaran";
		$judul['ta']=$this->admin_model->tampildata('tahunajaran', 'id_ta');
		$this->load->view('template/wrapper', $judul, FALSE);
	}
	public function tambahta()
	{
		$judul['halaman']="Halaman Form Tahun Ajaran";
		$judul['menu']="Tahun Ajaran";
		$judul['awal']="Form Tambah Tahun Ajaran";
		$judul['pusat']="Pengaturan";
		$judul['content']="admin/formta";
		$this->load->view('template/wrapper', $judul, FALSE);		
	}
	public function simpanta()
	{
		$this->form_validation->set_rules('semester', 'Semester', 'required');
		$this->form_validation->set_rules('tahun', 'Tahun Ajaran', 'required');
		$this->form_validation->set_rules('nama', 'Nama Semester', 'required');
		$this->form_validation->set_rules('aktif', 'Aktif', 'required');
		if ($this->form_validation->run()==FALSE) {
			$judul['halaman']="Halaman Form TA";
			$judul['menu']="Tahun Ajaran";
			$judul['awal']="Form Tambah TA";
			$judul['pusat']="Pengaturan";
			$judul['content']="admin/formta";
			$this->load->view('template/wrapper', $judul, FALSE);
		} else {
			$data = array(
				'semester' => $this->input->post('semester'),
				'tahun' => $this->input->post('tahun'),
				'namasemester' => $this->input->post('nama'),
				'aktif' => $this->input->post('aktif')
			);
			$query = $this->admin_model->simpandata('tahunajaran', $data);
				if ($query) {
					$this->session->set_flashdata('flash', 'Berhasil Disimpan');
					redirect('admin/tahunajaran','refresh');
				}else{
					$this->session->set_flashdata('flash', 'Gagal Disimpan');
				}
		}
	}
	public function formubahta($id){
		$judul['halaman']="Halaman Form Ubah Tahun Ajaran";
		$judul['menu']="Tahun Ajaran";
		$judul['awal']="Form Ubah Tahun Ajaran";
		$judul['pusat']="Pengaturan";
		$judul['ubah']=$this->admin_model->formubahdata('tahunajaran', 'id_ta', $id);
		$judul['content']="admin/formuta";
		$this->load->view('template/wrapper', $judul, FALSE);
	}
	public function ubahta(){
		$id = $this->input->post('id_ta');
		$data = array(
			'semester' => $this->input->post('semester'),
			'tahun' => $this->input->post('tahun'),
			'namasemester' => $this->input->post('nama'),
			'aktif' => $this->input->post('aktif')
		);
		$query = $this->admin_model->ubahdata('tahunajaran', 'id_ta', $id, $data);
			if ($query) {
				$this->session->set_flashdata('flash', 'Berhasil Diubah');
				redirect('admin/tahunajaran','refresh');
			}else{
				$this->session->set_flashdata('flash', 'Gagal Diubah');
			}
	}
	public function hapusta($id){
		$this->admin_model->hapusdata('tahunajaran', $id, 'id_ta');
		if ($this->db->affected_rows()) {
			$this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
			redirect('Admin/tahunajaran','refresh');
		} else {
			$this->session->set_flashdata('flash', 'Data Gagal Dihapus');
			redirect('Admin/tahunajaran','refresh');
		}		
	}
	public function kelassiswa()
	{
		$judul['halaman']="Halaman Kelas Siswa";
		$judul['menu']="Kelas Siswa";
		$judul['awal']="Halaman Kelas Siswa";
		$judul['pusat']="Penugasan";
		$judul['content']="admin/kelassiswa";
		$judul['kelas']=$this->admin_model->tampildata('kelas', 'id_kelas');
		// $judul['kelas1']=$this->admin_model->kelassiswa()->result();
		// $judul['kelas2']=$this->db->get('kelassiswa')->num_rows();
		$this->load->view('template/wrapper', $judul, FALSE);
	}
	public function siswakelas($id_kelas)
	{
		$judul['halaman']="Halaman Kelas Siswa";
		$judul['menu']="Kelas Siswa";
		$judul['awal']="Halaman Kelas Siswa";
		$judul['pusat']="Penugasan";
		$judul['siswa']=$this->admin_model->siskel($id_kelas);
		$judul['content']="admin/siswakelas";
		$this->load->view('template/wrapper', $judul, FALSE);
	}
	public function tambahsiskel()
	{
		$data = $this->admin_model->tampildata('kelas', 'id_kelas');
		$kelas[null]= '--Pilih Kelas--';
		foreach($data->result() as $kls){
			$kelas[$kls->id_kelas] = $kls->namakls;
		};
		$judul = array(
			'halaman'	=> 'Halaman Form Set Kelas Siswa',
			'menu'		=> 'Kelas Siswa',
			'awal'		=> 'Form Setting Kelas Siswa',
			'pusat'		=> 'Penugasan',
			'content'	=> 'admin/formsiswakelas',
			'kelas'		=> $kelas, 'selectedkelas' => null,
			'siswa'		=> $this->admin_model->siswanokelas()->result(),

		);
		$this->load->view('template/wrapper', $judul, FALSE);	
	}
  	public function simpansiskel()
  	{
    	$this->form_validation->set_rules('id_siswa[]', 'Siswa', 'trim|required');
    	$this->form_validation->set_rules('id_kelas', 'Kelas', 'trim|required');
		if ($this->form_validation->run()==FALSE) {
			$judul = array(
				'halaman'	=> 'Halaman Form Set Kelas Siswa',
				'menu'		=> 'Kelas Siswa',
				'awal'		=> 'Form Setting Kelas Siswa',
				'pusat'		=> 'Penugasan',
				'content'	=> 'admin/formsiswakelas',
				'kelas'		=> $kelas, 'selectedkelas' => null,
				'siswa'		=> $this->admin_model->siswanokelas()->result(),
				);
			$this->load->view('template/wrapper', $judul, FALSE);
		} else {
			$kelas_id = $this->input->post('id_kelas');
			$siswa = count($this->input->post('id_siswa'));
		    for ($i = 0; $i < $siswa; $i++) {
		    	$datas[$i] = array(
		    		'id_siswa' => $this->input->post('id_siswa[' . $i . ']'),
		    		'id_kelas' => $kelas_id
		        );
		        $this->db->insert('kelassiswa', $datas[$i]);
		      }
		      redirect('admin/kelassiswa');
    	}
	}
	public function hapussiskel($id){
		$this->admin_model->hapusdata('kelassiswa', $id, 'id_kelassiswa');
		if ($this->db->affected_rows()) {
			$this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
			redirect('Admin/kelas','refresh');
		} else {
			$this->session->set_flashdata('flash', 'Data Gagal Dihapus');
			redirect('Admin/kelassiswa','refresh');
		}
		
	}
	public function hapussiskelb(){
		$id = $this->input->post('id_kelassiswa');
		$col = "id_kelassiswa";
		$result = $this->admin_model->delete_multiple_records_by_args('kelassiswa', $col, $id);
		echo json_encode($result);
	}
	public function gurumapel()
	{
		$judul['halaman']="Halaman Guru Mapel";
		$judul['menu']="Guru Mapel";
		$judul['awal']="Halaman Guru Mapel";
		$judul['pusat']="Penugasan";
		$judul['content']="admin/gurumapel";
		$judul['mapel1']=$this->admin_model->tampildata('mapel', 'id_mapel');
		$judul['mapel']=$this->admin_model->gurumapel()->result();
		$this->load->view('template/wrapper', $judul, FALSE);
	}
	public function tambahgm()
	{
		$data = $this->admin_model->tampildata('guru', 'id_guru');
		$guru[null]= '--Pilih Guru--';
		foreach($data->result() as $gru){
			$guru[$gru->id_guru] = $gru->nama;
		};
		$data1 = $this->admin_model->tampildata('mapel', 'id_mapel');
		$mapel[null]= '--Pilih Mata Pelajaran--';
		foreach($data1->result() as $map){
			$mapel[$map->id_mapel] = $map->mapel;
		};
		$data2 = $this->admin_model->tampildata('kelas', 'id_kelas');
		$kelas[null]= '--Pilih Kelas--';
		foreach($data2->result() as $kls){
			$kelas[$kls->id_kelas] = $kls->namakls;
		}
		$judul = array(
			'halaman'	=> 'Halaman Form Guru Mapel',
			'menu'		=> 'Guru Mapel',
			'awal'		=> 'Form Setting Guru Mapel',
			'pusat'		=> 'Penugasan',
			'content'	=> 'admin/formgm',
			'guru'		=> $guru, 'selectedguru' => null,
			'mapel'		=> $mapel, 'selectedmapel' => null,
			'kelas'		=> $kelas, 'selectedkelas' => null,

		);
		$this->load->view('template/wrapper', $judul, FALSE);	
	}
	public function simpangm()
	{
		$this->form_validation->set_rules('guru', 'Guru', 'required', array('required' => 'Guru Wajib diisi' ));
		$this->form_validation->set_rules('mapel', 'Mapel', 'required', array('required' => 'Mapel Wajib diisi' ));
		$this->form_validation->set_rules('kelas', 'Kelas', 'required', array('required' => 'Kelas Wajib diisi' ));
		if ($this->form_validation->run()==FALSE) {
			$judul = array(
				'halaman'	=> 'Halaman Form Guru Mapel',
				'menu'		=> 'Guru Mapel',
				'awal'		=> 'Form Setting Guru Mapel',
				'pusat'		=> 'Penugasan',
				'content'	=> 'admin/formgm',
				'guru'		=> $guru, 'selectedguru' => null,
				'mapel'		=> $mapel, 'selectedmapel' => null,
				'kelas'		=> $kelas, 'selectedkelas' => null,

			);
			$this->load->view('template/wrapper', $judul, FALSE);
		} else {
			$data = array(
				'id_guru' => $this->input->post('guru'),
				'id_mapel' => $this->input->post('mapel'),
				'id_kelas' => $this->input->post('kelas')
			);
			$query = $this->admin_model->simpandata('gurumapel', $data);
				if ($query) {
					$this->session->set_flashdata('flash', 'Berhasil Disimpan');
					redirect('admin/gurumapel','refresh');
				}else{
					$this->session->set_flashdata('flash', 'Gagal Disimpan');
				}
		}
	}
	public function formubahgm($id){
		$ubah = $this->admin_model->formubahdata('gurumapel', 'id_gm', $id);
		$data = $this->admin_model->tampildata('guru', 'id_guru');
		$guru[null]= '--Pilih Guru--';
		foreach($data->result() as $gru){
			$guru[$gru->id_guru] = $gru->nama;
		}
		$data1 = $this->admin_model->tampildata('mapel', 'id_mapel');
		$mapel[null]= '--Pilih Mata Pelajaran--';
		foreach($data1->result() as $map){
			$mapel[$map->id_mapel] = $map->mapel;
		}
		$data2 = $this->admin_model->tampildata('kelas', 'id_kelas');
		$kelas[null]= '--Pilih Kelas--';
		foreach($data2->result() as $kls){
			$kelas[$kls->id_kelas] = $kls->namakls;
		}
		$judul = array(
			'halaman'	=> 'Halaman Form Guru Mapel',
			'menu'		=> 'Guru Mapel',
			'awal'		=> 'Form Ubah Guru Mapel',
			'pusat'		=> 'Penugasan',
			'content'	=> 'admin/formugm',
			'guru'		=> $guru, 'selectedguru' => $ubah->id_guru,
			'mapel'		=> $mapel, 'selectedmapel' => $ubah->id_mapel,
			'kelas'		=> $kelas, 'selectedkelas' => $ubah->id_kelas,
			'ubah'		=> $ubah,
		);
		$this->load->view('template/wrapper', $judul, FALSE);
	}
	public function ubahgm(){
		$id = $this->input->post('id_gm');
		$data = array(
			'id_guru' => $this->input->post('guru'),
			'id_mapel' => $this->input->post('mapel'),
			'id_kelas' => $this->input->post('kelas')
		);
		$query = $this->admin_model->ubahdata('gurumapel', 'id_gm', $id, $data);
			if ($query) {
				$this->session->set_flashdata('flash', 'Berhasil Diubah');
				redirect('admin/gurumapel','refresh');
			}else{
				$this->session->set_flashdata('flash', 'Gagal Diubah');
			}
	}
	public function hapusgm($id){
		$this->admin_model->hapusdata('gurumapel', $id, 'id_gm');
		if ($this->db->affected_rows()) {
			$this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
			redirect('Admin/gurumapel','refresh');
		} else {
			$this->session->set_flashdata('flash', 'Data Gagal Dihapus');
			redirect('Admin/gurumapel','refresh');
		}
		
	}
	public function nilaispiritual()
	{
		$judul['halaman']="Halaman Penilaian Spiritual";
		$judul['menu']="Spiritual";
		$judul['awal']="Halaman Penilaian Spiritual";
		$judul['pusat']="Rapor";
		$judul['content']="admin/nilaispiritual";
		$judul['mapel']=$this->admin_model->tampildata('mapel', 'id_mapel');
		$this->load->view('template/wrapper', $judul, FALSE);
	}
	public function nilaisosial()
	{
		$judul['halaman']="Halaman Penilaian Sosial";
		$judul['menu']="Sosial";
		$judul['awal']="Halaman Penilaian Sosial";
		$judul['pusat']="Rapor";
		$judul['content']="admin/nilaisosial";
		$judul['mapel']=$this->admin_model->tampildata('mapel', 'id_mapel');
		$this->load->view('template/wrapper', $judul, FALSE);
	}
	public function nilaipengetahuan()
	{
		$judul['halaman']="Halaman Penilaian Pengetahuan";
		$judul['menu']="Pengetahuan";
		$judul['awal']="Halaman Penilaian Pengetahuan";
		$judul['pusat']="Rapor";
		$judul['content']="admin/nilaipengetahuan";
		$judul['mapel']=$this->admin_model->tampildata('mapel', 'id_mapel');
		$this->load->view('template/wrapper', $judul, FALSE);
	}
	public function nilaiketerampilan()
	{
		$judul['halaman']="Halaman Penilaian Keterampilan";
		$judul['menu']="Keterampilan";
		$judul['awal']="Halaman Penilaian Keterampilan";
		$judul['pusat']="Rapor";
		$judul['content']="admin/nilaiketerampilan";
		$judul['mapel']=$this->admin_model->tampildata('mapel', 'id_mapel');
		$this->load->view('template/wrapper', $judul, FALSE);
	}
	public function administrator()
	{
		$judul['halaman']="Halaman Admin";
		$judul['menu']="Admin";
		$judul['awal']="Halaman Admin";
		$judul['pusat']="Pengaturan";
		$judul['content']="admin/administrator";
		$this->load->view('template/wrapper', $judul, FALSE);
	}
	public function kelasajax()
	{
		$judul['halaman']="Halaman Kelas";
		$judul['menu']="Kelas";
		$judul['awal']="Halaman Kelas";
		$judul['pusat']="Master";
		$judul['content']="admin/kelasajax";
		$judul['kelas1']=$this->admin_model->tampildata('kelas', 'id_kelas');
		$judul['kelas']=$this->admin_model->kelas()->result();
		$this->load->view('template/wrapper', $judul, FALSE);
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */