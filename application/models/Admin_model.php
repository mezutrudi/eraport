<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	public function showAllKelas(){
		$this->db->order_by('id_kelas', 'desc');
		$query = $this->db->get('kelas');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function addKelas(){
		$field = array(
			'namakls'=>$this->input->post('namakls'),
			'id_guru'=>$this->input->post('walikelas'),
			'id_ta'=>$this->input->post('tahun')
			);
		$this->db->insert('kelas', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	function hapusdata($table, $id, $primary){
		$this->db->where($primary, $id);
		$this->db->delete($table);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	function hapusguru(){
		$id_guru = $this->input->get('id_guru');
		$this->db->where('id_guru', $id_guru);
		$this->db->delete('guru');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	public function tampildata($table, $id){
		return $this->db->from($table)
					->order_by($id, 'DESC')
					->get('');
	}
	function getData(){
		return $this->db->get('kelas')->result();
	}
	public function simpandata($table, $data){
		return $this->db->insert($table, $data);
	}
	public function formubahdata($table, $primary, $id){
		return $this->db->get_where($table, array($primary=>$id))->row();
	}
	public function ubahdata($table, $primary, $id, $data){
		return $this->db->where($primary, $id)
						->update($table, $data);
						
	}
	// public function hapusdata($table, $id, $primary){
	// 	return $this->db->delete($table, array($primary=>$id));
		
	// }
	public function delete_multiple_records_by_args($table, $col, $id){
		$delete_rec = $this->db->where_in($col, $id)
								->delete($table);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
		
	}
	public function kelas(){
		return $this->db->select('*')
						->from('kelas')
						->join('tahunajaran', 'kelas.id_ta = tahunajaran.id_ta')
						->join('guru', 'kelas.id_guru = guru.id_guru')
						->order_by('kelas.id_kelas', 'DESC')
						->get();
	}
	public function gurumapel(){
		return $this->db->select('*')
						->from('gurumapel')
						->join('guru', 'gurumapel.id_guru = guru.id_guru')
						->join('mapel', 'gurumapel.id_mapel = mapel.id_mapel')
						->join('kelas', 'gurumapel.id_kelas = kelas.id_kelas')
						->order_by('gurumapel.id_gm', 'DESC')
						->get();
	}
    public function siskel($id)
    {
        return $this->db->select('kelsis.id_kelassiswa, siswa.nama_siswa, siswa.nis')
                        ->from('kelassiswa as kelsis')
                        ->where('kelsis.id_kelas',$id)
                        ->join('siswa as siswa','kelsis.id_siswa = siswa.id_siswa')
                        ->order_by('kelsis.id_kelassiswa', 'DESC')
                        ->get();
    
       
    }
    public function hitung_ambil($table, $primary, $id)
    {
        return $this->db->get_where($table, array($primary=>$id));
    }
    public function siswanokelas()
    {
    	return $this->db->where("not exists (select id_kelassiswa from kelassiswa where siswa.id_siswa=kelassiswa.id_siswa)",null,false)
    					->order_by('id_siswa', 'DESC')
    					->get('siswa');
    }
    // public function hitung_ambil($table, $primary, $id){
    //     return $this->db->get_where($table, array($primary=>$id));
    // }    

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */