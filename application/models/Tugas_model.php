<?php

class Tugas_model extends CI_Model
{
   
	public function getAllTugas(){
		$this->db->select('tb_tugas.*, tb_jenis.judul_bencana as kategori');
		$this->db->from('tb_tugas');
		$this->db->join('tb_jenis', 'tb_tugas.kategori = tb_jenis.id_bencana');
		$this->db->order_by("id_tugas", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getTugasIndex(){
		$this->db->select('tb_tugas.*, tb_koten.judul_konten');
		$this->db->from('tb_tugas');
		$this->db->join('tb_konten', 'tb_tugas.id_konten = tb_konten.id_konten');
		$this->db->order_by("tb_tugas.id_tugas", "desc"); // perbaikan pada kolom yang diurutkan
		$this->db->limit(3); // perbaikan pada penggunaan limit
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getTugasById($id){
		$this->db->select('tb_tugas.*, tb_koten.judul_konten');
		$this->db->from('tb_tugas');
		$this->db->join('tb_konten', 'tb_tugas.id_konten = tb_konten.id_konten');
		$this->db->where("id_tugas", $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getTugasByIdedit($id){
		$this->db->select('tb_tugas.*');
		$this->db->from('tb_tugas');
		$this->db->where("id_tugas", $id);
		$query = $this->db->get();
		return $query->row_array();
	}


	function get_tugas_list($limit, $start)
{
	$this->db->select('tb_tugas.*, tb_koten.judul_konten');
	$this->db->from('tb_tugas');
	$this->db->join('tb_konten', 'tb_tugas.id_konten = tb_konten.id_konten');
	$this->db->order_by("tb_tugas.id_tugas", "desc"); // perbaikan pada kolom yang diurutkan
	$this->db->limit($limit, $start); // perbaikan pada penggunaan limit
	$query = $this->db->get();
	return $query;
}


	public function tambahDataTugas(){
		date_default_timezone_set('Asia/Jakarta');
		$time = date("Y/m/d H:i:s");
		if (!empty($_FILES['foto_tugas']['name']))
		{
			$data = [
				"author" => $this->input->post('author'),
				"judul_tugas" => $this->input->post('judul_tugas',true),
				"isi_tugas" => $this->input->post('isi_tugas'),
				"tgl_posting" => $time,
				"kategori" => $this->input->post('kategori'),
				"foto_tugas" => $this->input->post('foto_tugas'),
				"foto_tugas" => $this->_uploadImage()
			];

		}
		else
		{
			$data = [
				"author" => $this->input->post('author'),
				"judul_tugas" => $this->input->post('judul_tugas',true),
				"isi_tugas" => $this->input->post('isi_tugas'),
				"tgl_posting" => $time,
				"kategori" => $this->input->post('kategori'),
			];
		}
		
		$this->db->insert('tb_tugas',$data);
	}

	// Edit Data Tugas Tanpa edit Gambar
	public function ubahTugas()
    {
		date_default_timezone_set('Asia/Jakarta');
		$time = date("Y/m/d H:i:s");
		$id = $this->input->post('id');
	
        if (!empty($_FILES['foto_tugas']['name']))
		    {
			$this->hapusFotoTugas($id);
            $data = [

				"judul_tugas" => $this->input->post('judul_tugas',true),
				"isi_tugas" => $this->input->post('isi_tugas'),
				"kategori" => $this->input->post('kategori'),
				"foto_tugas" => $this->input->post('foto_tugas'),
				"foto_tugas" => $this->_uploadImage(),
				"tanggal_edit" => $time
            ];
		    }
			else
		    {
            $data = 
            [
                "judul_tugas" => $this->input->post('judul_tugas',true),
				"isi_tugas" => $this->input->post('isi_tugas'),
				"kategori" => $this->input->post('kategori'),
				"tanggal_edit" => $time
            ];
		    }

        $this->db->where('id_tugas',$id);
        $this->db->update('tb_tugas',$data);	
    }


	public function hapusDataTugas($id){
		$this->db->where('id_tugas',$id);
		$query = $this->db->get('tb_tugas');
     	$row = $query->row();
     	$this->db->delete('tb_tugas', array('id_tugas' => $id));
	}

	
	public function jumlahTugas(){
		$query = $this->db->get('tb_tugas');

		if($query->num_rows()>0){
			return $query->num_rows();
		}
		else{
			return 0;
		}
	}


	public function get_tugas_keyword($keyword){
		$this->db->like('judul_tugas',$keyword);
		$this->db->or_like('isi_tugas',$keyword);
        $query  =   $this->db->get('tb_tugas');
        return $query->result_array();
	
	}

	public function jumlahcaritugas($keyword){
		$this->db->like('judul_tugas',$keyword);
		$this->db->or_like('isi_tugas',$keyword);
		$query = $this->db->get('tb_tugas');
		

		if($query->num_rows()>0){
			return $query->num_rows();
		}
		else{
			return 0;
		}
	}

	function get_cari_tugas($limit, $start, $st)
    {
        if ($st == "NIL") $st = "";
        $sql = "select * from tb_tugas where judul_tugas like '%$st%' or isi_tugas  like '%$st%' limit " . $start . ", " . $limit;
        $query = $this->db->query($sql);
        return $query;
    }


}