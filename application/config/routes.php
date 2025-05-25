<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Home';

// Login Routes
$route['auth/login'] = 'Auth/index';

// Register Routes
$route['auth/register'] = 'Auth/register';

// Sekolah Routes Admin
$route['admin/berita/daftar'] = 'Admin/daftarBerita';
$route['admin/berita/tambah'] = 'Admin/tambahBerita';
$route['admin/berita/edit'] = 'Admin/editBerita';
$route['admin/berita/hapus'] = 'Admin/hapusBerita';

$route['admin/komentar/daftar'] = 'Admin/daftarKomentar';

// Carousel Routes Admin
$route['admin/carousel/daftar'] = 'Admin/daftarCarousel';
$route['admin/carousel/tambah'] = 'Admin/tambahCarousel';
$route['admin/carousel/edit'] = 'Admin/editCarousel';
$route['admin/carousel/hapus'] = 'Admin/hapusCarousel';

$route['admin/jenis_bencana/daftar'] = 'Admin/daftarJenis';
$route['admin/jenis_bencana/tambah'] = 'Admin/tambahJenis';
$route['admin/jenis_bencana/edit'] = 'Admin/editJenis';
$route['admin/jenis_bencana/hapus'] = 'Admin/hapusJenis';

$route['admin/lokasi_bencana/daftar'] = 'Admin/daftarLokasi';
$route['admin/lokasi_bencana/tambah'] = 'Admin/tambahLokasi';
$route['admin/lokasi_bencana/edit'] = 'Admin/editLokasi';
$route['admin/lokasi_bencana/hapus'] = 'Admin/hapusLokasi';

$route['admin/konten/daftar'] = 'Admin/daftarKonten';
$route['admin/konten/tambah'] = 'Admin/tambahKonten';
$route['admin/konten/edit'] = 'Admin/editKonten';
$route['admin/konten/hapus'] = 'Admin/hapusKonten';

$route['admin/quiz/daftar'] = 'Admin/daftarQuiz';
$route['admin/quiz/soal'] = 'Admin/soalQuiz';
$route['admin/quiz/tambah'] = 'Admin/tambahQuiz';
$route['admin/quiz/edit'] = 'Admin/editQuiz';
$route['admin/quiz/hapus'] = 'Admin/hapusQuiz';
$route['admin/quiz/peserta'] = 'Admin/pesertaQuiz';
$route['admin/quiz/tambahp'] = 'Admin/tambahPeserta';
$route['admin/quiz/editp'] = 'Admin/editPeserta';
$route['admin/quiz/hapusp'] = 'Admin/hapusPeserta';

// Akun Routes Admin
$route['admin/user'] = 'Admin/daftarUser';
$route['admin/akun/ubah'] = 'Admin/changePass';
$route['admin/akun/buat'] = 'Admin/buatAkun';

// Routes User
$route['user/index'] =  'User';
$route['user/sekolah'] = 'User/sekolah';
$route['user/profil'] = 'User/profil';
$route['user/sekolah'] = 'User/sekolah';
$route['user/profil'] = 'User/profil';
$route['user/galeri'] = 'User/galeri';
$route['user/detail_galeri'] = 'User/detail_galeri';
$route['user/detail_layanan'] = 'User/detail_layanan';
$route['user/daftarPenghargaan'] = 'User/daftarPenghargaan';
$route['user/search_sekolah'] = 'User/search_sekolah';
$route['user/download'] = 'User/download';


// $route['admin/daftar'] = 'Admin/daftarSurah';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

?>