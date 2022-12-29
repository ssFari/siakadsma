<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_guru extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_guru');
	}
	
	public function index()
	{
		$data['guru']=$this->M_guru->listGuru();
		$this->load->view('menuadm/guru', $data);
	}

	public function add(){
		$dat = array(
			'nip' =>	$this->input->post('nip'),
			'nama'	=>	$this->input->post('nama'),
			'jk'	=>	$this->input->post('jk'),
			'alamat'	=>	$this->input->post('alamat'),
			'kode_kelas'	=>	$this->input->post('kode_kelas'),
		);
		$cek = $this->M_guru->insert($dat);
		redirect('C_admin/guru');
	}

	public function update(){
		$dat=array(
			'nama'=>$this->input->post('nama'),
			'jk'	=>	$this->input->post('jk'),
			'alamat'	=>	$this->input->post('alamat'),
			'kode_kelas'	=>	$this->input->post('kode_kelas'),

		);
		$where=$this->input->post('kd_old');
		$this->M_guru->update($dat, $where);
		redirect('C_admin/guru');
	}

}