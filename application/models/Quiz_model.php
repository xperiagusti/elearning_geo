<?php

class Quiz_model extends CI_Model
{
   
	public function getAllQuiz(){
		$this->db->select('tb_soal_ujian.*, tb_konten.judul_konten as topik');
		$this->db->from('tb_soal_ujian');
		$this->db->join('tb_konten', 'tb_soal_ujian.id_konten = tb_konten.id_konten');
		$this->db->order_by("id_soal_ujian", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}


	public function getQuizById($id){
		return $this->db->get_where('tb_soal_ujian',['id_soal_ujian' => $id])->row_array();
	}

    public function getTopik(){
        $this->db->distinct();
		$this->db->select('tb_soal_ujian.id_konten, tb_konten.judul_konten as topik');
		$this->db->from('tb_soal_ujian');
		$this->db->join('tb_konten', 'tb_soal_ujian.id_konten = tb_konten.id_konten');
		$query = $this->db->get();
		return $query->result_array();
	}

    public function getAllPeserta(){
		$this->db->select('tb_peserta.*, users.nama_depan, users.nama_belakang, tb_konten.judul_konten as topik');
		$this->db->from('tb_peserta');
		$this->db->join('tb_konten', 'tb_peserta.id_konten = tb_konten.id_konten');
        $this->db->join('users', 'tb_peserta.id_user = users.id');
		$this->db->order_by("id_peserta", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getUser(){
		return $this->db->get_where('users',['role_id' => 2])->result_array();
	}


	public function getPesertaById($id){
		return $this->db->get_where('tb_peserta',['id_peserta' => $id])->row_array();
	}

	// function get_quiz_list($limit, $start)
	// {
	// 	$this->db->order_by("id_soal_ujian", "desc");
	// 	$query = $this->db->get('tb_soal_ujian', $limit, $start);
	// 	return $query;
	// }

	function get_quiz_list($id,$limit, $start)
	{
	$this->db->select('tb_konten.*, tb_peserta.*');
	$this->db->from('tb_peserta');
	$this->db->join('tb_konten', 'tb_peserta.id_konten = tb_konten.id_konten');
	$this->db->order_by("tb_peserta.id_peserta", "desc"); // perbaikan pada kolom yang diurutkan
	$this->db->where("id_user", $id);
	$this->db->limit($limit, $start); // perbaikan pada penggunaan limit
	$query = $this->db->get();
	return $query;
	}

	public function tambahDataQuiz(){
	
		$data = [
			"id_konten" => $this->input->post('id_konten'),
			"pertanyaan" => $this->input->post('pertanyaan'),
			// "a" => $this->input->post('a'),
			// "b" => $this->input->post('b'),
            // "c" => $this->input->post('c'),
            // "d" => $this->input->post('d'),
            // "e" => $this->input->post('e'),
            // "kunci_jawaban" => $this->input->post('kunci_jawaban')
		];
		$this->db->insert('tb_soal_ujian',$data);
	}

    public function tambahDataPeserta(){
	
		$peserta 		= $this->input->post('id_user');
		$id_konten 			= $this->input->post('id_konten');
		$durasi_pg		= $this->input->post('durasi_pg');
		$timer_pg 		= $durasi_pg*60;

        $data = [
            'id_user'		=> $peserta,
            'id_konten'		=> $id_konten,
            // 'durasi_pg'			=> $durasi_pg,
            // 'timer_pg'			=> $timer_pg,
            'status_quiz'			=> 1,
        ];

		$this->db->insert('tb_peserta',$data);
	}

    public function editDataPeserta(){
	
        $id 		= $this->input->post('id');
		$peserta 		= $this->input->post('id_user');
		$id_konten 			= $this->input->post('id_konten');
		$durasi_pg		= $this->input->post('durasi_pg');
		$timer_pg 		= $durasi_pg*60;

        $data = [
            'id_user'		=> $peserta,
            'id_konten'		=> $id_konten,
            // 'durasi_pg'			=> $durasi_pg,
            // 'timer_pg'			=> $timer_pg,
        ];
        $this->db->where('id_peserta',$id);
		$this->db->update('tb_peserta',$data);
	}

	
	// Edit Data Quiz Tanpa edit Gambar
	public function ubahQuiz()
    {
		$id = $this->input->post('id');
	     
            $data = [
                "id_konten" => $this->input->post('id_konten'),
                "pertanyaan" => $this->input->post('pertanyaan'),
                // "a" => $this->input->post('a'),
                // "b" => $this->input->post('b'),
                // "c" => $this->input->post('c'),
                // "d" => $this->input->post('d'),
                // "e" => $this->input->post('e'),
                // "kunci_jawaban" => $this->input->post('kunci_jawaban')
            ];

        $this->db->where('id_soal_ujian',$id);
        $this->db->update('tb_soal_ujian',$data);	
    }

	

	public function hapusDataQuiz($id){
		$this->db->where('id_soal_ujian',$id);
		$query = $this->db->get('tb_soal_ujian');
     	$row = $query->row();
     	$this->db->delete('tb_soal_ujian', array('id_soal_ujian' => $id));
	}

	public function hapusPesertaQuiz($id){
		$this->db->where('id_peserta',$id);
		$query = $this->db->get('tb_peserta');
     	$row = $query->row();
     	$this->db->delete('tb_peserta', array('id_peserta' => $id));
	}

	
	public function jumlahQuiz(){
		$query = $this->db->get('tb_soal_ujian');

		if($query->num_rows()>0){
			return $query->num_rows();
		}
		else{
			return 0;
		}
	}

	public function jumlahPeserta(){
		$query = $this->db->get('tb_peserta');

		if($query->num_rows()>0){
			return $query->num_rows();
		}
		else{
			return 0;
		}
	}


	


}