<?php
interface haikal{
    public function proses();
}

//koneksi database
class connection{

    public $db;
    public function __construct()
    {
    
        $host = 'localhost';
        $dbname = 'kelompok_gaji';
        $user = 'root';
        $pwd = '';
        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $user, $pwd);
    }
    public function show(){
        $query = $this->db->prepare("SELECT * FROM data_gaji");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }
}

class page implements haikal{
    public function proses(){
        $page ="";
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }
        switch($page){
            case 'tambah' :
                include("tambah.php");
                break;
                case 'edit' :
                    include("edit.php");
                    break;
                    default ;
        }
    }
    }

    class tambah implements haikal{
    public function proses(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['page']='tambah') {
            $koneksi = new connection();

            $nomorinduk = $_POST['462_nomorinduk'];
            $nama = $_POST['462_nama'];
            $jabatan = $_POST['462_Jabatan'];
            $nomorhp = $_POST['462_nomorhp'];
            $gajipokok = $_POST['462_gajipokok'];
            $bonus = $_POST['462_bonus'];
            $absen = $_POST['462_absen'];
            $takehome = (int)$gajipokok + (int)$bonus - ((int)$absen*20000);

            $query = $koneksi->db->prepare("INSERT INTO data_gaji 
            (nomorinduk_karyawan, 
            nama_karyawan, 
            jabatan_karyawan, 
            nomorhp_karyawan, 
            gajipokok_karyawan, 
            bonus_karyawan, 
            absen_karyawan,
            takehome_karyawan) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $query->execute([
                $nomorinduk, 
                $nama, 
                $jabatan, 
                $nomorhp, 
                $gajipokok, 
                $bonus, 
                $absen,
                $takehome]);

            header('Location: index.php');
            exit();
        }
    }
    }

    class edit implements haikal{
        public function getData(){
            if(isset($_GET['page']) && $_GET['page'] == "edit"){
                $koneksi = new connection();
                $nomorinduk = $_GET['nomorinduk'];
                $tampildata = $koneksi->db->prepare("SELECT * FROM data_gaji WHERE nomorinduk_karyawan = ?");
                $tampildata->execute([$nomorinduk]);
                $dataedit = $tampildata->fetchAll();
                return $dataedit;
            }
        }
        public function proses(){
           
           if($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['page']='edit'){
            $koneksi = new connection();
            $nomorinduk = $_POST['462_nomorinduk'];
            $nama = $_POST['462_nama'];
            $jabatan = $_POST['462_Jabatan'];
            $nomorhp = $_POST['462_nomorhp'];
            $gajipokok = $_POST['462_gajipokok'];
            $bonus = $_POST['462_bonus'];
            $absen = $_POST['462_absen'];
            $takehome = (int)$gajipokok + (int)$bonus - ((int)$absen*20000);
            
            $query = $koneksi->db->prepare("UPDATE data_gaji SET nama_karyawan = ?, jabatan_karyawan = ?, nomorhp_karyawan = ?, gajipokok_karyawan = ?, bonus_karyawan = ?, absen_karyawan = ?, takehome_karyawan = ? WHERE nomorinduk_karyawan = ?");
            $query->execute([$nama, $jabatan, $nomorhp, $gajipokok, $bonus, $absen, $takehome, $nomorinduk]);

            header('Location: index.php');
            exit();
           }
        }
    }

    class hapus implements haikal{
        public function proses(){
            $koneksi = new connection();
        if (isset($_GET['hapus'])) {
            $nomorinduk = $_GET['hapus'];
            $query = $koneksi->db->prepare("DELETE FROM data_gaji WHERE nomorinduk_karyawan = ?");
            $query->execute([$nomorinduk]);
            header('Location: index.php');
            exit();
        }
        }
    }
?>