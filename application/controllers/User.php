<?php

class User extends CI_Controller
{
	public function __construct(){
		parent:: __construct();
		
	    
		// load model
		$this->load->model('Auth_model');
        $this->load->model('Bencana_model');
		$this->load->model('Berita_model');
		$this->load->model('Konten_model');
		$this->load->model('Lokasi_model');
		$this->load->model('Quiz_model');
		$this->load->model('M_data');
		$this->load->model('Carousel_model');
		$this->load->model('Komentar_model');

		// load form validation 
		$this->load->library('pagination');
		$this->load->library('form_validation');
        cekLogin();
	}

    public function index(){
		
		
		$data['lokasi'] = $this->Lokasi_model->getAllLokasi();
		$data['lokasi'] = $this->Lokasi_model->getAllLokasi();
		$data['belajar']    = $this->Konten_model->getKontenIndex();
		$data['berita']    = $this->Berita_model->getBeritaIndex();
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('user/Template/header',$data);
		$this->load->view('user/Template/layout-3',$data);
		$this->load->view('user/Template/navbar');
		$this->load->view('user/index',$data);
		$this->load->view('user/Template/footer',$data);	

        // $this->load->view('user/Template/header');
		// $this->load->view('user/index');
		// $this->load->view('user/Template/footer');	
	}

	public function komentar(){
		
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('keterangan', 'Komentar Anda', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('user/Template/header', $data);
			$this->load->view('user/Template/layout-3', $data);
			$this->load->view('user/Template/navbar');
			$this->load->view('user/komentar');
			$this->load->view('user/Template/footer');
		} else {
			$this->Komentar_model->tambahDataKomentar();
			$this->session->set_flashdata('flashTambah', 'Ditambah');
			redirect('user/komentar');
		}
	}


	public function berita(){
		
	
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
	
		
		$this->load->view('user/Template/header',$data);
		$this->load->view('user/Template/layout-3',$data);
		$this->load->view('user/Template/navbar');

		
		$config['base_url']    = site_url('User/berita');                      //site url
		$config['total_rows']  = $this->db->count_all('tb_berita');            //total row
		$config['per_page']    = 9;                                            //show record per halaman
		$config["uri_segment"] = 3;                                            // uri parameter
		$choice        = $config["total_rows"] / $config["per_page"];
		$config["num_links"]   = 2;

		$config['attributes'] = array('class' => 'page-link', 'style' => 'background-color: #f9fafe;');
        $config['full_tag_open'] = '<ul class="pagination pagination-md">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'Previous';
        $config['next_link'] = 'Next';

		$this->pagination->initialize($config);
		$data['page']       = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['data']       = $this->Berita_model->get_berita_list($config["per_page"], $data['page']);
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('user/berita',$data);
		$this->load->view('user/Template/footer');
	}

	public function details($id){
		
		$data['berita'] = $this->Berita_model->getBeritaById($id);
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('user/Template/header',$data);
		$this->load->view('user/Template/layout-3',$data);
		$this->load->view('user/Template/navbar');
		$this->load->view('user/details',$data);
		$this->load->view('user/Template/footer');
	}


	public function konten(){
		
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('user/Template/header',$data);
		$this->load->view('user/Template/layout-3',$data);
		$this->load->view('user/Template/navbar');

		
		$config['base_url']    = site_url('User/konten');                      //site url
		$config['total_rows']  = $this->db->count_all('tb_konten');            //total row
		$config['per_page']    = 9;                                            //show record per halaman
		$config["uri_segment"] = 3;                                            // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"]   = 2;

		// Membuat Style pagination untuk BootStrap v4
		$config['attributes'] = array('class' => 'page-link', 'style' => 'background-color: #f9fafe;');
        $config['full_tag_open'] = '<ul class="pagination pagination-md">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'Previous';
        $config['next_link'] = 'Next';


		$this->pagination->initialize($config);
		$data['page']       = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['data']       = $this->Konten_model->get_konten_list($config["per_page"], $data['page']);
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('user/konten',$data);
		$this->load->view('user/Template/footer');
	}

	public function search(){
		
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$keyword = $this->input->post('keyword');

		$this->load->view('user/Template/header',$data);
		$this->load->view('user/Template/layout-3',$data);
		$this->load->view('user/Template/navbar');

		
		$config['base_url']    = site_url('User/konten');                      //site url
		$config['total_rows']  = $this->Konten_model->jumlahcarikonten($keyword); 
		$config['per_page']    = 9;                                            //show record per halaman
		$config["uri_segment"] = 3;                                            // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"]   = 2;

		// Membuat Style pagination untuk BootStrap v4
		$config['attributes'] = array('class' => 'page-link', 'style' => 'background-color: #f9fafe;');
        $config['full_tag_open'] = '<ul class="pagination pagination-md">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'Previous';
        $config['next_link'] = 'Next';


		$this->pagination->initialize($config);
		$data['page']       = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['data']       = $this->Konten_model->get_cari_konten($config["per_page"], $data['page'], $keyword);
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('user/konten',$data);
		$this->load->view('user/Template/footer');
	}

	public function detail($id){
		
		$data['konten'] = $this->Konten_model->getKontenById($id);
		$data['lokasi'] = $this->Konten_model->getLokasiBencana($id);
		// $data['bencana'] = $this->Konten_model->getBencanaFilter($id);
		// $data['bencana'] = $this->Lokasi_model->getLokasiBencana();
		
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('user/Template/header',$data);
		$this->load->view('user/Template/layout-3',$data);
		$this->load->view('user/Template/navbar');
		$this->load->view('user/detail',$data);
		$this->load->view('user/Template/footer');
	}

	public function persebaran(){
		
		$data['lokasi'] = $this->Lokasi_model->getAllLokasi();
		$data['jumlah'] = $this->Lokasi_model->getJumlahBencana();
		$data['total'] = $this->Lokasi_model->getTotalBencana();
		// $data['bencana'] = $this->Lokasi_model->getAllLokasi();
		$data['carousel'] = $this->Carousel_model-> getAllCarousel();
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('user/Template/header',$data);
		$this->load->view('user/Template/layout-3',$data);
		$this->load->view('user/Template/navbar');
		$this->load->view('user/sejarah',$data);
		$this->load->view('user/Template/footer');
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('login');
		$this->session->set_flashdata('message', '<div class="alert alert-success">Anda berhasil logout!</div>');
		redirect(base_url('auth'));
	}

	public function quiz(){
		
	
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		
		$id = $this->db->get_where('users', array('email' => $this->session->userdata('email')))->row_array()['id'];

		$this->load->view('user/Template/header',$data);
		$this->load->view('user/Template/layout-3',$data);
		$this->load->view('user/Template/navbar');

		
		$config['base_url']    = site_url('User/berita');                      //site url
		$config['total_rows']  = $this->db->count_all('tb_berita');            //total row
		$config['per_page']    = 9;                                            //show record per halaman
		$config["uri_segment"] = 3;                                            // uri parameter
		$choice        = $config["total_rows"] / $config["per_page"];
		$config["num_links"]   = 2;

		$config['attributes'] = array('class' => 'page-link', 'style' => 'background-color: #f9fafe;');
        $config['full_tag_open'] = '<ul class="pagination pagination-md">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'Previous';
        $config['next_link'] = 'Next';

		$this->pagination->initialize($config);
		$data['page']       = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['data']       = $this->Quiz_model->get_quiz_list($id, $config["per_page"], $data['page']);
		$data['pagination'] = $this->pagination->create_links();

		$this->load->view('user/quiz',$data);
		$this->load->view('user/Template/footer');
	}

	public function soal()
	{
		$this->session->unset_userdata('waktu_start');
		$this->session->set_userdata('waktu_start', time());
		
		$user = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();


		$id_peserta = $this->uri->segment(3);	
		$id = $this->db->query('SELECT * FROM tb_peserta WHERE id_peserta="' . $id_peserta. '"  ')->row_array();
		$soal_pg = $this->db->query('SELECT * FROM tb_soal_ujian WHERE id_konten="'.$id['id_konten'].'" ORDER BY RAND()');
		$where = array('id_peserta' => $id_peserta);
		$data2 = array('status_quiz' => 1);
		$this->M_data->update_data($where,$data2,'tb_peserta');
		$time = $id['timer_pg'];
		$data = array(
			"soal" => $soal_pg->result(),
			"total_soal" => $soal_pg->num_rows(),
			"max_time" => $time,
			"id" => $id,
			"user" => $user
		);
		$this->load->view('user/Template/header',$data);
		$this->load->view('user/Template/layout-4',$data);
		$this->load->view('user/Template/navbar4');
		$this->load->view('user/soal_quiz', $data);
		$this->load->view('user/Template/footer');
	}

	public function jawab_aksi()
	{
		$id_peserta = $this->input->post('id_peserta');
		$jumlah 	= $_POST['jumlah_soal'];
		$id_soal 	= $_POST['soal'];
		// $jawaban 	= $_POST['jawaban'];
		$jawaban = isset($_POST['jawaban']) ? $_POST['jawaban'] : '';

		for ($i = 0; $i < $jumlah; $i++) {
			$nomor = $id_soal[$i];
			$jawaban[$nomor];
			$data[] = array(
				'id_peserta' => $id_peserta,
				'id_soal_ujian' => $nomor,
				'jawaban' => $jawaban[$nomor]
			);
		}
		$this->db->insert_batch('tb_jawaban', $data);
		$cek = $this->db->query('SELECT id_jawaban, jawaban, tb_soal_ujian.kunci_jawaban FROM tb_jawaban join tb_soal_ujian ON tb_jawaban.id_soal_ujian=tb_soal_ujian.id_soal_ujian WHERE id_peserta="' . $id_peserta . '"');
		$jumlah = $cek->num_rows();
		foreach ($cek->result_array() as $d) {
			$where = $d['id_jawaban'];
			if ($d['jawaban'] == $d['kunci_jawaban']) {
				$data = array(
					'skor' => 1,
				);
				$this->M_data->UpdateNilai($where, $data, 'tb_jawaban');
			} else {
				$data = array(
					'skor' => 0,
				);
				$this->M_data->UpdateNilai($where, $data, 'tb_jawaban');
			}
		}

		$benar = 0;
		$salah = 0;
		$total_nilai = 0;
		$cek2 = $this->db->query('SELECT id_jawaban, jawaban, skor, tb_soal_ujian.kunci_jawaban FROM tb_jawaban join tb_soal_ujian ON tb_jawaban.id_soal_ujian=tb_soal_ujian.id_soal_ujian WHERE id_peserta="' . $id_peserta . '"');
		$jumlah = $cek2->num_rows();
		$where = $id_peserta;
		foreach ($cek2->result_array() as $c) {
			if ($c['jawaban'] == $c['kunci_jawaban']) {
				$benar++;
			} else {
				$salah++;
			}
			$total_nilai += $c['skor'] / $jumlah * 100;
		}
		$data = array(
			'benar' => $benar,
			'salah' => $salah,
			'status_quiz' => 2,
			'nilai' => $total_nilai
		);
		$this->M_data->UpdateNilai2($where, $data, 'tb_peserta');
		redirect(base_url('user/quiz'));
	}
	
	
}

?>