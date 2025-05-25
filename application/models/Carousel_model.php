<?php

class Carousel_model extends CI_Model
{  
    
	public function getAllCarousel() {
		$this->db->order_by('id_carousel', 'desc');
		$query = $this->db->get('tb_carousel');
		return $query->result_array();
	}
	

	public function getCarouselById($id){
		return $this->db->get_where('tb_carousel',['id_carousel' => $id])->row_array();
	}

	public function getAllCarouselku(){
		$query="SELECT * FROM tb_carousel";
		return $this->db->query($query)->result_array();
	}


	public function jumlahCarousel(){
		$query = $this->db->get('tb_carousel');
		if($query->num_rows()>0){
				return $query->num_rows();
		}
		else{
			return 0;
		}
	}

	public function tambahDataCarousel(){
		date_default_timezone_set('Asia/Jakarta');
		$time = date("Y/m/d H:i:s");
		$data = [
			"judul_carousel" => $this->input->post('judul_carousel',true),
			"foto_carousel" => $this->input->post('foto_carousel'),
			"foto_carousel" => $this->_uploadCarousel(),
			"tanggal_posting" => $time
		];
		$this->db->insert('tb_carousel',$data);
	}

	private function _uploadCarousel(){
		$config['upload_path']    = FCPATH . './upload/carousel/';
        $config['allowed_types']  = 'jpg|png|jpeg';
		$config['overwrite']      = TRUE;
		$config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
		$this->upload->initialize($config);
        if ( $this->upload->do_upload('foto_carousel'))
        {
			$gbr = $this->upload->data();
			$config['image_library']='gd2';
			$config['source_image']='./upload/carousel/'.$gbr['file_name'];
			$config['maintain_ratio'] = False;
			// $config['quality'] = "100%";
			$config['height']   = 768; 
			$config['width']   = 1366;
			$config['new_image']= './upload/carousel/'.$gbr['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
        	return $this->upload->data("file_name");
        }
			print_r($this->upload->display_errors());
    
	}

	
	// public function ubahCarousel(){
	// 	$data = 
	// 	[
	// 		"judul_carousel" => $this->input->post('judul_carousel',true)
	// 	];
	// 	$this->db->where('id_carousel',$this->input->post('id'));
	// 	$this->db->update('carousel',$data);
	// }


	// public function ubahFotoCarousel(){
	// 	$data = 
	// 	[
	// 		"judul_carousel" => $this->input->post('judul_carousel',true),
	// 		"foto_carousel" => $this->input->post('foto_carousel'),
	// 		"foto_carousel" => $this->_uploadCarousel()
	// 	];
	// 	$this->db->where('id_carousel',$this->input->post('id'));
	// 	$this->db->update('tb_carousel',$data);
	// }

	public function ubahCarousel()
    {
		date_default_timezone_set('Asia/Jakarta');
		$time = date("Y/m/d H:i:s");
		$id = $this->input->post('id');
	
        if (!empty($_FILES['foto_carousel']['name']))
		    {
			$this->hapusFotoCarousel($id);
            $data = [

				"judul_carousel" => $this->input->post('judul_carousel',true),
				"foto_carousel" => $this->input->post('foto_carousel'),
				"foto_carousel" => $this->_uploadCarousel(),
				"tanggal_edit" => $time
            ];
		    }
			else
		    {
            $data = 
            [
                "judul_carousel" => $this->input->post('judul_carousel',true),
				"tanggal_edit" => $time
            ];
		    }

        $this->db->where('id_carousel',$id);
        $this->db->update('tb_carousel',$data);	
    }

	public function hapusFotoCarousel($id){
		
		$this->db->where('id_carousel',$id);
		$query = $this->db->get('tb_carousel');
     	$row = $query->row();
		unlink("./upload/carousel/$row->foto_carousel");
	}

	 
	public function hapusDataCarousel($id){
		// $this->db->where('id_carousel',$id);
		// $this->db->delete('carousel');

		$this->db->where('id_carousel',$id);
		$query = $this->db->get('tb_carousel');
     	$row = $query->row();
		if($row->foto_carousel != 'Default.jpg')
		 {
			unlink("./upload/carousel/$row->foto_carousel");
		 }
     	$this->db->delete('tb_carousel', array('id_carousel' => $id));
	}


}