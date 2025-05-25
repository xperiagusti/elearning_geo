<?php
defined('BASEPATH') or exit('no direct script access allowed');

class M_data extends CI_Model
{


	//fungsi untuk mengambil data dari database
	public function get_data($table)
	{
		return $this->db->get($table);
	}

	//fungsi untuk insert data ke database
	public function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	//fungsi untuk mengambil data untuk di edit
	public function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	//fungsi untuk mengupdate data di database
	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	//fungsi untuk menghapus data
	public function delete_data($where, $table)
	{
		$this->db->delete($table, $where);
	}

	// Fungsi untuk melakukan proses upload file import
	public function insertimport($data)
	{
		$this->db->insert_batch('tb_mahasiswa', $data);
	}

	public function insertbatch($data)
	{
		$this->db->insert_batch($table, $data);
	}


	public function soal($where, $table)
	{

		$this->db->order_by("RAND ()");
		return $this->db->get_where($table, $where);
	}

	public function insert_jawaban()
	{

		$this->db->insert_batch('tb_jawaban', $entri);
		return true;
	}

	public function UpdateNilai($id_jawaban, $data)
	{
		$this->db->where('id_jawaban', $id_jawaban);
		$this->db->update('tb_jawaban', $data);
	}

	public function UpdateNilai2($id_peserta, $data)
	{
		$this->db->where('id_peserta', $id_peserta);
		$this->db->update('tb_peserta', $data);
	}

	
}
