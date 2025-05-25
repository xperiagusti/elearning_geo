<?php

class Lokasi_model extends CI_Model
{
   
	public function getAllLokasi(){
	
		$this->db->select('tb_bencana.*, tb_jenis.judul_bencana,tb_jenis.foto_bencana ');
		$this->db->from('tb_bencana');
		$this->db->join('tb_jenis', 'tb_bencana.id_bencana = tb_jenis.id_bencana');
		$this->db->order_by("idBencana", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getTotalBencana() {
		$query = "SELECT provinsiBencana, COUNT( id_bencana) AS jumlah_bencana FROM tb_bencana WHERE latitudeBencana IS NOT NULL AND longitudeBencana IS NOT NULL GROUP BY provinsiBencana";
		$result = $this->db->query($query)->result_array();
	
		$data = [];
		foreach ($result as $row) {
			$data[$row['provinsiBencana']] = $row['jumlah_bencana'];
		}
	
		return $data;
	}

	public function getJumlahBencana() {
		$query = "SELECT tb_bencana.provinsiBencana, tb_jenis.judul_bencana, COUNT( tb_bencana.id_bencana) AS jumlah_bencana FROM tb_bencana JOIN tb_jenis ON tb_bencana.id_bencana = tb_jenis.id_bencana WHERE tb_bencana.latitudeBencana IS NOT NULL AND tb_bencana.longitudeBencana IS NOT NULL GROUP BY tb_bencana.provinsiBencana, tb_jenis.judul_bencana";
		$result = $this->db->query($query)->result_array();
	
		$data = [];
		foreach ($result as $row) {
			$provinsi = $row['provinsiBencana'];
			$kategori = $row['judul_bencana'];
			$jumlahBencana = $row['jumlah_bencana'];
	
			if (!isset($data[$provinsi])) {
				$data[$provinsi] = [];
			}
	
			if (!isset($data[$provinsi][$kategori])) {
				$data[$provinsi][$kategori] = 0;
			}
	
			$data[$provinsi][$kategori] += $jumlahBencana;
		}
	
		return $data;
	}
	
	
	
	


	public function getLokasiById($id){
		return $this->db->get_where('tb_bencana',['idBencana' => $id])->row_array();
	}



	public function tambahDataLokasi(){
		date_default_timezone_set('Asia/Jakarta');
		$time = date("Y/m/d H:i:s");
		$data = [
			    "id_bencana" => $this->input->post('id_bencana'),
				"tahunBencana" => $this->input->post('tahunBencana'),
				"bulanBencana" => $this->input->post('bulanBencana'),
				"provinsiBencana" => $this->input->post('provinsiBencana'),
				"kotaBencana" => $this->input->post('kotaBencana'),
                "keteranganBencana" => $this->input->post('keteranganBencana'),
                "latitudeBencana" => $this->input->post('latitudeBencana'),
                "longitudeBencana" => $this->input->post('longitudeBencana'),
                "lokasiBencana" => $this->input->post('lokasiBencana')
		];
		$this->db->insert('tb_bencana',$data);
	}

	// Edit Data Lokasi Tanpa edit Gambar
	public function ubahLokasi()
    {
		date_default_timezone_set('Asia/Jakarta');
		$time = date("Y/m/d H:i:s");
		$id = $this->input->post('id');
        $data = [
				"id_bencana" => $this->input->post('id_bencana'),
				"tahunBencana" => $this->input->post('tahunBencana'),
				"bulanBencana" => $this->input->post('bulanBencana'),
				"provinsiBencana" => $this->input->post('provinsiBencana'),
				"kotaBencana" => $this->input->post('kotaBencana'),
                "keteranganBencana" => $this->input->post('keteranganBencana'),
                "latitudeBencana" => $this->input->post('latitudeBencana'),
                "longitudeBencana" => $this->input->post('longitudeBencana'),
                "lokasiBencana" => $this->input->post('lokasiBencana')
            ];
        $this->db->where('idBencana',$id);
        $this->db->update('tb_bencana',$data);	
    }


	public function hapusDataLokasi($id){
     	$this->db->delete('tb_bencana', array('idBencana' => $id));
	}

	
	public function jumlahLokasi(){
		$query = $this->db->get('tb_bencana');

		if($query->num_rows()>0){
			return $query->num_rows();
		}
		else{
			return 0;
		}
	}


}