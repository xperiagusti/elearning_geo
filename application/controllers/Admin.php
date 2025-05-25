<?php

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

	
		$this->load->model('Auth_model');
		$this->load->model('User_model');
		$this->load->model('Berita_model');
		$this->load->model('Carousel_model');
		$this->load->model('Bencana_model');
		$this->load->model('Konten_model');
		$this->load->model('Lokasi_model');
		$this->load->model('Quiz_model');
		$this->load->model('Komentar_model');


		$this->load->library('form_validation');
		cekLogin();
	}

	// Dashboard admin
	public function index()
	{

		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Admin Dashboard';
		$data['totalPengguna'] = $this->User_model->jumlahPengguna();
		$data['totalBerita'] = $this->Berita_model->jumlahBerita();
		$data['totalCarousel'] = $this->Carousel_model->jumlahCarousel();
		$data['totalKonten'] = $this->Konten_model->jumlahKonten();
		$data['totalLokasi'] = $this->Lokasi_model->jumlahLokasi();
		$data['totalJenis'] = $this->Bencana_model->jumlahBencana();
		$data['totalPeserta'] = $this->Quiz_model->jumlahPeserta();
	
		$this->load->view('admin/Template/header', $data);
		$this->load->view('admin/Template/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/Template/footer');
	}

	public function daftarCarousel()
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		// $data['title'] = 'Daftar Carousel';
		$data['carousel'] = $this->Carousel_model->getAllCarousel();
		$this->load->view('admin/Template/header', $data);
		$this->load->view('admin/Template/sidebar', $data);
		$this->load->view('admin/carousel/daftarCarousel', $data);
		$this->load->view('admin/Template/footer');
	}

	public function daftarKomentar()
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		// $data['title'] = 'Daftar Carousel';
		$data['komentar'] = $this->Komentar_model->getAllKomentar();
		$this->load->view('admin/Template/header', $data);
		$this->load->view('admin/Template/sidebar', $data);
		$this->load->view('admin/komentar/daftarKomentar', $data);
		$this->load->view('admin/Template/footer');
	}

	public function tambahCarousel()
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->form_validation->set_rules('judul_carousel', 'judul carousel', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/Template/header', $data);
			$this->load->view('admin/Template/sidebar', $data);
			$this->load->view('admin/carousel/tambahCarousel');
			$this->load->view('admin/Template/footer');
		} else {
			$this->Carousel_model->tambahDataCarousel();
			$this->session->set_flashdata('flashTambah', 'Ditambah');
			redirect('admin/daftarCarousel');
		}
	}


	public function editCarousel($id)
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		
		$data['carousel'] = $this->Carousel_model->getCarouselById($id);

		$this->form_validation->set_rules('judul_carousel', 'judul carousel', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/Template/header', $data);
			$this->load->view('admin/Template/sidebar', $data);
			$this->load->view('admin/carousel/editCarousel');
			$this->load->view('admin/Template/footer');
		} else {
			$this->Carousel_model->ubahCarousel();
			$this->session->set_flashdata('flashUbah', 'Diubah');
			redirect('admin/daftarCarousel');
		}
	}


	public function hapusCarousel($id)
	{
		$this->Carousel_model->hapusDataCarousel($id);
		$this->session->set_flashdata('flashHapus', 'Dihapus!');
		redirect('admin/daftarCarousel');
	}


	public function daftarBerita()
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['berita'] = $this->Berita_model->getAllBerita();
		

		$this->load->view('admin/Template/header', $data);
		$this->load->view('admin/Template/sidebar', $data);
		$this->load->view('admin/berita/daftarBerita', $data);
		$this->load->view('admin/Template/footer');
	}

	public function tambahBerita()
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		

		$this->form_validation->set_rules('judul_berita', 'judul berita', 'required');
		$this->form_validation->set_rules('isi_berita', 'isi berita', 'required');
		$this->form_validation->set_rules('kategori', 'kategori', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/Template/header', $data);
			$this->load->view('admin/Template/sidebar', $data);
			$this->load->view('admin/berita/tambahBerita');
			$this->load->view('admin/Template/footer');
		} else {
			$this->Berita_model->tambahDataBerita();
			$this->session->set_flashdata('flashTambah', 'Ditambah');
			redirect('admin/daftarBerita');
		}
	}


	public function editBerita($id)
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['berita'] = $this->Berita_model->getBeritaById($id);
		
		$this->form_validation->set_rules('judul_berita', 'judul Berita', 'required');
		$this->form_validation->set_rules('isi_berita', 'isi berita', 'required');
		$this->form_validation->set_rules('kategori', 'kategori', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/Template/header', $data);
			$this->load->view('admin/Template/sidebar', $data);
			$this->load->view('admin/berita/editBerita');
			$this->load->view('admin/Template/footer');
		} else {
			$this->Berita_model->ubahBerita();
			$this->session->set_flashdata('flashUbah', 'Diubah');
			redirect('admin/daftarBerita');
		}
	}

	public function hapusBerita($id)
	{
		$this->Berita_model->hapusDataBerita($id);
		$this->session->set_flashdata('flashHapus', 'Dihapus!');
		redirect('admin/daftarBerita');
	}


	public function daftarJenis()
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['bencana'] = $this->Bencana_model->getAllBencana();
		

		$this->load->view('admin/Template/header', $data);
		$this->load->view('admin/Template/sidebar', $data);
		$this->load->view('admin/jenis/daftarJenis', $data);
		$this->load->view('admin/Template/footer');
	}

	public function tambahJenis()
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('judul_bencana', 'jenis bencana', 'required');
		// $this->form_validation->set_rules('foto_bencana', 'icon bencana', 'required');
	
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/Template/header', $data);
			$this->load->view('admin/Template/sidebar', $data);
			$this->load->view('admin/jenis/tambahJenis');
			$this->load->view('admin/Template/footer');
		} else {
			$this->Bencana_model->tambahDataBencana();
			$this->session->set_flashdata('flashTambah', 'Ditambah');
			redirect('admin/daftarJenis');
		}
	}


	public function editJenis($id)
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['bencana'] = $this->Bencana_model->getBencanaById($id);
		
		$this->form_validation->set_rules('judul_bencana', 'judul_bencana', 'required');
		// $this->form_validation->set_rules('foto_bencana', 'foto_bencana', 'required');
	

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/Template/header', $data);
			$this->load->view('admin/Template/sidebar', $data);
			$this->load->view('admin/jenis/editJenis');
			$this->load->view('admin/Template/footer');
		} else {
			$this->Bencana_model->ubahBencana();
			$this->session->set_flashdata('flashUbah', 'Diubah');
			redirect('admin/daftarJenis');
		}
	}

	public function hapusJenis($id)
	{
		$this->Bencana_model->hapusDataBencana($id);
		$this->session->set_flashdata('flashHapus', 'Dihapus!');
		redirect('admin/daftarJenis');
	}

	public function daftarKonten()
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['konten'] = $this->Konten_model->getAllKonten();
		

		$this->load->view('admin/Template/header', $data);
		$this->load->view('admin/Template/sidebar', $data);
		$this->load->view('admin/konten/daftarKonten', $data);
		$this->load->view('admin/Template/footer');
	}

	public function tambahKonten()
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['bencana'] = $this->Bencana_model->getAllBencana();

		$this->form_validation->set_rules('judul_konten', 'judul konten', 'required');
		$this->form_validation->set_rules('isi_konten', 'isi konten', 'required');
		$this->form_validation->set_rules('kategori', 'kategori', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/Template/header', $data);
			$this->load->view('admin/Template/sidebar', $data);
			$this->load->view('admin/konten/tambahKonten');
			$this->load->view('admin/Template/footer');
		} else {
			$this->Konten_model->tambahDataKonten();
			$this->session->set_flashdata('flashTambah', 'Ditambah');
			redirect('admin/daftarKonten');
		}
	}


	public function editKonten($id)
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['konten'] = $this->Konten_model->getKontenByIdedit($id);
		$data['bencana'] = $this->Bencana_model->getAllBencana();
		

		$this->form_validation->set_rules('judul_konten', 'judul Konten', 'required');
		$this->form_validation->set_rules('isi_konten', 'isi konten', 'required');
		$this->form_validation->set_rules('kategori', 'kategori', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/Template/header', $data);
			$this->load->view('admin/Template/sidebar', $data);
			$this->load->view('admin/konten/editKonten');
			$this->load->view('admin/Template/footer');
		} else {
			$this->Konten_model->ubahKonten();
			$this->session->set_flashdata('flashUbah', 'Diubah');
			redirect('admin/daftarKonten');
		}
	}

	public function hapusKonten($id)
	{
		$this->Konten_model->hapusDataKonten($id);
		$this->session->set_flashdata('flashHapus', 'Dihapus!');
		redirect('admin/daftarKonten');
	}

	public function daftarLokasi()
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['lokasi'] = $this->Lokasi_model->getAllLokasi();
		

		$this->load->view('admin/Template/header', $data);
		$this->load->view('admin/Template/sidebar', $data);
		$this->load->view('admin/lokasi/daftarLokasi', $data);
		$this->load->view('admin/Template/footer');
	}

	public function tambahLokasi()
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['bencana'] = $this->Bencana_model->getAllBencana();
		$data['bulan'] = [
			'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		];

		$this->form_validation->set_rules('id_bencana', 'jenis', 'required');
		$this->form_validation->set_rules('tahunBencana', 'tahun', 'required');
		$this->form_validation->set_rules('bulanBencana', 'bulan', 'required');
		// $this->form_validation->set_rules('provinsiBencana', 'provinsi', 'required');
		// $this->form_validation->set_rules('kotaBencana', 'kota', 'required');
		$this->form_validation->set_rules('latitudeBencana', 'latitude', 'required');
		$this->form_validation->set_rules('longitudeBencana', 'longitude', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/Template/header', $data);
			$this->load->view('admin/Template/sidebar', $data);
			$this->load->view('admin/lokasi/tambahLokasi');
			$this->load->view('admin/Template/footer');
		} else {
			$this->Lokasi_model->tambahDataLokasi();
			$this->session->set_flashdata('flashTambah', 'Ditambah');
			redirect('admin/daftarLokasi');
		}
	}


	public function editLokasi($id)
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

		$data['lokasi'] = $this->Lokasi_model->getLokasiById($id);
		$data['bencana'] = $this->Bencana_model->getAllBencana();
		$data['bulan'] = [
			'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		];

		$this->form_validation->set_rules('id_bencana', 'jenis', 'required');
		$this->form_validation->set_rules('tahunBencana', 'tahun', 'required');
		$this->form_validation->set_rules('bulanBencana', 'bulan', 'required');
		$this->form_validation->set_rules('provinsiBencana', 'provinsi', 'required');
		$this->form_validation->set_rules('kotaBencana', 'kota', 'required');
		$this->form_validation->set_rules('latitudeBencana', 'latitude', 'required');
		$this->form_validation->set_rules('longitudeBencana', 'longitude', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/Template/header', $data);
			$this->load->view('admin/Template/sidebar', $data);
			$this->load->view('admin/lokasi/editLokasi');
			$this->load->view('admin/Template/footer');
		} else {
			$this->Lokasi_model->ubahLokasi();
			$this->session->set_flashdata('flashUbah', 'Diubah');
			redirect('admin/daftarLokasi');
		}
	}

	public function hapusLokasi($id)
	{
		$this->Lokasi_model->hapusDataLokasi($id);
		$this->session->set_flashdata('flashHapus', 'Dihapus!');
		redirect('admin/daftarLokasi');
	}

	public function daftarQuiz()
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['quiz'] = $this->Quiz_model->getAllQuiz();
		

		$this->load->view('admin/Template/header', $data);
		$this->load->view('admin/Template/sidebar', $data);
		$this->load->view('admin/quiz/daftarQuiz', $data);
		$this->load->view('admin/Template/footer');
	}

	public function soalQuiz()
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['quiz'] = $this->Quiz_model->getAllQuiz();
		$this->load->view('admin/Template/header', $data);
		$this->load->view('admin/Template/sidebar', $data);
		$this->load->view('admin/quiz/daftarQuiz', $data);
		$this->load->view('admin/Template/footer');
	}

	public function tambahQuiz()
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['konten'] = $this->Konten_model->getAllKonten();
		$this->form_validation->set_rules('id_konten', 'topik', 'required');
		$this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'required');
		// $this->form_validation->set_rules('a', 'Jawaban a', 'required');
		// $this->form_validation->set_rules('b', 'Jawaban b', 'required');
		// $this->form_validation->set_rules('c', 'Jawaban c', 'required');
		// $this->form_validation->set_rules('d', 'Jawaban d', 'required');
		// $this->form_validation->set_rules('e', 'Jawaban e', 'required');
		// $this->form_validation->set_rules('kunci_jawaban', 'kunci jawaban', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/Template/header', $data);
			$this->load->view('admin/Template/sidebar');
			$this->load->view('admin/quiz/tambahQuiz');
			$this->load->view('admin/Template/footer');
		} else {
			$this->Quiz_model->tambahDataQuiz();
			$this->session->set_flashdata('flashTambah', 'Ditambah');
			redirect('admin/soalQuiz');
		}
	}

	public function editQuiz($id)
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['konten'] = $this->Konten_model->getAllKonten();
		$data['quiz'] = $this->Quiz_model->getQuizById($id);
		$this->form_validation->set_rules('id_konten', 'topik', 'required');
		$this->form_validation->set_rules('pertanyaan', 'pertanyaan', 'required');
		// $this->form_validation->set_rules('a', 'Jawaban a', 'required');
		// $this->form_validation->set_rules('b', 'Jawaban b', 'required');
		// $this->form_validation->set_rules('c', 'Jawaban c', 'required');
		// $this->form_validation->set_rules('d', 'Jawaban d', 'required');
		// $this->form_validation->set_rules('e', 'Jawaban e', 'required');
		// $this->form_validation->set_rules('kunci_jawaban', 'kunci jawaban', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/Template/header', $data);
			$this->load->view('admin/Template/sidebar');
			$this->load->view('admin/quiz/editQuiz');
			$this->load->view('admin/Template/footer');
		} else {
			$this->Quiz_model->ubahQuiz($id);
			$this->session->set_flashdata('flashUbah', 'Diubah');
			redirect('admin/soalQuiz');
		}

	
	}

	public function hapusQuiz($id)
	{
		$this->Quiz_model->hapusDataQuiz($id);
		$this->session->set_flashdata('flashHapus', 'Dihapus!');
		redirect('admin/soalQuiz');
	}

	public function pesertaQuiz()
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['quiz'] = $this->Quiz_model->getAllPeserta();
		$this->load->view('admin/Template/header', $data);
		$this->load->view('admin/Template/sidebar', $data);
		$this->load->view('admin/quiz/daftarPeserta', $data);
		$this->load->view('admin/Template/footer');
	}

	public function tambahPeserta()
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['soal'] = $this->Quiz_model->getTopik();
		$data['user2'] = $this->Quiz_model->getUser();
		$this->form_validation->set_rules('id_konten', 'topik', 'required');
		$this->form_validation->set_rules('id_user', 'peserta', 'required');
		// $this->form_validation->set_rules('durasi_pg', 'durasi', 'required');
		
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/Template/header', $data);
			$this->load->view('admin/Template/sidebar');
			$this->load->view('admin/quiz/tambahPeserta');
			$this->load->view('admin/Template/footer');
		} else {
			$this->Quiz_model->tambahDataPeserta();
			$this->session->set_flashdata('flashTambah', 'Ditambah');
			redirect('admin/pesertaQuiz');
		}
	}

	public function editPeserta($id)
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['quiz'] = $this->Quiz_model->getPesertaById($id);
		$data['soal'] = $this->Quiz_model->getTopik();
		$data['user2'] = $this->Quiz_model->getUser();
		$this->form_validation->set_rules('id_konten', 'topik', 'required');
		$this->form_validation->set_rules('id_user', 'peserta', 'required');
		// $this->form_validation->set_rules('durasi_pg', 'durasi', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/Template/header', $data);
			$this->load->view('admin/Template/sidebar');
			$this->load->view('admin/quiz/editPeserta');
			$this->load->view('admin/Template/footer');
		} else {
			$this->Quiz_model->editDataPeserta($id);
			$this->session->set_flashdata('flashUbah', 'Diubah');
			redirect('admin/pesertaQuiz');
		}

	
	}

	public function hapusPeserta($id)
	{
		$this->Quiz_model->hapusPesertaQuiz($id);
		$this->session->set_flashdata('flashHapus', 'Dihapus!');
		redirect('admin/pesertaQuiz');
	}


	public function changePass()
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		
		$data['ubah'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[8]|matches[new_password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/Template/header', $data);
			$this->load->view('admin/Template/sidebar', $data);
			$this->load->view('admin/Akun/ubahPass', $data);
			$this->load->view('admin/Template/footer');
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if (!password_verify($current_password, $data['ubah']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
				redirect('admin/changePass');
			} else {
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-danfer" role="alert">Password tidak sama</div>');
					redirect('admin/changePass');
				} else {
					$passwor_hash = password_hash($new_password, PASSWORD_DEFAULT);

					$this->db->set('password', $passwor_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('users');

					$this->session->set_flashdata('flashUbah', 'Diubah');
					redirect('admin/daftarUser');
				}
			}
		}
	}

	public function editUser()
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		// $data['title'] = 'Edit User';
		
		$email_lama =  $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array()['email'];
		$this->form_validation->set_rules('nama_depan', 'nama depan', 'required|trim');
		$this->form_validation->set_rules('nama_belakang', 'nama belakang', 'required|trim');

		if ($this->input->post('email') != $email_lama) {
			$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[users.email]', [
				'is_unique' => 'Email telah terdaftar! silahkan ganti'
			]);
		}

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/Template/header', $data);
			$this->load->view('admin/Template/sidebar', $data);
			$this->load->view('admin/Akun/editUser');
			$this->load->view('admin/Template/footer');
		} else {
			if ($this->input->post('email') != $email_lama) {
				$this->User_model->ubahUser();
				redirect('admin/logout2');
			}
			else
			{
				$this->User_model->ubahUser();
				$this->session->set_flashdata('flashUbah', 'Diubah');
				redirect('admin/daftarUser');
			}
			
		}
	}


	public function buatAkun()
	{

		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		// $data['title'] = 'Tambah Akun';
		
		$this->form_validation->set_rules('nama_depan', 'nama depan', 'required|trim');
		$this->form_validation->set_rules('nama_belakang', 'nama belakang', 'required|trim');
		$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[users.email]', [
			'is_unique' => 'Email telah terdaftar! silahkan login'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
			'matches' => 'Password tidak sama!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/Template/header', $data);
			$this->load->view('admin/Template/sidebar', $data);
			$this->load->view('admin/Akun/tambahAkun');
			$this->load->view('admin/Template/footer');
		} else {
			$this->Auth_model->tambah_akun();
			$this->session->set_flashdata('flashTambah', 'Ditambah');
			redirect('admin/daftarUser');
		}
	}

	

	// Daftar User

	public function daftarUser()
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		// $data['title'] = 'Daftar Pengguna';
		
		$data['users'] = $this->User_model->getAllUser();

		$this->load->view('admin/Template/header', $data);
		$this->load->view('admin/Template/sidebar', $data);
		$this->load->view('admin/daftarUser', $data);
		$this->load->view('admin/Template/footer');
	}


	public function logout()
	{

		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('login');
		$this->session->set_flashdata('message', '<div class="alert alert-success">Anda berhasil logout!</div>');
		redirect(base_url('auth'));
	}

	public function logout2()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('login');
		$this->session->set_flashdata('message', '<div class="alert alert-success">Akun berhasil diubah, Silahkan login kembali!</div>');
		redirect(base_url('auth'));
	}

	public function logout3()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->unset_userdata('login');
		$this->session->set_flashdata('message', '<div class="alert alert-success">Akun anda berhasil dihapus !</div>');
		redirect(base_url('auth'));
	}

	public function hapusUser($id)
	{
		$this->User_model->hapusDataUser($id);
		// $this->session->set_flashdata('flashHapus', 'Dihapus!');
		redirect('admin/logout3');
	}
	

}
