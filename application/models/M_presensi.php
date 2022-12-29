<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_presensi extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function listPresensi()
	{
		$this->db->select('presensi.*, mapel.nama as mapel, semester.nama as semester, tahun_ajaran.nama as ta, murid.nama as murid, guru.nama as guru, kelas.nama as kelas');
        $this->db->from('presensi');
        $this->db->join('mapel','presensi.kode_mp=mapel.kode');
        $this->db->join('semester','presensi.kode_semester=semester.kode');
        $this->db->join('tahun_ajaran','presensi.kode_ta=tahun_ajaran.kode');
        $this->db->join('murid','presensi.nisn=murid.nisn');
        $this->db->join('kelas','murid.kode_kelas=kelas.kode');
        $this->db->join('guru','guru.kode_mp=mapel.kode');
        $query = $this->db->get();
        return $query->result();
	}

	public function getPresensiWhereId($where)
	{
		// $this->db->select('presensi.*, mapel.nama as mapel, semester.nama as semester, tahun_ajaran.nama as ta, kelas.nama as kelas');
        // $this->db->from('presensi');
        // $this->db->join('mapel','presensi.kode_mp=mapel.kode');
        // $this->db->join('semester','presensi.kode_semester=semester.kode');
        // $this->db->join('tahun_ajaran','presensi.kode_ta=tahun_ajaran.kode');
        // $this->db->join('murid','presensi.nisn=murid.nisn');
        // $this->db->join('kelas','murid.kode_kelas=kelas.kode');
        // $this->db->where('presensi.nisn', $where);
        // $query = $this->db->get();
        // return $query->result();

		// select `murid`.`nisn` as `nisn_siswa`, `mapel`.`kode`, `presensi`.`kode_mp`
		// FROM `presensi`
		// INNER JOIN `murid` ON `presensi`.`nisn`=`murid`.`nisn`
		// INNER join `mapel` ON `presensi`.`kode_mp`=`mapel`.`kode`
		// INNER join `semester` ON `presensi`.`kode_semester`=`semester`.`kode` 
		// INNER join `tahun_ajaran` ON `presensi`.`kode_ta`=`tahun_ajaran`.`kode` 
		// where `presensi`.`nisn`='45678903';

		$this->db->select(
			'murid.nisn as nisn_siswa, mapel.kode, presensi.kode_mp, mapel.nama, tahun_ajaran.kode, presensi.pertemuan, presensi.tanggal, presensi.ijin, presensi.alpha, presensi.sakit'
		);

		$this->db->from('presensi');
		$this->db->join('murid', 'presensi.nisn=murid.nisn');
		$this->db->join('mapel', 'presensi.kode_mp=mapel.kode');
		$this->db->join('semester', 'presensi.kode_semester=semester.kode');
		$this->db->join('tahun_ajaran','presensi.kode_ta=tahun_ajaran.kode');
		$this->db->where('presensi.nisn', $where);
		return $this->db->get()->result();

	}

	public function getPresensiWhereId2($where)
	{
		// $this->db->select('presensi.*, mapel.nama as mapel, semester.nama as semester, tahun_ajaran.nama as ta, kelas.nama as kelas');
        // $this->db->from('presensi');
        // $this->db->join('mapel','presensi.kode_mp=mapel.kode');
        // $this->db->join('semester','presensi.kode_semester=semester.kode');
        // $this->db->join('tahun_ajaran','presensi.kode_ta=tahun_ajaran.kode');
        // $this->db->join('murid','presensi.nisn=murid.nisn');
        // $this->db->join('kelas','murid.kode_kelas=kelas.kode');
        // $this->db->where('presensi.nisn', $where);
        // $query = $this->db->get();
        // return $query->result();

		// select `murid`.`nisn` as `nisn_siswa`, `mapel`.`kode`, `presensi`.`kode_mp`
		// FROM `presensi`
		// INNER JOIN `murid` ON `presensi`.`nisn`=`murid`.`nisn`
		// INNER join `mapel` ON `presensi`.`kode_mp`=`mapel`.`kode`
		// INNER join `semester` ON `presensi`.`kode_semester`=`semester`.`kode` 
		// INNER join `tahun_ajaran` ON `presensi`.`kode_ta`=`tahun_ajaran`.`kode` 
		// where `presensi`.`nisn`='45678903';

		$this->db->select(
			'murid.nisn as nisn_siswa, mapel.kode, presensi.kode_mp, mapel.nama, tahun_ajaran.kode, presensi.pertemuan, presensi.tanggal, presensi.ijin, presensi.alpha, presensi.sakit'
		);

		$this->db->from('presensi');
		$this->db->join('murid', 'presensi.nisn=murid.nisn');
		$this->db->join('mapel', 'presensi.kode_mp=mapel.kode');
		$this->db->join('semester', 'presensi.kode_semester=semester.kode');
		$this->db->join('tahun_ajaran','presensi.kode_ta=tahun_ajaran.kode');
		$this->db->where('presensi.nisn', $where);
		return $this->db->get()->result();

	}

	public function getPresensi($id)
	{
		$this->db->select('presensi.*');
        $this->db->from('presensi');
        $this->db->where('presensi.kode', $id);
        $query = $this->db->get();
		if($query->num_rows()>0){
			foreach ($query->result() as $value) {
				$data=array(
					'kode' => $value->kode,
					'kode_mp' => $value->kode_mp,
					'pertemuan' => $value->pertemuan,
					'tanggal' => $value->tanggal,
					'alpha' => $value->alpha,
					'ijin' => $value->ijin,
					'sakit' => $value->sakit,
					'kode_semester' => $value->kode_semester,
					'kode_ta' => $value->kode_ta,
					'nisn' => $value->nisn
				);
			}
		}
		return $id;
	}


	public function insert($data)
	{
		$this->db->insert('presensi', $data);
	}

	public function delete($id){
		$this->db->query("DELETE FROM presensi where kode='$id'");
	}

	public function update($data, $id){
		$this->db->set($data);
		$this->db->where('kode', $id);
		$this->db->update('presensi', $data);
	}
	public function save($data)
	{
		$this->db->insert('presensi', $data);
	}

	public function total_data()
	{
		 $this->db->select('alpha, COUNT(alpha) as total');
		 $this->db->group_by('alpha'); 
		 $this->db->order_by('total', 'desc'); 
		 $hasil = $this->db->get('presensi');
		return $hasil;
		}
}
?>