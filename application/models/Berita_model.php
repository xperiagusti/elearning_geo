<?php

class Berita_model extends CI_Model
{
   
	public function getAllBerita(){
		$this->db->order_by("id_berita", "desc");
		$query = $this->db->get('tb_berita');
		return $query->result_array();
	}

	public function getBeritaIndex(){
		$this->db->order_by("id_berita", "desc");
		$query = $this->db->get('tb_berita', 3);
		return $query->result_array();
	}

	public function getBeritaById($id){
		return $this->db->get_where('tb_berita',['id_berita' => $id])->row_array();
	}

	function get_berita_list($limit, $start)
	{
		$this->db->order_by("id_berita", "desc");
		$query = $this->db->get('tb_berita', $limit, $start);
		return $query;
	}

	public function tambahDataBerita(){
		date_default_timezone_set('Asia/Jakarta');
		$time = date("Y/m/d H:i:s");
		$data = [
			"author" => $this->input->post('author'),
			"judul_berita" => $this->input->post('judul_berita',true),
			"isi_berita" => $this->input->post('isi_berita'),
			"tgl_posting" => $time,
			"kategori" => $this->input->post('kategori'),
			"foto_berita" => $this->input->post('foto_berita'),
			"foto_berita" => $this->_uploadImage()
		];
		$this->db->insert('tb_berita',$data);
	}

	private function _uploadImage(){

		$config['upload_path']    = FCPATH . './upload/berita/';
        $config['allowed_types']  = 'jpg|png|jpeg';
		$config['overwrite']      = TRUE;
		$config['encrypt_name'] = TRUE;
        // $config['max_size']       = 1024;
        $this->load->library('upload', $config);
		$this->upload->initialize($config);
        if ( $this->upload->do_upload('foto_berita'))
        {
			$gbr = $this->upload->data();
			$config['image_library']='gd2';
			$config['source_image']='./upload/berita/'.$gbr['file_name'];
			$config['maintain_ratio'] = TRUE;
			$config['height']   = 720;
			$config['width'] = 1280;
			$config['new_image']= './upload/berita/'.$gbr['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			return $this->upload->data("file_name");
        }
		return "Default.jpg";
    
	}

	// Edit Data Berita Tanpa edit Gambar
	public function ubahBerita()
    {
		date_default_timezone_set('Asia/Jakarta');
		$time = date("Y/m/d H:i:s");
		$id = $this->input->post('id');
	
        if (!empty($_FILES['foto_berita']['name']))
		    {
			$this->hapusFotoBerita($id);
            $data = [

				"judul_berita" => $this->input->post('judul_berita',true),
				"isi_berita" => $this->input->post('isi_berita'),
				"kategori" => $this->input->post('kategori'),
				"foto_berita" => $this->input->post('foto_berita'),
				"foto_berita" => $this->_uploadImage(),
				"tanggal_edit" => $time
            ];
		    }
			else
		    {
            $data = 
            [
                "judul_berita" => $this->input->post('judul_berita',true),
				"isi_berita" => $this->input->post('isi_berita'),
				"kategori" => $this->input->post('kategori'),
				"tanggal_edit" => $time
            ];
		    }

        $this->db->where('id_berita',$id);
        $this->db->update('tb_berita',$data);	
    }

	public function hapusFotoBerita($id){
		
		$this->db->where('id_berita',$id);
		$query = $this->db->get('tb_berita');
     	$row = $query->row();
		if($row->foto_berita != 'Default.jpg')
		{
			unlink("./upload/berita/$row->foto_berita");
		}
	}


	public function hapusDataBerita($id){
		$this->db->where('id_berita',$id);
		$query = $this->db->get('tb_berita');
     	$row = $query->row();
		if($row->foto_berita != 'Default.jpg')
		 {
			unlink("./upload/berita/$row->foto_berita");
		 }
     	$this->db->delete('tb_berita', array('id_berita' => $id));
	}

	
	public function jumlahBerita(){
		$query = $this->db->get('tb_berita');

		if($query->num_rows()>0){
			return $query->num_rows();
		}
		else{
			return 0;
		}
	}


	public function get_berita_keyword($keyword){
		$this->db->like('judul_berita',$keyword);
		$this->db->or_like('isi_berita',$keyword);
        $query  =   $this->db->get('tb_berita');
        return $query->result_array();
	
	}

	public function jumlahcariberita($keyword){
		$this->db->like('judul_berita',$keyword);
		$this->db->or_like('isi_berita',$keyword);
		$query = $this->db->get('tb_berita');
		

		if($query->num_rows()>0){
			return $query->num_rows();
		}
		else{
			return 0;
		}
	}

	public function jumlahcarikategori($keyword){
		$this->db->like('kategori',$keyword);
		$query = $this->db->get('tb_berita');
		if($query->num_rows()>0){
			return $query->num_rows();
		}
		else{
			return 0;
		}
	}

	function get_cari_berita($limit, $start, $st)
    {
        if ($st == "NIL") $st = "";
        $sql = "select * from tb_berita where judul_berita like '%$st%' or isi_berita  like '%$st%' limit " . $start . ", " . $limit;
        $query = $this->db->query($sql);
        return $query;
    }

	function get_berita_kategori($limit, $start, $st)
    {
        if ($st == "NIL") $st = "";
        $sql = "select * from tb_berita where kategori like '%$st%' limit " . $start . ", " . $limit;
        $query = $this->db->query($sql);
        return $query;
    }


}