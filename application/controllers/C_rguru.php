<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_rguru extends CI_Controller {

	function __construct(){ 
		parent::__construct();
		$this->load->model('M_rapot');
		$this->load->model('M_kelas');
		$this->load->model('M_siswa');
		$this->load->model('M_mapel');
		$this->load->model("M_semester");
		$this->load->model("M_tahunajaran");
		$this->load->model('M_presensi');
		$this->load->model('M_jadwal');

		// $this->load->library(array('session'));
		// $this->load->library('user_agent'); //deklarasi mengaktifkan library pagination
		if($this->session->userdata('level') != "1") {  
			redirect('');  
		}
	} 

	public function index()
	{
		$role = '';
		switch ($this->session->userdata('level')) {
			case '0':
				$role = "admin";
				break;

			case '1':
					$role = "guru";
					break;
		}

		$data = [
			'role' => $role,
			'username' => $this->session->userdata('uname')
		];

		$this->load->view('index', $data);
	}

	public function jadwal()
	{
		$data['jadwal']=$this->M_jadwal->listJadwal();
		$this->load->view('menugur/jadwal', $data);
	}
	public function detailjadwal($id)
	{
		$data['id'] = $id;
		$data['mapel'] = $this->M_mapel->listMapel();
		$data['semester'] = $this->M_semester->listSemester();
		$data['tahunajaran'] = $this->M_tahunajaran->listTahun_ajaran();
		$data['jadwal']=$this->M_jadwal->getJadwalWhereId($id);


		$this->load->view('menugur/jadwal_detail', $data);
	}
	public function editjadwal($idkls, $idmp)
	{
		$data['jadwal']=$this->M_jadwal->getJdw($idkls, $idmp);
		$this->load->view('menugur/jadwal_edit', $data);
	}

	public function savejadwal()
	{
		$data = [
			'kode_mp' => $this->input->post('kode_mp'),
			'kode_kelas' => $this->input->post('kode_kelas'),
			'kode_semester' => $this->input->post('kode_semester'),
			'kode_ta' => $this->input->post('kode_ta'),
			'hari' => $this->input->post('hari'),
			'waktu' => $this->input->post('waktu'),
		];

		$this->M_jadwal->insert($data);

		return  redirect("C_rguru/detailjadwal/" . $data['kode_kelas']);
	}


	public function rapot()
	{
		$nip = $this->session->userdata('uname');
		$data['kelas']=$this->M_kelas->listKelas();
		$data['siswa']=$this->M_siswa->listSiswaWhrGur($nip);
		$this->load->view('menugur/rapot', $data);
	}
	public function cekrapot($cek, $where)
	{
		if ($cek == 'pts' ) { 
			$jenis_nilai = 'rapot.*, mapel.nama as na, semester.nama as nam, tahun_ajaran.nama as nm';
			$data['id'] = $where;
			//buat peralihan penampungan sementara dari parameter
			$nisn = $where;
			$data['rapot']=$this->M_rapot->getRapotWhereId($jenis_nilai, $nisn);
			$this->load->view('menugur/rapot_detail1', $data);
		}
		if ($cek == 'pas'){
			$jenis_nilai = 'rapot.*, mapel.nama as na, semester.nama as nam, tahun_ajaran.nama as nm';
			$data['id'] = $where;
			//buat peralihan penampungan sementara dari parameter
			$nisn = $where;
			$data['rapot']=$this->M_rapot->getRapotWhereId($jenis_nilai, $nisn);
			$this->load->view('menugur/rapot_detail2', $data);
		}
		
		// $data['id'] = $where;
		// //buat peralihan penampungan sementara dari parameter
		// $nisn = $where;
		// $data['rapot']=$this->M_rapot->getRapotWhereId($jenis_nilai, $nisn);
		// $this->load->view('menugur/rapot_detail', $data);
	}
	// public function detailrapot($id)
	// {
	// 	$data['rapot']=$this->M_rapot->getRapotWhereId($id);
	// 	$data['id'] = $id;
	// 	$this->load->view('menugur/rapot_detail', $data);
	// }


	// public function addrapot($id)
	// {
	// 	$data['id'] = $id;
	// 	$data['mapel'] = $this->M_mapel->listMapel();
	// 	$data['semester'] = $this->M_semester->listSemester();
	// 	$data['tahunajaran'] = $this->M_tahunajaran->listTahun_ajaran();

	// 	// if ($pts == 'pts' ) { 
	// 	// 	$this->load->view('formrapot/rapot_add1', $data);
	// 	// }
	// 	// else {
	// 	// 	$this->load->view('formrapot/rapot_add2', $data);
	// 	// }
	// 	// $data['id'] = $id;
	// 	// $data['mapel'] = $this->M_mapel->listMapel();
	// 	// $data['semester'] = $this->M_semester->listSemester();
	// 	// $data['tahunajaran'] = $this->M_tahunajaran->listTahun_ajaran();


	// 	// die(json_encode($data['mapel']));
	// 	// $data['rapot']=$this->M_rapot->getSis($nisn);
	// 	$this->load->view('menugur/rapot_add', $data);
	// }
	
	public function addrapotpts($id)
	{
		$data['id'] = $id;
		$data['mapel'] = $this->M_mapel->listMapel();
		$data['semester'] = $this->M_semester->listSemester();
		$data['tahunajaran'] = $this->M_tahunajaran->listTahun_ajaran();


		// die(json_encode($data['mapel']));
		// $data['rapot']=$this->M_rapot->getSis($nisn);
		$this->load->view('menugur/rapot_addpts', $data);
	}
	public function addrapotpas($id)
	{
		$data['id'] = $id;
		$data['mapel'] = $this->M_mapel->listMapel();
		$data['semester'] = $this->M_semester->listSemester();
		$data['tahunajaran'] = $this->M_tahunajaran->listTahun_ajaran();


		// die(json_encode($data['mapel']));
		// $data['rapot']=$this->M_rapot->getSis($nisn);
		$this->load->view('menugur/rapot_addpas', $data);
	}

	// public function saverapot($id)
	// {
	// 	$data = [
	// 		'id' => $this->input->post('id'),
	// 		'nisn' => $this->input->post('nisn'),
	// 		'kode_mp' => $this->input->post('kode_mp'),
	// 		'kode_semester' => $this->input->post('kode_semester'),
	// 		'kode_ta' => $this->input->post('kode_ta'),
	// 		'pts' => $this->input->post('pts'),
	// 		'pas' => $this->input->post('pas'),
	// 		'nilai' => $this->input->post('nilai'),
	// 	];

	// 	$this->M_rapot->save($data);

		
	// 	return  redirect("C_rguru/cekrapot/"  . $id);
	// }

	public function saverapotpts($pts, $id)
	{
		$data = [
			'id' => $this->input->post('id'),
			'nisn' => $this->input->post('nisn'),
			'kode_mp' => $this->input->post('kode_mp'),
			'kode_semester' => $this->input->post('kode_semester'),
			'kode_ta' => $this->input->post('kode_ta'),
			'nilaipts' => $this->input->post('nilaipts'),

		];

		$this->M_rapot->save($data);
		
		return  redirect ("C_rguru/cekrapot/". $pts .'/' . $id);
	}

	public function saverapotpas($pas, $id)
	{
		$data = [
			'id' => $this->input->post('id'),
			'nisn' => $this->input->post('nisn'),
			'kode_mp' => $this->input->post('kode_mp'),
			'kode_semester' => $this->input->post('kode_semester'),
			'kode_ta' => $this->input->post('kode_ta'),
			'nilaipas' => $this->input->post('nilaipas'),
		];

		$this->M_rapot->save($data);

		return redirect("C_rguru/cekrapot/" . $pas . '/' . $id);
	}

	public function editrapot($nisn, $idmp)
	{
		$data['rapot']=$this->M_rapot->getSis($nisn, $idmp);
		$this->load->view('menugur/rapot_edit', $data);
	}
	public function editrapotpts($nisn, $idmp)
	{
		$data['rapot']=$this->M_rapot->getSis($nisn, $idmp);
		$this->load->view('menugur/rapot_edit1', $data);
	}
	public function editrapotpas($nisn, $idmp)
	{
		$data['rapot']=$this->M_rapot->getSis($nisn, $idmp);
		$this->load->view('menugur/rapot_edit2', $data);
	}


	public function presensi()
	{
		$nip = $this->session->userdata('uname');
		$data['kelas']=$this->M_kelas->listKelas();
		$data['siswa']=$this->M_siswa->listSiswaWhrGur($nip);
		$this->load->view('menugur/presensi', $data);
	}

	public function wherekls(){
		$where = $this->input->post('kode_kls');
		if($where != null){
			$data['siswa']=$this->M_siswa->wherKls($where);
		}else{
			$data['siswa']=$this->M_siswa->listSiswa();
		}
		$data['kelas']=$this->M_kelas->listKelas();
		$this->load->view('menugur/presensi', $data);
	}

	public function detailpresensi($id)
	{
		$data['id'] = $id;
		$data['presensi']=$this->M_presensi->getPresensiWhereId2($id);
		$data['mapel'] = $this->M_mapel->listMapel();
		$data['semester'] = $this->M_semester->listSemester();
		$data['tahunajaran'] = $this->M_tahunajaran->listTahun_ajaran();

		// header("Content-type: application/json");
		// die(json_encode($data['presensi']));
		$this->load->view('menugur/presensi_detail', $data);
	}

	public function editpresensi($id)
	{
		$data['presensi']=$this->M_presensi->getPresensi($id);
		$this->load->view('menugur/presensi_edit', $data);
	}
	public function savepresensi()
	{
		$data = [
			'kode' => $this->input->post('kode'),
			'kode_mp' => $this->input->post('kode_mp'),
			'pertemuan' => $this->input->post('pertemuan'),
			'tanggal' => $this->input->post('tanggal'),
			'alpha' => $this->input->post('alpha'),
			'ijin' => $this->input->post('ijin'),
			'sakit' => $this->input->post('sakit'),
			'nisn' => $this->input->post('kode'),
			'kode_mp' => $this->input->post('kode_mp'),
			'kode_semester' => $this->input->post('kode_semester'),
			'kode_ta' => $this->input->post('kode_ta'),
		];

		$this->M_presensi->save($data);

		return  redirect("C_rguru/detailpresensi/" . $data['kode']);
	}

}
