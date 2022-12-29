<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelas extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listKelas()
	{
		$this->db->select("kelas.nama as nama, guru.nama as namgur, guru.nip as nip_wali, kelas.kode_kelas as kode_kelas");
		$this->db->from('kelas');
		$this->db->join('guru','kelas.nip_wali=guru.nip');
		$query = $this->db->get();
        return $query->result();
		$query=$this->db->query("SELECT * FROM kelas");
		return $query->result();
	}

	public function getRapotWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM rapot WHERE nisn='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'nisn' => $value->nisn,
					'kode_mp' => $value->kode_mp,
					'kode_semester' => $value->kode_semester,
					'kode_ta' => $value->kode_ta,
					'nilai' => $value->nilai 
				);
			}
		}
		return $data;
	}

	public function getSemWhereId($where)
	{
		$query=$this->db->query("SELECT * FROM kelas WHERE kode='$where'");
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'kode_kelas' => $value->kode_kelas,
					'nama' => $value->nama,

					'nip_wali' => $value->nip_wali,
				);
			}
		}
		return $data;
	}

	public function insert($data)
	{
		$this->db->insert('kelas', $data);
	}

	public function update($data, $where){
		$this->db->set($data);
		$this->db->where("kode_kelas", $where);
		$this->db->update('kelas', $data);

	}

	public function delete($where){
		$this->db->query("DELETE FROM kelas where kode_kelas='$where'");
	}
	public function wali(){
		// SELECT * FROM `jadwal`
		// INNER JOIN kelas
    	// ON jadwal.kode_kelas = kelas.kode
    
    	// INNER JOIN guru
    	// ON guru.kode_kelas = kelas.kode

		// $this->db->select('kelas.nama as nam, guru.nama as nmg, guru.nip as nip, jadwal.*');
		// $this->db->from('jadwal');
		// $this->db->join('kelas','jadwal.kode_kelas=kelas.kode');
		// $this->db->join('guru','guru.kode_kelas=kelas.kode');
		// $query = $this->db->get();
        // return $query->result();

		$this->db->select("kelas.nama as nama, guru.nama as namgur guru.nip as nip");
		$this->db->from('kelas');
		$this->db->join('guru','kelas.nip_wali=guru.nip');
		$query = $this->db->get();
        return $query->result();

	}

}
?>