<?php

class Komentar_model extends CI_Model
{  
    
    public function getAllKomentar(){
		$query = $this->db->get('tb_komentar');
		return $query->result_array();
	}

	public function tambahDataKomentar(){
		date_default_timezone_set('Asia/Jakarta');
		$time = date("Y/m/d H:i:s");
		$data = [
			"keterangan" => $this->input->post('keterangan',true),
            "author" => $this->input->post('author'),
			"tgl_posting" => $time
		];
		$this->db->insert('tb_komentar',$data);
	}

	 
	public function hapusDataKomentar($id){


     	$this->db->delete('tb_komentar', array('id_komentar' => $id));
	}


}