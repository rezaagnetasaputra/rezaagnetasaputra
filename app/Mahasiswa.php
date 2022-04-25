<?php
interface Formasi {
	public function Mhsw();
}

interface Peserta extends Formasi {
	public function dataKelas();
	public function dataOrtu();
	public function dataSekolahAsal();
}

class Siswa implements Peserta {
	private $db;
	//koneksikan
	public function __construct()
	{
	 try {
	 	$this->db =
	 	new PDO("mysql:host=localhost;dbname=dbakademik", "root", "");
	 } catch (PDOException $e) {
		die ("Error " . $e->getMessage());
	 }
	}

	public function Mhsw() {
		$sql = "SELECT * FROM tb_mhsw";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();

		$data = [];
		while ($rows = $stmt->fetch()) {
			$data[] = $rows;
		}
		return $data;
	}

	public function dataKelas() {
		$sql = "SELECT t1.mhsw_id, t1.mhsw_nama, t2.id_kelas, t2.nama_kelas FROM tb_mhsw t1, tb_kelas t2 where t1.id_kelas=t2.id_kelas";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();

		$data = [];
		while ($rows = $stmt->fetch()) {
			$data[] = $rows;
		}
		return $data;
	 	//return $this->nama;
	 	// outputkan id mhs, nama mhs, id kelas, nama kelas
	}

	public function dataOrtu() {
	//
	}

	public function dataSekolahAsal() {
	//
	}

}

$ssw = new Siswa;
$rows = $ssw->dataKelas();
foreach ($rows as $row) {
	echo $row['mhsw_nama']."-".$row['nama_kelas']."<br>";
}