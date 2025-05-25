<?php

class Bencana_model extends CI_Model
{
   
	public function getAllBencana(){
		$this->db->order_by("id_bencana", "desc");
		$query = $this->db->get('tb_jenis');
		return $query->result_array();
	}

	public function getBencanaIndex(){
		$this->db->order_by("id_bencana", "desc");
		$query = $this->db->get('tb_jenis', 3);
		return $query->result_array();
	}

	public function getBencanaById($id){
		return $this->db->get_where('tb_jenis',['id_bencana' => $id])->row_array();
	}

	function get_bencana_list($limit, $start)
	{
		$this->db->order_by("id_bencana", "desc");
		$query = $this->db->get('tb_jenis', $limit, $start);
		return $query;
	}

	public function tambahDataBencana(){
		date_default_timezone_set('Asia/Jakarta');
		$time = date("Y/m/d H:i:s");
		$data = [
			"judul_bencana" => $this->input->post('judul_bencana',true),
			"tgl_posting" => $time,
			"foto_bencana" => $this->input->post('foto_bencana'),
			"foto_bencana" => $this->_uploadImage()
		];
		$this->db->insert('tb_jenis',$data);
	}

	private function _uploadImage(){

		$config['upload_path']    = FCPATH . './upload/bencana/';
        $config['allowed_types']  = 'jpg|png|jpeg';
		$config['overwrite']      = TRUE;
		$config['encrypt_name'] = TRUE;
        // $config['max_size']       = 1024;
        $this->load->library('upload', $config);
		$this->upload->initialize($config);
        if ( $this->upload->do_upload('foto_bencana'))
        {
			$gbr = $this->upload->data();
			return $this->upload->data("file_name");
        }
		return "Default.jpg";
    
	}

	// Edit Data Bencana Tanpa edit Gambar
	public function ubahBencana()
    {
		date_default_timezone_set('Asia/Jakarta');
		$time = date("Y/m/d H:i:s");
		$id = $this->input->post('id');
	
        if (!empty($_FILES['foto_bencana']['name']))
		    {
			$this->hapusFotoBencana($id);
            $data = [

				"judul_bencana" => $this->input->post('judul_bencana',true),
				"foto_bencana" => $this->input->post('foto_bencana'),
				"foto_bencana" => $this->_uploadImage(),
				"tanggal_edit" => $time
            ];
		    }
			else
		    {
            $data = 
            [
                "judul_bencana" => $this->input->post('judul_bencana',true),
				"tanggal_edit" => $time
            ];
		    }

        $this->db->where('id_bencana',$id);
        $this->db->update('tb_jenis',$data);	
    }

	public function hapusFotoBencana($id){
		
		$this->db->where('id_bencana',$id);
		$query = $this->db->get('tb_jenis');
     	$row = $query->row();
		if($row->foto_bencana != 'Default.jpg')
		{
			unlink("./upload/bencana/$row->foto_bencana");
		}
	}


	public function hapusDataBencana($id){
		$this->db->where('id_bencana',$id);
		$query = $this->db->get('tb_jenis');
     	$row = $query->row();
		if($row->foto_bencana != 'Default.jpg')
		 {
			unlink("./upload/bencana/$row->foto_bencana");
		 }
     	$this->db->delete('tb_jenis', array('id_bencana' => $id));
	}

	
	public function jumlahBencana(){
		$query = $this->db->get('tb_jenis');

		if($query->num_rows()>0){
			return $query->num_rows();
		}
		else{
			return 0;
		}
	}


	public function get_bencana_keyword($keyword){
		$this->db->like('judul_bencana',$keyword);
		$this->db->or_like('isi_bencana',$keyword);
        $query  =   $this->db->get('tb_jenis');
        return $query->result_array();
	
	}

	public function jumlahcaribencana($keyword){
		$this->db->like('judul_bencana',$keyword);
		$this->db->or_like('isi_bencana',$keyword);
		$query = $this->db->get('tb_jenis');
		

		if($query->num_rows()>0){
			return $query->num_rows();
		}
		else{
			return 0;
		}
	}

	function get_cari_bencana($limit, $start, $st)
    {
        if ($st == "NIL") $st = "";
        $sql = "select * from tb_jenis where judul_bencana like '%$st%' or isi_bencana  like '%$st%' limit " . $start . ", " . $limit;
        $query = $this->db->query($sql);
        return $query;
    }


}