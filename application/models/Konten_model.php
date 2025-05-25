<?php

class Konten_model extends CI_Model
{
   
	public function getAllKonten(){
		$this->db->select('tb_konten.*, tb_jenis.judul_bencana as kategori');
		$this->db->from('tb_konten');
		$this->db->join('tb_jenis', 'tb_konten.kategori = tb_jenis.id_bencana');
		$this->db->order_by("id_konten", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getLokasiBencana($id){
	
		$this->db->select('tb_bencana.*, tb_jenis.judul_bencana,tb_jenis.foto_bencana');
		$this->db->from('tb_konten');
		$this->db->join('tb_bencana', 'tb_konten.kategori = tb_bencana.id_bencana');
		$this->db->join('tb_jenis', 'tb_bencana.id_bencana = tb_jenis.id_bencana');
		$this->db->where("id_konten", $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	
	


	

	public function getKontenIndex(){
		$this->db->select('tb_konten.*, tb_jenis.judul_bencana as kategori');
		$this->db->from('tb_konten');
		$this->db->join('tb_jenis', 'tb_konten.kategori = tb_jenis.id_bencana');
		$this->db->order_by("tb_konten.id_konten", "desc"); // perbaikan pada kolom yang diurutkan
		$this->db->limit(3); // perbaikan pada penggunaan limit
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getKontenById($id){
		$this->db->select('tb_konten.*, tb_jenis.judul_bencana as kategori');
		$this->db->from('tb_konten');
		$this->db->join('tb_jenis', 'tb_konten.kategori = tb_jenis.id_bencana');
		$this->db->where("id_konten", $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getKontenByIdedit($id){
		$this->db->select('tb_konten.*');
		$this->db->from('tb_konten');
		$this->db->where("id_konten", $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	// function get_konten_list($limit, $start)
	// {
	// 	$this->db->order_by("id_konten", "desc");
	// 	$query = $this->db->get('tb_konten', $limit, $start);
	// 	return $query;
	// }

	function get_konten_list($limit, $start)
{
	$this->db->select('tb_konten.*, tb_jenis.judul_bencana as kategori');
	$this->db->from('tb_konten');
	$this->db->join('tb_jenis', 'tb_konten.kategori = tb_jenis.id_bencana');
	$this->db->order_by("tb_konten.id_konten", "desc"); // perbaikan pada kolom yang diurutkan
	$this->db->limit($limit, $start); // perbaikan pada penggunaan limit
	$query = $this->db->get();
	return $query;
}


	public function tambahDataKonten(){
		date_default_timezone_set('Asia/Jakarta');
		$time = date("Y/m/d H:i:s");
		if (!empty($_FILES['foto_konten']['name']))
		{
			$data = [
				"author" => $this->input->post('author'),
				"judul_konten" => $this->input->post('judul_konten',true),
				"isi_konten" => $this->input->post('isi_konten'),
				"tgl_posting" => $time,
				"kategori" => $this->input->post('kategori'),
				"foto_konten" => $this->input->post('foto_konten'),
				"foto_konten" => $this->_uploadImage()
			];

		}
		else
		{
			$data = [
				"author" => $this->input->post('author'),
				"judul_konten" => $this->input->post('judul_konten',true),
				"isi_konten" => $this->input->post('isi_konten'),
				"tgl_posting" => $time,
				"kategori" => $this->input->post('kategori'),
			];
		}
		
		$this->db->insert('tb_konten',$data);
	}

	private function _uploadImage(){

		$config['upload_path']    = FCPATH . './upload/konten/';
        $config['allowed_types']  = 'jpg|png|jpeg';
		$config['overwrite']      = TRUE;
		$config['encrypt_name'] = TRUE;
        // $config['max_size']       = 1024;
        $this->load->library('upload', $config);
		$this->upload->initialize($config);
        if ( $this->upload->do_upload('foto_konten'))
        {
			$gbr = $this->upload->data();
			$config['image_library']='gd2';
			$config['source_image']='./upload/konten/'.$gbr['file_name'];
			$config['maintain_ratio'] = TRUE;
			$config['height']   = 720;
			$config['width'] = 1280;
			$config['new_image']= './upload/konten/'.$gbr['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			return $this->upload->data("file_name");
        }
		return "Default.jpg";
    
	}

	// Edit Data Konten Tanpa edit Gambar
	public function ubahKonten()
    {
		date_default_timezone_set('Asia/Jakarta');
		$time = date("Y/m/d H:i:s");
		$id = $this->input->post('id');
	
        if (!empty($_FILES['foto_konten']['name']))
		    {
			$this->hapusFotoKonten($id);
            $data = [

				"judul_konten" => $this->input->post('judul_konten',true),
				"isi_konten" => $this->input->post('isi_konten'),
				"kategori" => $this->input->post('kategori'),
				"foto_konten" => $this->input->post('foto_konten'),
				"foto_konten" => $this->_uploadImage(),
				"tanggal_edit" => $time
            ];
		    }
			else
		    {
            $data = 
            [
                "judul_konten" => $this->input->post('judul_konten',true),
				"isi_konten" => $this->input->post('isi_konten'),
				"kategori" => $this->input->post('kategori'),
				"tanggal_edit" => $time
            ];
		    }

        $this->db->where('id_konten',$id);
        $this->db->update('tb_konten',$data);	
    }

	public function hapusFotoKonten($id){
		
		$this->db->where('id_konten',$id);
		$query = $this->db->get('tb_konten');
     	$row = $query->row();
		if($row->foto_konten != 'Default.jpg')
		{
			unlink("./upload/konten/$row->foto_konten");
		}
	}


	public function hapusDataKonten($id){
		$this->db->where('id_konten',$id);
		$query = $this->db->get('tb_konten');
     	$row = $query->row();
		if($row->foto_konten != 'Default.jpg')
		 {
			unlink("./upload/konten/$row->foto_konten");
		 }
     	$this->db->delete('tb_konten', array('id_konten' => $id));
	}

	
	public function jumlahKonten(){
		$query = $this->db->get('tb_konten');

		if($query->num_rows()>0){
			return $query->num_rows();
		}
		else{
			return 0;
		}
	}


	public function get_konten_keyword($keyword){
		$this->db->like('judul_konten',$keyword);
		$this->db->or_like('isi_konten',$keyword);
        $query  =   $this->db->get('tb_konten');
        return $query->result_array();
	
	}

	public function jumlahcarikonten($keyword){
		$this->db->like('judul_konten',$keyword);
		$this->db->or_like('isi_konten',$keyword);
		$query = $this->db->get('tb_konten');
		

		if($query->num_rows()>0){
			return $query->num_rows();
		}
		else{
			return 0;
		}
	}

	function get_cari_konten($limit, $start, $st)
    {
        if ($st == "NIL") $st = "";
        $sql = "select tb_konten.*, tb_jenis.judul_bencana as kategori from tb_konten join tb_jenis on tb_konten.kategori=tb_jenis.id_bencana where judul_konten like '%$st%' or isi_konten  like '%$st%' limit " . $start . ", " . $limit;
        $query = $this->db->query($sql);
        return $query;
    }


}