<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelas extends CI_Model {

	public function tampildata($table, $id){
		return $this->db->from($table)
					->order_by($id, 'DESC')
					->get('');
	}
    function hitung_ambil($table, $primary, $id){
        return $this->db->get_where($table, array($primary=>$id));
    }

}

/* End of file M_kelas.php */
/* Location: ./application/models/M_kelas.php */