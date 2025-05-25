<?php

class User_model extends CI_Model
{

    public function getAllUser(){
        $query = $this->db->get('users');
        return $query->result_array();
    }

    
    public function jumlahPengguna(){
        $query = $this->db->get('users');

        if($query->num_rows()>0){
                return $query->num_rows();
        }
        else{
            return 0;
        }
    }

    public function getUserIndex()
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get('users', 3);
        return $query->result_array();
    }
    public function getUserById($id)
    {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }
    public function ubahUser()
    {
        $data = [
            "nama_depan" => $this->input->post('nama_depan', true),
            "nama_belakang" => $this->input->post('nama_belakang'),
            "email" => $this->input->post('email'),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('users
        ', $data);
    }

    public function hapusDataUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }
}
