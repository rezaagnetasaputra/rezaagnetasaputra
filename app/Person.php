<?php
abstract class Person {
  public $db;
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
  abstract public function dataNama($id_person);  
}

class Mahasiswa extends Person {
 // buatlah jabatan membaca dari tabel tb_mahasiswa
  public function dataFakultas($id_person) {
    $sql = "SELECT * FROM tb_mahasiswa where id_person='$id_person'";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();
    if ($row)
    return $row["fakultas"];
  }

  public function dataNama($id_person) {
    $sql = "SELECT * FROM tb_person where id_person='$id_person'";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();
    return $row["nama_person"];
  }
}

class Bem extends Person {
  //public string $jabatan = "Ketua";
  // buatlah jabatan membaca dari tabel tb_bem
  public function dataJabatan($id_person) {
    $sql = "SELECT * FROM tb_bem where id_person='$id_person'";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();
    if ($row)
    return $row["jabatan"];
  }

  public function dataNama($id_person) {
    $sql = "SELECT * FROM tb_person where id_person='$id_person'";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();
    return $row["nama_person"];
  }
}

$mhsw = new Mahasiswa;
echo "NAMA :" . $mhsw->dataNama(1) . "</p>";
echo "Fakultas :" . $mhsw->dataFakultas(1) . "</p>";
echo "---------------------------------<p>";
$bem = new Bem;
echo "NAMA :" . $bem->dataNama(1) . "</p>";
echo "Jabatan :" . $bem->dataJabatan(1) . "</p>";
/*abstract class Person {
  public $db;
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
  abstract public function dataNama($id_person);  
}

class Mahasiswa extends Person {
 // buatlah jabatan membaca dari tabel tb_mahasiswa
  public function dataFakultas($id_person) {
    $sql = "SELECT * FROM tb_mahasiswa where id_person='$id_person'";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();
    if ($row)
    return $row["fakultas"];
  }

  public function dataNama($id_person) {
    $sql = "SELECT * FROM tb_person where id_person='$id_person'";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();
    return $row["nama_person"];
  }
}

class Bem extends Person {
  public string $jabatan = "Ketua";
  // buatlah jabatan membaca dari tabel tb_bem
  public function dataJabatan() {
    return $this->jabatan;
  }

  public function dataNama($id_person) {
    $sql = "SELECT * FROM tb_person where id_person='$id_person'";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();
    return $row["nama_person"];
  }
}

$mhsw = new Mahasiswa;
echo "NAMA :" . $mhsw->dataNama(1) . "</p>";
echo "Fakultas :" . $mhsw->dataFakultas(1) . "</p>";
echo "---------------------------------<p>";
$bem = new Bem;
echo "NAMA :" . $bem->dataNama(1) . "</p>";
echo "Jabatan :" . $bem->dataJabatan(1) . "</p>";
*/