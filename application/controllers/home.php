<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Controller {
	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin', 'ADM', TRUE);
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_user['username']			= $this->session->userdata('username');
			$data['user']					= $this->ADM->get_user('',$where_user);
			$data['content']				= 'default/admin/content/home';
			$this->load->vars($data);
			$this->load->view('default/admin/home');
		} else {
			redirect("login");
		} 
	}

	public function user($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_user['username']			= $this->session->userdata('username');
			$data['user']					= $this->ADM->get_user('',$where_user);
			$data['content']				= 'default/admin/content/user';			
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action'] == 'view'){
			} elseif ($data['action'] == 'tambah'){
				$data['onload']				= 'username';
				$data['username']			= ($this->input->post('username'))?$this->input->post('username'):'';
				$data['password']			= ($this->input->post('password'))?$this->input->post('password'):'';
				$data['hak_akses']			= ($this->input->post('hak_akses'))?$this->input->post('hak_akses'):'';
				$simpan						=  $this->input->post('simpan');
				if($simpan) {
					$insert['username']	= $data['username'];
					$insert['password']	= md5($data['password']);
					$insert['hak_akses']= $data['hak_akses'];
					$this->ADM->insert_user($insert);
					$this->session->set_flashdata('success','Data user telah berhasil ditambahkan!,');
					redirect("home/user");
				}
			} elseif ($data['action'] == 'edit'){
				$where['username'] 			=  $filter2;		
				$data['onload']				= 'username';
				$where_user['username']	= $filter2;
				$user						= $this->ADM->get_user('',$where_user);
				//$data['id_user']			= ($this->input->post('id_user'))?$this->input->post('id_user'):$user->id_user;
				$data['username']			= ($this->input->post('username'))?$this->input->post('username'):$user->username;
				$data['password']			= ($this->input->post('password'))?$this->input->post('password'):$user->password;
				$data['hak_akses']			= ($this->input->post('hak_akses'))?$this->input->post('hak_akses'):$user->hak_akses;
				$simpan							= $this->input->post('simpan');
				if($simpan) {
					$where_edit['username']	= $data['username'];
					if($data['password'] == $data['password']) {
					$where_edit['username']	= $data['username'];
						if($data['password'] <> '') {
							$edit['password']		= do_hash(($data['password']), 'md5'); 
						}
					}
					//$edit['username']			= $data['username'];
					$edit['hak_akses']			= $data['hak_akses'];
					$this->ADM->update_user($where_edit, $edit);
					$this->session->set_flashdata('success','Data user telah berhasil diedit!,');
					redirect("home/user");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['id_user'] 	= $filter2;
				$row = $this->ADM->get_user('*', $where_delete);
				$this->ADM->delete_user($where_delete);
				$this->session->set_flashdata('warning','Data user berhasil dihapus!,');
				redirect("home/user");
			}			
			$this->load->vars($data);
			$this->load->view('default/admin/home');
		} else {
			redirect("login");
		} 
	}

	public function pegawai($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			$where_user['username']			= $this->session->userdata('username');
			$data['user']					= $this->ADM->get_user('',$where_user);
			$data['content']				= 'default/admin/content/pegawai';			
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action'] == 'view'){
			} elseif ($data['action'] == 'tambah'){
				$data['onload']				= 'nama_pegawai';
				$data['nama_pegawai']		= ($this->input->post('nama_pegawai'))?$this->input->post('nama_pegawai'):'';
				$data['nippos_pegawai']		= ($this->input->post('nippos_pegawai'))?$this->input->post('nippos_pegawai'):'';
				$data['grade_pegawai']		= ($this->input->post('grade_pegawai'))?$this->input->post('grade_pegawai'):'';
				$data['jabatan_pegawai']	= ($this->input->post('jabatan_pegawai'))?$this->input->post('jabatan_pegawai'):'';
				$data['kelompok_jabatan']	= ($this->input->post('kelompok_jabatan'))?$this->input->post('kelompok_jabatan'):'';
				$data['status']				= ($this->input->post('status'))?$this->input->post('status'):'';
				$data['divisi']				= ($this->input->post('divisi'))?$this->input->post('divisi'):'';
				$data['unit_bagian']		= ($this->input->post('unit_bagian'))?$this->input->post('unit_bagian'):'';
				$simpan						=  $this->input->post('simpan');
				if($simpan) {
					$insert['nama_pegawai']		= $data['nama_pegawai'];
					$insert['nippos_pegawai']	= $data['nippos_pegawai'];
					$insert['grade_pegawai']	= $data['grade_pegawai'];
					$insert['jabatan_pegawai']	= $data['jabatan_pegawai'];
					$insert['kelompok_jabatan']	= $data['kelompok_jabatan'];
					$insert['status']			= $data['status'];
					$insert['divisi']			= $data['divisi'];
					$insert['unit_bagian']		= $data['unit_bagian'];
					$this->ADM->insert_pegawai($insert);
					$this->session->set_flashdata('success','Data pegawai telah berhasil ditambahkan!,');
					redirect("home/pegawai");
				}
			
			} elseif ($data['action'] == 'edit'){
				$where['id_pegawai'] 			=  $filter2;		
				$data['onload']					= 'id_pegawai';
				$where_pegawai['id_pegawai']	= $filter2;
				$pegawai						= $this->ADM->get_pegawai('',$where_pegawai);
				$data['id_pegawai']				= ($this->input->post('id_pegawai'))?$this->input->post('id_pegawai'):$pegawai->id_pegawai;
				$data['nama_pegawai']			= ($this->input->post('nama_pegawai'))?$this->input->post('nama_pegawai'):$pegawai->nama_pegawai;
				$data['nippos_pegawai']			= ($this->input->post('nippos_pegawai'))?$this->input->post('nippos_pegawai'):$pegawai->nippos_pegawai;
				$data['grade_pegawai']			= ($this->input->post('grade_pegawai'))?$this->input->post('grade_pegawai'):$pegawai->grade_pegawai;
				$data['jabatan_pegawai']		= ($this->input->post('jabatan_pegawai'))?$this->input->post('jabatan_pegawai'):$pegawai->jabatan_pegawai;
				$data['kelompok_jabatan']		= ($this->input->post('kelompok_jabatan'))?$this->input->post('kelompok_jabatan'):$pegawai->kelompok_jabatan;
				$data['status']					= ($this->input->post('status'))?$this->input->post('status'):$pegawai->status;
				$data['divisi']					= ($this->input->post('divisi'))?$this->input->post('divisi'):$pegawai->divisi;
				$data['unit_bagian']			= ($this->input->post('unit_bagian'))?$this->input->post('unit_bagian'):$pegawai->unit_bagian;				
				$simpan							= $this->input->post('simpan');
					if($simpan) {
					$where_edit['id_pegawai']	= $data['id_pegawai'];
					$edit['nama_pegawai']		= $data['nama_pegawai'];
					$edit['nippos_pegawai']		= $data['nippos_pegawai'];
					$edit['grade_pegawai']		= $data['grade_pegawai'];
					$edit['jabatan_pegawai']	= $data['jabatan_pegawai'];
					$edit['kelompok_jabatan']	= $data['kelompok_jabatan'];
					$edit['status']				= $data['status'];
					$edit['divisi']				= $data['divisi'];
					$edit['unit_bagian']		= $data['unit_bagian'];
					$this->ADM->update_pegawai($where_edit, $edit);
					$this->session->set_flashdata('success','Data pegawai  telah berhasil diedit!,');
					redirect("home/pegawai");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['id_pegawai'] 	= $filter2;
				$row = $this->ADM->get_pegawai('*', $where_delete);
				$this->ADM->delete_pegawai($where_delete);
				$this->session->set_flashdata('warning','Data pegawai berhasil dihapus!,');
				redirect("home/pegawai");
			}
			$this->load->vars($data);
			$this->load->view('default/admin/home');
		} else {
			redirect("login");
		} 
	}


	public function sppd($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$where_user['username']			= $this->session->userdata('username');
			$data['user']					= $this->ADM->get_user('',$where_user);
			$data['content']				= 'default/admin/content/sppd';			
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action'] == 'view'){
				$data['berdasarkan']		= array('nomor'=>'NOMOR SPPD', 'nippos_pegawai' => 'NIP POS PEGAWAI');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'nomor';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_pengajuan_sppd[$data['cari']]	= $data['q'];
				$data['jml_data']			= $this->ADM->count_all_pengajuan_sppd('', $like_pengajuan_sppd);
				$data['jml_halaman'] 		= ceil($data['jml_data']/$data['batas']);
			} elseif ($data['action'] == 'tambah'){
				$data['onload']				= 'nomor';
				$data['nomor']				= ($this->input->post('nomor'))?$this->input->post('nomor'):'';
				$data['nippos_pegawai']		= ($this->input->post('nippos_pegawai'))?$this->input->post('nippos_pegawai'):'';
				$data['kantor_asal']		= ($this->input->post('kantor_asal'))?$this->input->post('kantor_asal'):'';
				$data['kantor_tujuan']		= ($this->input->post('kantor_tujuan'))?$this->input->post('kantor_tujuan'):'';
				$data['lama_perjalanan_dinas']= ($this->input->post('lama_perjalanan_dinas'))?$this->input->post('lama_perjalanan_dinas'):'';
				$data['tanggal_berangkat']	= ($this->input->post('tanggal_berangkat'))?$this->input->post('tanggal_berangkat'):'';
				$data['tanggal_kembali']	= ($this->input->post('tanggal_kembali'))?$this->input->post('tanggal_kembali'):'';
				$data['alat_transportasi']	= ($this->input->post('alat_transportasi'))?$this->input->post('alat_transportasi'):'';
				$data['jenis_fasilitas_dinas']= ($this->input->post('jenis_fasilitas_dinas'))?$this->input->post('jenis_fasilitas_dinas'):'';
				$data['maksud_perjalanan_dinas']= ($this->input->post('maksud_perjalanan_dinas'))?$this->input->post('maksud_perjalanan_dinas'):'';
				$data['id_penanggungjawab']	= ($this->input->post('id_penanggungjawab'))?$this->input->post('id_penanggungjawab'):'';
				$data['id_penanggungjawab2']	= ($this->input->post('id_penanggungjawab2'))?$this->input->post('id_penanggungjawab2'):'';
				$data['tanggal_post']		= date('Y-m-d H:i:s');
				$simpan						=  $this->input->post('simpan');
				if($simpan) {
					$insert['nomor']			= $data['nomor'];
					$insert['nippos_pegawai']	= $data['nippos_pegawai'];
					$insert['kantor_asal']		= $data['kantor_asal'];
					$insert['kantor_tujuan']	= $data['kantor_tujuan'];
					$insert['lama_perjalanan_dinas']	= $data['lama_perjalanan_dinas'];
					$insert['tanggal_berangkat']		= $data['tanggal_berangkat'];
					$insert['tanggal_kembali']			= $data['tanggal_kembali'];
					$insert['alat_transportasi']		= $data['alat_transportasi'];
					$insert['jenis_fasilitas_dinas']	= $data['jenis_fasilitas_dinas'];
					$insert['maksud_perjalanan_dinas']	= $data['maksud_perjalanan_dinas'];
					$insert['id_penanggungjawab']		= $data['id_penanggungjawab'];
					$insert['id_penanggungjawab2']		= $data['id_penanggungjawab2'];
					$insert['tanggal_post']				= $data['tanggal_post'];
					$this->ADM->insert_pengajuan_sppd($insert);
					$this->session->set_flashdata('success','Data pengajuan SPPD telah berhasil ditambahkan!,');
					redirect("home/sppd");
				}
			} elseif ($data['action'] == 'edit'){
				$where['id_sppd'] 			=  $filter2;		
				$data['onload']				= 'id_sppd';
				$where_sppd['id_sppd']		= $filter2;
				$sppd						= $this->ADM->get_pengajuan_sppd('',$where_sppd);
				$data['id_sppd']			= ($this->input->post('id_sppd'))?$this->input->post('id_sppd'):$sppd->id_sppd;
				$data['nomor']				= ($this->input->post('nomor'))?$this->input->post('nomor'):$sppd->nomor;
				$data['nippos_pegawai']		= ($this->input->post('nippos_pegawai'))?$this->input->post('nippos_pegawai'):$sppd->nippos_pegawai;
				$data['kantor_asal']		= ($this->input->post('kantor_asal'))?$this->input->post('kantor_asal'):$sppd->kantor_asal;
				$data['kantor_tujuan']		= ($this->input->post('kantor_tujuan'))?$this->input->post('kantor_tujuan'):$sppd->kantor_tujuan;
				$data['alat_transportasi']	= ($this->input->post('alat_transportasi'))?$this->input->post('alat_transportasi'):$sppd->alat_transportasi;
				$data['jenis_fasilitas_dinas']= ($this->input->post('jenis_fasilitas_dinas'))?$this->input->post('jenis_fasilitas_dinas'):$sppd->jenis_fasilitas_dinas;
				$data['maksud_perjalanan_dinas']= ($this->input->post('maksud_perjalanan_dinas'))?$this->input->post('maksud_perjalanan_dinas'):$sppd->maksud_perjalanan_dinas;		
				$data['id_penanggungjawab']= ($this->input->post('id_penanggungjawab'))?$this->input->post('id_penanggungjawab'):$sppd->id_penanggungjawab;		
				$data['id_penanggungjawab2']= ($this->input->post('id_penanggungjawab2'))?$this->input->post('id_penanggungjawab2'):$sppd->id_penanggungjawab2;		
				$simpan						= $this->input->post('simpan');
					if($simpan) {
					$where_edit['id_sppd']		= $data['id_sppd'];
					$edit['nippos_pegawai']		= $data['nippos_pegawai'];
					$edit['kantor_asal']		= $data['kantor_asal'];
					$edit['kantor_tujuan']		= $data['kantor_tujuan'];
					$edit['alat_transportasi']	= $data['alat_transportasi'];
					$edit['jenis_fasilitas_dinas']= $data['jenis_fasilitas_dinas'];
					$edit['maksud_perjalanan_dinas']= $data['maksud_perjalanan_dinas'];
					$edit['id_penanggungjawab']	= $data['id_penanggungjawab'];
					$edit['id_penanggungjawab2']	= $data['id_penanggungjawab2'];
					$this->ADM->update_pengajuan_sppd($where_edit, $edit);
					$this->session->set_flashdata('success','Data pengajuan SPPD telah berhasil diedit!,');
					redirect("home/sppd");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['id_sppd'] 	= $filter2;
				$row = $this->ADM->get_pengajuan_sppd('*', $where_delete);
				$this->ADM->delete_pengajuan_sppd($where_delete);
				$this->session->set_flashdata('warning','Data Pengajuan SPPD  berhasil dihapus!,');
				redirect("home/sppd");
			}

			$this->load->vars($data);
			$this->load->view('default/admin/home');
		} else {
			redirect("login");
		} 
	}

	public function print_sppd($id_sppd='')
    {
		if($this->session->userdata('logged_in') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$where_user['username']			= $this->session->userdata('username');
			$data['user']					= $this->ADM->get_user('',$where_user);
            $where_sppd['id_sppd'] 			= $id_sppd;
            $data['pengajuan_sppd']        	= $this->ADM->get_pengajuan_sppd('',$where_sppd);
			$this->load->vars($data);
			$this->load->view('default/admin/content/print_sppd');
	  } else {
			redirect("login");
	  }
	}

	public function perpanjangan($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$where_user['username']			= $this->session->userdata('username');
			$data['user']					= $this->ADM->get_user('',$where_user);
			$data['content']				= 'default/admin/content/perpanjangan';			
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action'] == 'view'){
				$data['berdasarkan']		= array('id_sppd'=>'NOMOR SPPD');
				$data['cari']				= ($this->input->post('cari'))?$this->input->post('cari'):'id_sppd';
				$data['q']					= ($this->input->post('q'))?$this->input->post('q'):'';
				$data['halaman']			= (empty($filter2))?1:$filter2;
				$data['batas']				= 10;
				$data['page']				= ($data['halaman']-1) * $data['batas'];
				$like_perpanjangan[$data['cari']]	= $data['q'];
				$data['jml_data']			= $this->ADM->count_all_perpanjangan('', $like_perpanjangan);
				$data['jml_halaman'] 		= ceil($data['jml_data']/$data['batas']);
			} elseif ($data['action'] == 'tambah'){
				$data['onload']				= 'id_sppd';
				$data['id_sppd']			= ($this->input->post('id_sppd'))?$this->input->post('id_sppd'):'';
				$data['kantor_tujuan']		= ($this->input->post('kantor_tujuan'))?$this->input->post('kantor_tujuan'):'';
				$data['tanggal_mulai']		= ($this->input->post('tanggal_mulai'))?$this->input->post('tanggal_mulai'):'';
				$data['tanggal_selesai']	= ($this->input->post('tanggal_selesai'))?$this->input->post('tanggal_selesai'):'';
				$data['jumlah_hari']		= ($this->input->post('jumlah_hari'))?$this->input->post('jumlah_hari'):'';
				$data['keperluan_perjalanan']= ($this->input->post('keperluan_perjalanan'))?$this->input->post('keperluan_perjalanan'):'';
				$data['perpanjangan_post']	= date('Y-m-d H:i:s');

				$simpan						=  $this->input->post('simpan');
				if($simpan) {
					$insert['id_sppd']			= $data['id_sppd'];
					$insert['kantor_tujuan']	= $data['kantor_tujuan'];
					$insert['tanggal_mulai']	= $data['tanggal_mulai'];
					$insert['tanggal_selesai']	= $data['tanggal_selesai'];
					$insert['jumlah_hari']		= $data['jumlah_hari'];
					$insert['keperluan_perjalanan']= $data['keperluan_perjalanan'];					
					$insert['perpanjangan_post']		= $data['perpanjangan_post'];
					$this->ADM->insert_perpanjangan($insert);
					$this->session->set_flashdata('success','Data Perpanjangan SPPD telah berhasil ditambahkan!,');
					redirect("home/perpanjangan");
				}
			
			} elseif ($data['action'] == 'hapus'){
				$where_delete['id_perpanjangan'] 	= $filter2;
				$row = $this->ADM->get_perpanjangan('*', $where_delete);
				$this->ADM->delete_perpanjangan($where_delete);
				$this->session->set_flashdata('warning','Data Perpanjangan SPPD  berhasil dihapus!,');
				redirect("home/perpanjangan");
			}

			$this->load->vars($data);
			$this->load->view('default/admin/home');
		} else {
			redirect("login");
		} 
	}
	
	
	public function kantor_pos($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$where_user['username']			= $this->session->userdata('username');
			$data['user']					= $this->ADM->get_user('',$where_user);
			$data['content']				= 'default/admin/content/kantor_pos';			
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action'] == 'view'){
			} elseif ($data['action'] == 'tambah'){
				$data['onload']						= 'kode_kantor_pos';
				$data['kode_kantor_pos']			= ($this->input->post('kode_kantor_pos'))?$this->input->post('kode_kantor_pos'):'';
				$data['nama_kantor_pos']			= ($this->input->post('nama_kantor_pos'))?$this->input->post('nama_kantor_pos'):'';
				$simpan								=  $this->input->post('simpan');
				if($simpan) {
					$insert['kode_kantor_pos']		= $data['kode_kantor_pos'];
					$insert['nama_kantor_pos']		= $data['nama_kantor_pos'];
					$this->ADM->insert_kantor_pos($insert);
					$this->session->set_flashdata('success','Data Kantor Pos telah berhasil ditambahkan!,');
					redirect("home/kantor_pos");
				}
			} elseif ($data['action'] == 'edit'){
				$where['kode_kantor_pos'] 	=  $filter2;		
				$data['onload']				= 'kode_kantor_pos';
				$where_kantor_pos['kode_kantor_pos']	= $filter2;
				$kantor_pos					= $this->ADM->get_kantor_pos('',$where_kantor_pos);
				$data['kode_kantor_pos']	= ($this->input->post('kode_kantor_pos'))?$this->input->post('kode_kantor_pos'):$kantor_pos->kode_kantor_pos;
				$data['nama_kantor_pos']	= ($this->input->post('nama_kantor_pos'))?$this->input->post('nama_kantor_pos'):$kantor_pos->nama_kantor_pos;
				$simpan						= $this->input->post('simpan');
				if($simpan) {
					$where_edit['kode_kantor_pos']			= $data['kode_kantor_pos'];
					$edit['nama_kantor_pos']				= $data['nama_kantor_pos'];
					$this->ADM->update_kantor_pos($where_edit, $edit);
					$this->session->set_flashdata('success','Data Kantor Pos telah berhasil diedit!,');
					redirect("home/kantor_pos");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['kode_kantor_pos'] 	= $filter2;
				$row = $this->ADM->get_kantor_pos('*', $where_delete);
				$this->ADM->delete_kantor_pos($where_delete);
				$this->session->set_flashdata('warning','Data Kantor Pos berhasil dihapus!,');
				redirect("home/kantor_pos");
			}			
			$this->load->vars($data);
			$this->load->view('default/admin/home');
		} else {
			redirect("login");
		} 
	}

	public function jenis_fasilitas($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$where_user['username']			= $this->session->userdata('username');
			$data['user']					= $this->ADM->get_user('',$where_user);
			$data['content']				= 'default/admin/content/jenis_fasilitas';			
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action'] == 'view'){
			} elseif ($data['action'] == 'tambah'){
				$data['onload']						= 'id_jenis_fasilitas';
				$data['id_jenis_fasilitas']			= ($this->input->post('id_jenis_fasilitas'))?$this->input->post('id_jenis_fasilitas'):'';
				$data['jenis_fasilitas']			= ($this->input->post('jenis_fasilitas'))?$this->input->post('jenis_fasilitas'):'';
				$simpan								=  $this->input->post('simpan');
				if($simpan) {
					$insert['id_jenis_fasilitas']	= $data['id_jenis_fasilitas'];
					$insert['jenis_fasilitas']		= $data['jenis_fasilitas'];
					$this->ADM->insert_jenis_fasilitas_perjalanan($insert);
					$this->session->set_flashdata('success','Data Jenis Fasilitas telah berhasil ditambahkan!,');
					redirect("home/jenis_fasilitas");
				}
			} elseif ($data['action'] == 'edit'){
				$where['id_jenis_fasilitas'] 	=  $filter2;		
				$data['onload']				= 'id_jenis_fasilitas';
				$where_jenis_fasilitas_perjalanan['id_jenis_fasilitas']	= $filter2;
				$jenis_fasilitas_perjalanan		= $this->ADM->get_jenis_fasilitas_perjalanan('',$where_jenis_fasilitas_perjalanan);
				$data['id_jenis_fasilitas']	= ($this->input->post('id_jenis_fasilitas'))?$this->input->post('id_jenis_fasilitas'):$jenis_fasilitas_perjalanan->id_jenis_fasilitas;
				$data['jenis_fasilitas']	= ($this->input->post('jenis_fasilitas'))?$this->input->post('jenis_fasilitas'):$jenis_fasilitas_perjalanan->jenis_fasilitas;
				$simpan						= $this->input->post('simpan');
				if($simpan) {
					$where_edit['id_jenis_fasilitas']			= $data['id_jenis_fasilitas'];
					$edit['jenis_fasilitas']				= $data['jenis_fasilitas'];
					$this->ADM->update_jenis_fasilitas_perjalanan($where_edit, $edit);
					$this->session->set_flashdata('success','Data Jenis Fasilitas telah berhasil diedit!,');
					redirect("home/jenis_fasilitas");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['id_jenis_fasilitas'] 	= $filter2;
				$row = $this->ADM->get_jenis_fasilitas_perjalanan('*', $where_delete);
				$this->ADM->delete_jenis_fasilitas_perjalanan($where_delete);
				$this->session->set_flashdata('warning','Data Jenis Fasilitas berhasil dihapus!,');
				redirect("home/jenis_fasilitas");
			}			
			$this->load->vars($data);
			$this->load->view('default/admin/home');
		} else {
			redirect("login");
		} 
	}

	public function alat_transportasi($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$where_user['username']			= $this->session->userdata('username');
			$data['user']					= $this->ADM->get_user('',$where_user);
			$data['content']				= 'default/admin/content/alat_transportasi';			
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action'] == 'view'){
			} elseif ($data['action'] == 'tambah'){
				$data['onload']						= 'id_alat_transportasi';
				$data['id_alat_transportasi']		= ($this->input->post('id_alat_transportasi'))?$this->input->post('id_alat_transportasi'):'';
				$data['nama_alat_transportasi']		= ($this->input->post('nama_alat_transportasi'))?$this->input->post('nama_alat_transportasi'):'';
				$data['jenis_alat_transportasi']		= ($this->input->post('jenis_alat_transportasi'))?$this->input->post('jenis_alat_transportasi'):'';
				$simpan								=  $this->input->post('simpan');
				if($simpan) {
					$insert['id_alat_transportasi']		= $data['id_alat_transportasi'];
					$insert['nama_alat_transportasi']	= $data['nama_alat_transportasi'];
					$insert['jenis_alat_transportasi']	= $data['jenis_alat_transportasi'];
					$this->ADM->insert_alat_transportasi($insert);
					$this->session->set_flashdata('success','Data Alat Transportasi telah berhasil ditambahkan!,');
					redirect("home/alat_transportasi");
				}
			} elseif ($data['action'] == 'edit'){
				$where['id_alat_transportasi'] 	=  $filter2;		
				$data['onload']				= 'id_alat_transportasi';
				$where_alat_transportasi['id_alat_transportasi']	= $filter2;
				$alat_transportasi		= $this->ADM->get_alat_transportasi('',$where_alat_transportasi);
				$data['id_alat_transportasi']	= ($this->input->post('id_alat_transportasi'))?$this->input->post('id_alat_transportasi'):$alat_transportasi->id_alat_transportasi;
				$data['nama_alat_transportasi']	= ($this->input->post('nama_alat_transportasi'))?$this->input->post('nama_alat_transportasi'):$alat_transportasi->nama_alat_transportasi;
				$data['jenis_alat_transportasi']	= ($this->input->post('jenis_alat_transportasi'))?$this->input->post('jenis_alat_transportasi'):$alat_transportasi->jenis_alat_transportasi;
				$simpan								= $this->input->post('simpan');
				if($simpan) {
					$where_edit['id_alat_transportasi']	= $data['id_alat_transportasi'];
					$edit['nama_alat_transportasi']		= $data['nama_alat_transportasi'];
					$edit['jenis_alat_transportasi']	= $data['jenis_alat_transportasi'];
					$this->ADM->update_alat_transportasi($where_edit, $edit);
					$this->session->set_flashdata('success','Data Alat Transportasi telah berhasil diedit!,');
					redirect("home/alat_transportasi");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['id_alat_transportasi'] 	= $filter2;
				$row = $this->ADM->get_alat_transportasi('*', $where_delete);
				$this->ADM->delete_alat_transportasi($where_delete);
				$this->session->set_flashdata('warning','Data Alat Transportasi berhasil dihapus!,');
				redirect("home/alat_transportasi");
			}			
			$this->load->vars($data);
			$this->load->view('default/admin/home');
		} else {
			redirect("login");
		} 
	}

	public function penanggung_jawab($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$where_user['username']			= $this->session->userdata('username');
			$data['user']					= $this->ADM->get_user('',$where_user);
			$data['content']				= 'default/admin/content/penanggung_jawab';		
			$data['action']					= (empty($filter1))?'view':$filter1;
			if ($data['action'] == 'view'){
			} elseif ($data['action'] == 'tambah'){
				$data['onload']						= 'id_penanggungjawab';
				$data['id_penanggungjawab']		= ($this->input->post('id_penanggungjawab'))?$this->input->post('id_penanggungjawab'):'';
				$data['nama_penanggungjawab']		= ($this->input->post('nama_penanggungjawab'))?$this->input->post('nama_penanggungjawab'):'';
				$data['jabatan_penanggungjawab']		= ($this->input->post('jabatan_penanggungjawab'))?$this->input->post('jabatan_penanggungjawab'):'';
				$data['nippos_penanggungjawab']		= ($this->input->post('nippos_penanggungjawab'))?$this->input->post('nippos_penanggungjawab'):'';
				$simpan								=  $this->input->post('simpan');
				if($simpan) {
					$insert['id_penanggungjawab']		= $data['id_penanggungjawab'];
					$insert['nama_penanggungjawab']	= $data['nama_penanggungjawab'];
					$insert['jabatan_penanggungjawab']	= $data['jabatan_penanggungjawab'];
					$insert['nippos_penanggungjawab']	= $data['nippos_penanggungjawab'];
					$this->ADM->insert_penanggung_jawab($insert);
					$this->session->set_flashdata('success','Data Penanggung Jawab telah berhasil ditambahkan!,');
					redirect("home/penanggung_jawab");
				}
			} elseif ($data['action'] == 'edit'){
				$where['id_penanggungjawab'] 	=  $filter2;		
				$data['onload']				= 'id_penanggungjawab';
				$where_penanggung_jawab['id_penanggungjawab']	= $filter2;
				$penanggung_jawab		= $this->ADM->get_penanggung_jawab('',$where_penanggung_jawab);
				$data['id_penanggungjawab']	= ($this->input->post('id_penanggungjawab'))?$this->input->post('id_penanggungjawab'):$penanggung_jawab->id_penanggungjawab;
				$data['nama_penanggungjawab']	= ($this->input->post('nama_penanggungjawab'))?$this->input->post('nama_penanggungjawab'):$penanggung_jawab->nama_penanggungjawab;
				$data['jabatan_penanggungjawab']	= ($this->input->post('jabatan_penanggungjawab'))?$this->input->post('jabatan_penanggungjawab'):$penanggung_jawab->jabatan_penanggungjawab;
				$data['nippos_penanggungjawab']	= ($this->input->post('nippos_penanggungjawab'))?$this->input->post('nippos_penanggungjawab'):$penanggung_jawab->nippos_penanggungjawab;
				$simpan								= $this->input->post('simpan');
				if($simpan) {
					$where_edit['id_penanggungjawab']	= $data['id_penanggungjawab'];
					$edit['nama_penanggungjawab']		= $data['nama_penanggungjawab'];
					$edit['jabatan_penanggungjawab']	= $data['jabatan_penanggungjawab'];
					$edit['nippos_penanggungjawab']	= $data['nippos_penanggungjawab'];
					$this->ADM->update_penanggung_jawab($where_edit, $edit);
					$this->session->set_flashdata('success','Data Penanggung Jawab telah berhasil diedit!,');
					redirect("home/penanggung_jawab");
				}
			} elseif ($data['action'] == 'hapus'){
				$where_delete['id_penanggungjawab'] 	= $filter2;
				$row = $this->ADM->get_penanggung_jawab('*', $where_delete);
				$this->ADM->delete_penanggung_jawab($where_delete);
				$this->session->set_flashdata('warning','Data Penanggung Jawab berhasil dihapus!,');
				redirect("home/penanggung_jawab");
			}			
			$this->load->vars($data);
			$this->load->view('default/admin/home');
		} else {
			redirect("login");
		} 
	}

	public function laporan($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$where_user['username']			= $this->session->userdata('username');
			$data['user']					= $this->ADM->get_user('',$where_user);
			$data['content']				= 'default/admin/content/laporan';			
			$data['action']					= (empty($filter1))?'view':$filter1;
						
			$this->load->vars($data);
			$this->load->view('default/admin/home');
		} else {
			redirect("login");
		} 
	}

	public function laporan_pengajuan($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$where_user['username']			= $this->session->userdata('username');
			$data['user']					= $this->ADM->get_user('',$where_user);	
			    		header("Pragma: public");
				        header("Expires: 0");
				        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
				        header("Content-Type: application/force-download");
				        header("Content-Type: application/octet-stream");
				        header("Content-Type: application/download");
				        header("Content-Disposition: attachment;filename=LaporanPengajuanSPPD.xls");
				        header("Content-Transfer-Encoding: binary ");		
			$this->load->vars($data);
			$this->load->view('default/admin/content/laporan_pengajuan');
		} else {
			redirect("login");
		} 
	}


	public function laporan_perpanjangan($filter1='', $filter2='', $filter3='')
	{
		if($this->session->userdata('logged_in') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$where_user['username']			= $this->session->userdata('username');
			$data['user']					= $this->ADM->get_user('',$where_user);	
			    		header("Pragma: public");
				        header("Expires: 0");
				        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
				        header("Content-Type: application/force-download");
				        header("Content-Type: application/octet-stream");
				        header("Content-Type: application/download");
				        header("Content-Disposition: attachment;filename=LaporanPerpanjanganSPPD.xls");
				        header("Content-Transfer-Encoding: binary ");		
			$this->load->vars($data);
			$this->load->view('default/admin/content/laporan_perpanjangan');
		} else {
			redirect("login");
		} 
	}

	public function print_perpanjangan_sppd($id_perpanjangan='')
    {
		if($this->session->userdata('logged_in') == TRUE){
			@date_default_timezone_set('Asia/Jakarta');
			$where_user['username']			= $this->session->userdata('username');
			$data['user']					= $this->ADM->get_user('',$where_user);
            $where_sppd['id_perpanjangan'] 	= $id_perpanjangan;
            $data['perpanjangan']        	= $this->ADM->get_perpanjangan('',$where_sppd);
			$this->load->vars($data);
			$this->load->view('default/admin/content/print_perpanjangan_sppd');
	  } else {
			redirect("login");
	  }
	}
}

